@extends('layouts.app')

@section('title', 'Destinasi Wisata')

@section('content')
<script src="{{ asset('leaflet/leaflet-src.esm.js') }}"></script>
<script src="{{ asset('leaflet/leaflet-src.esm.js.map') }}"></script>
<script src="{{ asset('leaflet/leaflet-src.js') }}"></script>
<script src="{{ asset('leaflet/leaflet-src.js.map') }}"></script>
<style src="{{ asset('leaflet/leaflet.css') }}"></style>
<script src="{{ asset('leaflet/leaflet.js') }}"></script>
<script src="{{ asset('leaflet/leaflet.js.map') }}"></script>

<!-- Include jQuery -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-geosearch/dist/leaves.js"></script>
<script src="https://unpkg.com/leaflet-geosearch/dist/geosearch.umd.js"></script>

<section class="scroll-section" id="stripe">
    <div class="card mb-5">
        <div class="card-body">

            <div class="row">
                <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
                    <div
                        class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 border border-separator bg-foreground search-sm">
                        <input class="form-control form-control-sm datatable-search" placeholder="Cari"
                            data-datatable="#datatableStripe" />
                        <span class="search-magnifier-icon">
                            <i data-acorn-icon="search"></i>
                        </span>
                        <span class="search-delete-icon d-none">
                            <i data-acorn-icon="close"></i>
                        </span>
                    </div>
                </div>
                <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 text-end mb-1">
                    <div class="d-inline-block">
                        <button data-bs-toggle="modal" data-bs-target="#createModal"
                            class="btn btn-icon btn-outline-muted btn-sm datatable-print" type="button">
                            <i data-acorn-icon="plus"></i>
                            <span>Tambah @yield('title')</span>
                        </button>

                        <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm datatable-print"
                            type="button" data-datatable="#datatableStripe">
                            <i data-acorn-icon="print"></i>
                        </button>

                        <div class="d-inline-block datatable-export" data-datatable="#datatableStripe">
                            <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown"
                                data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                                <i data-acorn-icon="download"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                <button class="dropdown-item export-copy" type="button">Copy</button>
                                <button class="dropdown-item export-excel" type="button">Excel</button>
                                <button class="dropdown-item export-cvs" type="button">Cvs</button>
                            </div>
                        </div>
                        <div class="dropdown-as-select d-inline-block datatable-length"
                            data-datatable="#datatableStripe">
                            <button class="btn btn-outline-muted btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                data-bs-offset="0,3">
                                10 Items
                            </button>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                <a class="dropdown-item" href="#">5 Items</a>
                                <a class="dropdown-item active" href="#">10 Items</a>
                                <a class="dropdown-item" href="#">20 Items</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stripe Controls End -->

            <!-- Stripe Table Start -->
            <table class="data-table data-table-pagination data-table-standard responsive nowrap stripe"
                id="datatableStripe">
                <thead>
                    <tr>
                        <th class="text-muted text-small text-uppercase">#</th>
                        <th class="text-muted text-small text-uppercase">Nama Destinasi</th>
                        <th class="text-muted text-small text-uppercase">Gambar</th>
                        <th class="text-muted text-small text-uppercase">Kota</th>
                        <th class="text-muted text-small text-uppercase">Provinsi</th>
                        <th class="text-muted text-small text-uppercase">Alamat</th>
                        <th class="text-muted text-small text-uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($destination as $destination_data)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $destination_data->name }}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#imagesModal-{{ $destination_data->id }}"
                                    type="button" class="btn btn-sm btn-icon btn-icon-start btn-primary mb-1 me-1"
                                    title="Images">
                                    Lihat
                                </a>
                            </td>
                            <td>{{ $destination_data->city }}</td>
                            <td>{{ $destination_data->province }}</td>
                            <td>{{ $destination_data->address }}</td>
                            <td>
                                <div class="d-flex align-items-center" style="height: 100%;">
                                    <a data-bs-toggle="modal" data-bs-target="#detailModal-{{ $destination_data->id }}"
                                        type="button" class="btn btn-icon btn-icon-only btn-info mb-1 me-1" title="Detail">
                                        <i data-acorn-icon="search"></i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#updateModal-{{ $destination_data->id }}"
                                        type="button" class="btn btn-icon btn-icon-only btn-warning mb-1 me-1"
                                        title="Update">
                                        <i data-acorn-icon="edit"></i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $destination_data->id }}"
                                        type="button" class="btn btn-icon btn-icon-only btn-danger mb-1" title="Delete">
                                        <i data-acorn-icon="bin"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        @include('admin.destination.detail', ['destination_data' => $destination_data])
                        @include('admin.destination.create', ['destination_data' => $destination_data])
                        @include('admin.destination.update', ['destination_data' => $destination_data])
                        @include('admin.destination.delete', ['destination_data' => $destination_data])
                        @include('admin.destination.images', ['destination_data' => $destination_data])
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
</section>

<!-- Page Insert Scripts Start -->
<script>
    var map = L.map('map').setView([-6.24186355, 106.99991249], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© DolanKuy'
    }).addTo(map);

    var marker;

    map.on('click', function (e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });

    var createModal = document.getElementById('createModal');
    createModal.addEventListener('shown.bs.modal', function () {
        setTimeout(function () {
            map.invalidateSize();
        }, 500);
    });

    document.getElementById('location-search').addEventListener('keyup', function () {
        var query = this.value;
        if (query.length > 2) {
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
                .then(response => response.json())
                .then(data => {
                    // Clear previous markers
                    if (marker) {
                        map.removeLayer(marker);
                    }

                    if (data.length > 0) {
                        var lat = data[0].lat;
                        var lon = data[0].lon;

                        map.setView([lat, lon], 13);
                        marker = L.marker([lat, lon]).addTo(map);

                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lon;
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>

@endsection