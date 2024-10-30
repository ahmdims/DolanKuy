<div class="modal fade modal-close-out" id="detailModal-{{ $msme_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Detail @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Nama UMKM</label>
                    <input type="text" class="form-control" name="name" value="{{ $msme_data->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <div type="text" class="form-control" name="description" id="quillDescription" readonly>
                        {!! $msme_data->description !!}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="address" value="{{ $msme_data->address }}"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Kota</label>
                    <input type="text" class="form-control" name="city" value="{{ $msme_data->city }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" name="province" value="{{ $msme_data->province }}"
                        readonly>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" name="latitude"
                            value="{{ $msme_data->latitude }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" name="longitude"
                            value="{{ $msme_data->longitude }}" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="map" class="form-label">Peta Lokasi</label>
                    <div class="map-edit" id="map-detail-{{ $msme_data->id }}" style="height: 300px;"></div>
                </div>

                <div class="d-grid gap-2 mb-3">
                    <a href="{{ $msme_data->link }}" target="_blank" class="btn btn-primary">Buka di Maps</a>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="price_min" class="form-label">Rentan Harga Terkecil</label>
                        <input type="text" class="form-control" name="price_min" id="price_min"
                            value="Rp. {{ $msme_data->price_min }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="price_max" class="form-label">Rentan Harga Terbesar</label>
                        <input type="text" class="form-control" name="price_max" id="price_max"
                            value="Rp. {{ $msme_data->price_max }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="opening_time" class="form-label">Jam Buka</label>
                        <input type="time" class="form-control" name="opening_time"
                            value="{{ $msme_data->opening_time }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="closing_time" class="form-label">Jam Tutup</label>
                        <input type="time" class="form-control" name="closing_time"
                            value="{{ $msme_data->closing_time }}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="facilities" class="form-label">Fasilitas</label>
                    <input type="text" class="form-control" name="facilities"
                        value="{{ $msme_data->facilities }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Kontak</label>
                    <input type="text" class="form-control" name="contact" value="{{ $msme_data->contact }}"
                        readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#detailModal-{{ $msme_data->id }}').on('shown.bs.modal', function () {
            document.getElementById('map-detail-{{ $msme_data->id }}').innerHTML = "";

            let latitude = "{{ $msme_data->latitude }}" || -6.24186355;
            let longitude = "{{ $msme_data->longitude }}" || 106.99991249;

            var map = L.map('map-detail-{{ $msme_data->id }}').setView([latitude, longitude], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© DolanKuy'
            }).addTo(map);

            var marker = L.marker([latitude, longitude]).addTo(map);
        });
    });
</script>