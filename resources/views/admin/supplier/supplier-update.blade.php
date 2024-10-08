<div class="modal fade" id="updateModal-{{ $supplier_data->id_supplier }}" tabindex="-1" role="dialog" aria-labelledby="updateModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModal">Update @yield('title')</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('supplier.update', $supplier_data->id_supplier) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama_supplier" value="{{ $supplier_data->nama_supplier }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_supplier" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat_supplier" value="{{ $supplier_data->alamat_supplier }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" value="{{ $supplier_data->no_telepon }}"
                            required>
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