<div class="modal fade modal-close-out" id="formModal" tabindex="-1" role="dialog" aria-labelledby="Modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Tambah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('faq.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="question" class="form-label">Pertanyaan <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="question" name="question"
                            value="{{ old('question') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="answer" class="form-label">Jawaban <small class="text-danger">*</small></label>
                        <input type="hidden" class="form-control" id="answer" name="answer" required>
                        <trix-editor input="answer"></trix-editor>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
