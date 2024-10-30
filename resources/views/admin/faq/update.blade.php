<div class="modal fade modal-close-out" id="updateModal-{{ $faq_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('faq.update', $faq_data->id) }}" enctype="multipart/form-data"
                id="faqForm-{{ $faq_data->id }}">
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
                        <div id="quillEditor-{{ $faq_data->id }}"></div>
                        <input type="hidden" id="answer-{{ $faq_data->id }}" name="answer">
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
    document.addEventListener("DOMContentLoaded", function () {
        var quill = new Quill('#quillEditor-{{ $faq_data->id }}', {
            theme: 'snow'
        });

        quill.root.innerHTML = {!! json_encode($faq_data->answer) !!};

        document.getElementById('faqForm-{{ $faq_data->id }}').addEventListener('submit', function (event) {
            var answer = document.getElementById('answer-{{ $faq_data->id }}');
            answer.value = quill.root.innerHTML;
        });
    });
</script>
<!-- Page Update Scripts End -->