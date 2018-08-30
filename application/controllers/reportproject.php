<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportproject extends MY_Controller {

    function Reportproject()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('report_mod');
        
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
        $this->cek_login();
        $where = null;

        $id = $this->input->get('per_page');

        $url = '?';


        $config['base_url'] = base_url(FALSE).'reportproject?';

        $config['total_rows'] = $this->report_mod->get_project(true,$where);

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

        $data['datacount'] = $this->report_mod->get_project(true,$where);

        $data['pagination'] = $this->pagination->create_links();

        $data['row'] = $this->report_mod->get_project(false,$where,true,$skip,$take);
        //Menelusuri apakah data project ada update report
        
        $i = 1;
        $row = $this->report_mod->get_project(false,$where);
        if (!empty($row)) {
        foreach ($row as $key => $a) {
            $cekreport[$i] = $this->report_mod->cek_report($a['id']);
            $jumlahreport[$i] = $this->report_mod->get_report(true,array('id_project' => $a['id']));
            $i++;
        }
        $data['lastupdate'] = $cekreport;
        $data['jumlahreport'] = $jumlahreport;
        }
        

    	$this->load->view('reportproject',$data);
    }

    function add() {
        $this->cek_login();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('name', 'Project Name', 'required');
        $this->form_validation->set_rules('date', 'Start Date', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('detail', 'Project Detail', 'required');
        $data['msg'] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $userid = $this->session->userdata('user_id');
            $name = $this->input->post('name');
            $date = $this->input->post('date');
            $status = $this->input->post('status');
            $detail = $this->input->post('detail');

            $add_data = array(
                'user_id' => $userid,
                'project_name' => $name,
                'project_detail' => nl2br($detail),
                'project_status' => $status,
                'project_start' => $date
            );
            if($_FILES["uploadreport"]['size'] != 0)
                {
                    if (!is_dir('././clients')) {
                        mkdir('././clients');
                        mkdir('././clients/project');
                    }
                    else{
                        if (!is_dir('././clients/project')) {
                            mkdir('././clients/project');
                        }
                    }
                    $file = $this->do_upload1();
                    if ($file['status']) {
                        $add_data['file'] = $file['file_name'];
                    }

                }
            $i = $this->report_mod->add($add_data);

            if ($i) {
                redirect(base_url().'reportproject');
            }
            else{
                $data['msg'] = "There are problems with our server, please try again later.";
            }

        }
        $this->load->view('reportproject_add', $data);
    }

    function edit($id=0){
        $this->cek_login();
        $i = $this->report_mod->cek_project($id);
        $data['row'] = '';
        if ($i) {
            $data['row'] = $i;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('name', 'Project Name', 'required');
        $this->form_validation->set_rules('date', 'Start Date', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('detail', 'Project Detail', 'required');
        $data['msg'] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $name = $this->input->post('name');
            $date = $this->input->post('date');
            $status = $this->input->post('status');
            $detail = $this->input->post('detail');

            $edit_data = array(
                'project_name' => $name,
                'project_detail' => nl2br($detail),
                'project_status' => $status,
                'project_start' => $date
            );

            if($_FILES["uploadreport"]['size'] != 0)
                {
                    if (!is_dir('././clients')) {
                        mkdir('././clients');
                        mkdir('././clients/project');
                    }
                    else{
                        if (!is_dir('././clients/project')) {
                            mkdir('././clients/project');
                        }
                    }
                    $file = $this->do_upload1();
                    if ($file['status']) {
                        $edit_data['file'] = $file['file_name'];
                    }

                }

            $a = $this->report_mod->update($edit_data,$id);

            redirect(base_url().'reportproject');
        }

        $this->load->view('reportproject_edit',$data);
    }

    function detail($id=0) {
        $this->cek_login();
        if (empty($id)) {
            redirect(base_url().'reportproject');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('report', 'Report', 'required');
        $data['msg'] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $projectid = $id;
            $userid = $this->session->userdata('user_id');
            $report = $this->input->post('report');

            $add_data = array(
                'id_project' => $projectid,
                'id_user' => $userid,
                'report' => nl2br($report)
            );

            if($_FILES["uploadreport"]['size'] != 0)
                {
                    if (!is_dir('././clients')) {
                        mkdir('././clients');
                        mkdir('././clients/report');
                    }
                    else{
                        if (!is_dir('././clients/report')) {
                            mkdir('././clients/report');
                        }
                    }
                    $file = $this->do_upload_report();
                    if ($file['status']) {
                        $add_data['file'] = $file['file_name'];
                    }

                }

            $i = $this->report_mod->add_detail($add_data);
            if ($i) {
                if (!empty($this->input->post('status'))) {
                    $status = $this->input->post('status');
                    
                    $update_data['project_status'] = $status;

                    $this->report_mod->update($update_data,$id);
                }
                redirect(base_url().'reportproject/detail/'.$id);
            }
            else{
                $data['msg'] = "There are problems with our server, please try again later.";
            }


        }



        //Pemanggilan Konten Web Detail
        $where = array('id_project' => $id);

        $halaman = $this->input->get('per_page');

        $url = '?';


        $config['base_url'] = base_url(FALSE).'reportproject/detail/'.$id.'?';

        $config['total_rows'] = $this->report_mod->get_report(true,$where);

        $config['per_page'] = 5;

        $config['cur_page'] = empty($halaman) ? 0 : $halaman;

        $config['page_query_string'] = TRUE;

        foreach ($this->_set_pagination() as $key=>$val){

            $config[$key] = $val;

        }

        $this->pagination->initialize($config);



        $skip = $config['cur_page'];

        $take = $config['per_page'];

        $data['pagination'] = $this->pagination->create_links();

        $data['report'] = $this->report_mod->get_report(false,$where,true,$skip,$take);

        $data['project'] = $this->report_mod->get_project(false,array('ds_project.id' => $id));

        $cekproject = $this->report_mod->cek_project($id);
        if (!$cekproject) {
            redirect(base_url().'reportproject');
        }
        

        $this->load->view('reportproject_detail',$data);
    }

    function edit_report($id=0,$id_report=0){
        $this->cek_login();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('report'.$id_report, 'Report', 'required');
        $data['msg'] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $report = $this->input->post('report'.$id_report);

            $edit_data = array(
                'report' => nl2br($report)
            );

            if($_FILES["uploadreport".$id_report]['size'] != 0)
                {
                    if (!is_dir('././clients')) {
                        mkdir('././clients');
                        mkdir('././clients/report');
                    }
                    else{
                        if (!is_dir('././clients/report')) {
                            mkdir('././clients/report');
                        }
                    }
                    $file = $this->do_upload_report_edit($id_report);
                    if ($file['status']) {
                        $edit_data['file'] = $file['file_name'];
                    }

                }

            $a = $this->report_mod->update_detail($edit_data,$id_report);
            redirect(base_url().'reportproject/detail/'.$id);
            
        }
        redirect(base_url().'reportproject/detail/'.$id);
    }

    private function do_upload1()
    {
        /*$new_name                       = $_FILES["uploadreport"]['name'].''.date('d F Y');*/
        /*$config['file_name']            = $new_name;*/
        $config['upload_path']          = '././clients/project/';
        $config['allowed_types']        = 'gif|jpg|png|ai|psd';
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('uploadreport'))
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

    private function do_upload_report()
    {
        /*$new_name                       = $_FILES["uploadreport"]['name'].''.date('d F Y');*/
        /*$config['file_name']            = $new_name;*/
        $config['upload_path']          = '././clients/report/';
        $config['allowed_types']        = 'gif|jpg|png|ai|psd';
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('uploadreport'))
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

    private function do_upload_report_edit($id)
    {
        /*$new_name                       = $_FILES["uploadreport"]['name'].''.date('d F Y');*/
        /*$config['file_name']            = $new_name;*/
        $config['upload_path']          = '././clients/report/';
        $config['allowed_types']        = 'gif|jpg|png|ai|psd';
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('uploadreport'.$id))
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