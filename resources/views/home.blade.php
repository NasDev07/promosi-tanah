@extends('welcome')

@section('title', 'Home')

@section('content')

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/profil/slide.jpg') }}" class="d-block w-100" alt="..."
                    style="
                    width: 200px;
                    height: 500px;
                    object-fit: cover;
                    object-position: 20% 10%;                    
                ">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/profil/slide1.jpeg') }}" alt="..." class="d-block w-100" 
                style="
                    width: 200px;
                    height: 500px;
                    object-fit: cover;
                    object-position: 20% 10%;                    
                ">
            </div>            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row justify-content-end">
                <div class="col-lg-11">
                    {{-- Selamat Datang --}}
                    <marquee onmouseover="this.stop()" onmouseout="this.start()">
                        <div class="teks_berjalan">
                            <span class="fw-medium mt-3">Selamat Datang di Website Sistem Informasi Desa Padang Sakti Kecamatan Muara Satu
                                Kabupaten Kota Lhokseumawe Membangun Web Desa Bertujuan Sebagai Wadah Bagian Dari Sistem Informasi Desa
                                Yang Berfungsi Sebagai Portal Informasi Dan Transparansi | Kantor Desa Padang Sakti membuka pelayanan
                                publik pada hari Senin - Jumat pukul  08.00 - 16:00 WIB
                            </span>
                        </div>
                    </marquee>
                    <div class="row justify-content-end">

                        <div class="col-lg-4 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="65" class="purecounter">0</span>
                                <p>Happy Clients</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <i class="bi bi-journal-richtext"></i>
                                <span data-purecounter-start="0" data-purecounter-end="85" class="purecounter">0</span>
                                <p>Jumlah User</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box pb-5 pt-0 pt-lg-5">
                                <i class="bi bi-clock"></i>
                                <span>08:00 - 16:00</span>
                                <p>Jam Kerja</p>
                            </div>
                        </div>                        

                    </div>
                </div>
            </div>        
        </div>
    </section><!-- End About Section -->        


@endsection
