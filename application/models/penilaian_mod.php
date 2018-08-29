<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian_mod extends CI_Model {

    function penilaian_mod()
    {
        parent::__construct();
    }

    function get_user($user_id = 0)
    {
        $this->db->select('*');
        $this->db->where('id', mysql_real_escape_string($user_id));
        $i = $this->db->get('ds_users', 1, 0);

        return $var = ($i->num_rows() > 0) ? $i->row() : false;
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

