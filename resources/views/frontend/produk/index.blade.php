@extends('welcome')

@section('title', 'Promosi Tanah')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs mt-5">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h1 class="mt-4">Promosi Tanah Anda</h1>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->
    {{-- Blog --}}
    <section id="blog" class="blog mt-5">
        <div class="container" data-aos="fade-up">
            {{-- Search --}}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="search-form">
                        <form action="" method="GET">
                            <div class="input-group">
                                <input class="form-control" type="text" name="keyword" placeholder="Cari...">
                                <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                @forelse ($dataPost as $item)
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
            <div class="justify-content-center">
                {{ $dataPost->links() }}
            </div>
        </div><!-- End container -->
    </section>
@endsection
