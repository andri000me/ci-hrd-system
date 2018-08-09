<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sakit_mod extends CI_Model {

    function sakit_mod()
    {
        parent::__construct();
    }

    function add($data=null)
    {
        $return = 0;
        if($data != null){
            $this->db->insert('ds_sakit',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }
}