<!-- Create Modal -->
<div class="modal fade modal-close-out" id="createModal" tabindex="-1" role="dialog" aria-labelledby="Modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Tambah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createFaqForm" method="POST" action="{{ route('faq.store') }}" id="createFaqForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="question" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" name="question" value="{{ old('question') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="answer" class="form-label">Jawaban</label>
                        <div id="quillEditor"></div>
                        <input type="hidden" name="answer" id="answer">
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