@extends('layouts.app')

@section('title', 'Budaya')

@section('content')

<div class="container">
    <div class="col-12">
        <div class="card w-100 mb-5 position-relative">
            <img src="{{ asset('img/banner/dolankuy-3.png') }}" class="card-img img-fluid w-100 h-auto" alt="card image"
                style="object-fit: cover; max-height: 150px;" />
            <div class="card-img-overlay d-flex flex-column justify-content-center align-items-start bg-transparent">
                <div class="row">
                    <h3 class="font-weight-bold text-white">Budaya</h3>
                    <p class="card-text text-white">Cek Beragam Budaya Keren asli Malang di DolanKuy, yuk! 🔥
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div class="isotope-container row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gx-4 gy-4">
                @foreach($culture as $culture_data)
                <div class="col mb-4 isotope-item">
                    <div class="card h-100">

                        @php
                        $firstImage = $culture_data->images->first();
                        @endphp

                        <img src="{{ $firstImage ? asset('storage/' . $firstImage->path) : asset('img/banner/no_images.svg') }}"
                            class="card-img-top sh-19" alt="Card image" />

                        <div class="card-body">
                            <h5 class="heading mb-3">
                                <a href="{{ route('app.culture.detail', $culture_data->slug) }}" class="body-link stretched-link">
                                    <span class="clamp-line sh-5" data-line="2">{{ $culture_data->name }}</span>
                                </a>
                            </h5>
                            <div>
                                <div class="row g-0">
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="eye" class="text-primary me-1" data-acorn-size="20"></i>
                                        <span class="align-middle">{{ $culture_data->viewCount() }}</span>
                                    </div>
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="like" class="text-primary me-0" data-acorn-size="20"></i>
                                        <span class="align-middle">{{ $culture_data->likeCount() }}</span>
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
    </div>

</div>

@endsection