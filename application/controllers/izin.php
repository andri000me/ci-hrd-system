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

function detil_izin () {

    $ambilid = $this->session->userdata('user_id');
    $ambilnama = $this->session->userdata('full_name');

    $where=array('id_user' => $ambilid);

    $id = $this->input->get('per_page');

    $url = '?';


    $config['base_url'] = base_url(FALSE).'sakit/detil_sakit?';

    $config['total_rows'] = $this->izin_mod->get_izin(true,$where);

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

    $data['datacount'] = $this->izin_mod->get_izin(true,$where);

    $data['pagination'] = $this->pagination->create_links();

    $data['ambil_izin'] = $this->izin_mod->get_izin(false,$where,true,$skip,$take);


    /*$data['ambil_sakit'] = $this->sakit_mod->get_sakit($rows=false,$where=array('id_user' => $ambilid),$limit=true,$skip=0,$take=5);*/

    $this->load->view('izin_detil',$data);
}


}