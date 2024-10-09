<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logos/5.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/5.png') }}">
    <title>
        @yield('title')
    </title>

    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/styles.css?v=1.1.1') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="">

    <main class="main-content  mt-0">
        @yield('content')
    </main>

    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jkanban/jkanban.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.1.1') }}"></script>
    @yield('scripts')
</body>

</html>