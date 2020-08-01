<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/sbadmin/img/dashboard.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-9 mt-4">
                        <?php
                        // Notifikasi error
                        echo validation_errors('<div class="alert alert-danger text-center">', '</div>');
                        // Notifikasi gagal login
                        if ($this->session->flashdata('warning')) {
                            echo '<div class="alert alert-danger">';
                            echo $this->session->flashdata('warning');
                            echo '</div>';
                        }
                        // Notifikasi logout
                        if ($this->session->flashdata('sukses')) {
                            echo '<div class="alert alert-success text-center">';
                            echo $this->session->flashdata('sukses');
                            echo '</div>';
                        }
                        // Form open login
                        echo form_open(base_url('login'));
                        ?>
                    </div>
                </div>
            </div>
            <div class="wrap-login100 p-t-20 p-b-90">
                <form class="login100-form validate-form flex-sb flex-w">
                    <span class="login100-form-title p-b-51">
                        Login
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/js/main.js"></script>

</body>

</html>