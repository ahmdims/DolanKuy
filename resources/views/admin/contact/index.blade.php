@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

<section class="scroll-section" id="stripe">
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">

                <form method="POST" action="{{ route('contact.update') }}">
                    @csrf
                    <div class="col-12 mb-5">
                        <label for="inputPhone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="inputPhone" name="phone" required
                            value="{{ old('phone', $contact->phone ?? '') }}" />
                    </div>
                    <div class="col-12 mb-5">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" required
                            value="{{ old('email', $contact->email ?? '') }}" />
                    </div>
                    <div class="col-12 mb-5">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <textarea class="form-control" id="inputAddress" name="address" rows="4" required>{{ old('address', $contact->address ?? '') }}</textarea>
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
