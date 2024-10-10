<!DOCTYPE html>
<html lang="en" data-footer="true">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('title')" />

    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57"
        href="{{ asset('img/favicon/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('img/favicon/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('img/favicon/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('img/favicon/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60"
        href="{{ asset('img/favicon/apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="{{ asset('img/favicon/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76"
        href="{{ asset('img/favicon/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="{{ asset('img/favicon/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-128.png') }}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('img/favicon/mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('img/favicon/mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('img/favicon/mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('img/favicon/mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('img/favicon/mstile-310x310.png') }}" />
    <!-- Favicon Tags End -->

    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('font/CS-Interface/style.css') }}" />
    <!-- Font Tags End -->

    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/OverlayScrollbars.min.css') }}" />
    <!-- Vendor Styles End -->

    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <script src="{{ asset('js/base/loader.js') }}"></script>
</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex">
            <div class="nav-content d-flex">
                <!-- Logo Start -->
                <div class="logo position-relative">
                    <a href="{{ route('dashboard') }}">
                        <!-- Logo can be added directly -->
                        <!-- <img src="img/logo/logo-white.svg" alt="logo" /> -->

                        <!-- Or added via css to provide different ones for different color themes -->
                        <div class="img"></div>
                    </a>
                </div>
                <!-- Logo End -->

                <!-- User Menu Start -->
                <div class="user-container d-flex">
                    <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img class="profile" alt="profile" src="img/profile/profile-1.webp" />
                        <div class="name">DIMUAS</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end user-menu wide">
                        <div class="row mb-1 ms-0 me-0">
                            <div class="col-6 ps-1 pe-1">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                                            <span class="align-middle">Help</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                                            <span class="align-middle">Docs</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6 pe-1 ps-1">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0">
                                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                                <span class="align-middle">Logout</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Menu End -->

                <!-- Icons Menu Start -->
                <ul class="list-unstyled list-inline text-center menu-icons">
                    <li class="list-inline-item">
                        <a href="#" id="pinButton" class="pin-button">
                            <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                            <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" id="colorButton">
                            <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                            <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
                        </a>
                    </li>
                </ul>
                <!-- Icons Menu End -->

                <!-- Menu Start -->
                <div class="menu-container flex-grow-1">
                    <ul id="menu" class="menu">
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i data-acorn-icon="shop" class="icon" data-acorn-size="18"></i>
                                <span class="label">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#pengguna">
                                <i data-acorn-icon="cupcake" class="icon" data-acorn-size="18"></i>
                                <span class="label">Pengguna</span>
                            </a>
                            <ul id="pengguna">
                                <li>
                                    <a href="{{ route('users.index') }}">
                                        <span class="label">Pengunjung</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('destinasi.index') }}">
                                        <span class="label">Destinasi Wisata</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        <span class="label">Galeri Foto</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        <span class="label">Kategori</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        <span class="label">Kontak</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        <span class="label">Ulasan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        <span class="label">UMKM</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#orders" data-href="Orders.html">
                                <i data-acorn-icon="cart" class="icon" data-acorn-size="18"></i>
                                <span class="label">Orders</span>
                            </a>
                            <ul id="orders">
                                <li>
                                    <a href="Orders.List.html">
                                        <span class="label">List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Orders.Detail.html">
                                        <span class="label">Detail</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#customers" data-href="Customers.html">
                                <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                                <span class="label">Customers</span>
                            </a>
                            <ul id="customers">
                                <li>
                                    <a href="Customers.List.html">
                                        <span class="label">List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Customers.Detail.html">
                                        <span class="label">Detail</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#storefront" data-href="Storefront.html">
                                <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                                <span class="label">Storefront</span>
                            </a>
                            <ul id="storefront">
                                <li>
                                    <a href="Storefront.Home.html">
                                        <span class="label">Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Storefront.Filters.html">
                                        <span class="label">Filters</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Storefront.Categories.html">
                                        <span class="label">Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Storefront.Detail.html">
                                        <span class="label">Detail</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Storefront.Cart.html">
                                        <span class="label">Cart</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Storefront.Checkout.html">
                                        <span class="label">Checkout</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Storefront.Invoice.html">
                                        <span class="label">Invoice</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="Shipping.html">
                                <i data-acorn-icon="shipping" class="icon" data-acorn-size="18"></i>
                                <span class="label">Shipping</span>
                            </a>
                        </li>
                        <li>
                            <a href="Discount.html">
                                <i data-acorn-icon="tag" class="icon" data-acorn-size="18"></i>
                                <span class="label">Discount</span>
                            </a>
                        </li>
                        <li>
                            <a href="Settings.html">
                                <i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                                <span class="label">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Menu End -->

                <!-- Mobile Buttons Start -->
                <div class="mobile-buttons-container">
                    <!-- Menu Button Start -->
                    <a href="#" id="mobileMenuButton" class="menu-button">
                        <i data-acorn-icon="menu"></i>
                    </a>
                    <!-- Menu Button End -->
                </div>
                <!-- Mobile Buttons End -->
            </div>
            <div class="nav-shadow"></div>
        </div>

        <main>
            @yield('content')
        </main>

        <!-- Layout Footer Start -->
        <footer>
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <p class="mb-0 text-muted text-medium">Colored Strategies 2021</p>
                        </div>
                        <div class="col-sm-6 d-none d-sm-block">
                            <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                                <li class="breadcrumb-item mb-0 text-medium">
                                    <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Review</a>
                                </li>
                                <li class="breadcrumb-item mb-0 text-medium">
                                    <a href="https://1.envato.market/BX5oGy" target="_blank"
                                        class="btn-link">Purchase</a>
                                </li>
                                <li class="breadcrumb-item mb-0 text-medium">
                                    <a href="https://acorn-html-docs.coloredstrategies.com/" target="_blank"
                                        class="btn-link">Docs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Layout Footer End -->
    </div>

    <!-- Vendor Scripts Start -->
    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="icon/acorn-icons-commerce.js"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->

    <script src="js/cs/checkall.js"></script>

    <script src="js/pages/pengguna.list.js"></script>

    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        const searchInput = document.querySelector('.search-input-container input');
        const userTable = document.getElementById('userTable');

        searchInput.addEventListener('input', () => {
            const searchValue = searchInput.value.toLowerCase();
            const rows = userTable.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(searchValue));
                row.style.display = match ? '' : 'none';
            });
        });

        const filterLinks = document.querySelectorAll('.dropdown-menu a[data-count]');
        const itemCountText = document.getElementById('itemCountText');

        filterLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const itemCount = e.target.dataset.count;

                itemCountText.textContent = `${itemCount} Items`;

                const rows = userTable.querySelectorAll('tbody tr');
                rows.forEach((row, index) => {
                    if (index < itemCount) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <!-- Page Specific Scripts End -->
</body>

</html>
