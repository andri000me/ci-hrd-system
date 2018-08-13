<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (APPPATH.'libraries/Backend_Core'.EXT);
include_once (APPPATH.'libraries/Xml'.EXT);

class Sakit extends MY_Controller {

    function Sakit()
    {
        parent::__construct();
        $this->load->model('sakit_mod');
    }

    function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');

        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Sampai Tanggal', 'required');
	    $this->form_validation->set_rules('alasan', 'Alasan', 'required');

        if ($this->form_validation->run() == TRUE)
        { 
	
            $tanggalmulai = $this->input->post("tanggal_mulai");
            $tanggalakhir = $this ->input->post("tanggal_akhir");
            $alasan = $this->input->post("alasan");
            $approve = $this->input->post("approve");
            $id_user = $this->session->userdata('user_id');
            
            $this->load->library('upload');
		  $file = $this->upload();
            if($file['status']) 
           {
                $add_data = array(
                    'tanggal_mulai' => $tanggalmulai,
                    'tanggal_akhir' => $tanggalakhir,
                    'alasan' => $alasan,
                    'id_user' => $id_user,
                    'img' => $file['file_name'],
                );

                $this->sakit_mod->add($add_data);
            }

        }
        $data['page'] = 'module';
        $this->load->view('sakit',$data);
    }


    private function upload()
    {
        $path = xml('dir_upload');
        create_folder_upload($path);//Create folder jika belum ada
        
        $config['gambar']          = 'uploadanak'.time();
        $config['upload_path']       = $path;
        $config['allowed_types']    = 'jpg|png|gif';
        $config['max_size']            = '2500';
	//	$config['max_width']  = '1440';
	//	$config['max_height']  = '637';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file_upload')) 
        {
            $err = str_replace('<p>','',$this->upload->display_errors());
            $err = str_replace('</p>','',$err);

            return array('status' => false ,'msg' => $err);
        }
        else
        {
            $data = $this->upload->data();
            $file_name = $data['file_name'];
            $file_type = $data['file_type'];
            $file_size = $data['file_size'];

            $array = array(
                'status'	=> true,
                'msg'		=> '',
                'file_name'	=> $file_name,
                'file_type'	=> $file_type,
                'file_size'	=> $file_size
            );
            return $array;
        }
    }
}