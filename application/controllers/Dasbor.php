<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
        // Halaman ini diproteksi dengan Simple_login => Check Login
        $this->simple_pelanggan->cek_login();
    }

    // Halaman Dasbor
    public function index()
    {
        // Ambil data login id_pelanggan dari SESSION
        $id_pelanggan       = $this->session->userdata('id_pelanggan');
        $header_transaksi   = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(
            'title'                => 'Halaman Dashboard Pelanggan',
            'header_transaksi'     => $header_transaksi,
            'isi'                  => 'dasbor/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Belanja
    public function belanja()
    {
        // Ambil data login id_pelanggan dari SESSION
        $id_pelanggan       = $this->session->userdata('id_pelanggan');
        $header_transaksi   = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(
            'title'                => 'Riwayat Belanja',
            'header_transaksi'     => $header_transaksi,
            'isi'                  => 'dasbor/belanja'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Detail
    public function detail($kode_transaksi)
    {
        // Ambil data login kode_transaksi
        $id_pelanggan       = $this->session->userdata('id_pelanggan');
        $header_transaksi   = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi          = $this->transaksi_model->kode_transaksi($kode_transaksi);

        // Pastikan bahwa pelanggan hanya mengkses data transaksinya
        if ($header_transaksi->id_pelanggan != $id_pelanggan) {
            $this->session->set_flashdata('warning', 'Wah, kamu mencoba mengakses data orang lain yah ?');
            redirect(base_url('masuk'));
        }

        $data = array(
            'title'                => 'Riwayat Belanja',
            'header_transaksi'     => $header_transaksi,
            'transaksi'            => $transaksi,
            'isi'                  => 'dasbor/detail'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Profil
    public function profil()
    {
        // Ambil data login kode_transaksi
        $id_pelanggan       = $this->session->userdata('id_pelanggan');
        $pelanggan          = $this->pelanggan_model->detail($id_pelanggan);

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'alamat',
            'Alamat lengkap',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'telepon',
            'Nomor telepon',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            // End Validasi

            $data = array(
                'title'                => 'Profil Saya',
                'pelanggan'            => $pelanggan,
                'isi'                  => 'dasbor/profil'
            );
            $this->load->view('layout/wrapper', $data, FALSE);

            // Masuk database
        } else {
            $i = $this->input;
            // Kalau password lebih dari 6 karakter maka akan melakuan proses, password diganti
            if (strlen($i->post('password')) >= 6) {
                $data = array(
                    'id_pelanggan'          => $id_pelanggan,
                    'nama_pelanggan'        => $i->post('nama_pelanggan'),
                    'password'              => SHA1($i->post('password')), // Enkripsi
                    'telepon'               => $i->post('telepon'),
                    'alamat'                => $i->post('alamat')
                );
            } else {
                // Kalo password kurng dari 6 maka tidak diganti
                $data = array(
                    'id_pelanggan'          => $id_pelanggan,
                    'nama_pelanggan'        => $i->post('nama_pelanggan'),
                    'telepon'               => $i->post('telepon'),
                    'alamat'                => $i->post('alamat')
                );
                // End data update
                $this->pelanggan_model->edit($data);
                $this->session->set_flashdata('warning', 'Update profil tanpa ganti password berhasil');
                redirect(base_url('dasbor/profil'), 'refresh'); //Maka redirect ke halaman sukses
            }
            // End data update
            $this->pelanggan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Update profil berhasil');
            redirect(base_url('dasbor/profil'), 'refresh'); //Maka redirect ke halaman sukses
        }
        // End masuk database
    }

    // Konfirmasi pembayaran
    public function konfirmasi($kode_transaksi)
    {
        $header_transaksi       = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $rekening               = $this->rekening_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama Bank',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'rekening_pembayaran',
            'Nomer Rekening',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'rekening_pelanggan',
            'Nama Pemilik Rekening',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'tanggal_bayar',
            'Tanggal Pembayaran',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'jumlah_bayar',
            'Jumlah Pembayaran',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        if ($valid->run()) {
            // Check jika gambar diganti
            if (!empty($_FILES['bukti_bayar']['name'])) {
                $config['upload_path']      = './assets/upload/image/'; // Lokasi gambar
                $config['allowed_types']    = 'gif|jpg|png|jpeg'; // File yang ektensi yang boleh
                $config['max_size']         = '2400'; //Ukuran dalam kb per gambar maksimal
                $config['max_width']        = '2024'; //Maksimal panjangan gambar
                $config['mah_height']       = '2024'; // maksimal tinggi gambar

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti_bayar')) {
                    // End Validasi

                    $data = array(
                        'title'             => 'Konfirmasi Pembayaran',
                        'header_transaksi'  => $header_transaksi,
                        'rekening'          => $rekening,
                        'error'             => $this->upload->display_errors(),
                        'isi'               => 'dasbor/konfirmasi'
                    );
                    $this->load->view('layout/wrapper', $data, FALSE);

                    // Masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // Create thumbnail gambar
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                    // Lokasi folder thumbnail
                    $config['new_image']        = './assets/upload/image/thumbs/';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250; // Pixel
                    $config['height']           = 250; // Pixel
                    $config['thumb_marker']     = ''; //fungsinya agar nama file foto tidak ada ' _thumbs ' nya.

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    // End create thumbnail gambar

                    $i = $this->input;

                    $data = array(
                        'id_header_transaksi'    => $header_transaksi->id_header_transaksi,
                        'status_bayar'           => 'Konfirmasi',
                        'jumlah_bayar'           => $i->post('jumlah_bayar'),
                        'rekening_pembayaran'    => $i->post('rekening_pembayaran'),
                        'rekening_pelanggan'     => $i->post('rekening_pelanggan'),
                        'bukti_bayar'            => $upload_gambar['upload_data']['file_name'],
                        'id_rekening'            => $i->post('id_rekening'),
                        'tanggal_bayar'          => $i->post('tanggal_bayar'),
                        'nama_bank'             => $i->post('nama_bank')
                    );
                    $this->header_transaksi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil dilakukan');
                    redirect(base_url('dasbor'), 'refresh');
                }
            } else {
                // Edit produk tanpa ganti gambar
                $i = $this->input;

                $data = array(
                    'id_header_transaksi'    => $header_transaksi->id_header_transaksi,
                    'status_bayar'           => 'Konfirmasi',
                    'jumlah_bayar'           => $i->post('jumlah_bayar'),
                    'rekening_pembayaran'    => $i->post('rekening_pembayaran'),
                    'rekening_pelanggan'     => $i->post('rekening_pelanggan'),
                    // 'bukti_bayar'            => $upload_gambar['upload_data']['file_name'],
                    'id_rekening'            => $i->post('id_rekening'),
                    'tanggal_bayar'          => $i->post('tanggal_bayar'),
                    'nama_bank'             => $i->post('nama_bank')
                );
                $this->header_transaksi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil dilakukan');
                redirect(base_url('dasbor'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title'             => 'Konfirmasi Pembayaran',
            'header_transaksi'  => $header_transaksi,
            'rekening'          => $rekening,
            'isi'               => 'dasbor/konfirmasi'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
