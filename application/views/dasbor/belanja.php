<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/histori.png') ?>)">
    <h2 class="l-text2 t-center" style="color: black">
        <?php echo $title ?>
    </h2>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php
                    include('menu.php');
                    ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!-- Product -->
                <h3>Riwayat belanja kamu</h3>
                <hr>

                <?php
                // Kalau ada transaksi, tampil tabel 
                if ($header_transaksi) {
                ?>

                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr class="bg-success">
                                <th width="20px">NO</th>
                                <th class="text-center">KODE</th>
                                <th class="text-center">TANGGAL</th>
                                <th class="text-center">JUMLAH TOTAL</th>
                                <th class="text-center">JUMLAH ITEM</th>
                                <th>STATUS BAYAR</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $i = 1;
                            foreach ($header_transaksi as $header_transaksi) { ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $header_transaksi->kode_transaksi ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                                    <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                                    <td><?php echo $header_transaksi->total_item ?></td>
                                    <td><?php echo $header_transaksi->status_bayar ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('dasbor/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-outline-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                            <a href="<?php echo base_url('dasbor/konfirmasi/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> Konfirmasi Pembayaran</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>

                <?php
                    // Kalau ga ada tampilkan alert
                } else { ?>
                    <p class="alert alert-success"><i class="fa fa-warning"></i> Belum ada data transaksi</p>
                <?php } ?>

            </div>
        </div>
    </div>
</section>