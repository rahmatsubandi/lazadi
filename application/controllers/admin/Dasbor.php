<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{
    // ini properti
    protected $data = [];
    // load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        // proteksi halaman
        $this->simple_login->cek_login();
    }
    // Halaman utama dashboard
    public function index()
    {
        $data = array(
            'title' => 'Dashboard Admin',
            'isi' => 'admin/dasbor/list'
        );
        $data['data'] = $this->produk_model->chart(); // ambil model dari Produk_model function chart
        $this->load->view('admin/layout/wrapper', $data); // load views wrapper
    }
}
