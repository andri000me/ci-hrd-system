<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teamlist_mod extends CI_Model {

    function teamlist_mod()
    {
        parent::__construct();
    }
     /*
     * Categori untuk type User
     */
    var $rule_administrator = 1;
    var $rule_hrd = 2;
    var $rule_team = 3;
    var $rule_client = 4;

    function data_rule($arr=true, $id=0)
    {

        $data = array();
        $data[$this->rule_administrator] = 'BOS';
        $data[$this->rule_hrd] = 'HRD';
        $data[$this->rule_team] = 'STAF';
        $data[$this->rule_client] = 'CLIENT';

        if(!$arr){
            return $val = isset($data[$id]) ? $data[$id] : '';
        }else{
           return $data;
        }
    }
    
    function get_rule()
    {
        $array = array();
        foreach ($this->data_rule() as $key=>$val)
        {
            $array[] = array('id' => $key,'name' => $val);
        }

        return $array;
    }

    function get_byemail($email = null)
    {
        $this->db->select('*');
        $this->db->where('email', mysql_real_escape_string($email));
        $i = $this->db->get('ds_users', 1, 0);

        return $var = ($i->num_rows() > 0) ? $i->row() : false;
    }

    function get_byuid($user_id = 0)
    {
        $this->db->select('*');
        $this->db->where('id', mysql_real_escape_string($user_id));
        $i = $this->db->get('ds_users', 1, 0);

        return $var = ($i->num_rows() > 0) ? $i->row() : false;
    }

    function get_teamlist($rows=false,$where=null,$limit=false,$skip=0,$take=10)
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
        //$this->db->join('ds_admins', 'register.created_by = ds_admins.id','left');
        $i = $this->db->get('ds_users');

        if($rows){
            return $i->num_rows();
        }else{
            return $var = ($i->num_rows() > 0) ? $i->result_array() : FALSE;
        }
    }

    function add($data=null)
    {
        $return = 0;
        if($data != null){
            $this->db->insert('ds_users',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }


    function delete($id=0)
    {
        $this->db->where('id', mysql_real_escape_string($id));
        $this->db->delete('ds_users');
    }




}