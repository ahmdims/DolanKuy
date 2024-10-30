<div class="modal fade modal-close-out" id="updateModal-{{ $culture_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('culture.update', $culture_data->id) }}" enctype="multipart/form-data"
                id="cultureForm-{{ $culture_data->id }}">

                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Budaya</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $culture_data->name }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">Unggah Gambar</label>
                        <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi <small
                                class="text-danger">*</small></label>
                        <textarea rows="3" class="form-control" name="description"
                            required>{{ $culture_data->description }}</textarea>
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