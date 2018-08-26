<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian_mod extends CI_Model {

    function penilaian_mod()
    {
        parent::__construct();
    }

    function add($data=null)
    {
        $return = 0;
        if($data != null){
            $this->db->insert('ds_penilaian',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }
}

