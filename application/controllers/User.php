<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		check_admin();
		check_not_login();
		$this->load->model(['user_m','outlet_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->user_m->get();
		// Setelah di get() kemudian berikan result di data
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add() 
	{	
		// form validation
		
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Konfirmasi', 'required|min_length[5]|matches[password]',
			array('matches' => '%s tidak sesuai dengan password')
		);
		$this->form_validation->set_rules('birthdate', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('hakakses', 'Hak Akses', 'required');

		// message rule
		$this->form_validation->set_message('required', '%s Masih Kosong, silahkan isi!');
		$this->form_validation->set_message('min_length', '%s minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah terdaftar, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->template->load('template', 'user/user_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);

			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
				echo "<script>window.location='".site_url('user')."'; </script>";
		}
		// End form Validation
	}


	public function edit($id) 
	{	
		// form validation
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');

		if($this->input->post('password')){
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules('passconf', 'Password Konfirmasi', 'min_length[5]|matches[password]',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}

		if($this->input->post('passconf')){
			$this->form_validation->set_rules('passconf', 'Password Konfirmasi', 'required|min_length[5]|matches[password]',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		$this->form_validation->set_rules('birthdate', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('hakakses', 'Hak Akses', 'required');

		// message rule
		$this->form_validation->set_message('required', '%s Masih Kosong, silahkan isi!');
		$this->form_validation->set_message('min_length', '%s minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah terdaftar, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$query = $data['row'] = $this->user_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('user')."'; </script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);

			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
				echo "<script>window.location='".site_url('user')."'; </script>";
		}
		// End form Validation
	}

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '%s ini sudah dipakai!');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	
	public function delete()
	{
		$id = $this->input->post('user_id');
		$this->user_m->delete($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='".site_url('user')."'; </script>";
	}

	public function detail($id = null)
	{
		// $id = $this->input->post('user_id');
		$user_data = $this->user_m->get($id);
		$outlet_data = $this->outlet_m->get_outlet_user($id);

		$data = [
			'user_data' => $user_data,
			'outlet_data' => $outlet_data
		];
		
		// Setelah di get() kemudian berikan result di data
		$this->template->load('template', 'user/user_detail', $data);

	}
}
