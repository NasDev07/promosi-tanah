@extends('layouts.admin_template')
@section('title', 'Produk')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Promosi Tanah /</span> Add
    </h4>
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="col-lg-8">
                                <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data"
                                    class="mt-5">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" required autofocus value="{{ old('title') }}">
                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>                                    

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Gambar 1</label>
                                        <img class="img-preview img-fluid my-3 col-md-3">
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
                                        <img class="img-preview1 img-fluid my-3 col-md-3">
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
                                        <img class="img-preview2 img-fluid my-3 col-md-3">
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
                                        <img class="img-preview3 img-fluid my-3 col-md-3">
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
                                        <img class="img-preview4 img-fluid my-3 col-md-3">
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
                                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                                        <trix-editor input="body"></trix-editor>
                                    </div>

                                    <div class="mt-3">
                                        <input type="submit" value="Tambah" id="save" name="save"
                                            class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
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
