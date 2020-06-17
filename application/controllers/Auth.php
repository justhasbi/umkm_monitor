<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function loginProcess()
	{
		// mengambil name dari submit button
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			// load model user_m
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				// mengambil satu baris hasil dari query
				$params = array(
					'user_id' => $row->user_id,
					'hak_akses' => $row->hak_akses
				);
				// cetak session / menyimpan data session
				$this->session->set_userdata($params);
				echo "<script>
					alert('Selamat login berhasil');
					window.location='".site_url('dashboard')."';
				</script>";
			} else {
				echo "<script>
					alert('Login gagal, password / username salah');
					window.location='".site_url('auth/login')."';
				</script>";
			}
		} 
	}

	public function logoutProcess()
	{
		$params = array('user_id', 'hak_akses');
		// mengisikan params dengan data user yang ingin di unset
		$this->session->unset_userdata($params);
		// kemudian unset
		redirect('auth/login');
	}
}
