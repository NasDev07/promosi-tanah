@extends('welcome')

@section('title', 'Visi & Misi')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs mt-5">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h1 class="f-bold mt-4">Visi & Misi</h1>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="blog" class="blog">
        <div class="container mt-3" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 entries">

                    @foreach ($visimisi as $visi)
                    <article class="entry entry-single">
                        {!! $visi->body !!}
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
