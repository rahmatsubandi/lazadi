<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="container">
    <?php
    //Notifikasi
    if ($this->session->flashdata('sukses')) {
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
    ?>
</div>

<?php
// Error upload
if (isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form open
echo form_open_multipart(base_url('admin/konfigurasi/logo'), ' class="form-horizontal"');
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
            <label class="col-auto control-label">Upload Logo</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="file" name="logo" class="form-control" placeholder="Upload Logo Baru" value="<?php echo $konfigurasi->logo ?>" required><br>
                Logo lama:
                <div class="card" style="width: 20rem;">
                    <img src="<?php echo base_url('assets/upload/image/' . $konfigurasi->logo) ?>" class="img img-responsive img-thumbnail shadow">
                </div>
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