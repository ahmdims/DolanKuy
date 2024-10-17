<div class="modal fade modal-close-out" id="updateModal-{{ $user_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Ubah @yield('title')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('tourist.update', $user_data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="sw-15 sh-15 me-1 mb-1 d-inline-block">
                            <img src="{{ $user_data->profile ? Storage::url($user_data->profile) : asset('img/profile/profile.webp') }}"
                                class="img-fluid rounded-md w-100 h-100" style="object-fit: cover;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="profile" class="form-label">Foto Profil</label>
                        <small class="text-danger">*Rasio gambar 1:1 (kotak)</small>
                        <input type="file" class="form-control" name="profile" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $user_data->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user_data->name }}"
                            required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="utype" class="form-label">Tipe Pengguna</label>
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

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $user_data->phone_number }}">
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                            value="{{ $user_data->birth_date }}">
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="male" {{ $user_data->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ $user_data->gender == 'female' ? 'selected' : '' }}>Perempuan
                            </option>
                            <option value="other" {{ $user_data->gender == 'other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Biografi</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user_data->bio }}</textarea>
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