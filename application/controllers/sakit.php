<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once (APPPATH.'libraries/Backend_Core'.EXT);
include_once (APPPATH.'libraries/Xml'.EXT);

class Sakit extends MY_Controller {

    function Sakit()
    {
        parent::__construct();
        $this->load->model('sakit_mod');
        $this->load->library('pagination');
        
    }



    function index()
    {
        $ambilid = $this->session->userdata('user_id');

        //START HITUNG TOTAL SAKIT
        $jumlahsakit = $this->sakit_mod->get_sakit(false,array('id_user' => $ambilid),false);
        $datasakit = $jumlahsakit;
        $data['jumlahtotalsakit'] = 0;
        if (!empty($datasakit)) {
            $i = 1;
            foreach ($datasakit as $value) {
                $awal[$i] = date_create(date('Y-m-d', strtotime($value['tanggal_mulai'])));
                $akhir[$i] = date_create(date('Y-m-d', strtotime($value['tanggal_akhir'])));
                $diff[$i] = date_diff( $awal[$i], $akhir[$i] );

                $a[$i] = $diff[$i]->d + 1;
                $i++;
            }
            $x = array_sum($a);
            $data['jumlahtotalsakit'] = $x;
        }
        //END HITUNG TOTAL SAKIT

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');

        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Sampai Tanggal', 'required');
	    /*$this->form_validation->set_rules('alasan', 'Alasan', 'required');*/
        $data['msg'] = '';
        if ($this->form_validation->run() == TRUE)
        { 
	
            $tanggalmulai = $this->input->post("tanggal_mulai");
            $tanggalakhir = $this ->input->post("tanggal_akhir");
            /*$alasan = $this->input->post("alasan");*/
            $approve = $this->input->post("approve");
            $id_user = $this->session->userdata('user_id');
            
            $this->load->library('upload');
		  $file = $this->do_upload1();
            if($file['status']) 
           {
                $add_data = array(
                    'tanggal_mulai' => $tanggalmulai,
                    'tanggal_akhir' => $tanggalakhir,
                    /*'alasan' => $alasan,*/
                    'id_user' => $id_user,
                    'img' => $file['file_name'],
                );

                $this->sakit_mod->add($add_data);
                //PERHITUNGAN AMBIL TANGGAL DARI TEAMLIST DAN MENJUMLAHKAN DENGAN YANG BARU DIINPUT
                $tanggalawal = date_create(date('Y-m-d', strtotime($tanggalmulai)));
                $tanggalterakhir = date_create(date('Y-m-d', strtotime($tanggalakhir)));
                $hitungtanggal = date_diff($tanggalawal, $tanggalterakhir);
                $hitungsakit = (int)$data['jumlahtotalsakit'] + $hitungtanggal->d + 1;
                $addsakituser = array('sakit' => $hitungsakit);
                $this->sakit_mod->add_sakit_touser($addsakituser,$ambilid);

                redirect('sakit/detil_sakit');
                
            }
            else{
                $data['msg'] = $file['error'];
            }

        }

        $data['ambil_sakit'] = $this->sakit_mod->get_sakit($rows=false,$where=array('id_user' => $ambilid),$limit=true,$skip=0,$take=5);        
        $data['page'] = 'module';
        $this->load->view('sakit',$data);
    }

    function _set_pagination()
    {
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['next_tag_open'] = '<li class="custompagination paginate_button page-item next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="custompagination paginate_button page-item previous">';
        $config['prev_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination" style="justify-content: flex-end;">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="custompagination paginate_button page-item">';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="custompagination paginate_button page-item previous">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="custompagination paginate_button page-item next">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        return $config;
    }
    
    function detil_sakit () {
        $ambilid = $this->session->userdata('user_id');
        $ambilnama = $this->session->userdata('full_name');

        $where=array('id_user' => $ambilid);

        $id = $this->input->get('per_page');

        $url = '?';


        $config['base_url'] = base_url(FALSE).'sakit/detil_sakit?';

        $config['total_rows'] = $this->sakit_mod->get_sakit(true,$where);

        $config['per_page'] = 5;

        $config['cur_page'] = empty($id) ? 0 : $id;

        $config['page_query_string'] = TRUE;

        foreach ($this->_set_pagination() as $key=>$val){

            $config[$key] = $val;

        }

        $this->pagination->initialize($config);



        $skip = $config['cur_page'];

        $take = $config['per_page'];

        $data['number'] = $config['cur_page'];

        $data['namauser'] = $ambilnama;

        $data['datacount'] = $this->sakit_mod->get_sakit(true,$where);

        $data['pagination'] = $this->pagination->create_links();

        $data['ambil_sakit'] = $this->sakit_mod->get_sakit(false,$where,true,$skip,$take);

        /*$data['ambil_sakit'] = $this->sakit_mod->get_sakit($rows=false,$where=array('id_user' => $ambilid),$limit=true,$skip=0,$take=5);*/

        $this->load->view('sakit_detil',$data);

    }

    private function do_upload1()
    {
        $new_name                       = time().$_FILES["userfile"]['name'];
        $config['file_name']            = $new_name;
        $config['upload_path']          = '././clients/sakit/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;
       // $config['max_width']            = 1024;
       // $config['max_height']           = 768;
        $config['overwrite']            = TRUE;

        

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            return array('status' => false, 'error' => $this->upload->display_errors());
        }
        else
        {
            $data = $this->upload->data();

            $file_name = $data['file_name'];

            $file_type = $data['file_type'];

            $file_size = $data['file_size'];

            $array = array(

                'status'    => true,

                'error'       => '',

                'file_name' => $file_name,

                'file_type' => $file_type,

                'file_size' => $file_size

            );

            return $array;
        }
    }
}