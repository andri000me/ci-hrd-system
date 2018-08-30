<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends MY_Controller {

    function Absen()
    {
        parent::__construct();
        $this->load->model('today_mod');
        $this->load->model('ende_mod');


        
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

    function Today()
    {
        parent::__construct();
        $this->load->model('today_mod');
        $this->load->model('ende_mod');
        
        $this->is_logged_in();
        #Ini hanya untuk team DS
        if(rule() == get_rule()){
            $this->_redirect_member();
        }
    }

    function index()
    {

        if (empty($this->session->userdata('user_id'))) {
    		$url = 'login?url='.uri_string();
            $url .= (!empty($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '';
            redirect(base_url().$url);
    	}
            
        $now = date_now(true);
        $now_id = date_utc($now);
        $punch_date = format_date($now_id, "Y-m-d");
        $today = $this->today_mod->get(user_id(),$punch_date);
        
        $punch_in = '0';
        $punch_out = '0';
        $punch_in_time = '';
        $punch_out_time = '';
        $report = '';
        if($today)
        { 
            if(!empty($today->punch_in)){
               $punch_in = $today->punch_in > setting('punch_in') ? '2' : '1';
               $punch_in_time = $today->punch_in;
            }
            if(!empty($today->punch_out)){
               $punch_out = $today->punch_out < setting('punch_out') ? '2' : '1'; 
               $punch_out_time = $today->punch_out;
            }
            $report = $today->report;
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('report', 'Report', 'required');
        $data["msg"] = '';
        if ($this->form_validation->run() == TRUE)
        {
            #Cek user sudah punch in apa belum
            if($today)
            {
                $report = $this->input->post('report');
                $data_update = array(
                    'report' => $report,
                    'modified' => $now
                );

                $this->today_mod->update($data_update,$today->id);
                redirect('absen');
            }
            $data["msg"] = 'Anda harus punch in terlebih dahulu untuk membuat report!';
        }
        
        $data['punch_in'] = $punch_in;
        $data['punch_out'] = $punch_out;
        $data['punch_in_time'] = $punch_in_time;
        $data['punch_out_time'] = $punch_out_time;
        $data['report'] = $report;
        $data['page'] = 'absen';
        $ambilid = $this->session->userdata('user_id');
        $data['ambil_absen'] = $this->today_mod->get_absen($rows=false,$where=array('user_id' => $ambilid),$limit=true,$skip=0,$take=5);
        $this->load->view('absen',$data);
    }
    
    function punch_in()
    {
        if(!$this->is_allow_ip()){
            redirect('punch-ip');
        }
        
        $now = date_now(true);
        $now_id = date_utc($now);
        $punch_date = format_date($now_id, "Y-m-d");
        $punch_time = format_date($now_id, "H:i:s");
        $today = $this->today_mod->get(user_id(),$punch_date);
        $url = $this->input->get('url');
        
        if(!$today){
            #Add data today
            $data_add = array(
                'user_id' => user_id(),
                'punch_date' => $punch_date,
                'punch_in' => $punch_time,
                'created' => $now,
                'modified' => $now,
                'log_in' => $this->ende_mod->encode($punch_time)
            );

            $this->today_mod->add($data_add);
            if($punch_time > setting('punch_in')){
                redirect('absen/punch_reason?action=in');
            }
            if(!empty($url)){
                redirect($url);
            }
        }
        
        redirect('absen');
    }
    
    function punch_out()
    {
        if(!$this->is_allow_ip()){
            redirect('punch-ip');
        }
        
        $now = date_now(true);
        $now_id = date_utc($now);
        $punch_date = format_date($now_id, "Y-m-d");
        $punch_time = format_date($now_id, "H:i:s");
        $today = $this->today_mod->get(user_id(),$punch_date);
        
        if($today){
            #Update data today
            $data_update = array(
                'punch_out' => $punch_time,
                'log_out' => $this->ende_mod->encode($punch_time)
            );

            $this->today_mod->update($data_update,$today->id);
            if($punch_time < setting('punch_out')){
                redirect('absen/punch_reason?action=out');
            }
        }
        else {
            redirect('punch_in');
        }
        
        redirect('absen');
    }
    
    function punch_reason()
    {
        $action = $this->input->get('action');
        $now = date_now(true);
        $now_id = date_utc($now);
        $punch_date = format_date($now_id, "Y-m-d");
        $today = $this->today_mod->get(user_id(),$punch_date);
        
        #Cek user sudah punch in apa belum
        if(!$today){
            redirect('punch_in');
        }
        
        #Cek action harus punch in atau punch out
        if($action != 'in' and $action != 'out'){
            redirect('absen');
        }
        
        #Cek tanggal punch in harus hari ini
        if($today->punch_date != $punch_date){
            redirect('absen');
        }
        
        #Hanya jika masuk kerja telat
        if($action == 'in'){
            if($today->punch_in <= setting('punch_in')){
                redirect('absen');
            }
        }
        
        #Hanya jika pulang lebih awal
        if($action == 'out'){
            if($today->punch_out >= setting('punch_out')){
                redirect('absen');
            }
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error">', '</div>');

        $this->form_validation->set_rules('reason', 'Reason', 'required');
        $data["msg"] = '';
        if ($this->form_validation->run() == TRUE)
        {
            $reason = $this->input->post('reason');
            $data_update = array('punch_out_desc' => $reason);
            if($action == 'in'){
               $data_update = array('punch_in_desc' => $reason); 
            }

            $this->today_mod->update($data_update,$today->id);
            redirect('absen');
        }
        
        $data['reason'] = ($action == 'in') ? $today->punch_in_desc : $today->punch_out_desc;
        $data['page'] = 'today';
        $this->load->view('today_reason',$data);
    }
    
    function punch_ip()
    {
        if($this->is_allow_ip()){
            redirect('punch_in');
        }
        $data['page'] = 'today';
        $this->load->view('today_ip',$data);
    }
}