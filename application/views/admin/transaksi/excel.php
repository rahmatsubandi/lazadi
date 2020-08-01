<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title | $header_transaksi->nama_pelanggan.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
</head>

<body>
    <div class="cetak">
        <h1>Laporan Detail Transaksi <?php echo $site->namaweb ?></h1>
        <table border="1" width="100%">
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
                            <?php echo 'Sudah Bayar'; ?>
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
                    </>
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
        <br>

        <table border="1" width="100%">
            <thead>
                <tr style="background-color:green">
                    <th class="text-center">NO</th>
                    <th class="text-center">KODE</th>
                    <th class="text-center">NAMA PRODUK</th>
                    <th class="text-center">JUMLAH</th>
                    <th class="text-center">HARGA</th>
                    <th class="text-center">SUB TOTAL</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $i = 1;
                foreach ($transaksi as $transaksi) { ?>
                    <tr class="text-center">
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo $transaksi->kode_produk ?></td>
                        <td class="text-center"><?php echo $transaksi->nama_produk ?></td>
                        <td class="text-center"><?php echo number_format($transaksi->jumlah) ?></td>
                        <td class="text-center"><?php echo number_format($transaksi->harga) ?></td>
                        <td class="text-center"><?php echo number_format($transaksi->total_harga) ?></td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>