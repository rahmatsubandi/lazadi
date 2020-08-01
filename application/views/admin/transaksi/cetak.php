<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="text/css" media="print">
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        .cetak {
            width: 19cm;
            height: 27cm;
            padding: 1cm;
        }

        table {
            border: solid thin #000;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 3mm 6mm;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #42cd5f;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            font-size: 14px;
            text-transform: uppercase
        }
    </style>
</head>

<body onload="print()">
    <div class="cetak">
        <h1>Detail Transaksi <?php echo $site->namaweb ?></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="20%">NAMA PELANGGAN</th>
                    <th>: <?php echo $header_transaksi->nama_pelanggan ?></th>
                </tr>
                <tr>
                    <th width="20%">KODE TRANSAKSI</th>
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
        <br>

        <table>
            <thead>
                <tr class="bg-success">
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
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $transaksi->kode_produk ?></td>
                        <td><?php echo $transaksi->nama_produk ?></td>
                        <td><?php echo number_format($transaksi->jumlah) ?> Item</td>
                        <td><span>Rp. </span><?php echo number_format($transaksi->harga) ?></td>
                        <td><span>Rp. </span><?php echo number_format($transaksi->total_harga) ?></td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>