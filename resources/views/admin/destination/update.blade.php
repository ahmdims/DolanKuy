<div class="modal fade modal-close-out" id="updateModal-{{ $destinasi_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
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
                        <label class="form-label">Gambar Destinasi</label>
                        <div class="row">
                            @if($destinasi_data->images->isNotEmpty())
                                @foreach($destinasi_data->images as $image)
                                    <div class="col-6 mb-2">
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Gambar Destinasi" class="img-fluid" style="max-height: 200px;">
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada gambar tersedia untuk destinasi ini.</p>
                            @endif
                        </div>
                        <input type="file" class="form-control" id="image" name="images[]" accept="image/*" onchange="previewImage(event)" multiple>
                        <div id="image-preview-container" class="mt-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $destinasi_data->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ $destinasi_data->description }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $destinasi_data->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="city" name="city"
                            value="{{ $destinasi_data->city }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="province" name="province"
                            value="{{ $destinasi_data->province }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="location-search-{{ $destinasi_data->id }}" class="form-label">Cari Lokasi</label>
                        <input type="text" id="location-search-{{ $destinasi_data->id }}" class="form-control" />
                    </div>

                    <div class="map-edit mb-3" id="map-{{ $destinasi_data->id }}"></div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="latitude-{{ $destinasi_data->id }}" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude-{{ $destinasi_data->id }}"
                                name="latitude" value="{{ $destinasi_data->latitude }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="longitude-{{ $destinasi_data->id }}" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude-{{ $destinasi_data->id }}"
                                name="longitude" value="{{ $destinasi_data->longitude }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="opening_time" class="form-label">Jam Buka</label>
                        <input type="time" class="form-control" id="opening_time" name="opening_time"
                            value="{{ $destinasi_data->opening_time }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="closing_time" class="form-label">Jam Tutup</label>
                        <input type="time" class="form-control" id="closing_time" name="closing_time"
                            value="{{ $destinasi_data->closing_time }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ticket_price" class="form-label">Harga Tiket</label>
                        <input type="text" class="form-control" id="ticket_price" name="ticket_price"
                            value="{{ $destinasi_data->ticket_price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="facilities" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="facilities" name="facilities"
                            value="{{ $destinasi_data->facilities }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="contact" name="contact"
                            value="{{ $destinasi_data->contact }}" required>
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
                attribution: '© DolanKuy'
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

    // Preview Image

function previewImage(event) {
    const previewContainer = document.getElementById('image-preview-container');
    previewContainer.innerHTML = ""; // Clear previous previews
    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
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
