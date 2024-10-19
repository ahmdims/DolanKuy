<div class="modal fade modal-close-out" id="updateModal-{{ $culture_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('culture.update', $culture_data->id) }}"
                enctype="multipart/form-data" id="cultureForm-{{ $culture_data->id }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Foto Destinasi</label>
                        <small class="text-danger">*Minimal ada 1 foto</small>
                        <div class="row">

                            @if($culture_data->images->isNotEmpty())
                                @foreach($culture_data->images as $image)
                                    <div class="col-6 mb-2 position-relative image-container-{{ $image->id }}">
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Gambar Destinasi"
                                            class="img-fluid" style="max-height: 200px;">
                                        <button type="button" class="btn-close position-absolute top-0 end-0"
                                            onclick="removeImage({{ $image->id }})" aria-label="Close"></button>
                                        <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                                    </div>
                                @endforeach

                            @else
                            @endif

                        </div>

                        <label for="new_images-{{ $culture_data->id }}" class="form-label">Tambah Foto Baru</label>

                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-outline-secondary addImageButton"
                                data-dest-id="{{ $culture_data->id }}">
                                <i class="bi bi-plus-circle"></i> Tambah Foto
                            </button>
                            <input type="file" class="form-control d-none" id="new_images-{{ $culture_data->id }}"
                                name="images[]" accept="image/*"
                                onchange="previewImage(event, '{{ $culture_data->id }}')" multiple>
                        </div>
                        <div id="image-preview-container-{{ $culture_data->id }}" class="mt-2"></div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $culture_data->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <div id="quillEditor-{{ $culture_data->id }}"></div>
                        <input type="hidden" id="description-{{ $culture_data->id }}" name="description">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $culture_data->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="city" name="city"
                            value="{{ $culture_data->city }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="province" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="province" name="province"
                            value="{{ $culture_data->province }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="location-search-{{ $culture_data->id }}" class="form-label">Cari Lokasi</label>
                        <input type="text" id="location-search-{{ $culture_data->id }}" class="form-control" />
                    </div>

                    <div class="map-edit mb-3" id="map-{{ $culture_data->id }}"></div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="latitude-{{ $culture_data->id }}" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude-{{ $culture_data->id }}"
                                name="latitude" value="{{ $culture_data->latitude }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="longitude-{{ $culture_data->id }}" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude-{{ $culture_data->id }}"
                                name="longitude" value="{{ $culture_data->longitude }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="facilities" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="facilities" name="facilities"
                            value="{{ $culture_data->facilities }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="contact" name="contact"
                            value="{{ $culture_data->contact }}" required>
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

        $('#updateModal-{{ $culture_data->id }}').on('shown.bs.modal', function () {
            // Inisialisasi peta dan marker
            document.getElementById('map-{{ $culture_data->id }}').innerHTML = "";
            let latitude = parseFloat(document.getElementById('latitude-{{ $culture_data->id }}').value) || -6.24186355;
            let longitude = parseFloat(document.getElementById('longitude-{{ $culture_data->id }}').value) || 106.99991249;

            map = L.map('map-{{ $culture_data->id }}').setView([latitude, longitude], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© DolanKuy'
            }).addTo(map);

            marker = L.marker([latitude, longitude], { draggable: true }).addTo(map);
            marker.on('dragend', function (e) {
                const position = marker.getLatLng();
                document.getElementById('latitude-{{ $culture_data->id }}').value = position.lat;
                document.getElementById('longitude-{{ $culture_data->id }}').value = position.lng;
            });

            // Pencarian lokasi
            const searchInput = document.getElementById('location-search-{{ $culture_data->id }}');
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
                                document.getElementById('latitude-{{ $culture_data->id }}').value = lat;
                                document.getElementById('longitude-{{ $culture_data->id }}').value = lon;
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

                    // Hapus ID gambar dari input hidden
                    const existingImagesInput = document.querySelector(`input[name="existing_images[]"][value="${imageId}"]`);
                    if (existingImagesInput) {
                        existingImagesInput.remove();
                    }
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var quill = new Quill('#quillEditor-{{ $culture_data->id }}', {
            theme: 'snow'
        });

        quill.root.innerHTML = {!! json_encode($culture_data->description) !!};

        document.getElementById('cultureForm-{{ $culture_data->id }}').addEventListener('submit', function (event) {
            var description = document.getElementById('description-{{ $culture_data->id }}');
            description.value = quill.root.innerHTML;
        });
    });
</script>
<!-- Page Update Scripts End -->
