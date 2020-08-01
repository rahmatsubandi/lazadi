<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Contact Us';
    $this->load->view('email', $data);
  }

  public function SendMail()
  {
    if (isset($_POST['submit_email'])) {

      $subject = $this->input->post('subject');
      $email = $this->input->post('email');
      $message = $this->input->post('message');
      // Jika email kosong
      if (!empty($email)) {
        // Konfig ke email dan prosesnya
        $config = [
          'mailtype'  => 'text',
          'charset'   => 'iso-8859-1',
          'protocol'  => 'smtp',
          'mailtype' => 'html',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'youremail@gmail.com',
          'smtp_pass' => '**********'
        ];

        // Load library
        $this->load->library('email', $config);
        $this->email->initialize($config);
        // End Konfig

        // Proses kirim email
        $this->email->set_newline("\r\n");
        $this->email->from($email);
        $this->email->subject($subject);
        $this->email->to('youremail@gmail.com');
        $this->email->message($message);
        // End Proses kirim email

        // Jika email berhasil dikirim
        if ($this->email->send()) {
          $this->session->set_flashdata('sukses', 'Yey, selamat kirim email ke admin Lazadi berhasil!');
          redirect(base_url('email'), 'refresh'); //Maka redirect ke halaman sukses
        }
        // Jika gagal
        else {
          show_error($this->email->print_debugger());
        }
      }
    }
  }
}
