@extends('welcome')

@section('title', 'Home')

@section('content')

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets_user/img/profil/slide.jpg') }}" class="d-block w-100" alt="..."
                    style="
                    width: 200px;
                    height: 500px;
                    object-fit: cover;
                    object-position: 20% 10%;                    
                ">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets_user/img/profil/slide1.jpeg') }}" alt="..." class="d-block w-100"
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
                            <span class="fw-medium mt-3">Selamat Datang di Website Sistem Informasi Desa Padang Sakti
                                Kecamatan Muara Satu
                                Kabupaten Kota Lhokseumawe Membangun Web Desa Bertujuan Sebagai Wadah Bagian Dari Sistem
                                Informasi Desa
                                Yang Berfungsi Sebagai Portal Informasi Dan Transparansi | Kantor Desa Padang Sakti membuka
                                pelayanan
                                publik pada hari Senin - Jumat pukul 08.00 - 16:00 WIB
                            </span>
                        </div>
                    </marquee>
                    <div class="row justify-content-end">

                        <div class="col-lg-4 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $visitorCount }}"
                                    class="purecounter">0</span>
                                <p>Happy Clients</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <i class="bi bi-journal-richtext"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $userCount }}"
                                    class="purecounter">0</span>
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

    {{-- Produk Tanah --}}
    <section id="blog" class="blog ">
        <div class="container" data-aos="fade-up">
            <h4 class="fw-bold text-center">Informasi Tanah Terbaru</h4>
            <a href="{{ url('promosi-tanah') }}" class="d-flex justify-content-end fw-bold text-primary">Tanah Lain <i
                    class="bi bi-arrow-right"></i> </a>
            <div class="row">
                @forelse ($produkTanah as $item)
                    <div class="col-lg-4 mb-4">
                        <article class="entry">
                            <div class="entry-img">
                                @if ($item->image)
                                    <div style="max-height: 300px; overflow:hidden;">
                                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                            alt="{{ $item->title }}" class="img-fluid " width="100%">
                                    </div>
                                @else
                                    <img src="{{ asset('/img/background-blog.jpg') }}" alt="Avatar" width="100%">
                                @endif
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#">{{ $item->author->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="#"><time
                                                datetime="{{ $item->created_at->format('Y-m-d') }}">{{ $item->created_at->format('M j, Y') }}</time></a>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="entry-title">
                                <a href="{{ route('promosi-tanah.show', $item->title) }}">
                                    {{ \Illuminate\Support\Str::limit($item->title, $limit = 28, $end = '...') }}
                                </a>
                            </h2>
                            <div class="entry-content">
                                <div class="read-more">
                                    <a href="{{ route('promosi-tanah.show', $item->title) }}">Detil</a>
                                </div>
                            </div>
                        </article><!-- End blog entry -->
                    </div><!-- End col-lg-4 -->
                @empty
                    <div class="page-wrap d-flex flex-row align-items-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <p>Belum ada data</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div><!-- End row -->
        </div><!-- End container -->
    </section>

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog ">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <h4 class="fw-bold text-center">Berita Terbaru</h4>
                <!-- Kolom Pertama -->
                <div class="col-lg-6 entries">
                    @foreach ($berita as $key => $item)
                        @if ($key === 0)
                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="{{ route('sigle-blog.show', $item->title) }}">{{ $item->title }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="#">{{ $item->author->name }}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="#"><time
                                                    datetime="{{ $item->created_at->format('Y-m-d') }}">{{ $item->created_at->format('M j, Y') }}</time></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {{ $item->excerpt }}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{ route('sigle-blog.show', $item->title) }}">Selengkapnya</a>
                                    </div>
                                </div>
                            </article><!-- End blog entry -->
                        @endif
                    @endforeach
                </div><!-- End Kolom Pertama -->

                <!-- Kolom Kedua -->
                <div class="col-lg-6 entries">
                    <a href="{{ url('blog') }}" class="text-primary fw-bold">Berita Lainnya <i
                            class="bi bi-arrow-right"></i></a>
                    @foreach ($berita as $key => $item)
                        @if ($key !== 0)
                            <article class="entry mt-3">
                                <h2 class="entry-title">
                                    <a href="{{ route('sigle-blog.show', $item->title) }}">{{ $item->title }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="#">{{ $item->author->name }}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="#"><time
                                                    datetime="{{ $item->created_at->format('Y-m-d') }}">{{ $item->created_at->format('M j, Y') }}</time></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {{ $item->excerpt }}
                                    </p>
                                    <div class="read-more">
                                        <a href="{{ route('sigle-blog.show', $item->title) }}">Selengkapnya</a>
                                    </div>
                                </div>
                            </article><!-- End blog entry -->
                        @endif
                    @endforeach
                </div><!-- End Kolom Kedua -->

            </div><!-- End row -->
        </div><!-- End container -->
    </section><!-- End Blog Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
                    <a href="{{ url('pagegaleri') }}" class="btn btn-primary fw-bold">
                        All
                    </a>
                </div>
            </div>

            <div class="row portfolio-container mt-3" data-aos="fade-up">
                @foreach ($galeri as $galeri)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ 'storage/' . $galeri->image }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <p>{{ $galeri->title }}</p>
                                <div class="portfolio-links">
                                    <a href="{{ 'storage/' . $galeri->image }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="{{ $galeri->title }}"><i
                                            class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

@endsection
