<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Izin_mod extends CI_Model {

    function izin_mod()
    {
        parent::__construct();
    }

    function add($data=null)
    {
        $return = 0;
        if($data != null){
            $this->db->insert('ds_izin',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }
}