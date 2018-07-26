<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

    function Account()
    {
        parent::__construct();
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

    function index()
    {
    	$where = null;

        $id = $this->input->get('per_page');

        $url = '?';


        $config['base_url'] = base_url(FALSE).'account?';

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

    function add()
    {
    	$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('rule', 'Rule', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('since', 'Since', 'required');
        
        $data["msg"] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $fulname = $this->input->post('name');
            $rule = $this->input->post('rule');
            $company = $this->input->post('company');
            $since = $this->input->post('since');

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
                
                $user_id = $this->teamlist_mod->add($data_add);
                if($user_id)
                {
                    redirect('account');
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
        $this->is_logged_in();
        #Cek rule akses
        /*if($this->is_filter_rule(TRUE)){
            $this->_redirect_member();
        }*/
        
        $user = $this->teamlist_mod->get_byuid($user_id);
        if(!$user){
            redirect('account');
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
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[passconf]');
        $this->form_validation->set_rules('rule', 'Rule', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('since', 'Since', 'required');
        
        $data["msg"] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $fulname = $this->input->post('name');
            $rule = $this->input->post('rule');
            $company = $this->input->post('company');
            $since = $this->input->post('since');
            
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
                if(!empty($password)){
                    $data_update['password'] = $this->_encode_password($password);
                }
                
                $this->teamlist_mod->update($data_update,$user->id);
                redirect('account');
            }
            else{
                $data['msg'] = "This email is already in use!";
            }
        }
        $data['row'] = $user;
        $data['rule'] = $this->teamlist_mod->get_rule();
        $data['page'] = 'setting';
        $this->load->view('edit_team',$data);
    }

    function delete($user_id=0)
    {
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
            redirect('account');
        }
        else{
            $this->teamlist_mod->delete($user->id);
            redirect('account');
        }


    }
}