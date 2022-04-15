<?php

use App\Models\CategoryModel;
use App\Models\DiscountModel;

function findDiscount($id) {
    $discountModel = new DiscountModel();
    $discountData = $discountModel->where("id", $id)->first();
    if ($discountData) {
        return $discountData['discount_percent'] . "%";
    } else {
        return "Tidak diketahui";
    }
}

function findCategory($id) {
    $categoryModel = new CategoryModel();
    $categoryData = $categoryModel->where("id", $id)->first();
    if ($categoryData) {
        return $categoryData['category_name'];
    } else {
        return "Tidak diketahui";
    }
}

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= count($products) ?></h3>
                            <p>Jumlah produk</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= count($categories) ?></h3>
                            <p>Jumlah Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= count($discounts) ?></h3>
                            <p>Jumlah diskon</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Produk terbaru</h4>
                        </div>
                        <div class="card-body">
                            <table id="products" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1;
                                    if (count($products) > 5) {
                                        $products = array_slice($products, 5);
                                    }
                                    foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?= $index++ ?></td>
                                            <td><img src="<?= $product['product_image'] ?>" alt="Gambar produk" class="thumbnail" style="width:64px;height:64px;"></td>
                                            <td><?= $product['product_name'] ?></td>
                                            <td><?= $product['product_description'] ?></td>
                                            <td><?= findCategory($product['product_category']) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    $(function() {
        $('#table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "responsive": true,
        });
    });
</script>