<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form open
echo form_open(base_url('admin/rekening/tambah'), ' class="form-horizontal"');
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo base_url('admin/rekening/') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i></a>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="col-auto control-label">Nama Bank</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo set_value('nama_bank') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Nomor Rekening</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="number" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening" value="<?php echo set_value('nomor_rekening') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Pemilik Rekening (A.N)</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="nama_pemilik" class="form-control" placeholder="Pemilik Rekening (Atas.Nama)" value="<?php echo set_value('nama_pemilik') ?>" required>
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