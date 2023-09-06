@extends('welcome')

@section('title', 'Profil Kepala')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs mt-5">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h1 class="f-bold mt-4">Kepala Kantor</h1>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="team" class="team mt-3">
        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member aos-init aos-animate" data-aos="fade-up">
                        <div class="member-img">
                            <img src="assets_user/img/team/team-1.jpg" class="img-fluid rounded" alt="">                            
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4>                            
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
