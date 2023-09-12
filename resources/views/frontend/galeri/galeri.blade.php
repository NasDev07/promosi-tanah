@extends('welcome')

@section('title', 'Galery')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs mt-5">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h1 class="f-bold mt-4">Galeri Kantor Pertanahan Kabupaten Aceh Timur</h1>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">        

        <div class="row portfolio-container mt-5" data-aos="fade-up">
            @foreach ($galery as $galeri)
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
        {{ $galery->withQueryString()->links() }}
    </div>
</section><!-- End Portfolio Section -->

@endsection
