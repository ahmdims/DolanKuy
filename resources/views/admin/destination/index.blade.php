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
            <td>{{ $destinasi_data->nama_destinasi }}</td>
            <td>{{ $destinasi_data->alamat }}</td>
            <td>{{ $destinasi_data->kota }}</td>
            <td>{{ $destinasi_data->provinsi }}</td>
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
            <form method="POST" action="{{ route('destination.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nama_destinasi" class="form-label">Nama Destinasi</label>
                  <input type="text" class="form-control" name="nama_destinasi" required>
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" required>
                </div>
                <div class="mb-3">
                  <label for="kota" class="form-label">Kota</label>
                  <input type="text" class="form-control" name="kota" required>
                </div>
                <div class="mb-3">
                  <label for="provinsi" class="form-label">Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" required>
                </div>

                <!-- Map for location selection -->
                <div class="mb-3">
                    <label for="map" class="form-label">Cari Lokasi</label>
                    <input type="text" id="location-search" class="form-control"/></div>

                    <div class="mb-3" id="map" style="height: 300px;"></div>

                <div class="mb-3">
                  <label for="latitude" class="form-label">Latitude</label>
                  <input type="text" class="form-control" name="latitude" id="latitude" readonly>
                </div>
                <div class="mb-3">
                  <label for="longitude" class="form-label">Longitude</label>
                  <input type="text" class="form-control" name="longitude" id="longitude" readonly>
                </div>

                <div class="mb-3">
                  <label for="jam_buka" class="form-label">Jam Buka</label>
                  <input type="time" class="form-control" name="jam_buka" required>
                </div>
                <div class="mb-3">
                  <label for="jam_tutup" class="form-label">Jam Tutup</label>
                  <input type="time" class="form-control" name="jam_tutup" required>
                </div>
                <div class="mb-3">
                  <label for="harga_tiket" class="form-label">Harga Tiket</label>
                  <input type="number" class="form-control" name="harga_tiket" required>
                </div>
                <div class="mb-3">
                  <label for="fasilitas" class="form-label">Fasilitas</label>
                  <input type="text" class="form-control" name="fasilitas" placeholder="Optional">
                </div>
                <div class="mb-3">
                  <label for="kontak" class="form-label">Kontak</label>
                  <input type="text" class="form-control" name="kontak" placeholder="Optional">
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

<!-- Leaflet JS & Map Initialization -->
<script>
  var map = L.map('map').setView([-6.200000, 106.816666], 13); // Default location: Jakarta

  // Add OpenStreetMap tile layer
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  var marker;

  // Handle map click event to get latitude and longitude
  map.on('click', function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;

    // If marker exists, move it, otherwise add a new marker
    if (marker) {
      marker.setLatLng(e.latlng);
    } else {
      marker = L.marker(e.latlng).addTo(map);
    }

    // Set latitude and longitude in input fields
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
  });

  // Adjust map size when modal is shown
  var createModal = document.getElementById('createModal');
  createModal.addEventListener('shown.bs.modal', function () {
    setTimeout(function() {
      map.invalidateSize();
    }, 500); // Wait for modal to fully open
  });

  // Pencarian lokasi
  document.getElementById('location-search').addEventListener('keyup', function() {
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

            // Update map view
            map.setView([lat, lon], 13);
            marker = L.marker([lat, lon]).addTo(map);

            // Set latitude and longitude in input fields
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;
          }
        })
        .catch(error => console.error('Error:', error));
    }
  });
</script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTable
        var table = $('#datatableHover').DataTable({
            paging: true,
            searching: true, // Mengaktifkan fitur pencarian
            order: [], // Tidak mengurutkan berdasarkan kolom apapun secara default
            lengthMenu: [5, 10, 20], // Menentukan jumlah item per halaman
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

        // Event listener untuk pencarian
        $('.datatable-search').on('keyup change', function() {
            table.search(this.value).draw();
        });
    });
</script>

@endsection
