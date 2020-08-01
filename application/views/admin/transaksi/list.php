<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>PELANGGAN</th>
                        <th>KODE</th>
                        <th>TANGGAL</th>
                        <th>TOTAL</th>
                        <th>JUMLAH</th>
                        <th>BAYAR</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($header_transaksi as $header_transaksi) { ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $header_transaksi->nama_pelanggan ?>
                                <br><small>
                                    Telepon: <?php echo $header_transaksi->telepon ?>
                                    <br>Email: <?php echo $header_transaksi->email ?>
                                    <br>Alamat kirim: <br><?php echo nl2br($header_transaksi->alamat) ?>
                                </small>
                            </td>
                            <td><?php echo $header_transaksi->kode_transaksi ?></td>
                            <td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                            <td><span class="text-success">Rp. </span><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                            <td><?php echo $header_transaksi->total_item ?> Item</td>
                            <td><?php echo $header_transaksi->status_bayar ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/transaksi/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                                <button class="btn btn-success dropdown-toggle btn-circle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-print"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo base_url('admin/transaksi/cetak/' . $header_transaksi->kode_transaksi) ?>" target="_blank">Cetak PDF</a><br>
                                    <a class="dropdown-item" href="<?php echo base_url('admin/transaksi/excel/' . $header_transaksi->kode_transaksi) ?>" target="_blank">Cetak EXEL</a>
                                </div>
                                <a href="<?php echo base_url('admin/transaksi/pdf/' . $header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-file-pdf"></i></a>
                                <a href="<?php echo base_url('admin/transaksi/kirim/' . $header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-truck"></i></a>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>