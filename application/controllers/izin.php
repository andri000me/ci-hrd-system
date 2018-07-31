<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Izin extends MY_Controller {

    function Izin()
    {
        parent::__construct();
        
    }

    function index()
    {
    	$this->load->view('izin');
    }
}