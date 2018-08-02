<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportproject extends MY_Controller {

    function Reportproject()
    {
        parent::__construct();
        
    }

    function index()
    {
    	$this->load->view('reportproject');
    }

    function add () {
        $this ->load->view('add_reportproject');
    }
}