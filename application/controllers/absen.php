<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends MY_Controller {

    function Absen()
    {
        parent::__construct();
        
    }

    function index()
    {
    	$this->load->view('absen');
    }
}