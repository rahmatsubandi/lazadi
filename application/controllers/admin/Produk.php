<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        // Proteksi halaman
        $this->simple_login->cek_login();
    }

    // Data produk
    public function index()
    {
        $produk = $this->produk_model->listing();

        $data = array(
            'title' => 'Data Produk',
            'produk' => $produk,
            'isi' => 'admin/produk/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Gambar
    public function gambar($id_produk)
    {
        $produk     = $this->produk_model->detail($id_produk);
        $gambar     = $this->produk_model->gambar($id_produk);

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_gambar',
            'Judul/Nama Gambar',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($valid->run()) {
            $config['upload_path']      = './assets/upload/image/'; // Lokasi gambar
            $config['allowed_types']    = 'gif|jpg|png|jpeg'; // File yang ektensi yang boleh
            $config['max_size']         = '2400'; //Ukuran dalam kb per gambar maksimal
            $config['max_width']        = '2024'; //Maksimal panjangan gambar
            $config['mah_height']       = '2024'; // maksimal tinggi gambar

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                // End Validasi

                $data = array(
                    'title' => 'Tambah Gambar Produk: ' . $produk->nama_produk,
                    'produk' => $produk,
                    'gambar' => $gambar,
                    'error' => $this->upload->display_errors(),
                    'isi' => 'admin/produk/gambar'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
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
                    'id_produk'         => $id_produk,
                    'judul_gambar'      => $i->post('judul_gambar'),
                    'gambar'            => $upload_gambar['upload_data']['file_name'], // Yang disimpan nama file gambarnya.
                );
                $this->produk_model->tambah_gambar($data);
                $this->session->set_flashdata('sukses', 'Data gambar telah ditambah.');
                redirect(base_url('admin/produk/gambar/' . $id_produk), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title' => 'Tambah Gambar Produk: ' . $produk->nama_produk,
            'produk' => $produk,
            'gambar' => $gambar,
            'isi' => 'admin/produk/gambar'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah Produk
    public function tambah()
    {
        // Ambil data kategori
        $kategori = $this->kategori_model->listing();
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_produk',
            'Nama Produk',
            'required',
            array('required' => '%s harus diisi')
        );

        $valid->set_rules(
            'kode_produk',
            'Kode Produk',
            'required|is_unique[produk.kode_produk]',
            array(
                'required' => '%s harus diisi',
                'is_unique' => '%s sudah ada. Buat kode produk baru'
            )
        );

        if ($valid->run()) {
            $config['upload_path']      = './assets/upload/image/'; // Lokasi gambar
            $config['allowed_types']    = 'gif|jpg|png|jpeg'; // File yang ektensi yang boleh
            $config['max_size']         = '2400'; //Ukuran dalam kb per gambar maksimal
            $config['max_width']        = '2024'; //Maksimal panjangan gambar
            $config['mah_height']       = '2024'; // maksimal tinggi gambar

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                // End Validasi

                $data = array(
                    'title' => 'Tambah Produk',
                    'kategori' => $kategori,
                    'error' => $this->upload->display_errors(),
                    'isi' => 'admin/produk/tambah'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
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
                // Slug Produk
                $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

                $data = array(
                    'id_user'           => $this->session->userdata('id_user'),
                    'id_kategori'       => $i->post('id_kategori'),
                    'kode_produk'       => $i->post('kode_produk'),
                    'nama_produk'       => $i->post('nama_produk'),
                    'slug_produk'       => $slug_produk,
                    'keterangan '       => $i->post('keterangan'),
                    'keywords'          => $i->post('keywords'),
                    'harga'             => $i->post('harga'),
                    'harga_beli'        => $i->post('harga_beli'),
                    'harga_diskon'      => $i->post('harga_diskon'),
                    'tanggal_mulai_diskon'   => date('Y-m-d', strtotime($i->post('tanggal_mulai_diskon'))),
                    'tanggal_selesai_diskon' => date('Y-m-d', strtotime($i->post('tanggal_selesai_diskon'))),
                    'stok_minimal'      => $i->post('stok_minimal'),
                    'stok'              => $i->post('stok'),
                    'gambar'            => $upload_gambar['upload_data']['file_name'], // Yang disimpan nama file gambarnya.
                    'berat'             => $i->post('berat'),
                    'size'              => $i->post('size'),
                    'status_produk'     => $i->post('status_produk'),
                    'tanggal_post'      => date('Y-m-d H:i:s')
                );
                $this->produk_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambah.');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title' => 'Tambah Produk',
            'kategori' => $kategori,
            'isi' => 'admin/produk/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Edit Produk
    public function edit($id_produk)
    {
        // Ambil data produk yang akan diedit
        $produk     = $this->produk_model->detail($id_produk);
        // Ambil data kategori
        $kategori   = $this->kategori_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_produk',
            'Kode lengkap',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        $valid->set_rules(
            'kode_produk',
            'Kode lengkap',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        if ($valid->run()) {
            // Check jika gambar diganti
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']      = './assets/upload/image/'; // Lokasi gambar
                $config['allowed_types']    = 'gif|jpg|png|jpeg'; // File yang ektensi yang boleh
                $config['max_size']         = '2400'; //Ukuran dalam kb per gambar maksimal
                $config['max_width']        = '2024'; //Maksimal panjangan gambar
                $config['mah_height']       = '2024'; // maksimal tinggi gambar

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    // End Validasi

                    $data = array(
                        'title' => 'Edit Produk: ' . $produk->nama_produk,
                        'kategori' => $kategori,
                        'produk' => $produk,
                        'error' => $this->upload->display_errors(),
                        'isi' => 'admin/produk/edit'
                    );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
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
                    // Slug Produk
                    $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

                    $data = array(
                        'id_produk'         => $id_produk,
                        'id_user'           => $this->session->userdata('id_user'),
                        'id_kategori'       => $i->post('id_kategori'),
                        'kode_produk'       => $i->post('kode_produk'),
                        'nama_produk'       => $i->post('nama_produk'),
                        'slug_produk'       => $slug_produk,
                        'keterangan '       => $i->post('keterangan'),
                        'keywords'          => $i->post('keywords'),
                        'harga'             => $i->post('harga'),
                        'harga_beli'        => $i->post('harga_beli'),
                        'harga_diskon'      => $i->post('harga_diskon'),
                        'tanggal_mulai_diskon'   => date('Y-m-d', strtotime($i->post('tanggal_mulai_diskon'))),
                        'tanggal_selesai_diskon' => date('Y-m-d', strtotime($i->post('tanggal_selesai_diskon'))),
                        'stok_minimal'      => $i->post('stok_minimal'),
                        'stok'              => $i->post('stok'),
                        // Yang disimpan nama file gambarnya.
                        'gambar'            => $upload_gambar['upload_data']['file_name'],
                        'berat'             => $i->post('berat'),
                        'size'              => $i->post('size'),
                        'status_produk'     => $i->post('status_produk'),
                    );
                    $this->produk_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit.');
                    redirect(base_url('admin/produk'), 'refresh');
                }
            } else {
                // Edit produk tanpa ganti gambar
                $i = $this->input;
                // Slug Produk
                $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

                $data = array(
                    'id_produk'         => $id_produk,
                    'id_user'           => $this->session->userdata('id_user'),
                    'id_kategori'       => $i->post('id_kategori'),
                    'kode_produk'       => $i->post('kode_produk'),
                    'nama_produk'       => $i->post('nama_produk'),
                    'slug_produk'       => $slug_produk,
                    'keterangan '       => $i->post('keterangan'),
                    'keywords'          => $i->post('keywords'),
                    'harga'             => $i->post('harga'),
                    'harga'             => $i->post('harga'),
                    'harga_beli'        => $i->post('harga_beli'),
                    'harga_diskon'      => $i->post('harga_diskon'),
                    'tanggal_mulai_diskon'   => date('Y-m-d', strtotime($i->post('tanggal_mulai_diskon'))),
                    'tanggal_selesai_diskon' => date('Y-m-d', strtotime($i->post('tanggal_selesai_diskon'))),
                    'stok_minimal'      => $i->post('stok_minimal'),
                    'stok'              => $i->post('stok'),
                    // Yang disimpan nama file gambarnya. (Tidak dipakai kerana ini edit tanpa update gambar)
                    // 'gambar'            => $upload_gambar['upload_data']['file_name'], 
                    'berat'             => $i->post('berat'),
                    'size'              => $i->post('size'),
                    'status_produk'     => $i->post('status_produk'),
                );
                $this->produk_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit.');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title' => 'Edit Produk ' . $produk->nama_produk,
            'kategori' => $kategori,
            'produk'    => $produk,
            'isi' => 'admin/produk/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Delete Produk
    public function delete($id_produk)
    {
        // Proses hapus gambar
        $produk = $this->produk_model->detail($id_produk);
        unlink('./assets/upload/image/' . $produk->gambar); // Proses hapus gambar
        unlink('./assets/upload/image/thumbs/' . $produk->gambar); // Proses hapus gambar di folder thumbs
        // End proses hapus
        $data = array('id_produk' => $id_produk);
        $this->produk_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/produk'), 'refresh');
    }

    //Delete gambar Produk
    public function delete_gambar($id_produk, $id_gambar) // Sebagai parameter
    {
        // Proses hapus gambar
        $gambar = $this->produk_model->detail_gambar($id_gambar);
        unlink('./assets/upload/image/' . $gambar->gambar);
        unlink('./assets/upload/image/thumbs/' . $gambar->gambar);
        // End proses hapus
        $data = array('id_gambar' => $id_gambar);
        $this->produk_model->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Gambar telah dihapus!');
        redirect(base_url('admin/produk/gambar/' . $id_produk), 'refresh');
    }
}
