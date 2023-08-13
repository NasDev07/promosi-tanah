@extends('layouts.admin_template')
@section('title', 'Produk')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Promosi Tanah</h4>

        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('failed'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Edit Data</h5>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('produk.update', $produk->id) }}" class="mt-5"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Input Title" aria-describedby="defaultFormControlHelp"
                                        value="{{ $produk->title }}">
                                    @error('title')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>                                                                
                                
                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar 1</label>
                                    <input type="hidden" name="oldImage" value="{{ $produk->image }}">
                                    @if ($produk->image)
                                        <img src="{{ asset('storage/' . $produk->image) }}"
                                            class="img-preview img-fluid my-3 col-md-3 d-block">
                                    @else
                                        <img class="img-preview img-fluid my-3 col-md-3">
                                    @endif
                                    <input class="form-control  @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" value="{{ old('image') }}"
                                        onchange="proviewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image1" class="form-label">Gambar 2</label>
                                    <input type="hidden" name="oldImage" value="{{ $produk->image1 }}">
                                    @if ($produk->image1)
                                        <img src="{{ asset('storage/' . $produk->image1) }}"
                                            class="img-preview1 img-fluid my-3 col-md-3 d-block">
                                    @else
                                        <img class="img-preview1 img-fluid my-3 col-md-3">
                                    @endif
                                    <input class="form-control  @error('image1') is-invalid @enderror" type="file"
                                        id="image1" name="image1" value="{{ old('image1') }}"
                                        onchange="proviewImage1()">
                                    @error('image1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image2" class="form-label">Gambar 3</label>
                                    <input type="hidden" name="oldImage" value="{{ $produk->image2 }}">
                                    @if ($produk->image2)
                                        <img src="{{ asset('storage/' . $produk->image2) }}"
                                            class="img-preview2 img-fluid my-3 col-md-3 d-block">
                                    @else
                                        <img class="img-preview2 img-fluid my-3 col-md-3">
                                    @endif
                                    <input class="form-control  @error('image2') is-invalid @enderror" type="file"
                                        id="image2" name="image2" value="{{ old('image2') }}"
                                        onchange="proviewImage2()">
                                    @error('image2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image3" class="form-label">Gambar 4</label>
                                    <input type="hidden" name="oldImage" value="{{ $produk->image3 }}">
                                    @if ($produk->image3)
                                        <img src="{{ asset('storage/' . $produk->image3) }}"
                                            class="img-preview3 img-fluid my-3 col-md-3 d-block">
                                    @else
                                        <img class="img-preview3 img-fluid my-3 col-md-3">
                                    @endif
                                    <input class="form-control  @error('image3') is-invalid @enderror" type="file"
                                        id="image3" name="image3" value="{{ old('image3') }}"
                                        onchange="proviewImage3()">
                                    @error('image3')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image4" class="form-label">Gambar 5</label>
                                    <input type="hidden" name="oldImage" value="{{ $produk->image4 }}">
                                    @if ($produk->image4)
                                        <img src="{{ asset('storage/' . $produk->image4) }}"
                                            class="img-preview4 img-fluid my-3 col-md-3 d-block">
                                    @else
                                        <img class="img-preview4 img-fluid my-3 col-md-3">
                                    @endif
                                    <input class="form-control  @error('image4') is-invalid @enderror" type="file"
                                        id="image4" name="image4" value="{{ old('image4') }}"
                                        onchange="proviewImage4()">
                                    @error('image4')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">Keterangan</label>
                                    @error('body')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input id="body" type="hidden" name="body"
                                        value="{{ old('body', $produk->body) }}">
                                    <trix-editor input="body"></trix-editor>
                                </div>

                                <div class="mt-3">
                                    <input type="submit" value="Update" id="save" name="save"
                                        class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function proviewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
        function proviewImage1() {
            const image = document.querySelector('#image1');
            const imgPreview = document.querySelector('.img-preview1');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
        function proviewImage2() {
            const image = document.querySelector('#image2');
            const imgPreview = document.querySelector('.img-preview2');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
        function proviewImage3() {
            const image = document.querySelector('#image3');
            const imgPreview = document.querySelector('.img-preview3');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
        function proviewImage4() {
            const image = document.querySelector('#image4');
            const imgPreview = document.querySelector('.img-preview4');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>
@endsection
