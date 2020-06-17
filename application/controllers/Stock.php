<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    public function __construct() 
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['stock_m', 'outlet_m', 'items_m']);
    }

	public function index()
	{
		// $data['row'] = $this->stock_m->get();
		if($this->fungsi->user_login()->hak_akses == 1){
			$data['row'] = $this->outlet_m->get();	
		} else {
			$user_id = $this->session->userdata('user_id');
			$data['row'] = $this->outlet_m->get_using_id($user_id);	
        }
        
        $params = array('outlet_id', 'outlet_name');
        $this->session->unset_userdata($params);
        
		$this->template->load('template', 'stock/stock_index', $data);
	}

    public function stock_in_data($id = null) 
    {
        $query_get_outletdata = $this->outlet_m->get($id);
		$row = $query_get_outletdata->row();
		$params = array(
			'outlet_id' => $row->outlet_id,
			'outlet_name' => $row->outlet_name
		);
        $this->session->set_userdata($params);
        $this->stock_m->get_stock_in();
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'stock/stock_in/stock_in_data', $data);
    }

    public function stock_in_add ($id = null)
    {
        // set ID outlet ke session
        $query_get_outletdata = $this->outlet_m->get($id);
		$row = $query_get_outletdata->row();
		$params = array(
			'outlet_id' => $row->outlet_id,
			'outlet_name' => $row->outlet_name
		);
        $this->session->set_userdata($params);
        
        $item = $this->items_m->get_join_outlet($id)->result();

        $data = ['item' => $item ];
        $this->template->load('template', 'stock/stock_in/stock_in_form', $data);
    }

    public function stock_in_del()
    {
        $stock_id = $this->uri->segment(3);
        $item_id = $this->uri->segment(4);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->items_m->update_stock_out($data);

        $this->stock_m->del($stock_id);

        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('stock/stock_in_data');
    }

    public function process()
    {
        if(isset($_POST['stock_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->items_m->update_stock_in($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock Berhasil Disimpan');
            }
            redirect('stock/stock_in_data');
        }
    }
}
