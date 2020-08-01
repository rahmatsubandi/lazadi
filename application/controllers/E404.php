<?php
defined('BASEPATH') or exit('No direct script access allowed');

class E404 extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Halaman tidak ditemukan';
        $this->load->view('404', $data);
    }
}
