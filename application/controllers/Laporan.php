<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct() 
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['laporan_m', 'outlet_m']);
    }

    public function index()
	{
        if($this->fungsi->user_login()->hak_akses == 1){
			$data['row'] = $this->outlet_m->get();	
		} else {
			$user_id = $this->session->userdata('user_id');
			$data['row'] = $this->outlet_m->get_using_id($user_id);	
		}
		
        $params = array('outlet_id', 'outlet_name');
		$this->session->unset_userdata($params);
        
		$this->template->load('template', 'laporan/laporan_index', $data);
    }
    
    public function laporan_data($id)
	{  
		$query_get_outletdata = $this->outlet_m->get($id);
		$row = $query_get_outletdata->row();
		$params = array(
			'outlet_id' => $row->outlet_id,
			'outlet_name' => $row->outlet_name
		);
		$this->session->set_userdata($params); 
       
		$data['row'] = $this->laporan_m->get($id);
		$this->template->load('template', 'laporan/laporan_data', $data);
    }

    public function laporan_detail()
	{
		$this->template->load('template', 'laporan/laporan_detail');
    }

    public function laporan_add()
	{
		$this->template->load('template', 'laporan/laporan_form');
	}
}