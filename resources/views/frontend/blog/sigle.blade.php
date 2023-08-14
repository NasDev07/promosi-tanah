@extends('welcome')

@section('title', 'Sigle Blog')

@section('content')

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog mt-5">
        <div class="container mt-5" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{ asset('storage/'.$postShow->image) }}" alt="{{ $postShow->title }}" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            {{ $postShow->title }}
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{ $postShow->author->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time datetime="{{ $postShow->created_at->format('Y-m-d') }}">{{ $postShow->created_at->format('M j, Y') }}</time></a></li>                                
                            </ul>
                        </div>

                        <div class="entry-content">                            
                            <p>
                                {!! $postShow->body !!}
                            </p>
                        </div>
                        
                    </article><!-- End blog entry -->
                </div>

                <div class="col-lg-4">

                    <div class="sidebar">                        
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
    </section><!-- End Blog Single Section -->

@endsection
