<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
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
echo form_open_multipart(base_url('admin/produk/gambar/' . $produk->id_produk), ' class="form-horizontal"');
?>

<?php
//Notifikasi sukses tambah gambar
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo base_url('admin/produk/') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i></a>
    </div>
    <div class="card-body">
        <div class="form-group ">
            <label class="col-auto control-label">Judul Gambar</label>
            <div class="col-sm-9 col-md-8 col-lg-7">
                <input type="text" name="judul_gambar" class="form-control" placeholder="Nama Judul Gambar" value="<?php echo set_value('judul_gambar') ?>" required>
            </div>
        </div>

        <div class="form-group ">
            <label class="col-auto control-label">Unggah Gambar</label>
            <div class="col-sm-9 col-md-8 col-lg-7">
                <input type="file" name="gambar" class="form-control" placeholder="Gambar Produk" value="<?php echo set_value('gambar') ?>" required>
            </div>
            <br>
            <div class="col-md-3">
                <button class="btn btn-success" name="submit" type="submit">
                    <i class="fa fa-save"></i>
                </button>
                <button class="btn btn-danger" name="reset" type="reset">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    </div>

    <?php echo form_close(); ?>

    <hr class="mt-3 mb-3" />
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" class="img img-responsive img-thumbnail" width="120">
                        </td>
                        <td><?php echo $produk->nama_produk ?></td>
                        <td>
                        </td>
                    </tr>
                    <?php $no = 2;
                    foreach ($gambar as $gambar) { ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td>
                                <img src="<?php echo base_url('assets/upload/image/thumbs/' . $gambar->gambar) ?>" class="img img-responsive img-thumbnail" width="120">
                            </td>
                            <td><?php echo $gambar->judul_gambar ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('admin/produk/delete_gambar/' . $produk->id_produk . '/' . $gambar->id_gambar) ?>" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Yakin ingin mengahpus gambar ini ?')">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>