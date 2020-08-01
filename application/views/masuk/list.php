<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/login.png') ?>)">
    <h2 class="l-text2 t-center" style="color: black">
        <?php echo $title ?>
    </h2>
</section>

<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="pos-relative">
            <div class="bgwhite">

                <p class="alert alert-info">Belum punya akun? Silahkan <a href="<?php echo base_url('registrasi') ?>" class="btn btn-outline-info btn-sm">Registrasi disini</a></p>
                <div class="col-md-12">
                    <?php
                    // Display error
                    echo validation_errors('<div class="alert alert-warning">', '</div>');

                    // Display notifikasi error login
                    if ($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-danger">';
                        echo $this->session->flashdata('warning');
                        echo '</div>';
                    }
                    // Display notifikasi sukses logout
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }

                    // Form Open
                    echo form_open(base_url('masuk'), 'class="leave-comment"'); ?>

                    <table class="table">
                        <tbody>
                            <tr>
                                <th width="20%">Email (Username)</th>
                                <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-save"></i> Login
                                    </button>
                                    <button class="btn btn-danger" type="reset">
                                        <i class="fa fa-times"></i> Reset
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>