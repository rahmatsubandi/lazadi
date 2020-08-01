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
echo form_open_multipart(base_url('admin/produk/tambah'), ' class="form-horizontal"');
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo base_url('admin/produk/') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i></a>
    </div>
    <div class="card-body">
        <div class="form-group ">
            <label class="col-auto control-label">Nama Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo set_value('nama_produk') ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Kode Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo set_value('kode_produk') ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Kategori Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <select name="id_kategori" class="form-control">
                    <?php foreach ($kategori as $kategori) { ?>
                        <option value="<?php echo $kategori->id_kategori ?>">
                            <?php echo $kategori->nama_kategori ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Harga Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?php echo set_value('harga') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Stok Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="<?php echo set_value('stok') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Berat Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="text" name="berat" class="form-control" placeholder="Berat Produk (Gr)" value="<?php echo set_value('berat') ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Size Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="text" name="size" class="form-control" placeholder="Ukuran Produk" value="<?php echo set_value('size') ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Upload Gambar Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="file" name="gambar" class="form-control" required="required">
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Keyword</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <textarea type="text" name="keywords" class="form-control" placeholder="Keyword"><?php echo set_value('keywords') ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Keterangan Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan Produk" id="editor"><?php echo set_value('keterangan') ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Status Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <select name="status_produk" class="form-control">
                    <option value="Publish">Publikasikan</option>
                    <option value="Draft">Simpan Sebagi Draft</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label"></label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
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