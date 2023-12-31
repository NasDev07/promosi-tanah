<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Kantor Pertanahan Aceh Timur | @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('../assets/img/illustrations/Logo_BPN.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/assets/js/config.js') }}"></script>
    {{-- trix --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('/assets/js/trix.js') }}"></script>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    @vite([])
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('../assets/img/illustrations/Logo_BPN.png') }}" alt="" width="50">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">BPN</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item  @if (isset($menuDashbord)) {{ $menuDashbord }} @endif">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    {{-- @can('admin') --}}
                    @if (Auth::user()->is_admin == 1)
                        <li class="menu-header small text-uppercase">
                            <span class="menu-header-text">Pages Admin</span>
                        </li>
                        <li class="menu-item @if (isset($menuUsers)) {{ $menuUsers }} @endif">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Account Settings">Users</div>
                            </a>
                        </li>
                        <li class="menu-item @if (isset($menuPosts)) {{ $menuPosts }} @endif">
                            <a href="{{ route('posts.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Account Settings">Artikel</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('ListData') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Account Settings">List Data Penjual</div>
                            </a>
                        </li>
                        <li class="menu-item @if (isset($menuPesanTanah)) {{ $menuPesanTanah }} @endif">
                            <a href="{{ url('pesanTanah') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Account Settings">Pesan Tanah</div>
                            </a>
                        </li>
                        <li class="menu-item @if (isset($menuVisiMisi)) {{ $menuVisiMisi }} @endif">
                            <a href="{{ url('visi-misi') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Account Settings">Visi & Misi</div>
                            </a>
                        </li>
                        <li class="menu-item @if (isset($menuStruktur)) {{ $menuStruktur }} @endif">
                            <a href="{{ url('struktur') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Account Settings">Struktur Organisasi</div>
                            </a>
                        </li>
                        <li class="menu-item @if (isset($menuGaleri)) {{ $menuGaleri }} @endif">
                            <a href="{{ url('galeri') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Account Settings">Galeri</div>
                            </a>
                        </li>
                        <li class="menu-item @if (isset($menuKepala)) {{ $menuKepala }} @endif">
                            <a href="{{ url('kepala') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                <div data-i18n="Account Settings">Kepala</div>
                            </a>
                        </li>
                    @endif
                    {{-- @endcan --}}
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages User</span>
                    </li>
                    <li class="menu-item @if (isset($datauser)) {{ $datauser }} @endif">
                        <a href="{{ route('account.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div data-i18n="Account Settings">Data Diri</div>
                        </a>
                    </li>
                    <li class="menu-item @if (isset($menuProduk)) {{ $menuProduk }} @endif">
                        <a href="{{ route('produk.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div data-i18n="Account Settings">Promosi Tanah</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none"
                                    placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->
                        @auth
                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- Place this tag where you want the button to render. -->
                                <li class="nav-item lh-1 me-3">
                                    <strong>
                                        Welcome, {{ auth()->user()->name }}
                                    </strong>
                                </li>

                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                        data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="../assets/img/avatars/1.png" alt="avatar"
                                                class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <form onsubmit="return confirm('are you sore?')"
                                                action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="bx bx-power-off me-2"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">
                                    <i class="bi bi-box-arrow-in-right"></i> Login
                                </a>
                            </li>
                        @endauth
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                Zaidi
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                ,                                 
                            </div>                            
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    @method('scriptjs')
</body>

</html>
