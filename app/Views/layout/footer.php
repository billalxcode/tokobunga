<div class="contact-wa text-dark d-flex" data-aos="fade-up-right" id="hub-kami">
    <div class="m-auto text-center" data-aos="fade-up-left">
        <h1 class="fw-bolder">Contact WhatsApp</h1>
        <p class="fw-normal">Kamu bisa langsung menghubungi kami untuk mengetahui apa yang kami jual !</p>
        <button class="btn btn-success rounded rounded-pill fw-bolder"><i class="fab fa-whatsapp"></i>
            WhatsApp</button>
    </div>
</div>
<!-- Site footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <h6>About</h6>
                <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis temporibus
                    sunt porro iure reiciendis magni alias facilis expedita dolorum, cupiditate commodi
                    exercitationem dolorem harum aspernatur quas necessitatibus delectus saepe veritatis?</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Categories</h6>
                <ul class="footer-links">
                    <?php foreach ($categories as $category) { ?>
                        <li><a href=""><?= $category['category_name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-xs-6 col-md-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.645042434485!2d112.0367740311271!3d-7.166968259643877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7786234fde8261%3A0x93366a78cf4c0f98!2sSPBU%20Pertamina%2054.621.02!5e0!3m2!1sid!2sid!4v1650023286555!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100"></iframe>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
                    <a href="#">Scanfcode</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.0/dist/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.4.2/dist/js/splide-extension-auto-scroll.min.js">
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.js' integrity='sha512-TsDUjQW16/G8fz4gmgTOBW2s2Oi6TPUtQ6/hm+TxZZdkQtQrK5xEFIE0rgDuz5Cl1xQU1u3Yer7K5IuuBeiCqw==' crossorigin='anonymous'></script>
<script>
    AOS.init({
        duration: 1300
    });
    new Splide('.splide', {
        autoScroll: {
            speed: 2
        }
    }).mount();

    document.addEventListener("DOMContentLoaded", function(event) {

        const cartButtons = document.querySelectorAll('.cart-button');
        cartButtons.forEach(button => {
            button.addEventListener('click', cartClick);
        });

        function cartClick() {
            let button = this;
            button.classList.add('clicked');
        }
    });
</script>
</body>

</html>