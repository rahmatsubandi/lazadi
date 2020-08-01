<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/regis.png') ?>)">
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

                <!-- Flashdata 'alert' -->
                <?php if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                } ?>

                <p class="alert alert-info">Sudah punya akun? Silahkan <a href="<?php echo base_url('masuk') ?>" class="btn btn-outline-info btn-sm">Login di sini</a></p>
                <div class="col-md-12">
                    <?php
                    // Display error
                    echo validation_errors('<div class="alert alert-warning">', '</div>');

                    // Form Open
                    echo form_open(base_url('registrasi'), 'class="leave-comment"'); ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%">Nama</th>
                                <td><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_pelanggan') ?>" required></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Email</th>
                                <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-save"></i> Submit
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