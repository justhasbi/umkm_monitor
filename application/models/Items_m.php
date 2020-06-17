<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Items_m extends CI_Model {
    
    public function get($id = null) {
        $this->db->from('p_item');
        if($id != null) {
            $this->db->where('item_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id) {
        $this->db->where('item_id', $id);
		$this->db->delete('p_item');
    }

    public function add($post) {
        $params = [
            'outlet_id' => $post['outlet_id'],
            'barcode' => $post['barcode'],
            'product_name' => $post['product_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price']
        ];
        $this->db->insert('p_item', $params);
    }

    public function edit($post) {
        $params = [
            'outlet_id' => $post['outlet_id'],
            'barcode' => $post['barcode'],
            'product_name' => $post['product_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')

        ];
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);     
    }

    function check_barcode($code, $id = null) {
		$this->db->from('p_item');
		$this->db->where('barcode', $code);
		if($id != null) {
			$this->db->where('item_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function get_join_outlet($id = null) {
        $this->db->select('item_id, barcode, outlet.outlet_id, outlet_name, product_name, price, unit_name, category_name, stock');
        $this->db->from('outlet');
        $this->db->join('p_item', 'outlet.outlet_id=p_item.outlet_id');
        $this->db->join('p_unit', 'p_unit.unit_id=p_item.unit_id');
        $this->db->join('p_category', 'p_category.category_id=p_item.category_id');
        $this->db->where('outlet.outlet_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function update_stock_in($data) {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }

    public function update_stock_out($data) {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }
}