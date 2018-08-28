<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_mod extends CI_Model {

    function report_mod()
    {
        parent::__construct();
    }

    function get_project($rows=false,$where=null,$limit=false,$skip=0,$take=10)
    {
        $this->db->select("ds_project.*, ds_users.name, ds_users.img");
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
        $this->db->join('ds_users', 'ds_project.user_id = ds_users.id');
        $i = $this->db->get('ds_project');

        if($rows){
            return $i->num_rows();
        }else{
            return $var = ($i->num_rows() > 0) ? $i->result_array() : FALSE;
        }
    }

    function get_report($rows=false,$where=null,$limit=false,$skip=0,$take=10)
    {
        $this->db->select("ds_report.*, ds_users.name, ds_users.img");
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
        $this->db->join('ds_users', 'ds_report.id_user = ds_users.id');
        $i = $this->db->get('ds_report');

        if($rows){
            return $i->num_rows();
        }else{
            return $var = ($i->num_rows() > 0) ? $i->result_array() : FALSE;
        }
    }

    function cek_project($id = null)
    {
        $this->db->select("ds_project.*, ds_users.name, ds_users.img");
        $this->db->order_by('id','desc');
        $this->db->where('ds_project.id', mysql_real_escape_string($id));
        $this->db->join('ds_users', 'ds_project.user_id = ds_users.id');
        $i = $this->db->get('ds_project', 1, 0);

        return $var = ($i->num_rows() > 0) ? $i->row() : false;
    }

    function cek_report($id = null)
    {
        $this->db->select("ds_report.*, ds_users.name, ds_users.img");
        $this->db->order_by('id','desc');
        $this->db->where('id_project', mysql_real_escape_string($id));
        $this->db->join('ds_users', 'ds_report.id_user = ds_users.id');
       	$i = $this->db->get('ds_report', 1, 0);

        return $var = ($i->num_rows() > 0) ? $i->row() : false;
    }

    function add($data=null)
    {
        $return = 0;
        if($data != null){
            $this->db->insert('ds_project',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }

    function update($data,$id=0)
    {
        $this->db->where('id',  mysql_real_escape_string($id));
        $this->db->update('ds_project', $data);
    }


    function add_detail($data=null){
    	$return = 0;
        if($data != null){
            $this->db->insert('ds_report',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }

    function update_detail($data,$id=0)
    {
        $this->db->where('id',  mysql_real_escape_string($id));
        $this->db->update('ds_report', $data);
    }
}