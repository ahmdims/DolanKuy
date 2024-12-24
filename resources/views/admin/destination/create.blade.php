<div class="modal fade modal-close-out" id="formModal" tabindex="-1" role="dialog" aria-labelledby="Modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Tambah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('destination.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Destinasi <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="images" class="form-label">Unggah Gambar</label>
                                <input class="form-control" type="file" name="images[]" multiple accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi <small
                                        class="text-danger">*</small></label>
                                <input type="hidden" class="form-control" id="description" name="description" required>
                                <trix-editor input="description"></trix-editor>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="price_min" class="form-label">Rentan Harga Terkecil</label>
                                    <input type="number" class="form-control" name="price_min" id="price_min" required>
                                    <small class="text-muted">Berikan angka 0 apabila gratis</small>
                                </div>
                                <div class="col-md-6">
                                    <label for="price_max" class="form-label">Rentan Harga Terbesar</label>
                                    <input type="number" class="form-control" name="price_max" id="price_max" required>
                                    <small class="text-muted">Berikan angka 0 apabila gratis</small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="opening_time" class="form-label">Jam Buka <small
                                            class="text-danger">*</small></label>
                                    <input type="time" class="form-control" id="opening_time" name="opening_time"
                                        required step="1">
                                </div>
                                <div class="col">
                                    <label for="closing_time" class="form-label">Jam Tutup <small
                                            class="text-danger">*</small></label>
                                    <input type="time" class="form-control" id="closing_time" name="closing_time"
                                        required step="1">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="facilities" class="form-label">Fasilitas <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="facilities" id="facilities"
                                    placeholder="Optional">
                            </div>

                            <div class="mb-3">
                                <label for="contact" class="form-label">Kontak <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="contact" id="contact"
                                    placeholder="Optional">
                            </div>

                            <div class="mb-3">
                                <label for="styles" class="form-label">Kustom CSS</label>
                                <textarea rows="3" class="form-control" name="styles" id="styles"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="map" class="form-label">Cari Lokasi <small
                                        class="text-danger">*</small></label>
                                <input type="text" id="location-search" class="form-control" />
                            </div>

                            <div class="map-edit mb-3" id="map"></div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="latitude" class="form-label">Garis Lintang <small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" name="latitude" id="latitude"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="longitude" class="form-label">Garis Bujur <small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" name="longitude" id="longitude"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Tautan GMaps <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="link" id="link" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="address" id="address" required>
                            </div>

                            <div class="mb-3">
                                <label for="city" class="form-label">Kota <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="city" id="city" required>
                            </div>

                            <div class="mb-3">
                                <label for="province" class="form-label">Provinsi <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="province" id="province" required>
                            </div>

                        </div>
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

<script>
    var map = L.map('map').setView([-6.24186355, 106.99991249], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© DolanKuy'
    }).addTo(map);

    var marker;

    map.on('click', function(e) {
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
    createModal.addEventListener('shown.bs.modal', function() {
        setTimeout(function() {
            map.invalidateSize();
        }, 500);
    });

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
