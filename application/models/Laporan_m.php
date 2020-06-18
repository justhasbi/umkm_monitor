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

    public function laporan_add($data)
    {   
        $query = $this->db->insert('laporan', $data);
        return $query;
    }

    public function laporan_add_item($table, $data)
    {   
        $query = $this->db->insert->laporan($table, $params);
        return $query;
    }

    public function join_laporan()
	{
		
	}
}