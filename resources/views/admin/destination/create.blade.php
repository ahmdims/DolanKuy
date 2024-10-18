<div class="modal fade modal-close-out" id="createModal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Tambah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createDestinationForm" method="POST" action="{{ route('destination.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="images" class="form-label">Unggah Foto</label>
                        <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Destinasi</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <div id="quillEditor"></div>
                        <input type="hidden" id="description" name="description">
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
                    <div class="mb-3">
                        <label for="ticket_price" class="form-label">Harga Tiket</label>
                        <input type="number" class="form-control" name="ticket_price" required>
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