<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/profile.png') ?>)">
    <h2 class="l-text2 t-center" style="color: black">
        <?php echo $title ?>
    </h2>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php
                    include('menu.php');
                    ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

                <?php
                // Notifikasi
                if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-success">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }
                if ($this->session->flashdata('warning')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('warning');
                    echo '</div>';
                }
                // Display error
                echo validation_errors('<div class="alert alert-warning">', '</div>');

                // Form Open
                echo form_open(base_url('dasbor/profil'), 'class="leave-comment"');
                ?>

                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <td><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Email</th>
                            <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" readonly></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
                                &nbsp;&nbsp;&nbsp;<sup class="text-danger">Password baru harus 6 karakter. Jika kurang maka profil diupdate tanpa mengganti password</sup>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-save"></i> Update Profil
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
</section>