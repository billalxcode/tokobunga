<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.0/dist/css/splide.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js' integrity='sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==' crossorigin='anonymous'></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        <?php  $no = 1; 
        foreach ($products as $product) : ?>
        .section-products #product-<?= $no++ ?> .part-1::before {
            background: url("<?= $product['product_image'] ?>") no-repeat center;
            background-size: cover;
            transition: all 0.3s;
        }

        <?php endforeach ?>
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="<?= base_url('/img/mentahan Logo BELANJA BUNGA.png') ?>" alt="Logo" class="d-block" width="64" height="64">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <img src="<?= base_url('/img/menu.png') ?>" width="25" height="25">
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto text-center">
                    <a class="nav-link navbar-active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#tentang">Tentang</a>
                    <a class="nav-link" href="<?= base_url('produk') ?>">Produk</a>
                    <a class="nav-link" href="#hub-kami">Hubungi kami</a>
                </div>
            </div>
        </div>
    </nav>
