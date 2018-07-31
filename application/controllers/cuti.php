<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuti extends MY_Controller {

    function Cuti()
    {
        parent::__construct();
        
    }

    function index()
    {
    	$this->load->view('cuti');
    }
}