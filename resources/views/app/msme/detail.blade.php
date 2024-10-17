@extends('layouts.detail')

@section('title', $detail->name)

@section('content')
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
                                    @foreach($detail->images as $image)
                                        <li class="glide__slide p-0">
                                            <a href="{{ asset('storage/' . $image->path) }}">
                                                <img alt="detail" src="{{ asset('storage/' . $image->path) }}"
                                                    class="responsive border-0 rounded-top-end rounded-top-start img-fluid mb-3 sh-50 w-100" />
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="glide glide-thumb mb-3">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    @foreach($detail->images as $image)
                                        <li class="glide__slide p-0">
                                            <img alt="thumb" src="{{ asset('storage/' . $image->path) }}"
                                                class="responsive rounded-md img-fluid" />
                                        </li>
                                    @endforeach
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
                        <h2 class="mb-3">{{ $detail->name }}</h2>
                        <div>
                            {{ $detail->description }}
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
                                    <span class="align-middle">{{ $detail->ViewCount() }}</span>
                                </div>

                                <div class="col-auto pe-3">
                                    <form action="{{ route('msme.like', $detail->slug) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            @if ($detail->likes()->where('user_id', auth()->id())->exists())
                                                <i class="bi bi-hand-thumbs-up-fill text-primary me-1"
                                                    data-acorn-size="20"></i>
                                                <span class="align-middle">{{ $detail->likes()->count() }}</span>
                                            @else
                                                <i class="bi bi-hand-thumbs-up text-primary me-1" data-acorn-size="20"></i>
                                                <span class="align-middle">{{ $detail->likes()->count() }}</span>
                                            @endif
                                        </button>
                                    </form>
                                </div>

                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="message" class="text-primary me-1" data-acorn-size="20"></i>
                                    <span class="align-middle">421</span>
                                </div>

                                <div class="col-auto pe-3">
                                    <form action="{{ route('msme.history', $detail->slug) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                                            @if ($detail->histories()->where('user_id', auth()->id())->exists())
                                                <i class="bi bi-bookmark-fill text-primary me-1" data-acorn-size="20"></i>
                                                <span class="align-middle">{{ $detail->histories()->count() }}</span>
                                            @else
                                                <i class="bi bi-bookmark text-primary me-1" data-acorn-size="20"></i>
                                                <span class="align-middle">{{ $detail->histories()->count() }}</span>
                                            @endif
                                        </button>
                                    </form>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-3">{{ $detail->address }}, {{ $detail->city }}, {{ $detail->province }}
                                </h5>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="small-title">Peta Lokasi</label>
                            <div class="map-detail" id="map-detail-{{ $detail->id }}"></div>
                        </div>

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
                                        <h5 class="text-gradient text-primary mb-0">{{ $detail->city }}</h5>
                                        <p class="mb-0 text-dark">{{ $detail->province }}</p>
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
                    <its class="small-title">Fasilitas</its>
                    <div class="card mb-5">
                        <div class="card-body row g-0">
                            <div class="col-12">
                                <div class="cta-3">Fasilitas Tersedia</div>
                                <div class="text-muted mb-3">Fasilitas yang tersedia di {{ $detail->name }}</div>

                                <!-- Kategori Bersebelahan -->
                                <div class="d-flex justify-content-start">
                                    @php
                                        $facilities = json_decode($detail->facilities, true);
                                    @endphp

                                    @foreach ($facilities as $facility => $available)
                                        @if ($available)
                                            <div class="category-item me-2">
                                                <a href="#" class="btn btn-outline-primary">{{ ucfirst($facility) }}</a>
                                            </div>
                                        @endif
                                    @endforeach
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