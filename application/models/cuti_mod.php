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

    function get_cuti($rows=false,$where=null,$limit=true,$skip=0,$take=5)
    {
        $this->db->select("*");
        $this->db->order_by('id','desc');

        if($limit) {
            $this->db->limit($take,$skip);
        }

        if(!empty ($where)){
            if(count($where)){
                foreach ($where as $key=>$val){
                    if(!empty ($val)){
                        $this->db->where($key, mysql_real_escape_string($val));
                    }else{
                        $this->db->where($key, NULL, FALSE);
                    }
                }
            }
        }
        $i = $this->db->get('ds_cuti');

        if($rows){
            return $i->num_rows();
        }else{
            return $var = ($i->num_rows() > 0) ? $i->result_array() : FALSE;
        }
    }
}