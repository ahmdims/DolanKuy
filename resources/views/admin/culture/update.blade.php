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
                        <label class="form-label">Gambar Budaya</label>
                        <div class="row">
                            @if($culture_data->images->isNotEmpty())
                                @foreach($culture_data->images as $image)
                                    <div class="col-6 mb-2">
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Gambar Budaya"
                                            class="img-fluid" style="max-height: 200px;">
                                    </div>
                                @endforeach
                            @else
                                <p>Tidak ada gambar tersedia untuk budaya ini.</p>
                            @endif
                        </div>
                        <input type="file" class="form-control" id="image" name="images[]" accept="image/*"
                            onchange="previewImage(event)" multiple>
                        <div id="image-preview-container" class="mt-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Budaya</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $culture_data->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <div id="quillEditor-{{ $culture_data->id }}"></div>
                        <input type="hidden" id="description-{{ $culture_data->id }}" name="description">
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