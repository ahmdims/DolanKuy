<div class="modal fade modal-close-out" id="deleteModal-{{ $user_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Hapus @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('destination-admin.destroy', $user_data->id) }}">
                @csrf <!-- Token CSRF -->
                @method('DELETE') <!-- Metode DELETE -->
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus @yield('title')?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>