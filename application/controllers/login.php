<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    function Login()
    {
        parent::__construct();
        
    }

    function index()
    {
    	$this->load->view('login');
    }
}