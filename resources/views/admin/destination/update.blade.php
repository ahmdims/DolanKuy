<!-- Modal untuk update destinasi -->
<div class="modal fade modal-close-out" id="updateModal-{{ $destinasi_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('destination.update', $destinasi_data->id) }}"
                enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="kota" name="kota"
                            value="{{ $destinasi_data->kota }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi"
                            value="{{ $destinasi_data->provinsi }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="location-search-{{ $destinasi_data->id }}" class="form-label">Cari Lokasi</label>
                        <input type="text" id="location-search-{{ $destinasi_data->id }}" class="form-control" />
                    </div>

                    <div class="map-edit mb-3" id="map-{{ $destinasi_data->id }}"></div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude-{{ $destinasi_data->id }}"
                                name="latitude" value="{{ $destinasi_data->latitude }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude-{{ $destinasi_data->id }}"
                                name="longitude" value="{{ $destinasi_data->longitude }}" required>
                        </div>
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

<!-- Page Update Scripts Start -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let map;
        let marker;

        $('#updateModal-{{ $destinasi_data->id }}').on('shown.bs.modal', function () {
            document.getElementById('map-{{ $destinasi_data->id }}').innerHTML = "";

            let latitude = parseFloat(document.getElementById('latitude-{{ $destinasi_data->id }}').value) || -6.24186355;
            let longitude = parseFloat(document.getElementById('longitude-{{ $destinasi_data->id }}').value) || 106.99991249;

            map = L.map('map-{{ $destinasi_data->id }}').setView([latitude, longitude], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            marker = L.marker([latitude, longitude], { draggable: true }).addTo(map);

            marker.on('dragend', function (e) {
                const position = marker.getLatLng();
                document.getElementById('latitude-{{ $destinasi_data->id }}').value = position.lat;
                document.getElementById('longitude-{{ $destinasi_data->id }}').value = position.lng;
            });

            const searchInput = document.getElementById('location-search-{{ $destinasi_data->id }}');
            searchInput.addEventListener('keyup', function () {
                const query = this.value;
                if (query.length > 2) {
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                const { lat, lon } = data[0];
                                document.getElementById('latitude-{{ $destinasi_data->id }}').value = lat;
                                document.getElementById('longitude-{{ $destinasi_data->id }}').value = lon;
                                marker.setLatLng([lat, lon]);
                                map.setView([lat, lon], 13);
                            }
                        })
                        .catch(error => console.error('Error fetching location:', error));
                }
            });
        });
    });
</script>
<!-- Page Update Scripts End -->