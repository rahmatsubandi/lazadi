<?php
// Loading konfigurasi website
$site = $this->konfigurasi_model->listing();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- Icon diambil dari konfigurasi website -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/' . $site->icon) ?>" />
    <!-- SEO GOOGLE -->
    <meta name="keywords" content="<?php echo $site->keywords ?>">
    <meta name="description" content="<?php echo $title ?>, <?php echo $site->deskripsi ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/main.css">
    <!--===============================================================================================-->

    <!-- CSS Pagination -->
    <style type="text/css" media="screen">
        ul.pagination {
            padding: 0 10px;
        }

        .pagination a,
        .pagination b {
            padding: 8px 16px;
            margin: 0 5px;
            border-radius: 100% !important;
            text-decoration: none;
            float: left;
        }

        .pagination a {
            background-color: #f05542;
            color: white;
        }

        .pagination b {
            background-color: black;
            color: white;
        }

        .pagination a:hover {
            background-color: black;
        }
    </style>
    <!-- End CSS Pagination -->
</head>

<body class="animsition">