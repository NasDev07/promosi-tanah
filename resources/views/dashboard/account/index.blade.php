@extends('layouts.admin_template')
@section('title', 'Account')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> My Account</h4>
        @include('notif')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <form id="formAccountSettings" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-header">Profile Details</h5>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('storage/' . ($data->image ?? '')) }}"
                                    alt="{{ $data->author->name ?? '' }}" class="img-preview d-block rounded" height="100%"
                                    width="100" id="uploadedAvatar" />

                                <div class="button-wrapper">
                                    <label for="image" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="image" name="image"
                                            value="{{ old('image', $data->image ?? '') }}" class="account-file-input" hidden
                                            accept="{{ asset('storage/' . ($data->image ?? '')) }}"
                                            onchange="proviewImage()" required />
                                    </label>
                                    <p class="text-muted mb-0">Allowed JPG, PNG. Max size of 800K</p>
                                    <p class="text-muted mb-0">Ukuran Resolusi : 1500 x 1500 pixels</p>
                                    <p class="text-muted mb-0">Tampilan dilayar : 644 x 644 pixels</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bi bi-person"></i> </span>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ old('name', $data->author->name ?? '') }}" placeholder="Name"
                                            disabled />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bi bi-envelope-at"></i> </span>
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="john.doe@example.com"
                                            value="{{ old('email', $data->author->email ?? '') }}" disabled />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lokasi" class="form-label">lokasi</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i> </span>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi"
                                            placeholder="lokasi" value="{{ old('lokasi', $data->lokasi ?? '') }}"
                                            required />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="noHp">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bi bi-noHp"></i> </span>
                                        <input type="number" id="noHp" name="noHp" class="form-control"
                                            placeholder="0822-6742-9797" value="{{ old('noHp', $data->noHp ?? '') }}"
                                            required />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i> </span>
                                        <select id="jenis_kelamin" class="select2 form-select" name="jenis_kelamin">
                                            <option value="">Select Language</option>
                                            <option value="laki-laki"
                                                {{ old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'laki-laki' ? 'selected' : '' }}
                                                required>
                                                Laki-Laki</option>
                                            <option value="perempuan"
                                                {{ old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'perempuan' ? 'selected' : '' }}
                                                required>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ asset('storage/' . ($data->foto_ktp ?? '')) }}"
                                            alt="{{ $data->author->name ?? '' }}" class="img-previeww d-block rounded"
                                            height="100%" width="80%" id="uploadedAvatar" />

                                    </div>
                                    <div class="button-wrapper mt-2">
                                        <label for="foto_ktp" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo KTP</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="foto_ktp" name="foto_ktp"
                                                value="{{ old('foto_ktp', $data->foto_ktp ?? '') }}"
                                                class="account-file-input" hidden
                                                accept="{{ asset('storage/' . ($data->foto_ktp ?? '')) }}"
                                                onchange="proviewKtp()" required />
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">Tentang Anda</label>
                                    <input id="body" type="hidden" name="body" value="{{ old('body', $data->body ?? '') }}" placeholder="Tentang Anda" required/>
                                    <trix-editor input="body">
                                        <div disabled>Apakah Anda setuju membawa Syarat berikut ke kantor BPN: </div>
                                        <ul>
                                            <li>Sertifikat Tanah</li>
                                            <li>KTP</li>
                                            <li>Kartu Keluarga</li>
                                            <li>Surat Pernyataan Tanah dalam sengketa</li>
                                        </ul>
                                    </trix-editor>
                                    <div class="mb-3 form-check mt-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Setuju</label>
                                    </div>
                                </div>
                                
                                

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-outline-primary me-2" id="save"
                                        name="save">
                                        Lengkapi Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <h5 class="card-header">Delete Data</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Jika mau ubah data silahkan di hapus dan isi kembali
                                </h6>
                                <p class="mb-0">Mohon maaf atas layana kami 😊.
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('account.destroy', $data->id ?? '') }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger deactivate-account"
                                onclick="return confirm('Are you sure?')">Hapus Data</button>
                        </form>
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

        function proviewKtp() {
            const image = document.querySelector('#foto_ktp');
            const imgPreview = document.querySelector('.img-previeww');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>
@endsection
