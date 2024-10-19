@extends('layouts.admin')

@section('title', 'Kontak')

@section('content')

<div class="container px-5 my-5">
    <div class="container-fluid px-0">
        <section class="main-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-8">
                        <div class="card mb-0 me-4 ms-0">
                            <div class="card-body">
                                <form class="row g-3" method="POST" action="{{ route('contact.update') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputPhone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="inputPhone" name="phone"
                                            placeholder="Masukkan Nomer" required
                                            value="{{ old('phone', $contact->phone ?? '') }}"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" name="email"
                                            placeholder="Masukkan Email" required
                                            value="{{ old('email', $contact->email ?? '') }}"/>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <textarea class="form-control" id="inputAddress" name="address" rows="4"
                                            placeholder="Masukkan Alamat" required>{{ old('address', $contact->address ?? '') }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update Kontak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
