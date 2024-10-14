@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<div class="container px-5">
    <div class="row">
        <div class="col-12 col-xl-8 col-xxl-9 mb-5 w-100">
            <div id="accordionCards">
                <div class="mb-n2">
                    @foreach($faq as $faq_data)
                        <div class="card d-flex mb-2">
                            <div class="d-flex flex-grow-1" role="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwoCards{{ $faq_data->id }}" aria-expanded="true"
                                aria-controls="collapseTwoCards{{ $faq_data->id }}">
                                <div class="card-body py-4">
                                    <div class="btn btn-link list-item-heading p-0">{{ $faq_data->pertanyaan }}</div>
                                </div>
                            </div>
                            <div id="collapseTwoCards{{ $faq_data->id }}" class="collapse" data-bs-parent="#accordionCards">
                                <div class="card-body accordion-content pt-0">
                                    <div class="mb-2">
                                        <p>{{ $faq_data->jawaban }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <strong>Tanggal Dibuat:</strong>
                                        </div>
                                        <div class="col text-end">
                                            {{ \Carbon\Carbon::parse($faq_data->created_at)->format('d M Y, H:i') }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <strong>Tanggal Pembaruan:</strong>
                                        </div>
                                        <div class="col text-end">
                                            {{ \Carbon\Carbon::parse($faq_data->updated_at)->format('d M Y, H:i') }}
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
</div>

@endsection