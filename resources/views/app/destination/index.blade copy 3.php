@extends('layouts.app')

@section('title', 'Destinasi Wisata')

@section('content')

<div class="container px-5">
    <div class="row">
        <!-- Top Search Start -->
        <div class="col-12 mb-5">
            <div class="card w-100 sh-30 sh-md-25 mb-5">
                <img src="img/banner/cta-wide-3.webp" class="card-img h-100" alt="card image" />
                <div class="card-img-overlay d-flex flex-column justify-content-center bg-transparent">
                    <div class="row d-flex">
                        <div class="col-12 text-center">
                            <div class="cta-3 text-primary mb-3">Ingin Mencari Sesuatu?</div>
                            <div class="row g-2 justify-content-center">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="cari" />
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <a href="#" class="btn btn-icon btn-icon-start btn-primary">
                                        <i data-acorn-icon="search"></i>
                                        <span>Cari</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Search End -->



        <section id="sortAndFilterTitle">
            <div class="row g-2" id="sortAndFilter">
                <div class="col-12">
                    <div class="row gx-2">
                        <div class="col-12 col-sm mb-1 mb-sm-0">
                            <div class="search-input-container shadow rounded-md bg-foreground mb-2">
                                <input class="form-control search" type="text" autocomplete="off"
                                    placeholder="Search" />
                                <span class="search-magnifier-icon">
                                    <i data-acorn-icon="search"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-auto d-flex justify-content-end">
                            <div class="btn-group">
                                <div class="dropdown">
                                    <button class="btn btn-foreground-alternate shadow dropdown-toggle mb-1"
                                        type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                        aria-haspopup="true" aria-expanded="false">
                                        Categories
                                    </button>
                                    <div class="dropdown-menu sw-25 shadow dropdown-menu-end">
                                        <div class="px-4 py-3">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input filter" id="category1"
                                                    data-filter="Multigrain" checked />
                                                <label class="form-check-label" for="category1">Multigrain</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input filter" id="category2"
                                                    data-filter="Sourdough" checked />
                                                <label class="form-check-label" for="category2">Sourdough</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input filter" id="category3"
                                                    data-filter="Whole Wheat" checked />
                                                <label class="form-check-label" for="category3">Whole Wheat</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card-body">

                        <div class="scroll-by-count">
                        @foreach($destination as $destination_data)
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gx-3 gy-4">
                                <div class="col mb-2 scroll-child">
                                    <div class="card h-100 w-100">
                                        <img src="img/product/small/product-6.webp" class="card-img-top sh-19"
                                            alt="card image" />
                                        <div class="card-body">
                                            <h5 class="heading mb-3">
                                                <a href="blog-UMKM.html" class="body-link stretched-link name">
                                                    <span class="clamp-line sh-5" data-line="2">Basic Introduction to Bread Making</span>
                                                </a>
                                            </h5>
                                            <div class="row g-0">
                                                <div class="col-auto pe-3">
                                                    <i data-acorn-icon="eye" class="text-primary me-0"
                                                        data-acorn-size="15"></i>
                                                    <span class="align-middle">421</span>
                                                </div>
                                                <div class="col-auto pe-3">
                                                    <i data-acorn-icon="like" class="text-primary me-0"
                                                        data-acorn-size="15"></i>
                                                    <span class="align-middle">34</span>
                                                </div>
                                                <div class="col-auto pe-3">
                                                    <i data-acorn-icon="message" class="text-primary me-0"
                                                        data-acorn-size="15"></i>
                                                    <span class="align-middle">15</span>
                                                </div>
                                                <div class="col-auto pe-3">
                                                    <i data-acorn-icon="bookmark" class="text-primary me-0"
                                                        data-acorn-size="15"></i>
                                                    <span class="align-middle">4</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

</div>

@endsection