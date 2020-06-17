<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model {
       
    public function get($id = null) {
        $this->db->from('laporan');
        if($id != null) {
            $this->db->where('outlet_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function laporan_data($id = null)
    {
        $this->db->select();
    }
}