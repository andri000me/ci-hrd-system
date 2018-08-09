<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Izin extends MY_Controller {

    function Izin()
    {
        parent::__construct();
        $this->load->model('izin_mod');
        
    }

    function index()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
		
	    $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Sampai Tanggal', 'required');
	    $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        
        $data['msg']='';
        if ($this->form_validation->run() == TRUE)
        {
            $tanggalmulai = $this->input->post("tanggal_mulai");
            $tanggalakhir = $this ->input->post("tanggal_akhir");
            $alasan = $this->input->post("alasan");
            $approve = $this->input->post("approve");
            $id_user = $this->session->userdata('user_id');
            
                $add_data = array(
                    'tanggal_mulai' => $tanggalmulai,
                    'tanggal_akhir'=> $tanggalakhir,
                    'alasan' => $alasan,
                    'approved' => $approve,
                    'id_user' => $id_user
                );
                $tambah_izin = $this->izin_mod->add($add_data);
                if ($tambah_izin != 0){
                    redirect('izin');
                }
                else{
                    $data['msg'] = "error";
                }
                

        }

    	$this->load->view('izin', $data);
    }




}