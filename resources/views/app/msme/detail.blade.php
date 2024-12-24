@extends('layouts.app')

@section('title', $detail->name)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12 col-xl-8 col-xxl-9 mb-4">
                <div class="card mb-4">

                    <div class="card-body p-0">

                        <div class="glide glide-gallery" id="glideBlogDetail">
                            <div class="glide glide-large">
                                <div class="glide__track" data-glide-el="track">
                                    <ul class="glide__slides gallery-glide-custom">
                                        @foreach ($detail->images as $image)
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
                                        @foreach ($detail->images as $image)
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

                            <div class="card-footer border-0 pt-0">
                                <div class="row align-items-center">

                                    <div class="col-6 text-muted">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-primary me-1" data-acorn-size="20"></i>
                                                <span class="align-middle">{{ $detail->ViewCount() }}</span>
                                            </div>

                                            <div class="col-auto pe-3">
                                                <form action="{{ route('msme.like', $detail->slug) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        style="background: none; border: none; cursor: pointer;">
                                                        @if ($detail->likes()->where('user_id', auth()->id())->exists())
                                                            <i class="bi bi-hand-thumbs-up-fill text-primary me-1"
                                                                data-acorn-size="20"></i>
                                                            <span
                                                                class="align-middle text-muted">{{ $detail->likes()->count() }}</span>
                                                        @else
                                                            <i class="bi bi-hand-thumbs-up text-primary me-1"
                                                                data-acorn-size="20"></i>
                                                            <span
                                                                class="align-middle text-muted">{{ $detail->likes()->count() }}</span>
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>

                                            <div class="col-auto pe-3">
                                                <form action="{{ route('msme.history', $detail->slug) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        style="background: none; border: none; cursor: pointer;">
                                                        @if ($detail->histories()->where('user_id', auth()->id())->exists())
                                                            <i class="bi bi-bookmark-fill text-primary me-1"
                                                                data-acorn-size="20"></i>
                                                            <span
                                                                class="align-middle text-muted">{{ $detail->histories()->count() }}</span>
                                                        @else
                                                            <i class="bi bi-bookmark text-primary me-1"
                                                                data-acorn-size="20"></i>
                                                            <span
                                                                class="align-middle text-muted">{{ $detail->histories()->count() }}</span>
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div>
                                {!! $detail->description !!}
                            </div>
                        </div>
                    </div>

                </div>

                <section class="scroll-section mb-4">
                    <div class="card mt-0 sh-100 mb-4">
                        <div class="card-body h-50">
                            <div class="cta-3">Alamat</div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <p class="text-muted mb-3">{{ $detail->address }}, {{ $detail->city }},
                                        {{ $detail->province }}
                                    </p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="small-title">Peta Lokasi</label>
                                <div class="map-detail" id="map-detail-{{ $detail->id }}"></div>
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <a href="{{ $detail->link }}" target="_blank" class="btn btn-primary">Buka di Maps</a>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="scroll-section" id="openStreetMap">
                    <div class="card">
                        <div class="card-body">
                            <div class="cta-3"><span>{{ $totalComments }}</span> Komentar</div>

                            @foreach ($comments->reverse() as $comment)
                                <div class="d-flex align-items-center border-bottom border-separator-light pb-3 mt-3">
                                    <div class="row g-0 w-100">
                                        <div class="col-auto">
                                            <div class="sw-5 me-3">
                                                <img src="{{ $comment->user->profile_picture ?? asset('img/profile/profile.webp') }}"
                                                    class="img-fluid rounded-xl" alt="{{ $comment->user->name }}" />
                                            </div>
                                        </div>
                                        <div class="col pe-3">
                                            <a
                                                href="{{ route('profile.index', $comment->user->username) }}">{{ $comment->user->name }}</a>
                                            <div class="text-muted text-small mb-2">
                                                {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                            </div>
                                            <div class="text-medium text-alternate lh-1-25">{{ $comment->comment }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="mt-5">
                                <form action="{{ route('msme.comments.store', $detail->slug) }}" method="POST"
                                    class="input-group">
                                    @csrf
                                    <input type="text" name="comment" class="form-control rounded-start"
                                        placeholder="Komentar..." aria-label="Komentar..." required />
                                    <button class="btn btn-icon btn-icon-end btn-outline-primary" type="submit">
                                        <i data-acorn-icon="send"></i>
                                        <span class="ms-2">Kirim</span>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </section>

            </div>

            <div class="col-12 col-xl-4 col-xxl-3">
                <div class="row">

                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body row g-0">
                                <div class="col-12">
                                    <div class="cta-3">Cuaca</div>
                                    <div class="text-muted mb-3">Perkiraan cuaca yang sedang terjadi di
                                        {{ $detail->name }}
                                    </div>

                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <div class="d-flex flex-column justify-content-center align-items-center p-3">
                                                <h5 class="text-gradient text-primary mb-0">{{ $detail->city }}</h5>
                                                <p class="mb-0 text-dark">{{ $detail->province }}</p>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <div class="d-flex flex-column justify-content-center align-items-center p-3">
                                                <h4 class="text-gradient text-primary mb-0">
                                                    {{ $weatherData['current']['temp_c'] ?? 'N/A' }}&deg;C
                                                </h4>
                                                <p class="mb-0 text-dark">Suhu</p>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <div class="d-flex flex-column justify-content-center align-items-center p-3">
                                                <h4 class="text-gradient text-primary mb-0">
                                                    {{ $weatherData['current']['humidity'] ?? 'N/A' }}%
                                                </h4>
                                                <p class="mb-0 text-dark">Kelembapan</p>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <div class="d-flex flex-column justify-content-center align-items-center p-3">
                                                <h5 class="text-gradient text-primary mb-0">
                                                    {{ $weatherData['current']['wind_kph'] ?? 'N/A' }} km/h
                                                </h5>
                                                <p class="mb-0 text-dark">Angin</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($detail->price_min != 0 && $detail->price_max != 0)
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body row g-0">
                                    <div class="col-12">
                                        <div class="cta-3 mb-3">Rentang Harga</div>
                                        <p>
                                            <i class="bi bi-cash-stack fs-4 primary-text-color border-end pe-3 me-3"></i>
                                            <span>Rp {{ number_format($detail->price_min, 0, '.', '.') }} <span
                                                    class="mx-2">-</span>
                                                {{ number_format($detail->price_max, 0, '.', '.') }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif

                </div>

                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body row g-0">
                            <div class="col-12">
                                <div class="cta-3 mb-3">Kontak</div>
                                <p>
                                    <i class="bi bi-phone fs-4 primary-text-color border-end pe-3 me-3"></i>
                                    <span>{{ $detail->contact }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let latitude = "{{ $detail->latitude }}" || -6.24186355;
            let longitude = "{{ $detail->longitude }}" || 106.99991249;

            var map = L.map('map-detail-{{ $detail->id }}').setView([latitude, longitude], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© DolanKuy'
            }).addTo(map);

            var marker = L.marker([latitude, longitude]).addTo(map);
        });
    </script>

@endsection
