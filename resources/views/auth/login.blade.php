@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
    <div class="min-h-100 d-flex align-items-center">
        <div class="w-100 w-lg-75 w-xxl-50">
            <div>
                <div class="mb-5">
                    <h1 class="display-3 text-white">Multiple Niches</h1>
                    <h1 class="display-3 text-white">Ready for Your Project</h1>
                </div>
                <p class="h6 text-white lh-1-5 mb-5">
                    Dynamically target high-payoff intellectual capital for customized technologies.
                    Objectively integrate emerging core competencies before
                    process-centric communities...
                </p>
                <div class="mb-5">
                    <a class="btn btn-lg btn-outline-white" href="/">Learn More</a>
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
                <p class="h6">Silakan gunakan kredensial Anda untuk masuk.</p>
                <p class="h6">
                    Jika Anda bukan anggota, silakan
                    <a href="{{ route('register') }}">daftar</a>.
                </p>
            </div>
            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="email"></i>
                        <input type="email" id="name" name="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            required autofocus autocomplete="name">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi"
                            required />
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection