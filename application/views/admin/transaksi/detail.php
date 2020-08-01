<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo base_url('admin/transaksi/cetak/') . $header_transaksi->kode_transaksi ?>" target="_blank" title="Cetak" class="btn btn-danger">
            <i class="fa fa-file-pdf"></i></a>
        <a href="<?php echo base_url('admin/transaksi/excel/') . $header_transaksi->kode_transaksi ?>" target="_blank" title="Cetak" class="btn btn-success">
            <i class="fa fa-file-excel"></i></a> &nbsp;&nbsp;
        <a href="<?php echo base_url('admin/transaksi') ?>" title="Kembali" class="btn btn-primary">
            <i class="fa fa-arrow-circle-left"></i></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NAMA PELANGGAN</th>
                        <th>: <?php echo $header_transaksi->nama_pelanggan ?></th>
                    </tr>
                    <tr>
                        <th>KODE TRANSAKSI</th>
                        <th>: <?php echo $header_transaksi->kode_transaksi ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tanggal</td>
                        <td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Total</td>
                        <td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                    </tr>
                    <tr>
                        <td>Status Bayar</td>
                        <td>: <?php echo $header_transaksi->status_bayar ?></td>
                    </tr>
                    <tr>
                        <td>Bukti Bayar</td>
                        <td>: <?php if ($header_transaksi->bukti_bayar == "") { //Jika belum ada bukti bayar
                                    echo 'Belum ada bukti bayar'; //makan menampilkan ini
                                } else {
                                    // Kalo sudah ada bukti bayar maka menampilkan gambar
                                ?>
                                <img src="<?php echo base_url('assets/upload/image/' . $header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Bayar</td>
                        <td>: <?php if ($header_transaksi->tanggal_bayar == "") { //Jika belum bayar
                                    echo 'Belum bayar'; //makan menampilkan ini
                                } else {
                                    // Kalo sudah bayar menampilkan tanggal bayar
                                ?>
                                <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar)) ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Bayar</td>
                        <td>: <?php if ($header_transaksi->jumlah_bayar == "") { //Jika belum bayar
                                    echo 'Belum bayar'; //makan menampilkan ini
                                } else {
                                    // Kalo sudah bayar menampilkan total bayar
                                ?>
                                <?php echo number_format($header_transaksi->jumlah_bayar, '0', ',', '.') ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pembayaran dari</td>
                        <td>: <?php if ($header_transaksi->nama_bank == "") { //Jika belum bayar
                                    echo 'Belum bayar'; //makan menampilkan ini
                                } else {
                                    // Kalo sudah bayar menampilkan data pemabayaran, no rekening, dan atas nama pemilik rekening
                                ?>
                                <?php echo $header_transaksi->nama_bank ?> No. rekening
                                <?php echo $header_transaksi->rekening_pembayaran ?> a.n <?php echo $header_transaksi->rekening_pelanggan ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Pembayaran ke rekening</td>
                        <td>: <?php if ($header_transaksi->bank == "") { //Jika belum bayar
                                    echo 'Belum bayar'; //makan menampilkan ini
                                } else {
                                    // Kalo sudah bayar menampilkan data pemabayaran, no rekening, dan atas nama pemilik rekening
                                ?>
                                <?php echo $header_transaksi->bank ?> No. rekening
                                <?php echo $header_transaksi->nomor_rekening ?> a.n <?php echo $header_transaksi->nama_pemilik ?> <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="table table-bordered">
                <thead class="bg-success text-gray-100">
                    <tr>
                        <th>NO</th>
                        <th>KODE</th>
                        <th>NAMA PRODUK</th>
                        <th>JUMLAH</th>
                        <th>HARGA</th>
                        <th>SUB TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($transaksi as $transaksi) { ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $transaksi->kode_produk ?></td>
                            <td><?php echo $transaksi->nama_produk ?></td>
                            <td><?php echo number_format($transaksi->jumlah) ?></td>
                            <td><span class="text-success">Rp. </span><?php echo number_format($transaksi->harga) ?></td>
                            <td><span class="text-success">Rp. </span><?php echo number_format($transaksi->total_harga) ?></td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>