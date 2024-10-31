@extends('layouts.auth')

@section('title', '404')

@section('content')
<div class="row g-0 h-100">
    <!-- Left Side Start -->
    <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100"></div>
    <!-- Left Side End -->

    <!-- Right Side Start -->
    <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
        <div
            class="sw-lg-80 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
            <div class="sw-lg-60 px-5">
                <div class="sh-11">
                    <a href="{{ asset('/') }}">
                        <div class="logo-default"></div>
                    </a>
                </div>
                <div class="mb-5">
                    <h2 class="cta-1 mb-0 text-primary">Ooops, sepertinya terjadi kesalahan!</h2>
                    <h2 class="display-2 text-primary">Error 500</h2>
                </div>
                <div class="mb-5">
                    <p class="h6">Terjadi kesalahan pada server. Mohon coba lagi nanti.</p>
                    <p class="h6">
                        Jika Anda merasa ini adalah kesalahan, silakan
                        <a href="{{ asset('contact') }}">hubungi</a>
                        kami.
                    </p>
                </div>
                <div>
                    <a href="{{ asset('/') }}" class="btn btn-icon btn-icon-start btn-primary">
                        <i data-acorn-icon="arrow-left"></i>
                        <span>Kembali ke Beranda</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Right Side End -->
</div>
@endsection