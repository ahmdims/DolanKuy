@extends('layouts.app')

@section('title', 'UMKM')

@section('content')

<div class="container px-5">
    <div class="col-12">
        <div class="card w-100 mb-5 position-relative">
            <img src="img/banner/cta-wide-3.webp" class="card-img img-fluid h-100" alt="card image" />
            <div class="card-img-overlay d-flex flex-column justify-content-center align-items-start bg-transparent">
                <div class="row">
                    <h3 class="card-title text-black">Lorem Ipsum</h3>
                    <p class="card-text text-dark">Lorem ipsum dolor sit amet consectetur.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-5 mb-3">
            <div class="page-title-container">
                <h1 class="mb-0 pb-0 display-4" id="title">Inspirasi UMKM</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-8 col-xxl-9 mb-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 gx-4 gy-2 mb-5">
                @foreach($msme as $msme_data)
                    <div class="col mb-4">
                        <div class="card h-100">
                            <img src="img/product/small/product-6.webp" class="card-img-top sh-19" alt="card image" />
                            <div class="card-body">
                                <h5 class="heading mb-3">
                                    <a href="{{ route('msme.detail', $msme_data->slug) }}" class="body-link stretched-link">
                                        <span class="clamp-line sh-5" data-line="2">{{ $msme_data->name }}</span>
                                    </a>
                                </h5>
                                <div>
                                    <div class="row g-0">
                                        <div class="col-auto pe-3">
                                            <i data-acorn-icon="eye" class="text-primary me-1" data-acorn-size="20"></i>
                                            <span class="align-middle">{{ $msme_data->viewCount() }}</span>
                                        </div>
                                        <div class="col-auto pe-3">
                                            <i data-acorn-icon="like" class="text-primary me-0" data-acorn-size="20"></i>
                                            <span class="align-middle">{{ $msme_data->likeCount() }}</span>
                                        </div>
                                        <div class="col-auto pe-3">
                                            <i data-acorn-icon="message" class="text-primary me-0" data-acorn-size="20"></i>
                                            <span class="align-middle">15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Side Start -->
        <div class="col-12 col-xl-4 col-xxl-3">
            <div class="row">
                <!-- Artikel terkait -->
                <div class="col-12">
                    <a href="{{ route('msme.detail', $msme_data->slug) }}" class="text-decoration-none">
                        <h2 class="small-title">Wisata Terkait</h2>
                    </a>
                    <div class="mb-5">
                        <div class="row mb-n2">
                            <div class="col-12 col-md-6 col-xl-12 mb-4">
                                <div class="card sh-11 sh-sm-14">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="img/product/small/product-1.webp" alt="alternate text"
                                                class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div
                                                class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="blog-wisata.html" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">A Complete Guide to Mix
                                                            Dough for the Molds</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12 mb-4">
                                <div class="card sh-11 sh-sm-14">
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
                                                        <div class="clamp-line" data-line="2">Basic Introduction to
                                                            Bread Making</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12 mb-5">
                                <div class="card sh-11 sh-sm-14">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="img/product/small/product-2.webp" alt="alternate text"
                                                class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div
                                                class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="blog-wisata.html" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">Apple Cake Recipe for
                                                            Starters</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="budaya.html" class="text-decoration-none">
                                <h2 class="small-title">Budaya Terkait</h2>
                            </a>
                            <div class="col-12 col-md-6 col-xl-12 mb-4">
                                <div class="card sh-11 sh-sm-14">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="img/product/small/product-3.webp" alt="alternate text"
                                                class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div
                                                class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="blog-budaya.html" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">Basic Introduction to
                                                            Bread Making</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12 mb-4">
                                <div class="card sh-11 sh-sm-14">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="img/product/small/product-3.webp" alt="alternate text"
                                                class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div
                                                class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="blog-budaya.html" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">Basic Introduction to
                                                            Bread Making</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12 mb-5">
                                <div class="card sh-11 sh-sm-14">
                                    <div class="row g-0 h-100">
                                        <div class="col-auto">
                                            <img src="img/product/small/product-4.webp" alt="alternate text"
                                                class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                        </div>
                                        <div class="col position-static">
                                            <div
                                                class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <a href="blog-budaya.html" class="stretched-link body-link">
                                                        <div class="clamp-line" data-line="2">Easy and Efficient Tricks
                                                            for Baking Crispy Breads</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Must Read End -->
            </div>
        </div>
        <!-- Right Side End -->
    </div>
</div>

@endsection