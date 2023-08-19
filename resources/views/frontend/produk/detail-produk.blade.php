@extends('welcome')

@section('title', 'Detail Produk')

@section('content')

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog mt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        {{-- <div class="entry-img"> --}}
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $produkShow->image) }}" class="d-block w-100"
                                        alt="{{ $produkShow->title }}">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $produkShow->image1) }}" class="d-block w-100"
                                        alt="{{ $produkShow->title }}">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $produkShow->image2) }}" class="d-block w-100"
                                        alt="{{ $produkShow->title }}">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $produkShow->image3) }}" class="d-block w-100"
                                        alt="{{ $produkShow->title }}">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $produkShow->image4) }}" class="d-block w-100"
                                        alt="{{ $produkShow->title }}">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        {{-- </div> --}}

                        <h2 class="entry-title mt-3">
                            {{ $produkShow->title }}
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{ $produkShow->author->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time
                                            datetime="{{ $produkShow->created_at->format('Y-m-d') }}">{{ $produkShow->created_at->format('M j, Y') }}</time></a>
                                </li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! $produkShow->body !!}
                            </p>
                        </div>

                    </article><!-- End blog entry -->
                </div>

                <div class="col-lg-4">

                    <div class="sidebar">
                        {{-- form pesan --}}
                        <h3 class="sidebar-title">Kirem Pesan Untuk Beli Tanah</h3>
                        {{-- @include('frontend.message.index') --}}                        
                        
                        <a class=" animated-button" href="{{ route('pesan.index', $produkShow->id) }}">
                            <span class="text fw-bold">Kirim Pesan <i class="bi bi-arrow-right"></i></span>
                            <span class="animation"></span>
                        </a>
                        
                        <style>
                            .animated-button {
                                position: relative;
                                display: inline-block;
                                overflow: hidden;                                
                            }
                        
                            .animated-button .text {
                                display: inline-block;
                                padding: 10px 20px;
                                font-size: 16px;
                                color: #fff;
                                background-color: #17a2b8;
                                border: none;
                                border-radius: 5px;
                                transition: background-color 0.3s ease, color 0.3s ease;
                            }
                        
                            .animated-button .animation {
                                position: absolute;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(255, 255, 255, 0.3);
                                top: 0;
                                left: -100%;
                                transform: translateX(0);
                                animation: moveAnimation 1.5s cubic-bezier(0.19, 1, 0.22, 1) infinite,
                                            blinkAnimation 1.5s ease-in-out infinite alternate;
                            }
                        
                            @keyframes moveAnimation {
                                0% {
                                    left: -100%;
                                    transform: translateX(0);
                                }
                                100% {
                                    left: 100%;
                                    transform: translateX(-100%);
                                }
                            }
                        
                            @keyframes blinkAnimation {
                                0%, 100% {
                                    opacity: 0.3;
                                }
                                50% {
                                    opacity: 1;
                                }
                            }
                        
                            .animated-button:hover .text {
                                background-color: #00d6f7;
                                color: #fff;
                            }
                        </style>
                        
                            
                    </div><!-- End sidebar -->
                    
                </div><!-- End blog sidebar -->
            </div>
    </section><!-- End Blog Single Section -->

@endsection
