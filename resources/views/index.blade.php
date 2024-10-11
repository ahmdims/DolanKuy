<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ini index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Ini index</h1>
        <div class="d-flex justify-content-center mt-4">

        @auth()
            <span>{{ Auth::user()->name }}</span>
        @endauth

            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->utype === 'superadmin')
                        <a href="{{ route('admin.dashboard.dashboard') }}" class="btn btn-primary mx-2">Dashboard</a>
                        <a href="{{ route('app.profile.index') }}" class="btn btn-secondary mx-2">My Account</a>
                    @else
                        <a href="{{ route('app.profile.index') }}" class="btn btn-secondary mx-2">My Account</a>
                    @endif
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.querySelector('#frmlogout').submit();"
                        class="btn btn-danger mx-2">Logout</a>
                    <form action="{{ route('logout') }}" id="frmlogout" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-success mx-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-warning mx-2">Register</a>
                @endauth
            @endif

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
