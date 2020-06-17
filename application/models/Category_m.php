<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {
    
    public function get($id = null) {
        $this->db->from('p_category');
        if($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id) {
        $this->db->where('category_id', $id);
		$this->db->delete('p_category');
    }

    public function add($post) {
        $params = [
            'category_name' => $post['category_name']
        ];
        $this->db->insert('p_category', $params);
    }

    public function edit($post) {
        $params = [
            'category_name' => $post['category_name']
        ];
        $this->db->where('category_id', $post['category_id']);
        $this->db->update('p_category', $params);     
    }

}