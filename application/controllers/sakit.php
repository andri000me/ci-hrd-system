<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sakit extends MY_Controller {

    function Sakit()
    {
        parent::__construct();
        
    }

    function index()
    {
    	$this->load->view('sakit');
    }
}