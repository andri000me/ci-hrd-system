<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportproject extends MY_Controller {

    function Reportproject()
    {
        parent::__construct();
        $this->load->model('report_mod');
        
    }

    function index()
    {
    	$this->load->view('reportproject');
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

    function detail() {
        $this->load->view('reportproject_detail');
    }
}