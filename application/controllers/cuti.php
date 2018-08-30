<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuti extends MY_Controller {

    function Cuti()
    {
        parent::__construct();

        $this->load->model('cuti_mod');
        
    }

    function cek_login(){
        $id = $this->session->userdata('user_id');
        if (empty($id)) {
            $url = 'login?url='.uri_string();
            $url .= (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
            redirect(base_url().$url);
        }
    }

    function cek_rule(){
        $id = $this->session->userdata('user_id');
        if (empty($id)) {
            $url = 'login?url='.uri_string();
            $url .= (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
            redirect(base_url().$url);
        }
        else{
            $rule = $this->session->userdata('rule');
            if ($rule != 1 && $rule != 2) {
                redirect(base_url().'teamlist/detail/'.$this->session->userdata('user_id'));
            }
        }
        
    }

    function index()
    {

        $this->cek_login();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
		
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        /*$this->form_validation->set_rules('tanggal_akhir', 'Sampai Tanggal', 'required');*/
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
                $tambah_cuti = $this->cuti_mod->add($add_data);
                if ($tambah_cuti != 0){
                    redirect('cuti');
                }
                else{
                    $data['msg'] = "error";
                }

                
    }
    //START HITUNG TOTAL CUTI
    $ambilid = $this->session->userdata('user_id');
    $jumlahcuti = $this->cuti_mod->get_cuti(false,array('id_user' => $ambilid),false);
    $datacuti= $jumlahcuti;
    $data['jumlahtotalcuti'] = 0;
    if (!empty($datacuti)) {
        $i = 1;
        foreach ($datacuti as $value) {
            $awal[$i] = date_create(date('Y-m-d', strtotime($value['tanggal_mulai'])));
            if (!empty($value['tanggal_akhir'])) {
                $akhir[$i] = date_create(date('Y-m-d', strtotime($value['tanggal_akhir'])));
            }
            elseif (empty($value['tanggal_akhir'])) {
                $akhir[$i] = date_create(date('Y-m-d', strtotime($value['tanggal_mulai'])));
            }
            
            $diff[$i] = date_diff( $awal[$i], $akhir[$i] );
            if ($value['approved'] == 1) {
                $a[$i] = $diff[$i]->d + 1;
            }
            else{
                $a[$i] = 0;
            }
            $i++;
        }
        $x = array_sum($a);
        $data['jumlahtotalcuti'] = $x;
    }

   
    $data['ambil_cuti'] = $this->cuti_mod->get_cuti($rows=false,$where=array('id_user' => $ambilid),$limit=true,$skip=0,$take=5);

    $this->load->view('cuti',$data);


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

function detil_cuti () {
    $this->cek_login();
    $ambilid = $this->session->userdata('user_id');
    $ambilnama = $this->session->userdata('full_name');

    $where=array('id_user' => $ambilid);

    $id = $this->input->get('per_page');

    $url = '?';


    $config['base_url'] = base_url(FALSE).'cuti/detil_cuti?';

    $config['total_rows'] = $this->cuti_mod->get_cuti(true,$where);

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

    $data['datacount'] = $this->cuti_mod->get_cuti(true,$where);

    $data['pagination'] = $this->pagination->create_links();

    $data['ambil_cuti'] = $this->cuti_mod->get_cuti(false,$where,true,$skip,$take);

    /*$data['ambil_sakit'] = $this->sakit_mod->get_sakit($rows=false,$where=array('id_user' => $ambilid),$limit=true,$skip=0,$take=5);*/

    $this->load->view('cuti_detil',$data);

}

function approval(){
    $this->cek_login();
    $this->cek_rule();
    $where =null;

    $id = $this->input->get('per_page');

    $url = '?';


    $config['base_url'] = base_url(FALSE).'cuti/approval?';

    $config['total_rows'] = $this->cuti_mod->get_cuti_all(true,$where);

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

    $data['datacount'] = $this->cuti_mod->get_cuti_all(true,$where);

    $data['pagination'] = $this->pagination->create_links();

    $data['row'] = $this->cuti_mod->get_cuti_all(false,$where,true,$skip,$take);

    $this->load->view('cuti_admin', $data);
}

function approve(){
    $id = $this->input->get('a');
    $data = $this->input->get('x');
    if ($id != null) {
        if ($data != null) {
            $data_update = array('approved' => $data);

            $this->cuti_mod->update_status($data_update,$id);

            redirect(base_url().'cuti/approval');
        }
        else{redirect(base_url().'cuti');}
    }
    else{redirect(base_url().'cuti');}
}

function reject(){
    $id = $this->input->get('a');
    $data = $this->input->get('x');
    if ($id != null) {
        if ($data != null) {
            $data_update = array('approved' => $data);

            $this->cuti_mod->update_status($data_update,$id);

            redirect(base_url().'cuti/approval');
        }
        else{redirect(base_url().'cuti');}
    }
    else{redirect(base_url().'cuti');}
}

}