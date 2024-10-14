<!-- Leaflet.js CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<!-- Leaflet GeoSearch CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch/dist/geosearch.css" />

<!-- Modal untuk update destinasi -->
<div class="modal fade modal-close-out" id="updateModal-{{ $destinasi_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('destination.update', $destinasi_data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_destinasi" class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control" id="nama_destinasi" name="nama_destinasi"
                            value="{{ $destinasi_data->nama_destinasi }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                            value="{{ $destinasi_data->deskripsi }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ $destinasi_data->alamat }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota" value="{{ $destinasi_data->kota }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi"
                            value="{{ $destinasi_data->provinsi }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude-{{ $destinasi_data->id }}" name="latitude"
                            value="{{ $destinasi_data->latitude }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude-{{ $destinasi_data->id }}" name="longitude"
                            value="{{ $destinasi_data->longitude }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="map" class="form-label">Peta Lokasi</label>
                        <div id="map-{{ $destinasi_data->id }}" style="height: 300px;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam_buka" class="form-label">Jam Buka</label>
                        <input type="time" class="form-control" id="jam_buka" name="jam_buka"
                            value="{{ $destinasi_data->jam_buka }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jam_tutup" class="form-label">Jam Tutup</label>
                        <input type="time" class="form-control" id="jam_tutup" name="jam_tutup"
                            value="{{ $destinasi_data->jam_tutup }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_tiket" class="form-label">Harga Tiket</label>
                        <input type="text" class="form-control" id="harga_tiket" name="harga_tiket"
                            value="{{ $destinasi_data->harga_tiket }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas"
                            value="{{ $destinasi_data->fasilitas }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="kontak" name="kontak"
                            value="{{ $destinasi_data->kontak }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Leaflet.js JavaScript -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<!-- Leaflet GeoSearch JavaScript -->
<script src="https://unpkg.com/leaflet-geosearch/dist/geosearch.umd.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ketika modal ditampilkan, pastikan peta ter-render ulang
        $('#updateModal-{{ $destinasi_data->id }}').on('shown.bs.modal', function () {
            // Hapus dan inisialisasi ulang peta untuk menghindari masalah rendering
            document.getElementById('map-{{ $destinasi_data->id }}').innerHTML = "";

            // Ambil nilai latitude dan longitude dari input
            let latitude = document.getElementById('latitude-{{ $destinasi_data->id }}').value || -7.797068;  // Default Yogyakarta
            let longitude = document.getElementById('longitude-{{ $destinasi_data->id }}').value || 110.370529;  // Default Yogyakarta

            // Inisialisasi peta
            var map = L.map('map-{{ $destinasi_data->id }}').setView([latitude, longitude], 13);  // 13 adalah zoom level

            // Tambahkan tile layer untuk tampilan peta
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Tambahkan marker berdasarkan latitude dan longitude
            var marker = L.marker([latitude, longitude], {draggable: true}).addTo(map);

            // Update latitude dan longitude saat marker dipindah
            marker.on('dragend', function (e) {
                var position = marker.getLatLng();
                document.getElementById('latitude-{{ $destinasi_data->id }}').value = position.lat;
                document.getElementById('longitude-{{ $destinasi_data->id }}').value = position.lng;
            });

            // Event listener untuk mengubah peta saat input latitude/longitude berubah dari input
            function updateMap() {
                let lat = document.getElementById('latitude-{{ $destinasi_data->id }}').value;
                let lon = document.getElementById('longitude-{{ $destinasi_data->id }}').value;
                marker.setLatLng([lat, lon]);  // Update posisi marker
                map.setView([lat, lon], 13);  // Update tampilan peta
            }

            // Event listener untuk mengubah peta saat input latitude/longitude berubah
            document.getElementById('latitude-{{ $destinasi_data->id }}').addEventListener('input', updateMap);
            document.getElementById('longitude-{{ $destinasi_data->id }}').addEventListener('input', updateMap);

            // Event listener untuk mengubah latitude/longitude saat peta diklik
            map.on('click', function (e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                document.getElementById('latitude-{{ $destinasi_data->id }}').value = lat;
                document.getElementById('longitude-{{ $destinasi_data->id }}').value = lng;
                marker.setLatLng([lat, lng]);  // Update posisi marker
            });

            // Inisialisasi pencarian lokasi
            const { GeoSearch } = window.GeoSearch;
            const provider = new GeoSearch.OpenStreetMapProvider();

            const searchControl = new GeoSearch.Control({
                provider: provider,
                style: 'bar',
                autoComplete: true,
                autoCompleteDelay: 250,
            });

            // Tambahkan kontrol pencarian ke peta
            map.addControl(searchControl);

            // Event listener untuk mengupdate peta dan marker saat lokasi dicari
            searchControl.on('result', function (result) {
                const { y, x } = result.coordinates; // Mengambil koordinat dari hasil pencarian
                document.getElementById('latitude-{{ $destinasi_data->id }}').value = y;
                document.getElementById('longitude-{{ $destinasi_data->id }}').value = x;
                marker.setLatLng([y, x]);  // Update posisi marker
                map.setView([y, x], 13);  // Update tampilan peta
            });
        });
    });
</script>
