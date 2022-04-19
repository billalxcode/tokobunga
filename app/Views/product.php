<?php

use App\Models\DiscountModel;

$discountsModel = new DiscountModel();
?>
<div class="container">
    <hr class="content-line">
    <section class="section-products" id="produk">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>
                        <h2>All Products</h2>
                    </div>
                </div>
            </div>
            <div class="w-100 d-flex">
                <form class="ms-auto">
                    <input type="text" name='s' value='<?= $search ?>' class="form-control rounded rounded-pill" placeholder="Find Product">
                </form>
            </div>
            <div class="row mt-2" id="cart-result">
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
                                    <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
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
        </div>
        <div class="w-100 d-flex">
            <div class="ms-auto">
                <?= $pager->links('page', 'bootstrap_pagination') ?>
            </div>
        </div>
    </section>
</div>