<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rekening_model');
        // Proteksi halama
        $this->simple_login->cek_login();
    }

    // Data rekening
    public function index()
    {
        $rekening = $this->rekening_model->listing();

        $data = array(
            'title' => 'Data Rekening',
            'rekening' => $rekening,
            'isi' => 'admin/rekening/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah Rekening
    public function tambah()
    {
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama Rekening',
            'required', // Nama rekening hanya boleh 1
            array(
                'required'       => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'nama_pemilik',
            'Nama Pemilik',
            'required', // Nama rekening hanya boleh 1
            array(
                'required'       => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'nomor_rekening',
            'Nomer Rekening',
            'required|is_unique[rekening.nomor_rekening]', // Nama rekening hanya boleh 1
            array(
                'required'       => '%s harus diisi',
                'is_unique'      => '%s sudah ada. Buat nomer rekening baru!'
            )
        );

        if ($valid->run() === FALSE) {
            // End Validasi

            $data = array(
                'title' => 'Tambah Rekening',
                'isi' => 'admin/rekening/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            // Masuk database
        } else {
            $i = $this->input;

            $data = array(
                'nama_bank'       => $i->post('nama_bank'),
                'nomor_rekening'  => $i->post('nomor_rekening'),
                'nama_pemilik'    => $i->post('nama_pemilik')
            );
            $this->rekening_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah.');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        // End masuk database
    }

    // Edit Rekening
    public function edit($id_rekening)
    {
        $rekening = $this->rekening_model->detail($id_rekening);
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama rekening',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            // End Validasi

            $data = array(
                'title' => 'Edit Rekening',
                'rekening'  =>  $rekening,
                'isi'   => 'admin/rekening/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            // Masuk database
        } else {
            $i = $this->input;
            $data = array(
                'id_rekening'     => $id_rekening,
                'nama_bank'       => $i->post('nama_bank'),
                'nomor_rekening'  => $i->post('nomor_rekening'),
                'nama_pemilik'    => $i->post('nama_pemilik')
            );
            $this->rekening_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit.');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        // End masuk database
    }

    //Delete Rekening
    public function delete($id_rekening)
    {
        $data = array('id_rekening' => $id_rekening);
        $this->rekening_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus!');
        redirect(base_url('admin/rekening'), 'refresh');
    }
}
