<!-- Leaflet.js CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

<!-- Modal untuk menampilkan detail destinasi -->
<div class="modal fade modal-close-out" id="detailModal-{{ $destinasi_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Detail @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_destinasi" class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control" name="nama_destinasi"
                            value="{{ $destinasi_data->nama_destinasi }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" value="{{ $destinasi_data->deskripsi }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $destinasi_data->alamat }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" name="kota" value="{{ $destinasi_data->kota }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" value="{{ $destinasi_data->provinsi }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" name="latitude" value="{{ $destinasi_data->latitude }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" name="longitude" value="{{ $destinasi_data->longitude }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="map" class="form-label">Peta Lokasi</label>
                        <div id="map-detail-{{ $destinasi_data->id }}" style="height: 300px;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam_buka" class="form-label">Jam Buka</label>
                        <input type="time" class="form-control" name="jam_buka" value="{{ $destinasi_data->jam_buka }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jam_tutup" class="form-label">Jam Tutup</label>
                        <input type="time" class="form-control" name="jam_tutup" value="{{ $destinasi_data->jam_tutup }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="harga_tiket" class="form-label">Harga Tiket</label>
                        <input type="text" class="form-control" name="harga_tiket"
                            value="{{ $destinasi_data->harga_tiket }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" name="fasilitas" value="{{ $destinasi_data->fasilitas }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" class="form-control" name="kontak" value="{{ $destinasi_data->kontak }}"
                            readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Leaflet.js JavaScript -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ketika modal detail dibuka
        $('#detailModal-{{ $destinasi_data->id }}').on('shown.bs.modal', function () {
            // Hapus isi peta sebelum merender ulang
            document.getElementById('map-detail-{{ $destinasi_data->id }}').innerHTML = "";

            // Ambil nilai latitude dan longitude dari input yang ada
            let latitude = "{{ $destinasi_data->latitude }}" || -7.797068;  // Default Yogyakarta
            let longitude = "{{ $destinasi_data->longitude }}" || 110.370529;  // Default Yogyakarta

            // Inisialisasi peta
            var map = L.map('map-detail-{{ $destinasi_data->id }}').setView([latitude, longitude], 13);

            // Tambahkan tile layer untuk tampilan peta
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Tambahkan marker berdasarkan latitude dan longitude
            var marker = L.marker([latitude, longitude]).addTo(map);
        });
    });
</script>
