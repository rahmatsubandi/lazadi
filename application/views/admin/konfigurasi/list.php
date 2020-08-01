<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="container">
    <?php
    //Notifikasi
    if ($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
    ?>
</div>

<?php
// Error upload
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form open
echo form_open_multipart(base_url('admin/konfigurasi'), ' class="form-horizontal"');
?>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="form-group ">
            <label class="col-auto control-label">Nama Website</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Tagline</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="tagline" class="form-control" placeholder="Tagline/Motto" value="<?php echo $konfigurasi->tagline ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Email</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Website</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $konfigurasi->website ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Facebook</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Instagram</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Telepon</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Alamat</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input name="alamat" class="form-control" placeholder="Alamat Kantor" value="<?php echo $konfigurasi->alamat ?>"></input>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Keyword</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input name="keywords" class="form-control" placeholder="Keywords" value="<?php echo $konfigurasi->keywords ?>"></input>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Metatext</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input name="metatext" class="form-control" placeholder="Kode Metatext" value="<?php echo $konfigurasi->metatext ?>"></input>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Deskripsi</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input name="deskripsi" class="form-control" placeholder="Deskripsi Website" value="<?php echo $konfigurasi->deskripsi ?>"></input>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Rekening Pembayaran</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran" value="<?php echo $konfigurasi->rekening_pembayaran ?>"></input>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label"></label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <button class="btn btn-success" name="submit" type="submit">
                    <i class="fa fa-save"></i>
                </button>
                <button class="btn btn-danger" name="reset" type="reset">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<?php echo form_close(); ?>