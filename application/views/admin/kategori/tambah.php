<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form open
echo form_open(base_url('admin/kategori/tambah'), ' class="form-horizontal"');
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo base_url('admin/kategori/') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i></a>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="col-auto control-label">Nama Kategori</label>
            <div class="col-10 col-sm-9 col-md-8 col-lg-7">
                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo set_value('nama') ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-auto control-label">Urutan</label>
            <div class="col-10 col-sm-9 col-md-8 col-lg-7">
                <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-5">
                <button class="btn btn-success btn-md" name="submit" type="submit">
                    <i class="fa fa-save"></i></button>
                <button class="btn btn-danger btn-md" name="reset" type="reset">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>