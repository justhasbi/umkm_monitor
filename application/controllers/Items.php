<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct() 
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['items_m', 'outlet_m', 'category_m', 'unit_m']);
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

        $this->template->load('template', 'produk/items/index_item', $data);
    }
    
    
	public function product_data($id = null)
	{
		// insert into Session
		$query_get_outletdata = $this->outlet_m->get($id);
		$row = $query_get_outletdata->row();
		$params = array(
			'outlet_id' => $row->outlet_id,
			'outlet_name' => $row->outlet_name
		);
		$this->session->set_userdata($params);
		
		$data['row'] = $this->items_m->get_join_outlet($id);
		

		$this->template->load('template', 'produk/items/item_data', $data);
    }

	public function delete($id){
		$this->items_m->delete($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('deleted', 'Data berhasil Dihapus');
		}
		redirect('items/product_data/'. $this->session->userdata('outlet_id'));
	}

	public function add() {
		// Get data from user = user_id
		$item = new stdClass();
		$item->outlet_id = null;
		$item->item_id = null;
		$item->barcode = null;
		$item->product_name = null;
		$item->price = null;
		
		// $outlet = $this->outlet_m->get();

		$query_category = $this->category_m->get();
		$category[null] = "- Pilih -";
		foreach ($query_category->result() as $ctgr) {
			$category[$ctgr->category_id] = $ctgr->category_name;
		}

		$query_unit = $this->unit_m->get();
		$unit[null] = "- Pilih -";
		foreach ($query_unit->result() as $unt) {
			$unit[$unt->unit_id] = $unt->unit_name;
		}
		
		$data = array(
			'page' => 'add',
			'row' => $item,
			'category' => $category,
			'unit' => $unit, 
			'selectedunit' => null,
			'selectedcategory' => null,
		);

		$this->template->load('template', 'produk/items/item_form', $data);
	}

	public function edit($id) {
		$query = $this->items_m->get($id);
		if($query->num_rows() > 0) {
			$item = $query->row();

			$query_category = $this->category_m->get();
			$category[null] = "- Pilih -";
			foreach ($query_category->result() as $ctgr) {
				$category[$ctgr->category_id] = $ctgr->category_name;
			}

			$query_unit = $this->unit_m->get();
			$unit[null] = "- Pilih -";
			foreach ($query_unit->result() as $unt) {
				$unit[$unt->unit_id] = $unt->unit_name;
			}
			
			$data = array(
				'page' => 'edit',
				'row' => $item,
				'category' => $category,
				'unit' => $unit, 
				'selectedunit' => $item->unit_id,
				'selectedcategory' => $item->category_id
			);

			$this->template->load('template', 'produk/items/item_form', $data);

		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('items')."'; </script>";
		}
	}

	public function process() {
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			if($this->items_m->check_barcode($post['barcode'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai");
				redirect('items/add');
			} else {
				$this->items_m->add($post);
			}
			
		} else if(isset($_POST['edit'])) {
			if($this->items_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai");
				redirect('items/edit/'.$post['id']);
			} else {
				$this->items_m->edit($post);
			}
		}
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil Disimpan');
		}
			redirect('items/product_data/'. $this->session->userdata('outlet_id'));
    }
}
