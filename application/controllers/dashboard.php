<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function Dashboard()
    {
        parent::__construct();
        
    }

    function index()
    {
    	$this->load->view('dashboard');
    }
}