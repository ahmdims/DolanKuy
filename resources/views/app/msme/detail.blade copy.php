@extends('layouts.app')

@section('title', $msme->name)

@section('content')
    <div class="container">
        <h1>{{ $msme->name }}</h1>
        <img src="{{ $msme->profile_photo }}" alt="{{ $msme->name }}" class="img-fluid">
        
        <div class="mt-4">
            <p><strong>Tipe:</strong> {{ $msme->msmes_type }}</p>
            <p><strong>Deskripsi:</strong> {{ $msme->description }}</p>
            <p><strong>Alamat:</strong> {{ $msme->address }}, {{ $msme->city }}, {{ $msme->province }}</p>
            <p><strong>Kontak:</strong> {{ $msme->contact }}</p>
            <p><strong>Rating:</strong> {{ $msme->rating }}</p>
            <p><strong>Harga Tiket:</strong> Rp. {{ number_format($msme->ticket_price, 0, ',', '.') }}</p>
            <p><strong>Jam Buka:</strong> {{ $msme->opening_time }}</p>
            <p><strong>Jam Tutup:</strong> {{ $msme->closing_time }}</p>
            <p><strong>Fasilitas:</strong> {{ $msme->facilities }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection