<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends MY_Controller {

    function Penilaian()
    {
        parent::__construct();
        
    }

    function index()
    {
    	$this->load->view('penilaian');
    }
}