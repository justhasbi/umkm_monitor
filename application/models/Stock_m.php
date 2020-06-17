<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {
    
    public function get($id = null) 
    {
        $this->db->from('stock');
        if($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('stock');
    }
    public function add_stock_in($post)
    {
        $params = [
            'item_id' => $post['item_id'],
            'outlet_id' => $post['outlet_id'],
            'item_id' => $post['item_id'],
            'type' => 'in',
            'qty' => $post['qty'],
            'date' => $post['date_add'],
            'keterangan' => $post['keterangan'],
        ];
        $this->db->insert('stock', $params);
    }

    public function get_stock_in($id = null)
    {
        $id_outlet = $this->session->userdata('outlet_id');

        $this->db->select('stock_id, p_item.item_id, outlet.outlet_id, outlet.outlet_name, barcode, keterangan, product_name, qty, date');
        $this->db->from('stock');
        $this->db->join('p_item', 'p_item.item_id=stock.item_id');
        $this->db->join('outlet', 'outlet.outlet_id=p_item.outlet_id');
        $this->db->where('outlet.outlet_id', $id_outlet);
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

}