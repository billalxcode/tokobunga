<?php

use App\Models\DiscountModel;

$discountsModel = new DiscountModel();
?>
<div class="splide mx-3" role="group" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
        <ul class="splide__list slider-image">
            <li class="splide__slide">
                <img src="https://www.orchid-florist.com/uploads/desktop/fd21988efd1b0b6d60879c061f04b883816a385c.jpg" alt="Corporate " class="slider-image">
            </li>
            <li class="splide__slide">
                <img src="https://www.orchid-florist.com/uploads/desktop/299cb868809dc07fbc93aaae5e3157e7b9cb39cd.jpg" alt="Wedding " class="slider-image">
            </li>
        </ul>
    </div>
</div>

<div class="container">
    <hr class="content-line">
    <div class="content-about align-content-center mb-5 mt-5" id="tentang">
        <img src="<?= base_url('img/mentahan Logo BELANJA BUNGA.png') ?>" alt="" data-aos="fade-up-right">
        <div class="about d-flex" data-aos="fade-down">
            <div class="mx-auto">
                <p>
                    " <b style="color: rgb(255, 80, 80);">Belanja Bunga</b> adalah Lorem ipsum dolor, sit amet
                    consectetur adipisicing elit. Placeat
                    voluptatem eaque fugit, necessitatibus blanditiis possimus, exercitationem atque dignissimos
                    numquam tenetur quaerat nemo pariatur officia corporis! Temporibus odit beatae commodi nisi? "
                </p>
            </div>
        </div>
    </div>
    <div class="banner text-center mt-5" data-aos="zoom-in-up">
        <img src="<?= base_url('img/banner bunga.jpg') ?>">
    </div>
    <section class="section-products" id="produk">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <!-- <h3>Featured Product</h3> -->
                        <h2>Produk terbaru</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $no = 1; ?>
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-<?= $no++ ?>" class="single-product">
                            <div class="part-1">
                                <?php if ($product['product_discount']) : ?>
                                    <?php
                                        $discountdata = $discountsModel->where('id', $product['product_discount'])->first();
                                        if ($discountdata): ?>
                                            <span class ="discount"><?= $discountdata['discount_percent'] ?>% off</span>

                                    <?php endif
                                    ?>
                                <?php endif ?>
                                <ul>
                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title"><?= $product['product_name'] ?></h3>
                                <h4 class="product-price">Rp <?= $product['product_price'] ?></h4>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="w-100 d-flex">
                <a href="/product" class="btn btn-pink text-white rounded rounded-pill ms-auto">Tampilkan Semua</a>
            </div>
        </div>
    </section>
</div>