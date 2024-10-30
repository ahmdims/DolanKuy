@extends('layouts.app')

@section('title', $detail->name)

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card mb-4">

                <!-- Content Start -->
                <div class="card-body p-0">

                    <div class="glide glide-gallery" id="glideBlogDetail">
                        <div class="glide glide-large">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides gallery-glide-custom">
                                    @foreach($detail->images as $image)
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
                                    @foreach($detail->images as $image)
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
                                <!-- Social Buttons Start -->
                                <div class="col-6 text-muted">
                                    <div class="row g-0">
                                        <div class="col-auto pe-3">
                                            <i data-acorn-icon="eye" class="text-primary me-1" data-acorn-size="20"></i>
                                            <span class="align-middle">{{ $detail->ViewCount() }}</span>
                                        </div>

                                        <div class="col-auto pe-3">
                                            <form action="{{ route('culture.like', $detail->slug) }}" method="POST">
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
                                            <form action="{{ route('culture.history', $detail->slug) }}"
                                                method="POST">
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
                                <!-- Social Buttons End -->
                            </div>
                        </div>

                        <div>
                            {!! $detail->description !!}
                        </div>
                    </div>
                </div>
                <!-- Content End -->

            </div>

            <!-- Comments Start -->
            <section class="scroll-section" id="openStreetMap">
                <div class="card">
                    <div class="card-body">
                        <div class="cta-3"><span>{{ $totalComments }}</span> Komentar</div>

                        @foreach($comments->reverse() as $comment)
                            <div class="d-flex align-items-center border-bottom border-separator-light pb-3 mt-3">
                                <div class="row g-0 w-100">
                                    <div class="col-auto">
                                        <div class="sw-5 me-3">
                                            <img src="{{ $comment->user->profile_picture ?? asset('img/profile/profile.webp') }}"
                                                class="img-fluid rounded-xl" alt="{{ $comment->user->name }}" />
                                        </div>
                                    </div>
                                    <div class="col pe-3">
                                        <a href="#">{{ $comment->user->name }}</a>
                                        <div class="text-muted text-small mb-2">
                                            {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                        </div>
                                        <div class="text-medium text-alternate lh-1-25">{{ $comment->comment }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="mt-5">
                            <form action="{{ route('culture.comments.store', $detail->slug) }}" method="POST"
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
            <!-- Comments End -->

        </div>

    </div>
</div>

@endsection