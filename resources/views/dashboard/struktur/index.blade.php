@extends('layouts.admin_template')
@section('title', 'Struktur')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Struktur Organisasi /</span> List
        </h4>
        <div class="d-flex justify-content-between">
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                @include('notif')
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title text-primary">List Data</h5>

                                    <a href="{{ route('struktur.create') }}">
                                        <button class="btn btn-primary">Tambah</button>
                                    </a>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Struktur Organisasi</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($struktur as $post)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $post->image) }}"
                                                        class="img-preview img-fluid my-3 col-md-3 d-block">
                                                </td>
                                                <td>

                                                    <a href="{{ route('struktur.edit', $post->id) }}"
                                                        class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>

                                                    <form action="{{ route('struktur.destroy', $post->id) }}" method="POST"
                                                        class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="badge bg-danger border-0"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="bi bi-x-circle-fill"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ $struktur->withQueryString()->links() }}
        </div>
    </div>
@endsection
