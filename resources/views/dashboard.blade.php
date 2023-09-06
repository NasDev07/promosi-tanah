@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Dashbord</h5>
                                <p class="mb-4">
                                    <h4 class="fw-bold">Badan Pertanahan Nasional</h4>
                                </p>

                                <a href="{{ url('/') }}" class="btn btn-sm btn-outline-primary">Beranda</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/Logo_BPN.png" height="120"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scriptjs')
    <script></script>
@endpush
