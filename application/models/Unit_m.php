<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model {
    
    public function get($id = null) {
        $this->db->from('p_unit');
        if($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id) {
        $this->db->where('unit_id', $id);
		$this->db->delete('p_unit');
    }

    public function add($post) {
        $params = [
            'unit_name' => $post['unit_name']
        ];
        $this->db->insert('p_unit', $params);
    }

    public function edit($post) {
        $params = [
            'unit_name' => $post['unit_name']
        ];
        $this->db->where('unit_id', $post['unit_id']);
        $this->db->update('p_unit', $params);     
    }

}