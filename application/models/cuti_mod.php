<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuti_mod extends CI_Model {

    function cuti_mod()
    {
        parent::__construct();
    }

    function add($data=null)
    {
        $return = 0;
        if($data != null){
            $this->db->insert('ds_cuti',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }
}