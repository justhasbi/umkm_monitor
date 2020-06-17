<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {

    public function __construct() 
	{
		parent::__construct();
		check_not_login();
		$this->load->model('outlet_m');
    }

	public function index()
	{
		// $data['row'] = $this->outlet_m->get();
		if($this->fungsi->user_login()->hak_akses == 1){
			$data['row'] = $this->outlet_m->get();	
		} else {
			$user_id = $this->session->userdata('user_id');
			$data['row'] = $this->outlet_m->get_using_id($user_id);	
		}
		$this->template->load('template', 'outlet/outlet_data', $data);
	}

	public function delete($id){
		$this->outlet_m->delete($id);
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
			echo "<script>window.location='".site_url('outlet')."'; </script>";
	}

	public function add() {
		// Get data from user = user_id
		$outlet = new stdClass();
		$outlet->outlet_id = null;
		$outlet->user_id = null;
		$outlet->outlet_name = null;
		$outlet->address = null;
		$outlet->outlet_desc = null;
		$data = array(
			'page' => 'add',
			'row' => $outlet
		);

		$this->template->load('template', 'outlet/outlet_form', $data);
	}

	public function edit($id) {
		$query = $this->outlet_m->get($id);
		if($query->num_rows() > 0) {
			$outlet = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $outlet
			);
			$this->template->load('template', 'outlet/outlet_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('outlet')."'; </script>";
		}
	}

	public function process() {
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->outlet_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->outlet_m->edit($post);
		}
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Disimpan');</script>";
		}
			echo "<script>window.location='".site_url('outlet')."'; </script>";
	}


	public function detail($id = null)
	{
		// $id = $this->input->post('user_id');
		$data['row'] = $this->outlet_m->get_join_user($id);
		// Setelah di get() kemudian berikan result di data
		$this->template->load('template', 'outlet/outlet_detail', $data);

	}

}
