@extends('layouts.app')

@section('title', 'UMKM')

@section('content')

<div class="container px-5">
    <div class="col-12">
        <div class="card w-100 sh-md-25 mb-5">
            <img src="img/banner/cta-wide-3.webp" class="card-img h-100" alt="card image" />
            <div class="card-img-overlay d-flex flex-column justify-content-center bg-transparent">
                <div class="row d-flex">
                    <div class="col-12 text-center">
                        <div class="cta-3 text-primary mb-3">UMKM</div>
                        <div class="row g-2 justify-content-center">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" id="search-input" placeholder="Cari"
                                    aria-describedby="button-search">
                            </div>
                            <div class="col-12 col-sm-auto">
                                <button class="btn btn-icon btn-icon-start btn-primary" type="button"
                                    id="button-search">
                                    <i data-acorn-icon="search"></i>
                                    <span>Cari</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div class="isotope-container row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gx-4 gy-4">
                @foreach($msme as $msme_data)
                    <div class="col mb-4 isotope-item">
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
    </div>
</div>

<script>
    // Inisialisasi Isotope
    var iso = new Isotope('.isotope-container', {
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows',
    });

    // Event listener untuk tombol pencarian
    document.getElementById('button-search').addEventListener('click', function () {
        var filterValue = document.getElementById('search-input').value.toLowerCase();
        iso.arrange({
            filter: function (itemElem) {
                // Mendapatkan teks dari elemen yang dicari
                var itemText = itemElem.querySelector('.clamp-line').innerText.toLowerCase();
                return itemText.includes(filterValue);
            }
        });
    });
</script>

@endsection