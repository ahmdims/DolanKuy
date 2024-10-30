<div class="modal fade modal-close-out" id="detailModal-{{ $culture_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Detail @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Foto Budaya</label>
                    <div class="row">
                        @if($culture_data->images->isNotEmpty())
                            @foreach($culture_data->images as $image)
                                <div class="col-6 mb-2">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Foto Budaya" class="img-fluid"
                                        style="width: 100%; height: auto;">
                                </div>
                            @endforeach

                        @else
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Budaya</label>
                    <input type="text" class="form-control" name="name" value="{{ $culture_data->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <div type="text" class="form-control" name="description" id="quillDescription" readonly>
                        {!! $culture_data->description !!}"
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
