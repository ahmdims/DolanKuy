<div class="modal fade modal-close-out" id="detailModal-{{ $destination_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Detail @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Foto Destinasi</label>
                    <div class="row">
                        @if($destination_data->images->isNotEmpty())
                            @foreach($destination_data->images as $image)
                                <div class="col-6 mb-2">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Foto Destinasi" class="img-fluid"
                                        style="width: 100%; height: auto;">
                                </div>
                            @endforeach

                        @else
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Destinasi</label>
                    <input type="text" class="form-control" name="name" value="{{ $destination_data->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <div type="text" class="form-control" name="description" id="quillDescription" readonly>
                        {!! $destination_data->description !!}"</div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="address" value="{{ $destination_data->address }}"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Kota</label>
                    <input type="text" class="form-control" name="city" value="{{ $destination_data->city }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" name="province" value="{{ $destination_data->province }}"
                        readonly>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" name="latitude"
                            value="{{ $destination_data->latitude }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" name="longitude"
                            value="{{ $destination_data->longitude }}" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="map" class="form-label">Peta Lokasi</label>
                    <div class="map-edit" id="map-detail-{{ $destination_data->id }}" style="height: 300px;"></div>
                </div>
                <div class="mb-3">
                    <label for="opening_time" class="form-label">Jam Buka</label>
                    <input type="time" class="form-control" name="opening_time"
                        value="{{ $destination_data->opening_time }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="closing_time" class="form-label">Jam Tutup</label>
                    <input type="time" class="form-control" name="closing_time"
                        value="{{ $destination_data->closing_time }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="ticket_price" class="form-label">Harga Tiket</label>
                    <input type="text" class="form-control" name="ticket_price"
                        value="{{ $destination_data->ticket_price }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="facilities" class="form-label">Fasilitas</label>
                    <input type="text" class="form-control" name="facilities"
                        value="{{ $destination_data->facilities }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Kontak</label>
                    <input type="text" class="form-control" name="contact" value="{{ $destination_data->contact }}"
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
        $('#detailModal-{{ $destination_data->id }}').on('shown.bs.modal', function () {
            document.getElementById('map-detail-{{ $destination_data->id }}').innerHTML = "";

            let latitude = "{{ $destination_data->latitude }}" || -6.24186355;
            let longitude = "{{ $destination_data->longitude }}" || 106.99991249;

            var map = L.map('map-detail-{{ $destination_data->id }}').setView([latitude, longitude], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© DolanKuy'
            }).addTo(map);

            var marker = L.marker([latitude, longitude]).addTo(map);
        });
    });
</script>