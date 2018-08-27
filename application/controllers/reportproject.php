<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportproject extends MY_Controller {

    function Reportproject()
    {
        parent::__construct();
        $this->load->model('report_mod');
        
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
        /*$data['report_exist'] = false;
        $i = 1;
        $row = $this->report_mod->get_project(false,$where);
        foreach ($row as $key => $a) {
            $ngambilid[$i] = $a['id'];
            $i++;
        }*/

    	$this->load->view('reportproject',$data);
    }

    function add() {
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
                'project_detail' => $detail,
                'project_status' => $status,
                'project_start' => $date
            );

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

    function detail($id=0) {
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
                'report' => $report
            );

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

        $this->load->view('reportproject_detail',$data);
    }
}