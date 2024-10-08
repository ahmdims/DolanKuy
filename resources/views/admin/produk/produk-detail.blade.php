<div class="modal fade" id="detailModal-{{ $produk_data->ProdukID }}" tabindex="-1" role="dialog"
    aria-labelledby="detailModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModal">Detail @yield('title')</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="ProdukID" class="form-label">Produk ID</label>
                        <input type="text" class="form-control" name="ProdukID" value="{{ $produk_data->ProdukID }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="NamaProduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="NamaProduk" value="{{ $produk_data->NamaProduk }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Harga" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="Harga" value="{{ $produk_data->Harga }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Stok" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="Stok" value="{{ $produk_data->Stok }}" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>