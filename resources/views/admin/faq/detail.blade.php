<div class="modal fade modal-close-out" id="detailModal-{{ $faq_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Detail @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="question" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" name="question" value="{{ $faq_data->question }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Jawaban</label>
                        <textarea placeholder="answer" type="text" class="form-control" name="answer" rows="3"
                            readonly>{{ $faq_data->answer }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Waktu Unggah</label>
                        <input type="text" class="form-control" name="created_at" value="{{ $faq_data->created_at }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" name="updated_at" value="{{ $faq_data->updated_at }}"
                            readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>