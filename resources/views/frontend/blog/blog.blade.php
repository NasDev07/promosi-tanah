@extends('welcome')

@section('title', 'Blog')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs mt-5">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h1 class="f-bold mt-4">Berita</h1>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog mt-3">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    @foreach ($post as $item)
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
                    @endforeach

                    <div class="justify-content-center">
                        {{ $post->links() }}
                    </div>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        {{-- Search --}}
                        <div class="sidebar-item search-form">
                            <form action="" method="GET">
                                <input type="text" name="keyword" placeholder="Cari...">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Recent Posts</h3>
                        @foreach ($postSlider as $item)
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                    <h4><a href="{{ route('sigle-blog.show', $item->title) }}">{{ $item->title }}</a></h4>
                                    <time
                                        datetime="{{ $item->created_at->format('Y-m-d') }}">{{ $item->created_at->format('M j, Y') }}</time>
                                </div>
                            </div><!-- End sidebar recent posts-->
                        @endforeach

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

@endsection
