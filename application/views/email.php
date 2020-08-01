<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/template/css/email.css") ?>">
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/template/images/icons/favicon.png">

  <title><?= $title ?></title>
</head>

<body>
  <!-- Flashdata 'alert' -->
  <?php if ($this->session->flashdata('sukses')) {
    echo '<div class="alert">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  } ?>
  <header>
    <h1>Contact us</h1>
  </header>
  <div id="form">

    <div class="fish" id="fish"></div>
    <div class="fish" id="fish2"></div>

    <?= form_open('Email/SendMail') ?>
    <form id="waterform" method="post">

      <div class="formgroup" id="name-form">
        <label>Subyek kamu<small style="color: red">*</small></label>
        <input type="text" id="subject" name="subject" placeholder="Masukan subyek pesan kamu.." required />
      </div>

      <div class="formgroup" id="email-form">
        <label>E-mail kamu<small style="color: red">*</small></label>
        <input type="email" id="email" name="email" placeholder="Masukan email kamu.." required />
      </div>

      <div class="formgroup" id="message-form">
        <label>Pesan kamu<small style="color: red">*</small></label>
        <textarea id="message" name="message" placeholder="Masukan pesan atau keluhan kamu disini.." required></textarea>
      </div>

      <input type="submit" name="submit_email" value="Kirim Pesan!" />
      <?= form_close() ?>
      <center>
        <a href="<?php echo base_url() ?>">Kembali ke Rumah</a>
      </center>
    </form>
  </div>

</body>

</html>