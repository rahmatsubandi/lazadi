<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // Total produk
  public function total_produk()
  {
    $this->db->select('COUNT(*) AS total');
    $this->db->from('produk');
    $query = $this->db->get();
    return $query->row();
  }

  // Total pelanggan
  public function total_pelanggan()
  {
    $this->db->select('COUNT(*) AS total');
    $this->db->from('pelanggan');
    $query = $this->db->get();
    return $query->row();
  }

  // Total transkasi
  public function total_header_transaksi()
  {
    $this->db->select('COUNT(*) AS total');
    $this->db->from('header_transaksi');
    $query = $this->db->get();
    return $query->row();
  }

  // Total transkasi
  public function total_transaksi()
  {
    $this->db->select('SUM(transaksi.total_harga) AS total');
    $this->db->from('transaksi');
    $query = $this->db->get();
    return $query->row();
  }

  // Total berita
  public function total_berita()
  {
    $this->db->select('COUNT(*) AS total');
    $this->db->from('berita');
    $query = $this->db->get();
    return $query->row();
  }

  // Total berita
  public function total_rekening()
  {
    $this->db->select('COUNT(*) AS total');
    $this->db->from('rekening');
    $query = $this->db->get();
    return $query->row();
  }
}
