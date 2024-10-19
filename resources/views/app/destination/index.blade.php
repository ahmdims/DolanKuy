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

        <section class="scroll-section" id="existingHtml">
            <div class="card-body mb-n2" id="existingHtmlList">
                <div class="search-input-container border border-separator rounded-md bg-foreground mb-4">
                    <input class="form-control search" type="text" autocomplete="off" placeholder="Search" />
                    <span class="search-magnifier-icon">
                        <i data-acorn-icon="search"></i>
                    </span>
                </div>

                <div class="list">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gx-3 gy-4">
                        @foreach($destination as $destination_data)
                            <div class="col mb-2 scroll-child">
                                <div class="card h-100 w-100">
                                    <img src="img/product/small/product-6.webp" class="card-img-top sh-19"
                                        alt="card image" />
                                    <div class="card-body">
                                        <h5 class="heading mb-3">
                                            <a href="{{ route('app.destination.detail', $destination_data->slug) }}"
                                                class="body-link stretched-link name">
                                                <span class="clamp-line sh-5"
                                                    data-line="2">{{ $destination_data->name }}</span>
                                            </a>
                                        </h5>
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-primary me-0" data-acorn-size="15"></i>
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
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

    </div>

</div>

@endsection