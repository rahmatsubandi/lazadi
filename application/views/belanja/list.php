<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/cart.png') ?>)">
    <h2 class="l-text2 t-center" style="color: black">
        <?php echo $title ?>
    </h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">

                <!-- Flashdata 'alert' -->
                <?php if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                } ?>
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1">GAMBAR</th>
                        <th class="column-2">PRODUK</th>
                        <th class="column-3">HARGA</th>
                        <th class="column-4 p-l-70">JUMLAH</th>
                        <th class="column-5" width="15%">SUB TOTAL</th>
                        <th class="column-6" width="20%">ACTION</th>
                    </tr>

                    <?php
                    // Looping data keranjang belanja
                    foreach ($keranjang as $keranjang) {
                        // Ambil data produk
                        $id_produk = $keranjang['id']; // Id diambil pada saat belanja
                        $produk    = $this->produk_model->detail($id_produk); // Ambil data produk

                        // Form Update keranjang
                        echo form_open(base_url('belanja/update_cart/' . $keranjang['rowid']));
                    ?>
                        <tr class="table-row">
                            <td class="column-1">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <!-- Mengambil data gambar, dari cartnya -->
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                                </div>
                            </td>
                            <td class="column-2"><?php echo $keranjang['name'] ?></td>
                            <td class="column-3">Rp. <?php echo number_format($keranjang['price'], '0', ',', '.') ?></td>
                            <td class="column-4">
                                <div class="flex-w bo5 of-hidden w-size17">
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>

                                    <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="column-5">Rp.
                                <?php
                                $sub_total = $keranjang['price'] * $keranjang['qty'];
                                echo number_format($sub_total, '0', ',', '.');
                                ?>
                            </td>
                            <td>
                                <button type="submit" name="update" class="btn btn-outline-success btn-sm">
                                    <i class="fa fa-edit"></i> Update
                                </button>
                                <a href="<?php echo base_url('belanja/hapus/' . $keranjang['rowid']) ?>" class="btn btn-outline-danger btn-sm">
                                    <i class="fa fa-trash-o"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
                        echo form_close(); // End Form
                    } // End Looping keranjang belanja
                    ?>
                    <tr class="table-row bg1" style="font-weight: bold;">
                        <td colspan="4" class="column-1" style="color: white;">Total Belanja</td>
                        <td colspan="2" class="column-2" style="color: white;">Rp. <?php echo number_format($this->cart->total(), '0', ',', '.') ?> </td>
                    </tr>
                </table>
                <br>
                <p class="pull-right">
                    <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-success btn-sm">
                        <i class="fa fa-shopping-cart"></i> Checkout
                    </a>
                    &nbsp;
                    <a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash-o"></i> Bersihkan Keranjang
                    </a>&nbsp;&nbsp;
                </p>
            </div>
        </div>
        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
            </div>
        </div>
    </div>
    </div>
</section>