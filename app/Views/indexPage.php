<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.0/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('img/logo.png') ?>" alt="Logo" class="d-block" width="64" height="64">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link navbar-active" aria-current="page" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('category/papan-bunga') ?>">Papan bunga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('category/pengiriman') ?>">Pengiriman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('page/contact-us') ?>">Hubungi kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

    <div class="container mt-lg-3 section-products">
        <hr class="content-line">
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                <div class="product-card shadow">
                    <div class="product-header">
                        <span class="discount">15% off</span>
                        <img src="https://i.ibb.co/cLnZjnS/2.jpg" alt="" class="product-image">
                        <ul>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">Sepatu bola</h3>
                        <h4 class="product-old-price">Rp. 100.000,-</h4>
                        <h4 class="product-price">Rp. 50.000,-</h4>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.0/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.4.2/dist/js/splide-extension-auto-scroll.min.js"></script>

    <script>
        new Splide('.splide', {
            autoScroll: {
                speed: 2
            }
        }).mount();
    </script>
</body>

</html>