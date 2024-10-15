@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

<div class="container px-5 my-5">
    <div class="container-fluid px-0">
        <!-- Kirim Pesan -->
        <section class="main-content">
            <div class="container-fluid p-0">
                <div class="section-header mb-4">
                    <h3 class="section-title">Kirim Pesan</h3>
                </div>
                <div class="row g-0">
                    <!-- Kirim Pesan -->
                    <div class="col-lg-8">
                        <div class="card mb-0 me-4 ms-0">
                            <div class="card-body">
                                <form class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputName" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputName"
                                            placeholder="Masukkan Nama" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail"
                                            placeholder="Masukkan Email" required />
                                    </div>
                                    <div class="col-12">
                                        <label for="inputSubject" class="form-label">Subjek</label>
                                        <input type="text" class="form-control" id="inputSubject"
                                            placeholder="Masukkan Subjek" required />
                                    </div>
                                    <div class="col-12">
                                        <label for="inputMessage" class="form-label">Pesan</label>
                                        <textarea class="form-control" id="inputMessage" rows="4"
                                            placeholder="Masukkan Pesan" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak -->
                    <div class="col-lg-4">
                        <!-- Card 1 -->
                        <div class="card mb-4 text-start">
                            <div
                                class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                <i data-acorn-icon="phone" class="text-primary mb-3 fs-5"></i>
                                <h5 class="card-text">{{ $contact->phone }}</h5>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="card mb-4 text-start">
                            <div
                                class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                <i data-acorn-icon="email" class="text-primary mb-3 fs-5"></i>
                                <h5 class="card-text">{{ $contact->email }}</h5>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="card mb-4 text-start">
                            <div
                                class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                <i data-acorn-icon="compass" class="text-primary mb-3 fs-5"></i>
                                <h5 class="card-text">{{ $contact->address }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection