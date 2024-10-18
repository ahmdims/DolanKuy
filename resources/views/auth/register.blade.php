@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<div class="row g-0 h-100">
    <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
        <div class="min-h-100 d-flex align-items-center">
            <div class="w-100 w-lg-75 w-xxl-50">
                <div>
                    <div class="mb-5">
                        <h1 class="display-3 text-white">Multiple Niches</h1>
                        <h1 class="display-3 text-white">Ready for Your Project</h1>
                    </div>
                    <p class="h6 text-white lh-1-5 mb-5">
                        Dynamically target high-payoff intellectual capital for customized technologies. Objectively
                        integrate emerging core competencies before
                        process-centric communities...
                    </p>
                    <div class="mb-5">
                        <a class="btn btn-lg btn-outline-white" href="{{ asset('/') }}">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
        <div
            class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
            <div class="sw-lg-50 px-5">
                <div class="sh-11">
                    <a href="index.html">
                        <div class="logo-default"></div>
                    </a>
                </div>
                <div class="mb-5">
                    <h2 class="cta-1 mb-0 text-primary">Selamat datang,</h2>
                    <h2 class="cta-1 text-primary">Mari kita mulai!</h2>
                </div>
                <div class="mb-5">
                    <p class="h6">Silakan gunakan formulir untuk mendaftar.</p>
                    <p class="h6">
                        Jika Anda sudah menjadi anggota, silakan
                        <a href="{{ route('login') }}">masuk</a>.
                    </p>
                </div>
                <div>
                    <div>
                        <form method="POST" action="{{ route('register') }}" id="registerForm"
                            class="tooltip-end-bottom" novalidate>
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3 filled form-group tooltip-end-top">
                                <i data-acorn-icon="email"></i>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    id="emailname" name="email" placeholder="Email" value="{{ old('email') }}" required
                                    autocomplete="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Name -->
                            <div class="mb-3 filled form-group tooltip-end-top">
                                <i data-acorn-icon="user"></i>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                                    name="name" placeholder="Nama" value="{{ old('name') }}" required autofocus
                                    autocomplete="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3 filled form-group tooltip-end-top">
                                <i data-acorn-icon="lock-off"></i>
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                    id="pass" name="password" placeholder="Kata Sandi" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3 filled form-group tooltip-end-top">
                                <i data-acorn-icon="lock-off"></i>
                                <input class="form-control" type="password" id="compass" name="password_confirmation"
                                    placeholder="Konfirmasi Kata Sandi" required autocomplete="new-password">
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button type="submit" class="btn btn-lg btn-primary w-100">Daftar</button>
                        </form>
                    </div>
                    <div class="mt-2">
                        <a href="auth/redirect" class="btn btn-lg btn-outline-primary w-100">
                            <i class="bi bi-google me-2"></i> Daftar Dengan Google
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection