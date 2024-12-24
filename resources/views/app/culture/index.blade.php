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
                <div class="isotope-container row row-cols-1 row-cols-sm-2 gx-4 gy-4">
                    @foreach ($culture as $culture_data)
                        <div class="col">
                            <div class="card">
                                <div class="row g-0 h-auto sh-sm-19">
                                    <div class="col-12 col-sm-auto h-100">

                                        @php
                                            $firstImage = $culture_data->images->first();
                                        @endphp

                                        <img src="{{ $firstImage ? asset('storage/' . $firstImage->path) : asset('img/banner/no_images.svg') }}"
                                            class="card-img card-img-horizontal-sm sh-22 h-sm-100 sw-sm-16 sw-lg-19" />
                                    </div>
                                    <div class="col-12 col-sm p-0 h-100">
                                        <div class="card-body d-flex align-items-center h-100 h6">
                                            <div class="mb-0 d-flex flex-column">
                                                <h5>
                                                    <span class="clamp-line sh-3"
                                                        data-line="2">{{ $culture_data->name }}</span>
                                                </h5>
                                                <p class="card-text mb-2 text-muted">
                                                    {!! Str::limit(strip_tags($culture_data->description), 75, '...') !!}
                                                </p>

                                                <a href="{{ route('app.culture.detail', $culture_data->slug) }}"
                                                    type="button" class="btn btn-primary btn-sm mt-2">Lihat Selengkapnya <i
                                                        class="bi bi-arrow-right"></i></a>
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
