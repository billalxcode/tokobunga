<style>
    <?php $no = 1; ?><?php foreach ($products as $product) : ?>.section-products #product-<?= $no++ ?>.part-1::before {
        background: url("<?= $product['product_image'] ?>") no-repeat center;
        background-size: cover;
        transition: all 0.3s;
    }

    <?php endforeach; ?>
</style>