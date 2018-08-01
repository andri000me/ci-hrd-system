<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function Dashboard()
    {
        parent::__construct();  
    }

    function index()
    {
    	if (empty($this->session->userdata('user_id'))) {
    		$url = 'login?url='.uri_string();
            $url .= (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
            redirect(base_url().$url);
    	}
    		$this->load->view('dashboard');
    }
}