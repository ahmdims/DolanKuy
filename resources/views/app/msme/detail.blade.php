@extends('layouts.app')

@section('title', $msme->name)

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<style>
    /* Atur tinggi halaman penuh */
    html,
    body {
        height: 100%;
        margin: 0;
    }

    /* Kontainer Flexbox */
    .map-container {
        display: flex;
        justify-content: center;
        /* Posisi horizontal di tengah */
        align-items: center;
        /* Posisi vertikal di tengah */
        height: 100%;
        /* Pastikan kontainer memenuhi halaman */
    }

    /* Atur ukuran peta */
    #map {
        height: 400px;
    }
</style>

<div class="container">

    <div class="row">
        <div class="col-12 col-xl-8 col-xxl-9 mb-5">
            <div class="card mb-5">
                <!-- Content Start -->
                <div class="card-body p-0">
                    <div class="glide glide-gallery" id="glideBlogDetail">
                        <div class="glide glide-large">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides gallery-glide-custom">
                                    <li class="glide__slide p-0">
                                        <a href="{{ asset('img/product/large/product-1.webp') }}">
                                            <img alt="detail" src="{{ asset('img/product/large/product-1.webp') }}"
                                                class="responsive border-0 rounded-top-end rounded-top-start img-fluid mb-3 sh-50 w-100" />
                                        </a>
                                    </li>
                                    <li class="glide__slide p-0">
                                        <a href="{{ asset('img/product/large/product-2.webp') }}">
                                            <img alt="detail" src="{{ asset('img/product/large/product-2.webp') }}"
                                                class="responsive border-0 rounded-top-end rounded-top-start img-fluid mb-3 sh-50 w-100" />
                                        </a>
                                    </li>
                                    <li class="glide__slide p-0">
                                        <a href="{{ asset('img/product/large/product-3.webp') }}">
                                            <img alt="detail" src="{{ asset('img/product/large/product-3.webp') }}"
                                                class="responsive border-0 rounded-top-end rounded-top-start img-fluid mb-3 sh-50 w-100" />
                                        </a>
                                    </li>
                                    <li class="glide__slide p-0">
                                        <a href="{{ asset('img/product/large/product-4.webp') }}">
                                            <img alt="detail" src="{{ asset('img/product/large/product-4.webp') }}"
                                                class="responsive border-0 rounded-top-end rounded-top-start img-fluid mb-3 sh-50 w-100" />
                                        </a>
                                    </li>
                                    <li class="glide__slide p-0">
                                        <a href="{{ asset('img/product/large/product-5.webp') }}">
                                            <img alt="detail" src="{{ asset('img/product/large/product-5.webp') }}"
                                                class="responsive border-0 rounded-top-end rounded-top-start img-fluid mb-3 sh-50 w-100" />
                                        </a>
                                    </li>
                                    <li class="glide__slide p-0">
                                        <a href="{{ asset('img/product/large/product-6.webp') }}">
                                            <img alt="detail" src="{{ asset('img/product/large/product-6.webp') }}"
                                                class="responsive border-0 rounded-top-end rounded-top-start img-fluid mb-3 sh-50 w-100" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="glide glide-thumb mb-3">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <li class="glide__slide p-0">
                                        <img alt="thumb" src="{{ asset('img/product/small/product-1.webp') }}"
                                            class="responsive rounded-md img-fluid" />
                                    </li>
                                    <li class="glide__slide p-0">
                                        <img alt="thumb" src="{{ asset('img/product/small/product-2.webp') }}"
                                            class="responsive rounded-md img-fluid" />
                                    </li>
                                    <li class="glide__slide p-0">
                                        <img alt="thumb" src="{{ asset('img/product/small/product-3.webp') }}"
                                            class="responsive rounded-md img-fluid" />
                                    </li>
                                    <li class="glide__slide p-0">
                                        <img alt="thumb" src="{{ asset('img/product/small/product-4.webp') }}"
                                            class="responsive rounded-md img-fluid" />
                                    </li>
                                    <li class="glide__slide p-0">
                                        <img alt="thumb" src="{{ asset('img/product/small/product-5.webp') }}"
                                            class="responsive rounded-md img-fluid" />
                                    </li>
                                    <li class="glide__slide p-0">
                                        <img alt="thumb" src="{{ asset('img/product/small/product-6.webp') }}"
                                            class="responsive rounded-md img-fluid" />
                                    </li>
                                </ul>
                            </div>
                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="btn btn-icon btn-icon-only btn-foreground hover-outline left-arrow"
                                    data-glide-dir="<">
                                    <i data-acorn-icon="chevron-left"></i>
                                </button>
                                <button class="btn btn-icon btn-icon-only btn-foreground hover-outline right-arrow"
                                    data-glide-dir=">">
                                    <i data-acorn-icon="chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <h2 class="mb-3">{{ $msme->name }}</h2>
                        <div>
                            {{ $msme->description }}
                        </div>
                    </div>
                </div>
                <!-- Content End -->

                <div class="card-footer border-0 pt-0">
                    <div class="row align-items-center">
                        <!-- Social Buttons Start -->
                        <div class="col-6 text-muted">
                            <div class="row g-0">
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="eye" class="text-primary me-1" data-acorn-size="20"></i>
                                    <span class="align-middle">421</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="like" class="text-primary me-1" data-acorn-size="20"></i>
                                    <span class="align-middle">421</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="message" class="text-primary me-1" data-acorn-size="20"></i>
                                    <span class="align-middle">421</span>
                                </div>
                                <div class="col">
                                    <i data-acorn-icon="bookmark" class="text-primary me-1" data-acorn-size="20"></i>
                                    <span class="align-middle">4</span>
                                </div>
                            </div>
                        </div>
                        <!-- Social Buttons End -->
                    </div>
                </div>
            </div>

            <!-- Open Street Map Start -->
            <section class="scroll-section" id="openStreetMap">
                <h2 class="small-title">Alamat</h2>
                <div class="card mt-0 sh-100">
                    <div class="card-body h-50">
                        <div class="col-6 text-muted">
                            <!-- Anda dapat menambahkan konten lain di sini jika perlu -->
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-3">{{ $msme->address }}, {{ $msme->city }}, {{ $msme->province }}</h5>
                            </div>
                        </div>

                        <div id="map" style="height: 100hv; border-radius: 15px;"></div>

                        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                        <script>
                            var map = L.map('map', {
                                center: [{{ $msme->latitude }}, {{ $msme->longitude }}],
                                zoom: 15,
                                zoomControl: false
                            });

                            // Menambahkan layer peta OpenStreetMap
                            var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '© DolanKuy'
                            }).addTo(map);

                            L.control.zoom({
                                position: 'bottomleft'
                            }).addTo(map);

                            L.control.scale({
                                position: 'bottomright',
                                imperial: false
                            }).addTo(map);

                            var marker = L.marker([{{ $msme->latitude }}, {{ $msme->longitude }}]).addTo(map);
                            marker.bindPopup("<b>{{ $msme->name }}</b>").openPopup();

                            var baseMaps = {
                                "OpenStreetMap": osmLayer,
                                "Satelit": satelliteLayer
                            };
                            L.control.layers(baseMaps).addTo(map);

                            L.Control.geocoder().addTo(map);
                        </script>

                    </div>
                </div>
            </section>
        </div>

        <!-- Right Side Start -->
        <div class="col-12 col-xl-4 col-xxl-3">
            <div class="row">
                <!-- cuaca -->
                <div class="container mt-0">
                    <h2 class="small-title">Cuaca</h2>
                    <div class="card mb-5" style="border: none; background: transparent;">
                        <!-- Row 1 -->
                        <div class="row g-0">
                            <div class="col-6 mb-3 pe-2">
                                <div class="card" style="height: 100px;">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h5 class="text-gradient text-primary mb-0">{{ $msme->city }}</h5>
                                        <p class="mb-0 text-dark">{{ $msme->province }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 mb-3 ps-2">
                                <div class="card" style="height: 100px;">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h4 class="text-gradient text-primary mb-0">
                                            <span id="status2"
                                                class="text-lg ms-n1">{{ $weatherData['current']['temp_c'] ?? 'N/A' }}°C</span>
                                        </h4>
                                        <p class="mb-0 text-dark">Suhu</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="row g-0">
                            <div class="col-6 mb-0 pe-2">
                                <div class="card" style="height: 100px;">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h4 class="text-gradient text-primary mb-0">
                                            <span id="status2"
                                                class="text-lg ms-n1">{{ $weatherData['current']['humidity'] ?? 'N/A' }}%</span>
                                        </h4>
                                        <p class="mb-0 text-dark">Kelembapan</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 mb-0 ps-2">
                                <div class="card" style="height: 100px;">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h5 class="text-gradient text-primary mb-0">
                                            <span id="status2"
                                                class="text-lg ms-n1">{{ $weatherData['current']['wind_kph'] ?? 'N/A' }}
                                                km/h</span>
                                        </h5>
                                        <p class="mb-0 text-dark">Angin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- cuaca -->

                <!-- Kategori -->
                <div class="col-12">
                    <h2 class="small-title">Kategori Terkait</h2>
                    <div class="card mb-5">
                        <div class="card-body row g-0">
                            <div class="col-12">
                                <div class="cta-3">Pilih Kategori</div>
                                <div class="text-muted mb-3">Jelajahi kategori sesuai minat Anda</div>
                                <!-- Kategori Bersebelahan -->
                                <div class="d-flex justify-content-start">
                                    <div class="category-item me-2">
                                        <a href="budaya.html" class="btn btn-outline-primary">Budaya</a>
                                    </div>
                                    <div class="category-item">
                                        <a href="wisata.html" class="btn btn-outline-primary">Wisata</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kategori -->

                <!-- Review Start -->
                <div class="col-12">
                    <h2 class="small-title">Ulasan</h2>
                    <div class="card mb-5">
                        <div class="card-body row g-0">
                            <div class="col-12">
                                <div class="cta-3">Tulis Ulasan</div>
                                <div class="text-muted mb-3">Bagikan pengalaman anda</div>
                                <div class="d-flex flex-column justify-content-start">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Ulasan" rows="3"></textarea>
                                        <!-- <label>Ulasan</label> -->
                                    </div>
                                </div>
                                <a href="blog-ulasan.html" class="btn btn-icon btn-icon-start btn-primary">
                                    <i data-acorn-icon="chevron-right"></i>
                                    <span>Kirim</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Review End -->

                <!-- Artikel Terkait Start -->
                <div class="mb-5">
                    <div class="row mb-n2">
                        <a href="budaya.html" class="text-decoration-none">
                            <h2 class="small-title">Budaya Terkait</h2>
                        </a>
                        <div class="col-12 col-md-6 col-xl-12">
                            <div class="card sh-11 sh-sm-14 mb-4">
                                <div class="row g-0 h-100">
                                    <div class="col-auto">
                                        <img src="img/product/small/product-1.webp" alt="alternate text"
                                            class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                    </div>
                                    <div class="col position-static">
                                        <div
                                            class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                            <div class="d-flex flex-column">
                                                <a href="blog-budaya.html" class="stretched-link body-link">
                                                    <div class="clamp-line" data-line="2">A Complete Guide to Mix Dough
                                                        for the Molds</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-12">
                            <div class="card sh-11 sh-sm-14 mb-4">
                                <div class="row g-0 h-100">
                                    <div class="col-auto">
                                        <img src="img/product/small/product-2.webp" alt="alternate text"
                                            class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                    </div>
                                    <div class="col position-static">
                                        <div
                                            class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                            <div class="d-flex flex-column">
                                                <a href="blog-budaya.html" class="stretched-link body-link">
                                                    <div class="clamp-line" data-line="2">Apple Cake Recipe for Starters
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="wisata.html" class="text-decoration-none">
                            <h2 class="small-title">Wisata Terkait</h2>
                        </a>
                        <div class="col-12 col-md-6 col-xl-12">
                            <div class="card sh-11 sh-sm-14 mb-4">
                                <div class="row g-0 h-100">
                                    <div class="col-auto">
                                        <img src="img/product/small/product-3.webp" alt="alternate text"
                                            class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                    </div>
                                    <div class="col position-static">
                                        <div
                                            class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                            <div class="d-flex flex-column">
                                                <a href="blog-wisata.html" class="stretched-link body-link">
                                                    <div class="clamp-line" data-line="2">Basic Introduction to Bread
                                                        Making</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-12">
                            <div class="card sh-11 sh-sm-14 mb-5">
                                <div class="row g-0 h-100">
                                    <div class="col-auto">
                                        <img src="img/product/small/product-4.webp" alt="alternate text"
                                            class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                    </div>
                                    <div class="col position-static">
                                        <div
                                            class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                            <div class="d-flex flex-column">
                                                <a href="blog-wisata.html" class="stretched-link body-link">
                                                    <div class="clamp-line" data-line="2">Easy and Efficient Tricks for
                                                        Baking Crispy Breads
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Artikel End -->
            </div>
        </div>
        <!-- Right Side End -->
    </div>

</div>
@endsection