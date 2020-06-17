<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        // $post['username '] is field name
        $this->db->where('password', sha1($post['password']));

        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) 
    {
        // Deklarasikan apa yang aka diinputkan
        $params = array(
            'username'=> $post['username'],
            'nama' => $post['fullname'],
            'password' => sha1($post['password']),
            'alamat' => $post['address'],
            'tanggal_lahir' => $post['birthdate'],
            'email' => $post['email'],
            'hak_akses' => $post['hakakses']
        );
        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        $params['username'] = $post['username'];
        $params['nama'] = $post['fullname'];
        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['alamat'] = $post['address'];
        $params['tanggal_lahir'] = $post['birthdate'];
        $params['email'] = $post['email'];
        $params['hak_akses'] = $post['hakakses'];

        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function delete($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('user');
    }
    
}

