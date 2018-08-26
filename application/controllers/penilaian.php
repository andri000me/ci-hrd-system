<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends MY_Controller {

    function Penilaian()
    {
        parent::__construct();
        $this->load->model('penilaian_mod');
        
    }

    function index()
    {
    	$this->load->view('penilaian');
    }

    function add () {

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
		
        $this->form_validation->set_rules('soal1', 'Pemahaman Terhadap Tugas 1', 'required');
        $this->form_validation->set_rules('soal2', 'Pemahaman Terhadap Tugas 2', 'required');
        $this->form_validation->set_rules('soal3', 'Pemahaman Terhadap Tugas 3', 'required');
        $this->form_validation->set_rules('soal4', 'Pemahaman Terhadap Tugas 4', 'required');
        
        $data['msg']='';
        if ($this->form_validation->run() == TRUE)
        {
            $soal1 = $this->input->post("soal1");
            $soal2 = $this->input->post("soal2");
            $soal3 = $this->input->post("soal3");
            $soal4 = $this->input->post("soal4");
            $id_user = $this->session->userdata('user_id');
            
                $add_data = array(
                    'pemahaman_tugas1' =>  $soal1,
                    'pemahaman_tugas2' =>  $soal2,
                    'pemahaman_tugas3' =>  $soal3,
                    'pemahaman_tugas4' =>  $soal4,
                    'id_user' => $id_user
                );
                $tambah_penilaian = $this->penilaian_mod->add($add_data);

        }

  }
}