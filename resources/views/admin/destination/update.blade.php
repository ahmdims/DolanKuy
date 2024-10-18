<div class="modal fade modal-close-out" id="updateModal-{{ $destination_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('destination.update', $destination_data->id) }}"
                enctype="multipart/form-data" id="destinationForm-{{ $destination_data->id }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Foto Destinasi</label>
                        <div class="row">
                            @if($destination_data->images->isNotEmpty())
                                @foreach($destination_data->images as $image)
                                    <div class="col-6 mb-2 position-relative image-container-{{ $image->id }}">
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Gambar Destinasi" class="img-fluid" style="max-height: 200px;">
                                        <button type="button" class="btn-close position-absolute top-0 end-0" onclick="removeImage({{ $image->id }})" aria-label="Close"></button>
                                        <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada gambar tersedia untuk destinasi ini.</p>
                            @endif
                        </div>
                        <label for="new_images-{{ $destination_data->id }}" class="form-label">Tambah Foto Baru</label>
                        <div class="d-flex align-items-center">
                            <!-- Button untuk trigger file input -->
                            <button type="button" class="btn btn-outline-secondary addImageButton" data-dest-id="{{ $destination_data->id }}">
                                <i class="bi bi-plus-circle"></i> Tambah Foto
                            </button>
                            <!-- Input file -->
                            <input type="file" class="form-control d-none" id="new_images-{{ $destination_data->id }}" name="images[]" accept="image/*" onchange="previewImage(event, '{{ $destination_data->id }}')" multiple>
                        </div>
                        <div id="image-preview-container-{{ $destination_data->id }}" class="mt-2"></div>
                    </div>
                    <!-- Fields lainnya -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $destination_data->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Jawaban</label>
                        <div class="html-editor sh-19" id="quillEditor-{{ $destination_data->id }}">
                            {!! $destination_data->description !!}
                        </div>
                        <input type="hidden" name="description" id="description-{{ $destination_data->id }}">
                    </div>


                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $destination_data->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="city" name="city"
                            value="{{ $destination_data->city }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="province" name="province"
                            value="{{ $destination_data->province }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="location-search-{{ $destination_data->id }}" class="form-label">Cari Lokasi</label>
                        <input type="text" id="location-search-{{ $destination_data->id }}" class="form-control" />
                    </div>

                    <div class="map-edit mb-3" id="map-{{ $destination_data->id }}"></div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="latitude-{{ $destination_data->id }}" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude-{{ $destination_data->id }}"
                                name="latitude" value="{{ $destination_data->latitude }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="longitude-{{ $destination_data->id }}" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude-{{ $destination_data->id }}"
                                name="longitude" value="{{ $destination_data->longitude }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="opening_time" class="form-label">Jam Buka</label>
                        <input type="time" class="form-control" id="opening_time" name="opening_time"
                            value="{{ $destination_data->opening_time }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="closing_time" class="form-label">Jam Tutup</label>
                        <input type="time" class="form-control" id="closing_time" name="closing_time"
                            value="{{ $destination_data->closing_time }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="ticket_price" class="form-label">Harga Tiket</label>
                        <input type="text" class="form-control" id="ticket_price" name="ticket_price"
                            value="{{ $destination_data->ticket_price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="facilities" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="facilities" name="facilities"
                            value="{{ $destination_data->facilities }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="contact" name="contact"
                            value="{{ $destination_data->contact }}" required>
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
    // Script untuk peta
    document.addEventListener('DOMContentLoaded', function () {
        let map;
        let marker;

        $('#updateModal-{{ $destination_data->id }}').on('shown.bs.modal', function () {
            // Inisialisasi peta dan marker
            document.getElementById('map-{{ $destination_data->id }}').innerHTML = "";
            let latitude = parseFloat(document.getElementById('latitude-{{ $destination_data->id }}').value) || -6.24186355;
            let longitude = parseFloat(document.getElementById('longitude-{{ $destination_data->id }}').value) || 106.99991249;

            map = L.map('map-{{ $destination_data->id }}').setView([latitude, longitude], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© DolanKuy'
            }).addTo(map);

            marker = L.marker([latitude, longitude], { draggable: true }).addTo(map);
            marker.on('dragend', function (e) {
                const position = marker.getLatLng();
                document.getElementById('latitude-{{ $destination_data->id }}').value = position.lat;
                document.getElementById('longitude-{{ $destination_data->id }}').value = position.lng;
            });

            // Pencarian lokasi
            const searchInput = document.getElementById('location-search-{{ $destination_data->id }}');
            searchInput.addEventListener('keyup', function () {
                const query = this.value;
                if (query.length > 2) {
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                const { lat, lon } = data[0];
                                map.setView([lat, lon], 15);
                                marker.setLatLng([lat, lon]);
                                document.getElementById('latitude-{{ $destination_data->id }}').value = lat;
                                document.getElementById('longitude-{{ $destination_data->id }}').value = lon;
                            }
                        });
                }
            });
        });
    });

    // Script untuk memunculkan input file saat tombol "Tambah Foto" diklik
    document.querySelectorAll('.addImageButton').forEach(function (button) {
        button.addEventListener('click', function () {
            const destId = this.getAttribute('data-dest-id');
            document.getElementById('new_images-' + destId).click();
        });
    });

    // Fungsi preview gambar yang baru diunggah
    function previewImage(event, destId) {
        const files = event.target.files;
        const previewContainer = document.getElementById('image-preview-container-' + destId);
        previewContainer.innerHTML = '';

        Array.from(files).forEach(function (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-fluid';
                img.style.maxHeight = '200px';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }

    // Script untuk menghapus gambar menggunakan AJAX
    function removeImage(imageId) {
    if (confirm('Anda yakin ingin menghapus gambar ini?')) {
        $.ajax({
            url: '/delete-image/' + imageId,
            type: 'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                if (response.success) {
                    console.log('Image successfully deleted');
                    document.querySelector('.image-container-' + imageId).remove();
                } else {
                    console.error('Error deleting image:', response.message);
                }
            },
            error: function (err) {
                console.error('Error deleting image:', err.responseJSON.message || err);
            }
        });
    }
}
</script>
<!-- Page Update Scripts End -->
