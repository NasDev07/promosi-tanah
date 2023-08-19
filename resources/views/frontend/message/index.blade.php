<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <nav class="nav">
            <a class="nav-link active animated-button" aria-current="page" href="{{ route('promosi-tanah') }}"><i
                    class="bi bi-arrow-left"></i> Kembali</a>
        </nav>
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs mt-2">
            <div class="breadcrumb-hero">
                <div class="container">
                    <div class="breadcrumb-hero">
                        <h2 class="text-info">Persyaratan</h2>
                        <p>
                            Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia
                            voluptas
                            sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum
                            praesentium.
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->


        <div class="row mt-5 justify-content-center">
            <div class="col-lg-8 entries">
                <div class="card">
                    <div class="card-body shadow">
                        @include('notif')
                        {{-- <form action="{{ route('pesan.store') }}" method="post" class="php-email-form">
                            @csrf
                            <div class="row">
                                <h2 class="text-info">Kirim Pesan</h2>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="nomor_hp" id="nomor_hp"
                                    placeholder="Nomor Hp" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="sent-message">Form pesanan tanah impian anda</div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="save" name="save" class="btn btn-success">Kirim
                                    Pesan</button>
                            </div>
                        </form> --}}
                        <form action="{{ route('pesan.store') }}" method="post" class="php-email-form">
                            @csrf
                            <div class="row">
                                <h2 class="text-info">Kirim Pesan</h2>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="nomor_hp" id="nomor_hp"
                                    placeholder="Nomor Hp" required>
                            </div>                            
                            
                            <div class="form-group mt-3">
                                <label for="pilihan" class="form-label fw-bold">Pilih Nama Tanah Pesan tadi</label>
                                <select id="pilihan" class="select2 form-select" name="pilihan">                                    
                                    @foreach ($product as $item)                                    
                                        <option value="{{ $item->title }} | {{ $item->author->name }}" data-seller="{{ $item->seller_id }}" 
                                            {{ old('pilihan') == $item->title . ' | ' . $item->author->name ? 'selected' : '' }}>
                                            {{ $item->title }}, {{ $item->author->name }}                                                                                       
                                        </option>
                                        
                                    @endforeach
                                    

                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="sent-message">Form pesanan tanah impian anda</div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="save" name="save" class="btn btn-success">Kirim
                                    Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
