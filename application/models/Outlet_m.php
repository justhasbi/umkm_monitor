<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet_m extends CI_Model {
    
    public function get($id = null) {
        $this->db->from('outlet');
        if($id != null) {
            $this->db->where('outlet_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    // UMKM Product get
    public function get_using_id($id = null) {
        $this->db->from('outlet');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_join_user($id = null) {
        $this->db->select('outlet_id, outlet_name, address, outlet_desc, nama');
        $this->db->from('outlet');
        $this->db->join('user', 'outlet.user_id=user.user_id');
        $this->db->where('outlet_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_join_product($id = null) {
        $this->db->table('outlet');
    }

    public function get_join_laporan($id = null) {
        
    }

    public function get_join_stok($id = null) {
        
    }

    public function delete($id) {
        $this->db->where('outlet_id', $id);
		$this->db->delete('outlet');
    }

    public function add($post) {
        $params = [
            'user_id' => $post['user_id'],
            'outlet_name' => $post['outlet_name'],
            'address' => $post['address'],
            'outlet_desc' => empty($post['outlet_description']) ? null : $post['outlet_description']
        ];
        $this->db->insert('outlet', $params);
    }

    public function edit($post) {
        $params = [
            'user_id' => $post['user_id'],
            'outlet_name' => $post['outlet_name'],
            'address' => $post['address'],
            'outlet_desc' => empty($post['outlet_description']) ? null : $post['outlet_description']
        ];
        $this->db->where('outlet_id', $post['outlet_id']);
        $this->db->update('outlet', $params);     
    }

}