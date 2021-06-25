<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/template/images/produk.png') ?>)">
    <h2 class="l-text2 t-center" style="color: black">
        <?php echo $title ?>
    </h2>
    <p class="m-text13 t-center" style="color: black">
        <?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
    </p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Kategori Produk
                    </h4>

                    <ul class="p-b-54">
                        <?php foreach ($listing_kategori as $listing_kategori) { ?>
                            <li class="p-t-4">
                                <a href="<?php echo base_url('produk/kategori/' . $listing_kategori->slug_kategori) ?>" class="s-text13 active1">
                                    <?php echo $listing_kategori->nama_kategori; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>


                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!-- Product -->
                <div class="row">
                    <?php foreach ($produk as $produk) { ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <?php
                            // Form untuk proses belanja
                            echo form_open(base_url('belanja/add'));
                            // Elemen yang dibawa
                            echo form_hidden('id', $produk->id_produk);
                            echo form_hidden('qty', 1);
                            // Jika ada diskon
                            if (strtotime($produk->tanggal_mulai_diskon) <= strtotime(date('Y-m-d')) && strtotime($produk->tanggal_selesai_diskon) >= strtotime(date('Y-m-d'))) {
                                echo form_hidden('price', $produk->harga_diskon);
                            } else {
                                // Harga Tanpa Diskon
                                echo form_hidden('price', $produk->harga);
                            }
                            echo form_hidden('name', $produk->nama_produk);
                            // Elemen Redirect
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); //Fungsinya setelah tambah belanjaan maka balik kehalaman yang sedang di akses.
                            ?>
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative <?php if (strtotime($produk->tanggal_mulai_diskon) <= strtotime(date('Y-m-d')) && strtotime($produk->tanggal_selesai_diskon) >= strtotime(date('Y-m-d'))) { ?> block2-labelsale <?php } else {
                                                                                                                                                                                                                                                                            echo 'block2-labelnew';
                                                                                                                                                                                                                                                                        } ?>">
                                    <img src="<?php echo base_url('assets/upload/image/' . $produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="<?php echo base_url('produk/detail/' . $produk->slug_produk) ?>" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <i class="fa fa-eye dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button Belanja -->
                                            <button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="<?php echo base_url('produk/detail/' . $produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
                                        <?php echo $produk->nama_produk ?>
                                    </a>
                                    <?php if (strtotime($produk->tanggal_mulai_diskon) <= strtotime(date('Y-m-d')) && strtotime($produk->tanggal_selesai_diskon) >= strtotime(date('Y-m-d'))) { ?>
                                        <span class="block2-oldprice m-text7 p-r-5">
                                            Rp. <?php echo number_format($produk->harga, '0', ',', '.') ?>
                                        </span>
                                        <span class="block2-newprice m-text8 p-r-5">
                                            Rp. <?php echo number_format($produk->harga_diskon, '0', ',', '.') ?>
                                        </span>
                                    <?php } else { ?>
                                        <span class="block2-price m-text6 p-r-5">
                                            Rp. <?php echo number_format($produk->harga, '0', ',', '.') ?>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Closing form -->
                            <?php echo form_close(); ?>
                        </div>
                        <!-- Tutup foreach -->
                    <?php } ?>


                </div>

                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-t-26">
                    <div class="pagination">
                        <?php echo $pagin; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>