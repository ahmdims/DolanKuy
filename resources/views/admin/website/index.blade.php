@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

<section class="scroll-section" id="stripe">
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">

                <form method="POST" action="{{ route('website.update') }}">
                    @csrf
                    <div class="col-12 mb-5">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required
                            value="{{ old('phone', $website->phone ?? '') }}" />
                    </div>
                    <div class="col-12 mb-5">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            value="{{ old('email', $website->email ?? '') }}" />
                    </div>
                    <div class="col-12 mb-5">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="4" required>{{ old('address', $website->address ?? '') }}</textarea>
                    </div>
                    <div class="col-12 mb-5">
                        <label for="video" class="form-label">Video Profil</label>
                        <input type="text" class="form-control" id="video" name="video" required
                            value="{{ old('video', $website->video ?? '') }}" />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Ubah Kontak</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

@endsection
