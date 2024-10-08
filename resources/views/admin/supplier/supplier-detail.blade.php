<div class="modal fade" id="detailModal-{{ $supplier_data->id_supplier }}" tabindex="-1" role="dialog"
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
                        <label for="id_supplier" class="form-label">ID Supplier</label>
                        <input type="text" class="form-control" name="id_supplier"
                            value="{{ $supplier_data->id_supplier }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama_supplier"
                            value="{{ $supplier_data->nama_supplier }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_supplier" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat_supplier" value="{{ $supplier_data->alamat_supplier }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telepon"
                            value="{{ $supplier_data->no_telepon }}" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>