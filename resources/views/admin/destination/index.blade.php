@extends('layouts.admin')

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


<section class="scroll-section" id="hover">
  <div class="card mb-5">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
          <div
            class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 border border-separator bg-foreground search-sm">
            <input class="form-control form-control-sm datatable-search" placeholder="Cari"
              data-datatable="#datatableHover" />
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
            <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm datatable-print" type="button"
              data-datatable="#datatableHover">
              <i data-acorn-icon="print"></i>
            </button>

            <div class="d-inline-block datatable-export" data-datatable="#datatableHover">
              <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown" data-bs-toggle="dropdown"
                type="button" data-bs-offset="0,3">
                <i data-acorn-icon="download"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                <button class="dropdown-item export-copy" type="button">Salin</button>
                <button class="dropdown-item export-excel" type="button">Excel</button>
                <button class="dropdown-item export-cvs" type="button">Cvs</button>
              </div>
            </div>
            <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableHover">
              <button class="btn btn-outline-muted btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                10 Item
              </button>
              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                <a class="dropdown-item active" href="#">5 Item</a>
                <a class="dropdown-item" href="#">10 Item</a>
                <a class="dropdown-item" href="#">20 Item</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <table class="data-table data-table-pagination data-table-standard responsive nowrap hover" id="datatableHover">
        <thead>
          <tr>
            <th class="text-muted text-small text-uppercase">#</th>
            <th class="text-muted text-small text-uppercase">Nama Destinasi</th>
            <th class="text-muted text-small text-uppercase">Alamat</th>
            <th class="text-muted text-small text-uppercase">Kota</th>
            <th class="text-muted text-small text-uppercase">Provinsi</th>
            <th class="text-muted text-small text-uppercase">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($destination as $destinasi_data)

        <tr>
        <td>{{ $loop->iteration }}.</td>
        <td>{{ $destinasi_data->name }}</td>
        <td>{{ $destinasi_data->address }}</td>
        <td>{{ $destinasi_data->city }}</td>
        <td>{{ $destinasi_data->province }}</td>
        <td>
          <div class="d-flex align-items-center" style="height: 100%;">
          <a data-bs-toggle="modal" data-bs-target="#detailModal-{{ $destinasi_data->id }}" type="button"
            class="btn btn-icon btn-icon-only btn-info mb-1 me-1" title="Detail">
            <i data-acorn-icon="search"></i>
          </a>
          <a data-bs-toggle="modal" data-bs-target="#updateModal-{{ $destinasi_data->id }}" type="button"
            class="btn btn-icon btn-icon-only btn-warning mb-1 me-1" title="Update">
            <i data-acorn-icon="edit"></i>
          </a>
          <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $destinasi_data->id }}" type="button"
            class="btn btn-icon btn-icon-only btn-danger mb-1" title="Delete">
            <i data-acorn-icon="bin"></i>
          </a>
          </div>
        </td>
        </tr>
        @include('admin.destination.detail', ['destinasi_data' => $destinasi_data])
        @include('admin.destination.update', ['destinasi_data' => $destinasi_data])
        @include('admin.destination.delete', ['destinasi_data' => $destinasi_data])

      @endforeach
        </tbody>
      </table>

      <!-- Create Modal -->
      <div class="modal fade modal-close-out" id="createModal" tabindex="-1" role="dialog" aria-labelledby="Modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Modal">Tambah @yield('title')</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="dropzone" id="my-dropzone" method="POST" action="{{ route('destination.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="mb-3">
                    <label for="images" class="form-label">Upload Images</label>
                    <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*">
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Destinasi</label>
                  <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Alamat</label>
                  <input type="text" class="form-control" name="address" required>
                </div>
                <div class="mb-3">
                  <label for="city" class="form-label">Kota</label>
                  <input type="text" class="form-control" name="city" required>
                </div>
                <div class="mb-3">
                  <label for="province" class="form-label">Provinsi</label>
                  <input type="text" class="form-control" name="province" required>
                </div>

                <div class="mb-3">
                  <label for="map" class="form-label">Cari Lokasi</label>
                  <input type="text" id="location-search" class="form-control" />
                </div>

                <div class="map-edit mb-3" id="map"></div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" class="form-control" name="latitude" id="latitude" readonly>
                  </div>
                  <div class="col-md-6">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" class="form-control" name="longitude" id="longitude" readonly>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="opening_time" class="form-label">Jam Buka</label>
                  <input type="time" class="form-control" name="opening_time" required>
                </div>
                <div class="mb-3">
                  <label for="closing_time" class="form-label">Jam Tutup</label>
                  <input type="time" class="form-control" name="closing_time" required>
                </div>
                <div class="mb-3">
                  <label for="ticket_price" class="form-label">Harga Tiket</label>
                  <input type="number" class="form-control" name="ticket_price" required>
                </div>
                <div class="mb-3">
                  <label for="facilities" class="form-label">Fasilitas</label>
                  <input type="text" class="form-control" name="facilities" placeholder="Optional">
                </div>
                <div class="mb-3">
                  <label for="contact" class="form-label">Kontak</label>
                  <input type="text" class="form-control" name="contact" placeholder="Optional">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
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

<script>
  $(document).ready(function () {
    var table = $('#datatableHover').DataTable({
      paging: true,
      searching: true,
      order: [],
      lengthMenu: [5, 10, 20],
      language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ item",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ item",
        paginate: {
          first: "Pertama",
          last: "Terakhir",
          next: "Selanjutnya",
          previous: "Sebelumnya"
        }
      }
    });

    $('.datatable-search').on('keyup change', function () {
      table.search(this.value).draw();
    });
  });
</script>
<!-- Page Insert Scripts End -->
@endsection
