<!-- Create Modal -->
<div class="modal fade modal-close-out" id="createModal" tabindex="-1" role="dialog" aria-labelledby="Modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Tambah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('destination.store') }}"
                enctype="multipart/form-data">
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

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price_min" class="form-label">Rentan Harga Terkecil</label>
                            <input type="text" class="form-control" name="price_min" id="price_min" required>
                        </div>
                        <div class="col-md-6">
                            <label for="price_max" class="form-label">Rentan Harga Terbesar</label>
                            <input type="text" class="form-control" name="price_max" id="price_max" required>
                        </div>
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