@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">

            <div class="col-12 col-xl-4 col-xxl-3">
                <!-- Biography Start -->
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
                            <div class="d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100">
                                <a href="{{ route('profile.edit', ['username' => $user->username]) }}" type="button"
                                    class="btn btn-primary w-100 me-2"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        class="acorn-icons acorn-icons-edit undefined">
                                        <path
                                            d="M14.6264 2.54528C15.0872 2.08442 15.6782 1.79143 16.2693 1.73077C16.8604 1.67011 17.4032 1.84674 17.7783 2.22181C18.1533 2.59689 18.33 3.13967 18.2693 3.73077C18.2087 4.32186 17.9157 4.91284 17.4548 5.3737L6.53226 16.2962L2.22192 17.7782L3.70384 13.4678L14.6264 2.54528Z">
                                        </path>
                                    </svg>
                                    <span>Ubah</span></a>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div
                                        class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="paint-roller" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Rencana Kunjungan</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">1.124</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div
                                        class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="like" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Suka</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">12.573</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 align-items-center mb-2">
                                <div class="col-auto">
                                    <div
                                        class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                        <i data-acorn-icon="user" class="text-primary"></i>
                                    </div>
                                </div>
                                <div class="col ps-3">
                                    <div class="row g-0">
                                        <div class="col">
                                            <div class="sh-5 d-flex align-items-center lh-1-25">Ulasan</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="sh-5 d-flex align-items-center">1.245</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($user->bio)
                            <div class="mb-5">
                                <p class="text-small text-muted mb-2">Biografi</p>
                                <p>
                                    {{ $user->bio }}
                                </p>
                            </div>
                        @endif

                    </div>
                </div>
                <!-- Biography End -->
            </div>
            <!-- Left Side End -->

            <!-- Right Side Start -->
            <div class="col-12 col-xl-8 col-xxl-9">
                <!-- Title Tabs Start -->
                <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#rencanaKunjunganTab" role="tab"
                            aria-selected="true">Rencana Kunjungan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#sukaTab" role="tab"
                            aria-selected="false">Suka</a>
                    </li>
                    <li class="nav-item dropdown ms-auto d-none responsive-tab-dropdown">
                        <a class="btn btn-icon btn-icon-only btn-background pt-0" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-diplay="static">
                            <i data-acorn-icon="more-horizontal"></i>
                        </a>
                        <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                    </li>
                </ul>
                <!-- Title Tabs End -->

                <div class="tab-content">
                    <!-- Projects Tab Start -->
                    <div class="tab-pane fade active show" id="rencanaKunjunganTab" role="tabpanel">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-3 g-2 mb-5">
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-1.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">153</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">5</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">29</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Introduction to Bread Making
                                                    </h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Blaine Cottrell</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-2.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">224</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">2</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">52</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">14 Facts About Sugar Products
                                                    </h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Cherish Kerr</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-3.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">13</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">5</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">12</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Apple Cake Recipe</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Kirby Peters</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-4.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">155</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">6</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">46</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Complete Guide to Mix Dough</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Olli Hawkins</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-5.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">82</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">4</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">3</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">10 Secrets Every Southern Baker
                                                        Knows</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Kathryn Mengel</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-6.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">55</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">1</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">4</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Recipes for Sweet and Healty
                                                        Treats
                                                    </h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Esperanza Lodge</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-7.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">49</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">19</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">8</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Mix Dough for the Molds</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Zayn Hartley</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-8.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">81</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">13</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">5</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Basic Introduction for Dough
                                                        Molding
                                                    </h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Joisse Kaycee</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-9.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">64</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">9</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">3</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Mix Dough for the Molds</h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Kirby Peters</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-10.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">35</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">2</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">5</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Introduction to Baking Donut
                                                    </h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Peter Linatti</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-2.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">27</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">12</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">8</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">Apple Cake Recipe for Starters
                                                    </h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Rosa Holt</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card sh-35 hover-img-scale-up hover-reveal">
                                    <img src="img/product/small/product-6.webp" class="card-img h-100 scale"
                                        alt="card image" />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-between reveal-content">
                                        <div class="row g-0">
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="eye" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">15</span>
                                            </div>
                                            <div class="col-auto pe-3">
                                                <i data-acorn-icon="message" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">2</span>
                                            </div>
                                            <div class="col-auto">
                                                <i data-acorn-icon="like" class="text-white me-1"
                                                    data-acorn-size="15"></i>
                                                <span class="align-middle text-white">0</span>
                                            </div>
                                        </div>
                                        <div class="row g-0">
                                            <div class="col pe-2">
                                                <a href="Pages.Portfolio.Detail.html" class="stretched-link">
                                                    <h5 class="heading text-white mb-1">6 Facts About Sugar Products
                                                    </h5>
                                                </a>
                                                <div class="d-inline-block">
                                                    <div class="text-white">Josh Henderson</div>
                                                </div>
                                            </div>
                                            <div class="col-auto me-auto">
                                                <button class="btn btn-icon btn-icon-only btn-foreground mb-1"
                                                    type="button">
                                                    <i data-acorn-icon="like"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-xl btn-outline-primary sw-30">Load More</button>
                        </div>
                    </div>
                    <!-- Projects Tab End -->

                    <!-- Collections Tab Start -->
                    <div class="tab-pane fade" id="sukaTab" role="tabpanel">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-3 g-2">
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col h-100">
                                                <a href="img/product/large/product-1.webp"
                                                    class="w-100 h-100 rounded-xl-top-start bg-cover-center d-block"
                                                    style="background-image: url(img/product/small/product-1.webp)"></a>
                                            </div>
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a href="img/product/large/product-1.webp"
                                                        class="w-100 h-100 rounded-xl-top-end bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-1.webp)"></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a href="img/product/large/product-1.webp"
                                                        class="w-100 h-100 bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-1.webp)"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">Apple Cake Recipe for
                                                    Starters</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a href="img/product/large/product-2.webp"
                                                        class="w-100 h-100 rounded-xl-top bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-2.webp)"></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a href="img/product/large/product-2.webp"
                                                        class="w-100 h-100 bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-2.webp)"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">Basic Introduction for Dough
                                                    Molding</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col h-100">
                                                <a href="img/product/large/product-4.webp"
                                                    class="w-100 h-100 rounded-xl-top-start bg-cover-center d-block"
                                                    style="background-image: url(img/product/small/product-4.webp)"></a>
                                            </div>
                                            <div class="col h-100">
                                                <a href="img/product/large/product-4.webp"
                                                    class="w-100 h-100 rounded-xl-top-end bg-cover-center d-block"
                                                    style="background-image: url(img/product/small/product-4.webp)"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">Recipes for Sweet and Healty
                                                    Treats</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a href="img/product/large/product-5.webp"
                                                        class="w-100 h-100 rounded-xl-top-start bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-5.webp)"></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a href="img/product/large/product-5.webp"
                                                        class="w-100 h-100 bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-5.webp)"></a>
                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a href="img/product/large/product-5.webp"
                                                        class="w-100 h-100 rounded-xl-top-end bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-5.webp)"></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a href="img/product/large/product-5.webp"
                                                        class="w-100 h-100 bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-5.webp)"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">10 Secrets Every Southern Baker
                                                    Knows</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 col-xxl-6">
                                <div class="card">
                                    <div class="sh-35">
                                        <div class="row g-1 h-100 gallery">
                                            <div class="col d-flex flex-column justify-content-stretch h-100">
                                                <div class="d-flex mb-1 flex-grow-1">
                                                    <a href="img/product/large/product-6.webp"
                                                        class="w-100 h-100 rounded-xl-top bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-6.webp)"></a>
                                                </div>
                                                <div class="d-flex flex-grow-1">
                                                    <a href="img/product/large/product-6.webp"
                                                        class="w-100 h-100 bg-cover-center d-block"
                                                        style="background-image: url(img/product/small/product-6.webp)"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="heading mb-0">
                                            <a href="#" class="body-link sh-5 d-inline-block">
                                                <span class="clamp-line" data-line="2">Basic Introduction to Cornbread
                                                    Making</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Collections Tab End -->

                </div>
            </div>
            <!-- Right Side End -->
        </div>

        @endsection