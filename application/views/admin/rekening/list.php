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
        <a href="<?php echo base_url('admin/rekening/tambah') ?>" class="btn btn-primary">
            <i class="fa fa-plus"></i></a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bank</th>
                        <th>Nomer Rekening</th>
                        <th>Pemilik</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($rekening as $rekening) { ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $rekening->nama_bank ?></td>
                            <td><?php echo $rekening->nomor_rekening ?></td>
                            <td><?php echo $rekening->nama_pemilik ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/rekening/edit/' . $rekening->id_rekening) ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fa fa-edit"></i></a>

                                <a href="<?php echo base_url('admin/rekening/delete/' . $rekening->id_rekening) ?>" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Yakin ingin mengahpus data ini ?')">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>