<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teamlist extends MY_Controller {

    function Teamlist()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('teamlist_mod');
    }

    function _set_pagination()
    {
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['next_tag_open'] = '<li class="custompagination paginate_button page-item next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="custompagination paginate_button page-item previous">';
        $config['prev_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination" style="justify-content: flex-end;">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="custompagination paginate_button page-item">';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="custompagination paginate_button page-item previous">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="custompagination paginate_button page-item next">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        return $config;
    }

    function cek_login(){
        $id = $this->session->userdata('user_id');
        if (empty($id)) {
            $url = 'login?url='.uri_string();
            $url .= (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
            redirect(base_url().$url);
        }
    }

    function cek_rule(){
        $id = $this->session->userdata('user_id');
        if (empty($id)) {
            $url = 'login?url='.uri_string();
            $url .= (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
            redirect(base_url().$url);
        }
        else{
            $rule = $this->session->userdata('rule');
            if ($rule != 1 && $rule != 2) {
                redirect(base_url().'teamlist/detail/'.$this->session->userdata('user_id'));
            }
        }
        
    }

    function index()
    {
        

        $this->cek_rule();

    	$where = null;

        $id = $this->input->get('per_page');

        $url = '?';


        $config['base_url'] = base_url(FALSE).'teamlist?';

        $config['total_rows'] = $this->teamlist_mod->get_teamlist(true,$where);

        $config['per_page'] = 5;

        $config['cur_page'] = empty($id) ? 0 : $id;

        $config['page_query_string'] = TRUE;

        foreach ($this->_set_pagination() as $key=>$val){

            $config[$key] = $val;

        }

        $this->pagination->initialize($config);



        $skip = $config['cur_page'];

        $take = $config['per_page'];

        $data['number'] = $config['cur_page'];

        $data['datacount'] = $this->teamlist_mod->get_teamlist(true,$where);

        $data['pagination'] = $this->pagination->create_links();

        $data['a'] = $this->teamlist_mod->get_teamlist(false,$where,true,$skip,$take);

    	$this->load->view('team_list', $data);
    }

    function detail($id=0){
        $this->cek_login();
        if ($id == 0) {
            redirect('teamlist');
        }
        $i = $this->teamlist_mod->get_byuid($id);
        if ($i->rule == 1) {
            $data['rule'] = 'BOS';
        }
        elseif ($i->rule == 2) {
            $data['rule'] = 'HRD';
        }
        elseif ($i->rule == 3) {
            $data['rule'] = 'STAFF';
        }
        elseif ($i->rule == 4) {
            $data['rule'] = 'CLIENT';
        }
        $cuti = $this->teamlist_mod->get_cuti($id);
        $data['info'] = $i;
        $data['sisacuti'] = '';
        if (!empty($cuti)) {
            $data['sisacuti'] = $cuti->cuti;
        }
        

        $this->load->view('team_detail', $data);
    }

    function add()
    {
        $this->cek_rule();
    	$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('rule', 'Rule', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('since', 'Since', 'required');
        $this->form_validation->set_rules('cuti', 'Cuti', 'required');
        
        $data["msg"] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $fulname = $this->input->post('name');
            $rule = $this->input->post('rule');
            $company = $this->input->post('company');
            $since = $this->input->post('since');
            $cuti = $this->input->post('cuti');

            $is_active = $this->teamlist_mod->get_byemail($email);
            if(!$is_active)
            {
                $data_add = array(
                    'email' => $email,
                    'password' => $this->_encode_password($password),
                    'name' => $fulname,
                    'rule' => $rule,
                    'is_lock' => '0',
                    'created' => date_now(true),
                    'company' => $company,
                    'since' => $since
                );
                
                if($_FILES["upload1"]['size'] != 0)
                {
                    if (!is_dir('././clients')) {
                        mkdir('././clients');
                        mkdir('././clients/user');
                    }
                    else{
                        if (!is_dir('././clients/user')) {
                            mkdir('././clients/user');
                        }
                    }
                    $file = $this->do_upload1();
                    if ($file['status']) {
                        $data_add['img'] = $file['file_name'];
                    }

                }
                
                
                $user_id = $this->teamlist_mod->add($data_add);
                if($user_id)
                {
                    $ambilid = $this->teamlist_mod->get_byemail($email);
                    $cuti_add = array('cuti' => $cuti, 'id_user' => $ambilid->id);
                    $addcuti = $this->teamlist_mod->add_cuti($cuti_add);
                    if ($addcuti) {
                        redirect('teamlist');
                    }
                    else{
                        $data['msg'] = "There are problems with our server, please edit the 'Cuti' section of the user you just add.";
                    }
                }
                else{
                    $data['msg'] = "There are problems with our server, please re-registration.";
                }
            }
            else{
                $data['msg'] = "This email is already in use!";
            }
        }
        $data['rule'] = $this->teamlist_mod->get_rule();
    	$this->load->view('new_team',$data);
    }

    function edit($user_id=0)
    {
        $this->cek_rule();
        #Cek rule akses
        /*if($this->is_filter_rule(TRUE)){
            $this->_redirect_member();
        }*/
        
        $user = $this->teamlist_mod->get_byuid($user_id);
        if(!$user){
            redirect('teamlist');
        }
        
        #Tidak boleh merubah user adminstrator
        /*if(rule() == get_rule('rule_hrd')){
            if($user->rule == get_rule('rule_administrator')){
                redirect('account');
            }
        }*/
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]|matches[passconf]');
        $this->form_validation->set_rules('rule', 'Rule', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('since', 'Since', 'required');
        $this->form_validation->set_rules('cuti', 'Cuti', 'required');
        
        $data["msg"] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $fulname = $this->input->post('name');
            $rule = $this->input->post('rule');
            $company = $this->input->post('company');
            $since = $this->input->post('since');
            $cuti = $this->input->post('cuti');
            
            if($user->email != $email){
                $is_active = $this->teamlist_mod->get_byemail($email);
            }
            
            if(!$is_active)
            {
                $data_update = array(
                    'email' => $email,
                    'name' => $fulname,
                    'rule' => $rule,
                    /*'is_lock' => $is_lock,*/
                    'company' => $company,
                    'since' => $since
                );
                if($_FILES["upload1"]['size'] != 0)
                {
                    if (!is_dir('././clients')) {
                        mkdir('././clients');
                        mkdir('././clients/user');
                    }
                    else{
                        if (!is_dir('././clients/user')) {
                            mkdir('././clients/user');
                        }
                    }
                    $file = $this->do_upload1();
                    if ($file['status']) {
                        $data_update['img'] = $file['file_name'];
                    }

                }
                $data_update_cuti = array('cuti' => $cuti);
                if(!empty($password)){
                    $data_update['password'] = $this->_encode_password($password);
                }
                
                $this->teamlist_mod->update($data_update,$user->id);
                $this->teamlist_mod->update_cuti($data_update_cuti,$user->id);
                redirect('teamlist');
            }
            else{
                $data['msg'] = "This email is already in use!";
            }
        }
        $ambilcuti = $this->teamlist_mod->get_cuti($user_id);
        $data['row'] = $user;
        $data['rule'] = $this->teamlist_mod->get_rule();
        $data['cuti'] = '';
        if (!empty($ambilcuti)) {
            $data['cuti'] = $ambilcuti->cuti;
        }
        $data['page'] = 'setting';
        $this->load->view('edit_team',$data);
    }

    function delete($user_id=0)
    {
        $this->cek_rule();
        /*$this->is_logged_in();
        #Cek rule akses
        if($this->is_filter_rule(TRUE)){
            $this->_redirect_member();
        }*/
        
        /*$user = $this->teamlist_mod->get_byuid($user_id);
        if(!$user){
            redirect('account');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');
        $this->form_validation->set_rules('remove', 'remove', 'required');
        
        $data["msg"] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $accept_terms = $this->input->post('accept_terms');
            $accept_terms = ($accept_terms == 'on') ? 1 : 0;
            if ($accept_terms)
            {    
                $this->teamlist_mod->delete($user->id);
                redirect('account');
            }
            
            $data['msg'] = 'Please read and accept our terms and conditions.';
        }
        
        $data['user'] = $user;
        $data['page'] = 'setting';
        $this->load->view('account_delete',$data);*/

        $user = $this->teamlist_mod->get_byuid($user_id);
        if(!$user){
            redirect('teamlist');
        }
        else{
            $this->teamlist_mod->delete($user->id);
            redirect('teamlist');
        }


    }

    private function do_upload1()
    {
        $new_name                       = date().''.time().'foto profil';
        $config['file_name']            = $new_name;
        $config['upload_path']          = '././clients/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        

        

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('upload1'))
        {
            return array('status' => false, 'error' => $this->upload->display_errors());
        }
        else
        {
            $data = $this->upload->data();

            $file_name = $data['file_name'];

            $file_type = $data['file_type'];

            $file_size = $data['file_size'];

            $array = array(

                'status'    => true,

                'error'       => '',

                'file_name' => $file_name,

                'file_type' => $file_type,

                'file_size' => $file_size

            );

            return $array;
        }
    }
}