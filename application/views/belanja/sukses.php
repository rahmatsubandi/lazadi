<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/sukses.png') ?>)">
    <h2 class="l-text2 t-center" style="color: black">
        <?php echo $title ?>
    </h2>
</section>

<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="pos-relative">
            <div class="bgwhite">

                <!-- Flashdata 'alert' -->
                <?php if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                } ?>
                <p class="alert alert-success">
                    Terimakasih! Barang yang kamu beli akan segera kami proses yah..
                </p>
                <p class="alert alert-info">Silahkan Konfirmasi Pembayaran kamu yah.. <a href="<?php echo base_url('dasbor') ?>" class="btn btn-outline-info btn-sm">Disini</a></p>
            </div>
        </div>
    </div>
</section>