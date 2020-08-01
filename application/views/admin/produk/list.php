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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-primary">
            <i class="fa fa-plus"></i></a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $produk) { ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td>
                                <img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" class="img img-responsive img-thumbnail" width="120">
                            </td>
                            <td><?php echo $produk->nama_produk ?></td>
                            <td><?php echo $produk->nama_kategori ?></td>
                            <td><?php echo number_format($produk->harga, '0', ',', '.') ?></td>
                            <td><?php echo $produk->status_produk ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/produk/gambar/' . $produk->id_produk) ?>" class="btn btn-info btn-circle btn-sm">
                                    <i class="fa fa-image"></i> (<?php echo $produk->total_gambar ?>)</a>

                                <a href="<?php echo base_url('admin/produk/edit/' . $produk->id_produk) ?>" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fa fa-edit"></i></a>

                                <?php include('delete.php') ?>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>