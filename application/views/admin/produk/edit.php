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
echo form_open_multipart(base_url('admin/produk/edit/' . $produk->id_produk), ' class="form-horizontal"');
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo base_url('admin/produk/') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i></a>
    </div>
    <div class="card-body">
        <div class="form-group ">
            <label class="col-auto control-label">Nama Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo $produk->nama_produk ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Kode Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo $produk->kode_produk ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Kategori Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <select name="id_kategori" class="form-control">
                    <?php foreach ($kategori as $kategori) { ?>
                        <option value="<?php echo $kategori->id_kategori ?>" <?php if ($produk->id_kategori == $kategori->id_kategori) {
                                                                                    echo "selected";
                                                                                } ?>>
                            <?php echo $kategori->nama_kategori ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Harga Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?php echo $produk->harga ?>" required>
                <small class="text-success">Harga Jual Produk</small>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" value="<?php echo $produk->harga_beli ?>" required>
                <small class="text-success">Harga Pembelian Produk</small>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Harga Diskon Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="number" name="harga_diskon" class="form-control" placeholder="Harga Diskon" value="<?php echo $produk->harga_diskon ?>" required>
                <small class="text-danger">Harga Diskon</small>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="text" name="tanggal_mulai_diskon" class="form-control datepicker" placeholder="dd-mm-yyyy" value="<?php if ($produk->tanggal_mulai_diskon == "") {
                                                                                                                                    echo set_value('tanggal_mulai_diskon');
                                                                                                                                } else {
                                                                                                                                    echo date('d-m-Y', strtotime($produk->tanggal_mulai_diskon));
                                                                                                                                } ?>" required>
                <small class="text-success">Tanggal mulai diskon</small>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-8 ">
                <input type="text" name="tanggal_selesai_diskon" class="form-control datepicker" placeholder="dd-mm-yyyy" value="<?php if ($produk->tanggal_selesai_diskon == "") {
                                                                                                                                        echo set_value('tanggal_selesai_diskon');
                                                                                                                                    } else {
                                                                                                                                        echo date('d-m-Y', strtotime($produk->tanggal_selesai_diskon));
                                                                                                                                    } ?>" required>
                <small class="text-success">Tanggal selesai diskon</small>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Stok Produk &amp; Stok Minimal</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="<?php echo $produk->stok ?>" required>
                <small class="text-warning">Stok Produk Saat ini</small>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="number" name="stok_minimal" class="form-control" placeholder="Stok Minimal Produk" value="<?php echo $produk->stok_minimal ?>" required>
                <small class="text-warning">Stok Minimal Produk</small>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Berat Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="berat" class="form-control" placeholder="Berat Produk" value="<?php echo $produk->berat ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Size Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="text" name="size" class="form-control" placeholder="Ukuran Produk" value="<?php echo $produk->size ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Upload Gambar Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <input type="file" name="gambar" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Keyword</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <textarea type="text" name="keywords" class="form-control" placeholder="Keyword"><?php echo $produk->keywords ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Keterangan Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan Produk" id="editor"><?php echo $produk->keterangan ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label">Status Produk</label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <select name="status_produk" class="form-control">
                    <option value="Publish">Publikasikan</option>
                    <option value="Draft" <?php if ($produk->status_produk == "Draft") {
                                                echo "selected";
                                            } ?>>Simpan Sebagi Draft</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-auto control-label"></label>
            <div class="col-sm-9 col-md-9 col-lg-8">
                <button class="btn btn-success btn-md" name="submit" type="submit">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <button class="btn btn-danger btn-md" name="reset" type="reset">
                    <i class="fa fa-times"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>


<?php echo form_close(); ?>