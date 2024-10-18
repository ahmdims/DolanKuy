@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<div class="container">

    <style>
        .hero {
            position: relative;
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .hero .btn-scroll {
            color: #ffffff;
            text-shadow: 0 6px 15px rgba(0, 0, 0, 0.9);
            display: block;
            margin-top: 20px;
            animation: btn-up-down 1s ease-in-out infinite alternate-reverse both;
        }

        .hero .btn-scroll i {
            font-size: 48px;
        }

        .hero .btn-scroll:hover {
            color: #cfcfcf;
        }

        @keyframes btn-up-down {
            0% {
                transform: translateY(5px);
            }

            100% {
                transform: translateY(-5px);
            }
        }

        @media (max-width: 576px) {
            .hero .btn-scroll i {
                font-size: 32px;
            }
        }
    </style>

    <section id="hero" class="hero mb-3">
        <img src="img/product/small/product-3.webp" class="img-fluid w-100 rounded" alt="DolanKuy">
        <div class="position-absolute top-50 start-50 translate-middle text-center">
            <h1 class="display-4 text-white">DolanKuy</h1>
            <a href="#next-section" class="btn-scroll text-white">
                <i class="bi bi-arrow-down-short"></i>
            </a>
        </div>
    </section>
















    <section class="scroll-section" id="destination">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start mb-3">
            <div>
                <h1 class="font-weight-bold mb-0"><span class="text-primary">Destinasi</span> Populer 🔥🌍</h1>
                <h5 class="mb-2 mb-sm-0">Cek Beragam Destinasi Keren di Malang yang Lagi Hits di DolanKuy, sobat!
                </h5>
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
                            <div class="glide__slide">
                                <div class="card mb-4">
                                    <img src="img/product/small/product-3.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 1</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-4">
                                    <img src="img/product/small/product-3.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 2</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
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
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-10.webp" class="card-img-top"
                                        alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 1</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-10.webp" class="card-img-top"
                                        alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 2</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-10.webp" class="card-img-top"
                                        alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 3</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-10.webp" class="card-img-top"
                                        alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 4</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-10.webp" class="card-img-top"
                                        alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 5</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-10.webp" class="card-img-top"
                                        alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 6</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
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
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-1.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 1</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-1.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 2</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-1.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 3</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-1.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 4</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-1.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 5</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-1.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 6</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="glide__slide">
                                <div class="card mb-5">
                                    <img src="img/product/small/product-1.webp" class="card-img-top" alt="card image" />
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 7</h5>
                                        <p class="card-text">Liquorice caramels apple pie chupa.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="scroll-section mb-5" id="gallery">
        <div class="row">
            <div class="col-12">
                <div class="glide" id="glideGallery">
                    <!-- Large Images Start -->
                    <div class="glide glide-large shadow rounded mb-4">
                        <div class="glide__track mb-0" data-glide-el="track">
                            <ul class="glide__slides gallery-glide-custom mb-0">
                                <li class="glide__slide p-0">
                                    <a href="img/product/large/product-1.webp">
                                        <img alt="detail" src="img/product/large/product-1.webp"
                                            class="responsive border-0 rounded img-fluid sh-50 w-100" />
                                    </a>
                                </li>
                                <li class="glide__slide p-0">
                                    <a href="img/product/large/product-2.webp">
                                        <img alt="detail" src="img/product/large/product-2.webp"
                                            class="responsive border-0 rounded img-fluid sh-50 w-100" />
                                    </a>
                                </li>
                                <li class="glide__slide p-0">
                                    <a href="img/product/large/product-3.webp">
                                        <img alt="detail" src="img/product/large/product-3.webp"
                                            class="responsive border-0 rounded img-fluid sh-50 w-100" />
                                    </a>
                                </li>
                                <li class="glide__slide p-0">
                                    <a href="img/product/large/product-4.webp">
                                        <img alt="detail" src="img/product/large/product-4.webp"
                                            class="responsive border-0 rounded img-fluid sh-50 w-100" />
                                    </a>
                                </li>
                                <li class="glide__slide p-0">
                                    <a href="img/product/large/product-5.webp">
                                        <img alt="detail" src="img/product/large/product-5.webp"
                                            class="responsive border-0 rounded img-fluid sh-50 w-100" />
                                    </a>
                                </li>
                                <li class="glide__slide p-0">
                                    <a href="img/product/large/product-6.webp">
                                        <img alt="detail" src="img/product/large/product-6.webp"
                                            class="responsive border-0 rounded img-fluid sh-50 w-100" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Large Images End -->
                    <!-- Thumbs Start -->
                    <div class="glide glide-thumb mb-3">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide p-0">
                                    <img alt="thumb" src="img/product/small/product-1.webp"
                                        class="responsive rounded-md img-fluid shadow" />
                                </li>
                                <li class="glide__slide p-0">
                                    <img alt="thumb" src="img/product/small/product-2.webp"
                                        class="responsive rounded-md img-fluid shadow" />
                                </li>
                                <li class="glide__slide p-0">
                                    <img alt="thumb" src="img/product/small/product-3.webp"
                                        class="responsive rounded-md img-fluid shadow" />
                                </li>
                                <li class="glide__slide p-0">
                                    <img alt="thumb" src="img/product/small/product-4.webp"
                                        class="responsive rounded-md img-fluid shadow" />
                                </li>
                                <li class="glide__slide p-0">
                                    <img alt="thumb" src="img/product/small/product-5.webp"
                                        class="responsive rounded-md img-fluid shadow" />
                                </li>
                                <li class="glide__slide p-0">
                                    <img alt="thumb" src="img/product/small/product-6.webp"
                                        class="responsive rounded-md img-fluid shadow" />
                                </li>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow left-arrow"
                                data-glide-dir="<">
                                <i data-acorn-icon="chevron-left"></i>
                            </button>
                            <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow right-arrow"
                                data-glide-dir=">">
                                <i data-acorn-icon="chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Thumbs End -->
                </div>
            </div>
        </div>
    </section>

    <section class="scroll-section" id="about">
        <div class="container text-center mb-5">
            <h2 class="font-weight-bold mb-2">Kategori Menarik <span class="text-primary">di DolanKuy!</span></h2>
            <h5 class="mb-4 mb-sm-0">Temukan berbagai Destinasi seru, UMKM, dan Budaya menarik hanya di
                DolanKuy. Mari eksplorasi bersama!</h5>

            <div class="row">
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card">
                        <img src="img/product/large/product-1.webp" class="card-img-top" alt="Fitur 1"
                            style="object-fit: cover; height: 200px;" />
                        <div class="card-body">
                            <h5 class="card-title">Destinasi Menarik</h5>
                            <p class="card-text">Jelajahi berbagai tempat wisata yang hits dan penuh warna di Malang dan
                                sekitarnya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card">
                        <img src="img/product/large/product-1.webp" class="card-img-top" alt="Fitur 2"
                            style="object-fit: cover; height: 200px;" />
                        <div class="card-body">
                            <h5 class="card-title">UMKM Lokal</h5>
                            <p class="card-text">Dukung pelaku UMKM lokal dengan menemukan produk-produk unik dan
                                berkualitas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card">
                        <img src="img/product/large/product-1.webp" class="card-img-top" alt="Fitur 3"
                            style="object-fit: cover; height: 200px;" />
                        <div class="card-body">
                            <h5 class="card-title">Budaya Kekinian</h5>
                            <p class="card-text">Temukan beragam budaya dan acara kekinian yang seru dan menarik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Gambar Atas -->
    <section>
        <div class="container mt-5 mb-3">
            <div class="col-12 gx-4 mb-5 mt-7">
                <div class="card w-100 mb-5 position-relative">
                    <img src="img/banner/cta-wide-3.webp" class="card-img img-fluid h-100" alt="card image"
                        style="object-fit: cover;">
                    <div
                        class="card-img-overlay d-flex flex-column justify-content-center align-items-start bg-transparent">
                        <div class="row">
                            <h3 class="card-title text-black display-6">Lorem Ipsum</h3>
                            <p class="card-text text-dark">Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Galeri Start -->
    <div class="flex justify-between items-center mt-6 mb-3 pr-4">
        <div class="flex flex-col">
            <h3 class="card-title text-2xl font-bold">Galeri</h3>
        </div>
    </div>
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row gx-4 mt-0 mb-6">
                    <!-- besar -->
                    <div class="col-12 col-lg-6 col-xxl-6 sh-40">
                        <div class="card h-100 hover-img-scale-up hover-reveal">
                            <img src="img/product/large/product-1.webp" class="card-img-top h-100 w-100 scale"
                                alt="card image" style="object-fit: cover; border-radius: 10px;" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                <div>
                                    <h3 class="heading text-white stretched-link mb-1">Lorem Ipsum</h3>
                                    <div class="text-white">Lorem ipsum dolor sit amet</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kecil -->
                    <div class="col-sm-6 col-lg-3 col-xxl-3 sh-40">
                        <div class="card h-100 hover-img-scale-up hover-reveal">
                            <img src="img/product/small/product-3.webp" class="card-img-top h-100 w-100 scale"
                                alt="card image" style="object-fit: cover; border-radius: 10px;" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                <div>
                                    <h3 class="heading text-white stretched-link mb-1">Lorem Ipsum</h3>
                                    <div class="text-white">Lorem ipsum dolor sit amet</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kecil -->
                    <div class="col-sm-6 col-lg-3 col-xxl-3 sh-40">
                        <div class="card h-100 hover-img-scale-up hover-reveal">
                            <img src="img/product/small/product-3.webp" class="card-img-top h-100 w-100 scale"
                                alt="card image" style="object-fit: cover; border-radius: 10px;" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                <div>
                                    <h3 class="heading text-white stretched-link mb-1">Lorem Ipsum</h3>
                                    <div class="text-white">Lorem ipsum dolor sit amet</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row g-5  gx-4 mb-5">
                    <!-- besar -->
                    <div class="col-12 col-lg-6 col-xxl-6 sh-40">
                        <div class="card h-100 hover-img-scale-up hover-reveal">
                            <img src="img/product/large/product-2.webp" class="card-img-top h-100 w-100 scale"
                                alt="card image" style="object-fit: cover; border-radius: 10px;" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                <div>
                                    <h3 class="heading text-white stretched-link mb-1">Lorem Ipsum</h3>
                                    <div class="text-white">Lorem ipsum dolor sit amet</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kecil -->
                    <div class="col-sm-6 col-lg-3 col-xxl-3 sh-40">
                        <div class="card h-100 hover-img-scale-up hover-reveal">
                            <img src="img/product/small/product-4.webp" class="card-img-top h-100 w-100 scale"
                                alt="card image" style="object-fit: cover; border-radius: 10px;" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                <div>
                                    <h3 class="heading text-white stretched-link mb-1">Lorem Ipsum</h3>
                                    <div class="text-white">Lorem ipsum dolor sit amet</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kecil -->
                    <div class="col-sm-6 col-lg-3 col-xxl-3 sh-40">
                        <div class="card h-100 hover-img-scale-up hover-reveal">
                            <img src="img/product/small/product-4.webp" class="card-img-top h-100 w-100 scale"
                                alt="card image" style="object-fit: cover; border-radius: 10px;" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                <div>
                                    <h3 class="heading text-white stretched-link mb-1">Lorem Ipsum</h3>
                                    <div class="text-white">Lorem ipsum dolor sit amet</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev btn btn-lg" type="button" data-bs-target="#productCarousel"
            data-bs-slide="prev" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%);">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next btn btn-lg" type="button" data-bs-target="#productCarousel"
            data-bs-slide="next" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%);">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- card bawah -->
    <div class="container mt-5 mb-5">
        <div class="row gy-5 align-items-stretch">
            <!-- Video Guide Start -->
            <div class="col-12 col-xl-6">
                <h4 class="card-title text-2xl font-bold">Video</h4>
                <div class="card video-container bg-transparent h-100">
                    <video class="player w-100 equal-content" poster="img/product/large/product-2.webp" id="videoGuide"
                        style="aspect-ratio: 16/9;">
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                            type="video/mp4" />
                    </video>
                </div>
            </div>
            <!-- Video Guide End -->

            <!-- Cards Section Start -->
            <div class="col-12 col-xl-6">
                <h4 class="card-title text-2xl font-bold">Kategori</h4>
                <div class="row h-100">
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card cards-container hover-img-scale-up equal-height">
                            <img src="img/banner/cta-vertical-4.webp" class="card-img h-100 scale" alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div>
                                    <div class="cta-3 text-black w-90">
                                        Wisata
                                    </div>
                                    <a href="wisata.html"
                                        class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                                        <i data-acorn-icon="chevron-right"></i>
                                        <span>View</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card cards-container hover-img-scale-up equal-height">
                            <img src="img/banner/cta-vertical-4.webp" class="card-img h-100 scale" alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div>
                                    <div class="cta-3 text-black w-90">
                                        Budaya
                                    </div>
                                    <a href="budaya.html"
                                        class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                                        <i data-acorn-icon="chevron-right"></i>
                                        <span>View</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card cards-container hover-img-scale-up equal-height">
                            <img src="img/banner/cta-vertical-4.webp" class="card-img h-100 scale" alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div>
                                    <div class="cta-3 text-black w-90">
                                        UMKM
                                    </div>
                                    <a href="umkm.html"
                                        class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                                        <i data-acorn-icon="chevron-right"></i>
                                        <span>View</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cards Section End -->
        </div>
    </div>


</div>

@endsection