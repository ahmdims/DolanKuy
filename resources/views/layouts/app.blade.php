<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes":{"layout": "boxed"}}'>

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title') - DolanKuy</title>
    <meta name="description" content="@yield('title')" />

    <link href="{{ asset('img/favicon/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/favicon/favicon.png') }}" rel="apple-touch-icon">

    <meta property="og:image" content="{{ asset('img/banner/dolankuy.jpg') }}">
    <meta name="keywords"
        content="DolanKuy, Malang, Malang City, Kota Malang, budaya, pariwisata, UMKM, kuliner, Indonesia, Jawa Timur" />
    <meta name="author" content="DigitalDream">

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="{{ asset('font/CS-Interface/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/glide.core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/introjs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/plyr.css') }}" />
    <script src="{{ asset('js/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/baguetteBox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.standalone.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <script src="{{ asset('js/base/loader.js') }}"></script>

    @if (isset($detail) && !empty($detail->style))
        <style>
            {{ $detail->style }}
        </style>
    @endif

</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex">
            <div class="nav-content d-flex">
                <div class="logo position-relative">
                    <a href="{{ asset('/') }}">
                        <div class="img"></div>
                    </a>
                </div>

                <div class="user-container d-flex">

                    @guest
                        <a class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="profile" alt="profile" src="{{ asset('img/profile/profile.svg') }}" />
                            <div class="name">Daftar</div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end user-menu wide">
                            <div class="row mb-1 ms-0 me-0">
                                <div class="col-6 ps-1 pe-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="{{ route('login') }}">
                                                <i data-acorn-icon="login" class="icon" data-acorn-size="18"></i>
                                                <span class="align-middle">Masuk</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-6 pe-1 ps-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="{{ route('register') }}">
                                                <i data-acorn-icon="note" class="icon" data-acorn-size="18"></i>
                                                <span class="align-middle">Daftar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    @endguest

                    @auth
                        <a class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="profile"
                                src="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile) : asset('img/profile/profile.webp') }}" />
                            <div class="name">{{ Auth::user()->name }}</div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end user-menu wide">
                            <div class="row mb-1 ms-0 me-0">
                                <div class="col-6 ps-1 pe-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="{{ route('profile.index', Auth::user()->username) }}">
                                                <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                                                <span class="align-middle">Profil</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-6 pe-1 ps-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('frmlogout').submit();">
                                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                                <span class="align-middle">Keluar</span>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="frmlogout"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endauth

                </div>

                <ul class="list-unstyled list-inline text-center menu-icons">
                    <li class="list-inline-item">
                        <a id="pinButton" class="pin-button">
                            <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                            <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a id="colorButton">
                            <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                            <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
                        </a>
                    </li>
                </ul>

                <div class="menu-container flex-grow-1">
                    <ul id="menu" class="menu">
                        <li>
                            <a href="{{ asset('/') }}">
                                <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
                                <span class="label">Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('destination') }}">
                                <i data-acorn-icon="plane" class="icon" data-acorn-size="18"></i>
                                <span class="label">Wisata</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('msme') }}">
                                <i data-acorn-icon="shop" class="icon" data-acorn-size="18"></i>
                                <span class="label">UMKM</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('culture') }}">
                                <i data-acorn-icon="books" class="icon" data-acorn-size="18"></i>
                                <span class="label">Budaya</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('contact') }}">
                                <i data-acorn-icon="phone" class="icon" data-acorn-size="18"></i>
                                <span class="label">Kontak</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('faq') }}">
                                <i data-acorn-icon="info-circle" class="icon" data-acorn-size="18"></i>
                                <span class="label">Bantuan</span>
                            </a>
                        </li>

                        @auth
                            @isset(Auth::user()->utype)
                                @if (Auth::user()->utype === 'superadmin')
                                    <li>
                                        <a href="#admin">
                                            <i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                                            <span class="label">Kelola Admin</span>
                                        </a>
                                        <ul id="admin">
                                            <li>
                                                <a href="{{ url('admin/destination') }}">
                                                    <span class="label">Kelola Wisata</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/msme') }}">
                                                    <span class="label">Kelola UMKM</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/culture') }}">
                                                    <span class="label">Kelola Budaya</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/tourist') }}">
                                                    <span class="label">Kelola Pengunjung</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/website') }}">
                                                    <span class="label">Kelola Website</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/faq') }}">
                                                    <span class="label">Kelola Bantuan</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            @endisset
                        @endauth

                    </ul>
                </div>

                <div class="mobile-buttons-container">
                    <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                        <i data-acorn-icon="menu-dropdown"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>

                    <a href="#" id="mobileMenuButton" class="menu-button">
                        <i data-acorn-icon="menu"></i>
                    </a>
                </div>
            </div>
            <div class="nav-shadow"></div>
        </div>

        <main>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
            @endif

            @yield('content')
        </main>

        <footer>
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <p class="mb-0 text-muted text-medium">karya DigitalDream
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                            </p>
                        </div>
                        <div class="col-sm-6 d-none d-sm-block">
                            <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                                <li class="breadcrumb-item mb-0 text-medium">
                                    <a href="mailto:digitaldream320@gmail.com" target="_blank" class="btn-link">
                                        <i data-acorn-icon="email" class="text-primary me-1"
                                            data-acorn-size="15"></i>
                                        Email
                                    </a>
                                </li>
                                <li class="breadcrumb-item mb-0 text-medium">
                                    <a href="https://www.instagram.com/digitalndream" target="_blank"
                                        class="btn-link">
                                        <i data-acorn-icon="instagram" class="text-primary me-1"
                                            data-acorn-size="15"></i>
                                        Instagram
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Vendor Scripts Start -->
    <script src="{{ asset('js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('js/vendor/autoComplete.min.js') }}"></script>
    <script src="{{ asset('js/vendor/clamp.min.js') }}"></script>
    <script src="{{ asset('js/vendor/datatables.min.js') }}"></script>

    <script src="{{ asset('icon/acorn-icons.js') }}"></script>
    <script src="{{ asset('icon/acorn-icons-interface.js') }}"></script>
    <script src="{{ asset('icon/acorn-icons-commerce.js') }}"></script>
    <script src="{{ asset('icon/acorn-icons-learning.js') }}"></script>

    <script src="{{ asset('js/vendor/movecontent.js') }}"></script>
    <script src="{{ asset('js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ asset('js/vendor/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('js/vendor/chartjs-plugin-datalabels.js') }}"></script>

    <script src="{{ asset('js/vendor/chartjs-plugin-rounded-bar.min.js') }}"></script>

    <script src="{{ asset('js/vendor/glide.min.js') }}"></script>

    <script src="{{ asset('js/vendor/intro.min.js') }}"></script>

    <script src="{{ asset('js/vendor/select2.full.min.js') }}"></script>

    <script src="{{ asset('js/vendor/plyr.min.js') }}"></script>
    <script src="{{ asset('js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('js/vendor/baguetteBox.min.js') }}"></script>

    <script src="{{ asset('js/vendor/list.js') }}"></script>
    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="{{ asset('js/base/helpers.js') }}"></script>
    <script src="{{ asset('js/base/globals.js') }}"></script>
    <script src="{{ asset('js/base/nav.js') }}"></script>
    <script src="{{ asset('js/base/search.js') }}"></script>
    <script src="{{ asset('js/base/settings.js') }}"></script>
    <!-- Template Base Scripts End -->

    <!-- Page Specific Scripts Start -->
    <script src="{{ asset('js/pages/profile.settings.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <script src="{{ asset('js/cs/datatable.extend.js') }}"></script>
    <script src="{{ asset('js/plugins/datatable.boxedvariations.js') }}"></script>

    <script src="{{ asset('js/cs/glide.custom.js') }}"></script>

    <script src="{{ asset('js/pages/blog.detail.js') }}"></script>
    <script src="{{ asset('js/pages/blog.home.js') }}"></script>

    <script src="{{ asset('js/cs/charts.extend.js') }}"></script>
    <script src="{{ asset('js/plugins/carousels.js') }}"></script>
    <script src="{{ asset('js/pages/blocks.thumbnails.js') }}"></script>

    <script src="{{ asset('js/pages/dashboard.default.js') }}"></script>

    <script src="{{ asset('js/plugins/lists.js') }}"></script>

    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <!-- Page Specific Scripts End -->
</body>

</html>
