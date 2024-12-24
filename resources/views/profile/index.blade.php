@extends('layouts.app')

@section('title', $user->name)

@section('content')

    <div class="container">
        <div class="page-title-container">
            <div class="row">

                <div class="col-12 col-xl-4 col-xxl-3">
                    <div class="card">
                        <div class="card-body mb-n5">
                            <div class="d-flex align-items-center flex-column mb-5">

                                <div class="mb-5 d-flex align-items-center flex-column">
                                    <div class="sw-13 position-relative mb-3">

                                        <img src="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile) : asset('img/profile/profile.webp') }}"
                                            class="img-fluid rounded-xl" style="object-fit: cover;" />
                                    </div>
                                    <div class="h5 mb-0">{{ $user->name }}</div>
                                    <div class="text-muted">{{ $user->username }}</div>
                                </div>

                                @if (Auth::check() && Auth::user()->username === $user->username)
                                    <div class="d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100">
                                        <a href="{{ route('profile.edit', Auth::user()->id) }}" type="button"
                                            class="btn btn-primary w-100 me-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" class="acorn-icons acorn-icons-edit undefined">
                                                <path
                                                    d="M14.6264 2.54528C15.0872 2.08442 15.6782 1.79143 16.2693 1.73077C16.8604 1.67011 17.4032 1.84674 17.7783 2.22181C18.1533 2.59689 18.33 3.13967 18.2693 3.73077C18.2087 4.32186 17.9157 4.91284 17.4548 5.3737L6.53226 16.2962L2.22192 17.7782L3.70384 13.4678L14.6264 2.54528Z">
                                                </path>
                                            </svg>
                                            <span>Ubah</span></a>
                                    </div>
                                @endif

                            </div>

                            @if (!empty($user->bio))
                                <div class="mb-5">
                                    <p class="text-small text-muted mb-2">Biografi</p>
                                    <p>
                                        {{ $user->bio }}
                                    </p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-8 col-xxl-9">
                    <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#markahTab" role="tab"
                                aria-selected="true">Markah</a>
                        </li>
                        <li class="nav-item dropdown ms-auto d-none responsive-tab-dropdown">
                            <a class="btn btn-icon btn-icon-only btn-background pt-0" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-diplay="static">
                                <i data-acorn-icon="more-horizontal"></i>
                            </a>
                            <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="markahTab" role="tabpanel">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-3 g-2 mb-5">
                                @foreach ($markahHistories as $history)
                                    @php
                                        $entity = null;
                                        if ($history->entity_type === 'destination') {
                                            $entity = $history->destination;
                                        } elseif ($history->entity_type === 'msme') {
                                            $entity = $history->msme;
                                        } elseif ($history->entity_type === 'culture') {
                                            $entity = $history->culture;
                                        }
                                    @endphp
                                    @if ($entity)
                                        <div class="col">
                                            <div class="card sh-35 hover-img-scale-up hover-reveal">
                                                <img src="{{ $history->firstImage ? asset('storage/' . $history->firstImage->path) : asset('img/banner/no_images.svg') }}"
                                                    class="card-img h-100 scale" alt="card image" />
                                                <div
                                                    class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                                    <div class="row g-0">
                                                        <div class="col pe-2">
                                                            <a href="@if ($history->entity_type === 'destination') {{ route('app.destination.detail', ['slug' => $entity->slug]) }}
                                                                     @elseif($history->entity_type === 'msme')
                                                                         {{ route('app.msme.detail', ['slug' => $entity->slug]) }}
                                                                     @elseif($history->entity_type === 'culture')
                                                                         {{ route('app.culture.detail', ['slug' => $entity->slug]) }} @endif"
                                                                class="stretched-link">
                                                                <h5 class="heading text-white mb-1">
                                                                    {{ $entity->name ?? 'Unknown Title' }}</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        @endsection
