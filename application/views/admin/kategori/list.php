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
            <a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Urutan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kategori as $kategori) { ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $kategori->nama_kategori ?></td>
                                <td><?php echo $kategori->slug_kategori ?></td>
                                <td><?php echo $kategori->urutan ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/kategori/edit/' . $kategori->id_kategori) ?>" class="btn btn-warning btn-sm btn-circle">
                                        <i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/kategori/delete/' . $kategori->id_kategori) ?>" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Yakin ingin mengahpus data ini ?')">
                                        <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>