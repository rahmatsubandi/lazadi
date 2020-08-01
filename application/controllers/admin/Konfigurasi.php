<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
    }

    // Konfigursi Umum
    public function index()
    {
        $konfigurasi    = $this->konfigurasi_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'namaweb',
            'Nama website',
            'required',
            array(
                'required'       => '%s harus diisi',
            )
        );

        if ($valid->run() === FALSE) {
            // End Validasi

            $data = array(
                'title'        => 'Konfigurasi Website',
                'konfigurasi'  => $konfigurasi,
                'isi'          => 'admin/konfigurasi/list'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            // Masuk database
        } else {
            $i = $this->input;

            $data = array(
                'id_konfigurasi'          => $konfigurasi->id_konfigurasi,
                'namaweb'                 => $i->post('namaweb'),
                'tagline'                 => $i->post('tagline'),
                'email'                   => $i->post('email'),
                'website'                 => $i->post('website'),
                'keywords'                => $i->post('keywords'),
                'metatext'                => $i->post('metatext'),
                'telepon'                 => $i->post('telepon'),
                'alamat'                  => $i->post('alamat'),
                'facebook'                => $i->post('facebook'),
                'instagram'               => $i->post('instagram'),
                'deskripsi'               => $i->post('deskripsi'),
                'rekening_pembayaran'     => $i->post('rekening_pembayaran'),
            );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate.');
            redirect(base_url('admin/konfigurasi'), 'refresh');
        }
        // End masuk database
    }
    // Konfigursi logo web
    public function logo()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'namaweb',
            'Nama Website',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        if ($valid->run()) {
            // Check jika logo diganti
            if (!empty($_FILES['logo']['name'])) {
                $config['upload_path']      = './assets/upload/image/'; // Lokasi logo
                $config['allowed_types']    = 'gif|jpg|png|jpeg|svg'; // File yang ektensi yang boleh
                $config['max_size']         = '6400'; //Ukuran dalam kb per logo maksimal
                $config['max_width']        = '6024'; //Maksimal panjangan logo
                $config['mah_height']       = '6024'; // maksimal tinggi logo

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('logo')) {
                    // End Validasi

                    $data = array(
                        'title' => 'Konfigurasi Logo Website: ',
                        'konfigurasi' => $konfigurasi,
                        'error' => $this->upload->display_errors(),
                        'isi' => 'admin/konfigurasi/logo'
                    );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                    // Masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // Create thumbnail logo
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

                    // End create thumbnail logo

                    $i = $this->input;

                    $data = array(
                        'id_konfigurasi'    => $konfigurasi->id_konfigurasi,
                        'namaweb'           => $i->post('namaweb'),
                        'logo'            => $upload_gambar['upload_data']['file_name'],
                    );
                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diupdate.');
                    redirect(base_url('admin/konfigurasi/logo'), 'refresh');
                }
            } else {
                // Edit logo tanpa ganti logo
                $i = $this->input;

                $data = array(
                    'id_konfigurasi'    => $konfigurasi->id_konfigurasi,
                    'namaweb'           => $i->post('namaweb'),
                    // 'logo'            => $upload_gambar['upload_data']['file_name'],
                );
                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diupdate.');
                redirect(base_url('admin/konfigurasi/logo'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title' => 'Konfigurasi Logo Website',
            'konfigurasi' => $konfigurasi,
            'isi' => 'admin/konfigurasi/logo'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    // Konfigursi icon
    public function icon()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules(
            'namaweb',
            'Nama Website',
            'required',
            array(
                'required' => '%s harus diisi'
            )
        );

        if ($valid->run()) {
            // Check jika Icon diganti
            if (!empty($_FILES['icon']['name'])) {
                $config['upload_path']      = './assets/upload/image/'; // Lokasi Icon
                $config['allowed_types']    = 'gif|jpg|png|jpeg|svg'; // File yang ektensi yang boleh
                $config['max_size']         = '6400'; //Ukuran dalam kb per Icon maksimal
                $config['max_width']        = '6024'; //Maksimal panjangan Icon
                $config['mah_height']       = '6024'; // maksimal tinggi Icon

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('icon')) {
                    // End Validasi

                    $data = array(
                        'title' => 'Konfigurasi Icon Website',
                        'konfigurasi' => $konfigurasi,
                        'error' => $this->upload->display_errors(),
                        'isi' => 'admin/konfigurasi/icon'
                    );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                    // Masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // Create thumbnail Icon
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

                    // End create thumbnail Icon

                    $i = $this->input;

                    $data = array(
                        'id_konfigurasi'    => $konfigurasi->id_konfigurasi,
                        'namaweb'           => $i->post('namaweb'),
                        'icon'            => $upload_gambar['upload_data']['file_name'],
                    );
                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diupdate.');
                    redirect(base_url('admin/konfigurasi/icon'), 'refresh');
                }
            } else {
                // Edit icon tanpa ganti icon
                $i = $this->input;

                $data = array(
                    'id_konfigurasi'    => $konfigurasi->id_konfigurasi,
                    'namaweb'           => $i->post('namaweb'),
                    // 'icon'            => $upload_gambar['upload_data']['file_name'],
                );
                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diupdate.');
                redirect(base_url('admin/konfigurasi/icon'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title' => 'Konfigurasi Icon Website',
            'konfigurasi' => $konfigurasi,
            'isi' => 'admin/konfigurasi/icon'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
