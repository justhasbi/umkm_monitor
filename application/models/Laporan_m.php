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

    public function laporan_add_item($data_laporan, $data_laporan_item)
    {   
        // $res = $this->db->insert('laporan', $data_laporan);
        // $last_id = $this->db->insert_id();
        // $data_laporan_item['laporan_id'] = $last_id;

        $res = $this->db->insert_batch('laporan_item', $data_laporan_item);
        return $res;
    }

    public function join_laporan($id = null)
	{
        $this->db->select('p_item.product_name, terjual, sub_total, p_item.price, outlet.outlet_id, tanggal, outlet_name');
        $this->db->from('laporan');
        $this->db->join('laporan_item', 'laporan_item.laporan_id = laporan_item.laporan_id');
        $this->db->join('p_item', 'laporan_item.item_id = p_item.item_id');
        $this->db->join('outlet', 'p_item.outlet_id=outlet.outlet_id');
        $this->db->where('laporan.laporan_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function outlet_join_laporan($id = null)
	{
        $this->db->select('outlet_name, laporan_id, tanggal');
        $this->db->from('laporan');
        $this->db->join('outlet', 'outlet.outlet_id = laporan.outlet_id');
        $this->db->where('laporan_id', $id);
        $query = $this->db->get();
        return $query;
    }
}