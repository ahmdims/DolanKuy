<div class="modal fade" id="updateModal-{{ $produk_data->ProdukID }}" tabindex="-1" role="dialog"
    aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModal">Update @yield('title')</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('produk.update', $produk_data->ProdukID) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="NamaProduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="NamaProduk" value="{{ $produk_data->NamaProduk }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="Harga" value="{{ $produk_data->Harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="Stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" name="Stok" value="{{ $produk_data->Stok }}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>