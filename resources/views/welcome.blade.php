<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Promosi | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets_user/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets_user/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets_user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_user/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets_user/css/style.css') }}" rel="stylesheet">
    @vite([])
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <img src="{{ asset('assets/img/logo/Logo_BPN.png') }}" alt="Logo_BPN" width="115%">
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets_user/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active" href="{{ url('/') }}">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('visimisi') }}">Visi Misi</a></li>
                            <li><a href="{{ url('struktur-organisasi') }}">Struktur Organisasi</a></li>
                            <li><a href="team.html">Profil Kepala Kantor</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('promosi-tanah') }}">Promosi Tanah Anda</a></li>
                    <li><a href="{{ url('blog') }}">Berita</a></li>

                    <li>
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0">
                                @auth
                                    <a class="getstarted" href="{{ route('dashboard') }}">Dashboard</a>
                                @else
                                    <a class="getstarted" href="{{ route('login') }}">Login
                                    </a>
                                    {{-- <a href="">|</a> --}}
                                    @if (Route::has('register'))
                                        {{-- <a href="{{ route('register') }}">Register</a> --}}
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    @yield('content')


    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>GEDUNG KAMI</h3>
                        <p>Komplek Pusat Pemerintahan Aceh Timur, Jl. Medan Banda Aceh, Km. 370, Seuneubok Teungoh PP,
                            Idi Rayeuk, Kode Pos 24442</p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Menu</h4>
                        <ul>
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>HUBUNGI KAMI</h4>
                        <p>
                            Komplek Pusat Pemerintahan Aceh Timur, Jl. Medan Banda Aceh, Km. 370, Seuneubok Teungoh PP,
                            Idi Rayeuk, Kode Pos 24442
                            <br><br>
                            <strong>Phone:</strong> 0646-7020761<br>
                            <strong>Email:</strong> kantahacehtimur@gmail.com<br>
                        </p>

                        <p class="mt-4">
                            <h4>IKUTI KAMI</h4>
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <iframe style="border:0; width: 100%; height: 170px;"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                            frameborder="0" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Badan Pertanahan Nasional 2023</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/serenity-bootstrap-corporate-template/ -->
                Designed by <a href="https://bootstrapmade.com/">zahidi</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets_user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets_user/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets_user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_user/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets_user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_user/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets_user/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets_user/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets_user/js/main.js') }}"></script>

</body>

</html>
