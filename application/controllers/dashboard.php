<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function Dashboard()
    {
        parent::__construct();
        $this->load->model('report_mod');
    }

    function index()
    {
    	if (empty($this->session->userdata('user_id'))) {
    		$url = 'login?url='.uri_string();
            $url .= (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
            redirect(base_url().$url);
    	}

        $where = null;

        $id = $this->input->get('per_page');

        $url = '?';


        $config['base_url'] = base_url(FALSE).'dashboard?';

        $config['total_rows'] = $this->report_mod->get_project(true,$where);

        $config['per_page'] = 5;

        $config['cur_page'] = empty($id) ? 0 : $id;

        $config['page_query_string'] = TRUE;

        /*foreach ($this->_set_pagination() as $key=>$val){

            $config[$key] = $val;

        }*/

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

    	$this->load->view('dashboard',$data);
    }
}