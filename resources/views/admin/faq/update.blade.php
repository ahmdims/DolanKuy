<div class="modal fade modal-close-out" id="updateModal-{{ $faq_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('faq.update', $faq_data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="question" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" id="question" name="question"
                            value="{{ $faq_data->question }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Jawaban</label>
                        <div class="html-editor sh-19" id="quillEdit-{{ $faq_data->id }}"></div>
                        <input type="hidden" name="answer" id="answer-{{ $faq_data->id }}">
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

<script>
    // Initialize Quill only when the modal is shown
    $('#updateModal-{{ $faq_data->id }}').on('shown.bs.modal', function () {
        // Initialize Quill for this modal
        const quillEdit{{ $faq_data->id }} = new Quill('#quillEdit-{{ $faq_data->id }}', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    ['link']
                ]
            }
        });

        // Set the initial content of the Quill editor from the server-side data
        quillEdit{{ $faq_data->id }}.root.innerHTML = `{!! $faq_data->answer !!}`;

        // Form submission handling for the Quill editor content
        $('#updateModal-{{ $faq_data->id }} form').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission
            const answerContent = quillEdit{{ $faq_data->id }}.root.innerHTML; // Get the content from the Quill editor
            $('#answer-{{ $faq_data->id }}').val(answerContent); // Set the content to the hidden input
            this.submit(); // Submit the form
        });
    });
</script>
