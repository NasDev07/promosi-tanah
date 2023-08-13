@extends('layouts.admin_template')
@section('title', 'Data User')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Penjual /</span> Data User</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Data Penjual</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Profil</th>
                            <th>Email</th>
                            <th>Persyaratan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($listdata as $data)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $data->author->name }}</strong>
                                </td>
                                <td>{{ $data->noHp }}
                                    <span class="badge bg-label-info me-1">
                                        <a target="_black"
                                            href="https://wa.me/082288715038?text=Assalamualaikum%20%20atas%20nama%20{{ $data->author->name }}%20meinformasikan%20bahwa%20Tanah%20anda%20ada%20yang%20beli%20silahkan%20persiapkan%20Berkas.%0A%0ATerima%20kasih."><i
                                                class="bi bi-whatsapp"></i></a>
                                    </span>
                                </td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title=""
                                            data-bs-original-title="{{ $data->author->name }}">
                                            <img src="{{ asset('storage/' . $data->image) }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td>{{ $data->author->email }}</td>
                                <td>
                                    <span class="badge bg-label-success me-1">Setuju</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exLargeModal_{{ $data->id }}">
                                        Detail
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>


    {{-- detail --}}
    @foreach ($listdata as $data)
        <div class="modal fade" id="exLargeModal_{{ $data->id }}" tabindex="-1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">Detail Penjual Tanah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Persyaratan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $data->author->name }}</strong>
                                    </td>
                                    <td>{{ $data->noHp }}
                                        <span class="badge bg-label-info me-1">
                                            <a target="_black"
                                                href="https://wa.me/082288715038?text=Assalamualaikum%20%20atas%20nama%20{{ $data->author->name }}%20meinformasikan%20bahwa%20Tanah%20anda%20ada%20yang%20beli%20silahkan%20persiapkan%20Berkas.%0A%0ATerima%20kasih."><i
                                                    class="bi bi-whatsapp"></i></a>
                                        </span>
                                    </td>
                                    <td>
                                        {{ $data->lokasi }}
                                    </td>
                                    <td>{{ $data->author->email }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>
                                        <span class="badge bg-label-success me-1">Setuju</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $data->image) }}" alt="User Avatar"
                                    class="rounded img-fluid">
                                <p class="text-primary mt-4">Pass Foto</p>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $data->foto_ktp) }}" alt="User KTP"
                                    class="rounded img-fluid">
                                    <p class="text-primary mt-4">Foto KTP</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
