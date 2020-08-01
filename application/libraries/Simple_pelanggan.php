<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Simple_pelanggan
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        // Load data model user
        $this->CI->load->model('pelanggan_model');
    }

    // Fungsi login
    public function login($email, $password)
    {
        $check = $this->CI->pelanggan_model->login($email, $password); //cek ke database
        // Jika ada data usernya maka create session login
        if ($check) { //Kalo ada datanya
            $id_pelanggan   = $check->id_pelanggan;
            $nama_pelanggan = $check->nama_pelanggan;
            // Create session
            $this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->CI->session->set_userdata('email', $email);
            // Kalo sudah, maka redirect ke halaman admin
            redirect(base_url('dasbor'), 'refresh');
        } else { // Kalo tidak ada datanya($email dan $password), Maka harus login lagi
            $this->CI->session->set_flashdata('warning', 'Username atau password kamu salah');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    // Fungsi cek masuk
    public function cek_login()
    {
        // Memeriksa apakah session sudah atau belum, jika belum alihkan kehalaman login
        if ($this->CI->session->userdata('email') == "") {
            $this->CI->session->set_flashdata('warning', 'Kamu belum login');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    // Fungsi logout
    public function logout()
    {
        // Membuang semua session yang sudah di set pada saat login
        $this->CI->session->unset_userdata('id_pelanggan');
        $this->CI->session->unset_userdata('nama_pelanggan');
        $this->CI->session->unset_userdata('email');
        // Setelah session di unset atau dihapus maka redirect ke login
        $this->CI->session->set_flashdata('sukses', 'Kamu telah logout');
        redirect(base_url('masuk'), 'refresh');
    }
}
