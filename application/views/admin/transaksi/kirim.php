<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="text/css" media="print">
        body {
            font-size: 12px;
            font-family: 'Times New Roman', Times, serif;
        }

        table {
            border: solid thin #000;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1cm;
        }

        td {
            padding: 6px 12px;
            border: solid thin #000;
            text-align: left;
        }

        .bg-success {
            background-color: #42cd5f;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div style="width: 19cm; height:1cm; padding-top:1cm;"></div>
    <h1 style="text-align: center; font-size: 18px; font-weight: bold; border-top: solid thin #000; padding-top: 20px;">Detail Pengiriman</h1>
    <table>
        <tr>
            <td>
                <strong>Pengirim :</strong>
                <p><?php echo $site->namaweb ?>
                    <br><?php echo $site->alamat ?>
                    <br>Telepon: <?php echo $site->telepon ?>
                </p>
            </td>
            <td>
                <strong>Penerima :</strong>
                <p><?php echo $header_transaksi->nama_pelanggan ?>
                    <br><?php echo $header_transaksi->alamat ?>
                    <br>Telepon: <?php echo $header_transaksi->telepon ?>
                </p>
            </td>
        </tr>
    </table>
    <h2 style="text-align: center; font-size: 18px; font-weight: bold; padding-top: 5px;">Detail Pengiriman</h2>
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
                    <td><?php echo number_format($transaksi->jumlah) ?></td>
                    <td><?php echo number_format($transaksi->harga) ?></td>
                    <td><?php echo number_format($transaksi->total_harga) ?></td>
                </tr>
            <?php $i++;
            } ?>
        </tbody>
    </table>
</body>

</html>