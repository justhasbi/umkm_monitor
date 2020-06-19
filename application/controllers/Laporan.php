<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct() 
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['laporan_m', 'outlet_m', 'items_m']);
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

	public function laporan_detail($id = null)
	{
		$data_outlet = $this->laporan_m->outlet_join_laporan($id);
		$data_laporan = $this->laporan_m->join_laporan($id);
		$data = [
			'data_outlet' => $data_outlet,
			'data_laporan' => $data_laporan
		];
		$this->template->load('template', 'laporan/laporan_detail', $data);
	}

    public function laporan_add($id)
	{
		// insert session data
		$query_get_outletdata = $this->outlet_m->get($id);
		$row = $query_get_outletdata->row();
		$params = array(
			'outlet_id' => $row->outlet_id,
			'outlet_name' => $row->outlet_name
		);
		$this->session->set_userdata($params);
		// batas
		$data['row'] = $this->items_m->get_join_outlet($id);

		$this->template->load('template', 'laporan/laporan_form', $data);
	}

	public function proses_insert_laporan()
	{	
		
		
		$data_laporan = array(
			'outlet_id' => $this->input->post('outlet_id'),
		);
		$res = $this->db->insert('laporan', $data_laporan);
        $last_id = $this->db->insert_id();
		
		$item_id 	= $this->input->post('item_id');
		$price 		= $this->input->post('price');
		$terjual 	= $this->input->post('jumlah');

		for($i = 0; $i< count($item_id); $i++) {
			$data_laporan_item[] = [
				'item_id' 	=> $item_id[$i],
				'price' 	=> $price[$i],
				'terjual' 	=> $terjual[$i],
				'laporan_id'=> $last_id,
				'sub_total'	=> $sub_total[$i] = $price[$i] * $terjual[$i]
			];
		}
		$response = $this->laporan_m->laporan_add_item($data_laporan, $data_laporan_item);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Laporan Berhasil Disimpan');
		}
		redirect('laporan/laporan_data/'. $this->session->userdata('outlet_id'));
	}

}