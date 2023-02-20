<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="footer-top">
        <!-- Footer Left -->
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <img src="assets/img/logo.png" alt="">
                        <span>BPS Banjarmasin</span>
                    </a>
                    <!-- Sosmed -->
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                    <!-- End Sosmed -->
                </div>

                <!-- Tautan -->
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Tautan BPS</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Tracking Laporan</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Hasil Sensus Penduduk</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Hasil Sensus Pertanian</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Hasil Sensus Ekonomi</a></li>
                    </ul>
                </div>
                <!-- Tautan -->

                <!-- Contact Us -->
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        @foreach ($identity as $item)
                            {{ $item->alamat }} <br>
                            {{ $item->kab }}, {{ $item->prov }}<br>
                            Indonesia <br><br>
                            <strong>Phone:</strong> {{ $item->telp }}<br>
                            <strong>Email:</strong> {{ $item->email }}<br>
                        @endforeach
                    </p>
                </div>
                <!-- End Contact -->

            </div>
        </div>
        <!-- End Footer Left -->
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Badan Pusat Statistik</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{!! asset('/assets/vendor/purecounter/purecounter_vanilla.js') !!}"></script>
<script src="{!! asset('/assets/vendor/aos/aos.js') !!}"></script>
<script src="{!! asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! asset('/assets/vendor/glightbox/js/glightbox.min.js') !!}"></script>
<script src="{!! asset('/assets/vendor/isotope-layout/isotope.pkgd.min.js') !!}"></script>
<script src="{!! asset('/assets/vendor/swiper/swiper-bundle.min.js') !!}"></script>
<script src="{!! asset('/assets/vendor/php-email-form/validate.js') !!}"></script>

<!-- Template Main JS File -->
<script src="{!! asset('/assets/js/main.js') !!}"></script>
<script src="{!! asset('/assets/js/index.js') !!}"></script>

</body>
<!-- End Body -->

</html>
