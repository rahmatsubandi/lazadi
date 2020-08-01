<button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#delete-<?php echo $produk->id_produk ?>">
    <i class="fa fa-trash"></i>
</button>
<div class="modal fade" id="delete-<?php echo $produk->id_produk ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Produk <?php echo $produk->nama_produk ?></h4>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h4 class="text-warning">Peringatan!</h4>
                    Yakin data ini mau dihapus ? Jika data sudah dihapus tidak bisa dikembalikan.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <a href="<?php echo base_url('admin/produk/delete/' . $produk->id_produk) ?>" class="btn btn-danger btn-sm">Iya, Hapus Data</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->