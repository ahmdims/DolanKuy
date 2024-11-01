@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="container px-5">

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    <div class="sw-6 sh-6 sw-xl-14">
                        <img class="img-fluid rounded-100"
                            src="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile) : asset('img/profile/profile.webp') }}"
                            style="object-fit: cover;" />
                    </div>
                </div>
                <div class="col d-flex flex-column justify-content-between">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <div class="h5 mb-0 mt-2">{{ $user->name }}</div>
                            <div class="text-muted mb-2">{{ $user->username }}</div>
                        </div>

                        @if (Auth::user()->id === $user->id)
                            <a href="{{ route('profile.edit', ['username' => $user->username]) }}"
                                class="btn btn-outline-primary btn-icon btn-icon-start" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="acorn-icons acorn-icons-edit undefined">
                                    <path
                                        d="M14.6264 2.54528C15.0872 2.08442 15.6782 1.79143 16.2693 1.73077C16.8604 1.67011 17.4032 1.84674 17.7783 2.22181C18.1533 2.59689 18.33 3.13967 18.2693 3.73077C18.2087 4.32186 17.9157 4.91284 17.4548 5.3737L6.53226 16.2962L2.22192 17.7782L3.70384 13.4678L14.6264 2.54528Z">
                                    </path>
                                </svg>
                                <span>Ubah</span>
                            </a>
                        @endif
                    </div>
                    <div class="d-flex mb-1">
                        <div class="me-3 me-md-7">
                            <p class="text-small text-muted mb-1">KUNJUNGAN</p>
                            <p class="mb-0 text-center">A+</p>
                        </div>
                        <div class="me-3 me-md-7">
                            <p class="text-small text-muted mb-1">RENCANA</p>
                            <p class="mb-0 text-center">27</p>
                        </div>
                        <div class="me-3 me-md-7">
                            <p class="text-small text-muted mb-1">ULASAN</p>
                            <p class="mb-0 text-center">64</p>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="scroll-section">
        <div class="card mb-3">
            <div class="card-body d-flex flex-column">
                <p>
                    {{ $user->bio }}
                </p>
            </div>
        </div>

        <!-- Kunjungan -->
        <div class="d-flex justify-content-between">
            <h2 class="small-title">Riwayat Kunjungan</h2>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 gx-5 mb-5">
            <div class="col">
                <div class="card h-100">
                    <img src="img/product/small/product-4.webp" class="card-img-top sh-19" alt="card image" />
                    <div class="card-body">
                        <h5 class="heading mb-3">
                            <a href="blog-wisata.html" class="body-link stretched-link">
                                <span class="clamp-line sh-5" data-line="2">Apple Cake Recipe for
                                    Starters</span>
                            </a>
                        </h5>
                        <div>
                            <div class="row g-0">
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="eye" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">421</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="like" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">34</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="message" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">15</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="bookmark" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">4</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/product/small/product-10.webp" class="card-img-top sh-19" alt="card image" />
                    <div class="card-body">
                        <h5 class="heading mb-3">
                            <a href="blog-wisata.html" class="body-link stretched-link">
                                <span class="clamp-line sh-5" data-line="2">A Complete Guide to Mix
                                    Dough for the Molds</span>
                            </a>
                        </h5>
                        <div>
                            <div class="row g-0">
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="eye" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">421</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="like" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">34</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="message" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">15</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="bookmark" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">4</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="img/product/small/product-6.webp" class="card-img-top sh-19" alt="card image" />
                    <div class="card-body">
                        <h5 class="heading mb-3">
                            <a href="blog-wisata.html" class="body-link stretched-link">
                                <span class="clamp-line sh-5" data-line="2">Basic Introduction to
                                    Bread Making</span>
                            </a>
                        </h5>
                        <div>
                            <div class="row g-0">
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="eye" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">421</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="like" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">34</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="message" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">15</span>
                                </div>
                                <div class="col-auto pe-3">
                                    <i data-acorn-icon="bookmark" class="text-primary me-0" data-acorn-size="15"></i>
                                    <span class="align-middle">4</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection