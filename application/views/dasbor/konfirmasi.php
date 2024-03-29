<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/payment.png') ?>)">
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

                    <table class="table table-bordered">
                        <thead>
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
                                <td>: <?php if ($header_transaksi->bukti_bayar != "") { ?>
                                        <img src="<?php echo base_url('assets/upload/image/' . $header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="300">
                                    <?php } else {
                                            echo 'Belum ada bukti bayar nih dari kamu';
                                        } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <?php
                    // Error upload
                    if (isset($error)) {
                        echo '<p class="alert alert-warning">' . $error . '</p>';
                    }

                    // Notif error
                    echo validation_errors('<p class="alert alert-warning">', '</p>');

                    // Form open
                    echo form_open_multipart(base_url('dasbor/konfirmasi/' . $header_transaksi->kode_transaksi));

                    ?>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="30%">Pembayaran ke rekening</td>
                                <td>
                                    <select name="id_rekening" class="form-control">
                                        <?php foreach ($rekening as $rekening) { ?>
                                            <option value="<?php echo $rekening->id_rekening ?>" <?php if ($header_transaksi->id_rekening == $rekening->id_rekening) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                <?php echo $rekening->nama_bank ?> (No. Rekening: <?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Bayar</td>
                                <td>
                                    <input type="date" name="tanggal_bayar" class="form-control" placeholder="dd-mm-yyyy" value="<?php if (isset($_POST['tanggal_bayar'])) {
                                                                                                                                        echo set_value('tanggal_bayar');
                                                                                                                                    } elseif ($header_transaksi->tanggal_bayar != "") {
                                                                                                                                        echo $header_transaksi->tanggal_bayar;
                                                                                                                                    } else {
                                                                                                                                        echo date('d-m-Y');
                                                                                                                                    } ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah pembayaran</td>
                                <td>
                                    <input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Pembayaran" value="<?php if (isset($_POST['jumlah_bayar'])) {
                                                                                                                                                echo set_value('jumlah_bayar');
                                                                                                                                            } elseif ($header_transaksi->jumlah_bayar != "") {
                                                                                                                                                echo $header_transaksi->jumlah_bayar;
                                                                                                                                            } else {
                                                                                                                                                echo $header_transaksi->jumlah_transaksi;
                                                                                                                                            } ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Dari Bank</td>
                                <td>
                                    <input type="text" name="nama_bank" class="form-control" value="<?php echo $header_transaksi->nama_bank ?>" placeholder="Nama Bank">
                                    &nbsp;&nbsp;<small>Contoh: BCA</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomer Rekening</td>
                                <td>
                                    <input type="text" name="rekening_pembayaran" class="form-control" value="<?php echo $header_transaksi->rekening_pembayaran ?>" placeholder="Nomer Rekening">
                                    &nbsp;&nbsp;<small>Contoh: 99838372721</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Pemilik Rekening</td>
                                <td>
                                    <input type="text" name="rekening_pelanggan" class="form-control" value="<?php echo $header_transaksi->rekening_pelanggan ?>" placeholder="Nama Pemilik Rekening">
                                    &nbsp;&nbsp;<small>Contoh: Rahmat Subandi</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Bukti Pembayaran</td>
                                <td>
                                    <input type="file" name="bukti_bayar" class="form-control" placeholder="Upload Bukti Pembayaran">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-upload"></i> Upload</button>
                                    <button class="btn btn-danger" type="reset" name="reset"><i class="fa fa-times"></i> Reset</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                <?php
                    // Form Close
                    echo form_close();
                    // Kalau ga ada tampilkan alert
                } else { ?>
                    <p class="alert alert-success"><i class="fa fa-warning"></i> Belum ada data transaksi</p>
                <?php } ?>

            </div>
        </div>
    </div>
</section>