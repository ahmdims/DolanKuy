<div class="modal fade modal-close-out" id="updateModal-{{ $user_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('adminwisata.update', $user_data->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $user_data->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user_data->name }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="utype" class="form-label">Peran</label>
                        <select class="form-select" id="utype" name="utype" required>
                            <option value="pengunjung" {{ $user_data->utype == 'pengunjung' ? 'selected' : '' }}>
                                Pengunjung
                            </option>
                            <option value="admin_wisata" {{ $user_data->utype == 'admin_wisata' ? 'selected' : '' }}>Admin
                                Wisata</option>
                            <option value="admin_umkm" {{ $user_data->utype == 'admin_umkm' ? 'selected' : '' }}>Admin
                                UMKM
                            </option>
                            <option value="admin_budaya" {{ $user_data->utype == 'admin_budaya' ? 'selected' : '' }}>Admin
                                Budaya</option>
                            <option value="superadmin" {{ $user_data->utype == 'superadmin' ? 'selected' : '' }}>
                                Superadmin
                            </option>
                        </select>
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