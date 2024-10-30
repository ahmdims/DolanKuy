<div class="modal fade modal-close-out" id="updateModal-{{ $msme_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('msme.update', $msme_data->id) }}"
                enctype="multipart/form-data" id="msmeForm-{{ $msme_data->id }}">

                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama UMKM <small
                                            class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $msme_data->name }}" required>
                                </div>
                                <label class="form-label">Unggah Gambar</label>
                                <input type="file" class="form-control" id="image" name="images[]" accept="image/*"
                                    onchange="previewImage(event)" multiple>
                                <div id="image-preview-container" class="mt-2"></div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi <small
                                        class="text-danger">*</small></label>
                                <textarea rows="3" class="form-control" name="description" required>{{ $msme_data->description }}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="price_min" class="form-label">Rentan Harga Terkecil</label>
                                    <input type="text" class="form-control" name="price_min" id="price_min"
                                        value="{{ $msme_data->price_min }}">
                                    <small class="text-muted">Berikan angka 0 apabila gratis</small>
                                </div>
                                <div class="col-md-6">
                                    <label for="price_max" class="form-label">Rentan Harga Terbesar</label>
                                    <input type="text" class="form-control" name="price_max" id="price_max"
                                        value="{{ $msme_data->price_max }}">
                                    <small class="text-muted">Berikan angka 0 apabila gratis</small>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="opening_time" class="form-label">Jam Buka <small
                                            class="text-danger">*</small></label>
                                    <input type="time" class="form-control" id="opening_time" name="opening_time"
                                        value="{{ $msme_data->opening_time }}" required step="1">
                                </div>
                                <div class="col">
                                    <label for="closing_time" class="form-label">Jam Tutup <small
                                            class="text-danger">*</small></label>
                                    <input type="time" class="form-control" id="closing_time" name="closing_time"
                                        value="{{ $msme_data->closing_time }}" required step="1">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="facilities" class="form-label">Fasilitas <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="facilities" name="facilities"
                                    value="{{ $msme_data->facilities }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Kontak <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="contact" name="contact"
                                    value="{{ $msme_data->contact }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="location-search-{{ $msme_data->id }}" class="form-label">Cari
                                    Lokasi <small class="text-danger">*</small></label>
                                <input type="text" id="location-search-{{ $msme_data->id }}"
                                    class="form-control" />
                            </div>
                            <div class="map-edit mb-3" id="map-{{ $msme_data->id }}"></div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="latitude-{{ $msme_data->id }}" class="form-label">Garis
                                        Lintang <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="latitude-{{ $msme_data->id }}"
                                        name="latitude" value="{{ $msme_data->latitude }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="longitude-{{ $msme_data->id }}" class="form-label">Garis
                                        Bujur <small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" id="longitude-{{ $msme_data->id }}"
                                        name="longitude" value="{{ $msme_data->longitude }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Tautan GMaps <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="link" name="link"
                                    value="{{ $msme_data->link }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $msme_data->address }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">Kota <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="{{ $msme_data->city }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="province" class="form-label">Provinsi <small
                                        class="text-danger">*</small></label>
                                <input type="text" class="form-control" id="province" name="province"
                                    value="{{ $msme_data->province }}" required>
                            </div>
                        </div>
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

        $('#updateModal-{{ $msme_data->id }}').on('shown.bs.modal', function () {
            document.getElementById('map-{{ $msme_data->id }}').innerHTML = "";

            let latitude = parseFloat(document.getElementById('latitude-{{ $msme_data->id }}').value) || -6.24186355;
            let longitude = parseFloat(document.getElementById('longitude-{{ $msme_data->id }}').value) || 106.99991249;

            map = L.map('map-{{ $msme_data->id }}').setView([latitude, longitude], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© DolanKuy'
            }).addTo(map);

            marker = L.marker([latitude, longitude], { draggable: true }).addTo(map);

            marker.on('dragend', function (e) {
                const position = marker.getLatLng();
                document.getElementById('latitude-{{ $msme_data->id }}').value = position.lat;
                document.getElementById('longitude-{{ $msme_data->id }}').value = position.lng;
            });

            const searchInput = document.getElementById('location-search-{{ $msme_data->id }}');
            searchInput.addEventListener('keyup', function () {
                const query = this.value;
                if (query.length > 2) {
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                const { lat, lon } = data[0];
                                document.getElementById('latitude-{{ $msme_data->id }}').value = lat;
                                document.getElementById('longitude-{{ $msme_data->id }}').value = lon;
                                marker.setLatLng([lat, lon]);
                                map.setView([lat, lon], 13);
                            }
                        })
                        .catch(error => console.error('Error fetching location:', error));
                }
            });
        });
    });

    // Preview Image
    function previewImage(event) {
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = "";
        const files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("img-fluid");
                img.style.maxHeight = "200px";
                previewContainer.appendChild(img);
            }

            reader.readAsDataURL(file);
        }
    }
</script>
<!-- Page Update Scripts End -->