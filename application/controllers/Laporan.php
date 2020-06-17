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
		$this->template->load('template', 'laporan/laporan_index');
    }
    
    public function laporan_data()
	{
		$this->template->load('template', 'laporan/laporan_data');
    }

    public function laporan_add()
	{
		$this->template->load('template', 'laporan/laporan_form');
	}
}