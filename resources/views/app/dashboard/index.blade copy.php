@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<div class="container">

    <!-- Single Large Image Start -->
    <div class="card-body pt-0 pb-0 p-0 mb-7 position-relative">
        <div class="glide glide-gallery" id="glidePortfolioDetail">
            <div class="glide-large">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides gallery-glide-custom mb-0">
                        <li class="glide__slide p-0">
                            <video autoplay loop muted class="video-full img-fluid rounded w-100 sh-35 sh-md-60">
                                <source src="{{ asset('video/video.mp4') }}" type="video/mp4">
                            </video>
                            <div class="position-absolute top-50 start-50 translate-middle text-white text-center"
                                style="z-index: 2;">
                                <h3 class="custom-font">Eksporasi</h3>
                                <h1 class="custom-font-malang">Malang</h1>
                                <h3 class="custom-font">Bersama DolanKuy</h3>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Large Image End -->

    <section class="scroll-section" id="destination">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start mb-3">
            <div>
                <h1 class="font-weight-bold mb-0"><span class="text-primary">Destinasi</span> Populer 🔥🌍</h1>
                <h5 class="mb-2 mb-sm-0">Cek Beragam Destinasi Keren di Malang yang Lagi Hits di DolanKuy, sobat!</h5>
            </div>
            <a href="{{ asset('destination') }}"
                class="btn btn-primary rounded-pill d-flex align-items-center mt-3 mt-sm-0 btn-sm">
                Lihat Lainnya <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-12 p-0 mb-5">
                <div class="glide" id="glideBasic">
                    <div class="glide__track" data-glide-el="track">
                        <div class="glide__slides">

                            @foreach ($topDestinations as $destination)
                            <div class="glide__slide">
                                <div class="card mb-4">

                                    @php
                                    $firstImage = $destination->images->first();
                                    @endphp

                                    <img src="{{ $firstImage ? asset('storage/' . $firstImage->path) : asset('img/banner/no_images.svg') }}"
                                        alt="Card image" class="card-img-top" />

                                    <div class="card-body">
                                        <a href="{{ route('app.destination.detail', $destination->slug) }}"
                                            class="body-link stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">{{ $destination->name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="text-center">
                        <span class="glide__arrows slider-nav" data-glide-el="controls">
                            <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir="<">
                                <i data-acorn-icon="chevron-left"></i>
                            </button>
                        </span>
                        <span class="glide__bullets" data-glide-el="controls[nav]"></span>
                        <span class="glide__arrows slider-nav" data-glide-el="controls">
                            <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir=">">
                                <i data-acorn-icon="chevron-right"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="scroll-section" id="msme">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start mb-3">
            <div>
                <h1 class="font-weight-bold mb-0">UMKM <span class="text-primary">Kekinian 🌟🏪</span></h1>
                <h5 class="mb-2 mb-sm-0">Cek berbagai UMKM khas Malang yang super menarik di DolanKuy!!</h5>
            </div>
            <a href="{{ asset('msme') }}"
                class="btn btn-primary rounded-pill d-flex align-items-center mt-3 mt-sm-0 btn-sm">
                Lihat Lainnya <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-12 mb-5">
                <div class="glide" id="glideCenter">
                    <div class="glide__track" data-glide-el="track">
                        <div class="glide__slides">
                            @foreach ($topMsmes as $msme)
                            <div class="glide__slide">
                                <div class="card mb-5">

                                    @php
                                    $firstImage = $msme->images->first();
                                    @endphp

                                    <img src="{{ $firstImage ? asset('storage/' . $firstImage->path) : asset('img/banner/no_images.svg') }}"
                                        alt="Card image" class="card-img-top" />

                                    <div class="card-body">
                                        <a href="{{ route('app.msme.detail', $msme->slug) }}"
                                            class="body-link stretched-link">
                                            <span class="clamp-line sh-5" data-line="2">{{ $msme->name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="text-center">
                        <span class="glide__arrows slider-nav" data-glide-el="controls">
                            <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir="<">
                                <i data-acorn-icon="chevron-left"></i>
                            </button>
                        </span>
                        <span class="glide__bullets" data-glide-el="controls[nav]"></span>
                        <span class="glide__arrows slider-nav" data-glide-el="controls">
                            <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir=">">
                                <i data-acorn-icon="chevron-right"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="scroll-section" id="culture">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start mb-3">
            <div>
                <h1 class="font-weight-bold mb-0"><span class="text-primary">Budaya</span> Menarik</h1>
                <h5 class="mb-2 mb-sm-0">Cek Beragam Budaya Keren asli Malang di DolanKuy, yuk! 🔥</h5>
            </div>
            <a href="{{ asset('culture') }}"
                class="btn btn-primary rounded-pill d-flex align-items-center mt-3 mt-sm-0 btn-sm">
                Lihat Lainnya <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-12 p-0 mb-5">
                <div class="glide" id="glideNoControls">
                    <div class="glide__track" data-glide-el="track">
                        <div class="glide__slides">
                            @foreach ($topCultures as $culture)
                            <div class="glide__slide">
                                <div class="card mb-5">

                                    @php
                                    $firstImage = $msme->images->first();
                                    @endphp

                                    <img src="{{ $firstImage ? asset('storage/' . $firstImage->path) : asset('img/banner/no_images.svg') }}"
                                        alt="Card image" class="card-img-top" />

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $culture->name }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <section class="scroll-section" id="about">
                <div class="container text-center mb-5">
                    <h2 class="font-weight-bold mb-2">Kenalin <span class="text-primary">DolanKuy!</span>
                    </h2>
                    <h5 class="mb-4 mb-sm-0">Temukan berbagai Destinasi seru, UMKM, dan Budaya menarik hanya di
                        DolanKuy. Mari eksplorasi bersama!</h5>

                    <div class="row">
                        <div class="card h-100-card sh-md-50 bg-transparent mt-3">
                            <video class="player cover" poster="{{ asset('img/banner/malang.jpg') }}" id="videoGuide">
                                <source src="https://www.youtube.com/watch?v=nWNjqkZxiMA" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
            </section>

            @endsection