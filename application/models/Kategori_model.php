<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing All kategori
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail kategori
    public function detail($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail slug kategori
    public function read($slug_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('slug_kategori', $slug_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Login kategori
    public function login($kategoriname, $password) //Sebagai parameter dari form input login
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where(array(
            'kategoriname'   => $kategoriname,
            'password'  => SHA1($password)
        )); // Enkripsi password
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('kategori', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori', $data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('kategori', $data);
    }
}
