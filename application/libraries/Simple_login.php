<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Simple_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        // Load data model user
        $this->CI->load->model('user_model');
    }

    // Fungsi login
    public function login($username, $password)
    {
        $check = $this->CI->user_model->login($username, $password); //cek ke database
        // Jika ada data usernya maka create session login
        if ($check) { //Kalo ada datanya
            $id_user        = $check->id_user;
            $nama           = $check->nama;
            $akses_level    = $check->akses_level;
            // Create session
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('akses_level', $akses_level);
            // Kalo sudah, maka redirect ke halaman admin
            redirect(base_url('admin/dasbor'), 'refresh');
        } else { // Kalo tidak ada datanya($username dan $password), Maka harus login lagi
            $this->CI->session->set_flashdata('warning', 'Username atau password kamu salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    // Fungsi cek login
    public function cek_login()
    {
        // Memeriksa apakah session sudah atau belum, jika belum alihkan kehalaman login
        if ($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('warning', 'Kamu belum login');
            redirect(base_url('login'), 'refresh');
        }
    }

    // Fungsi logout
    public function logout()
    {
        // Membuang semua session yang sudah di set pada saat login
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('akses_level');
        // Setelah session di unset atau dihapus maka redirect ke login
        $this->CI->session->set_flashdata('sukses', 'Kamu telah logout');
        redirect(base_url('login'), 'refresh');
    }
}
