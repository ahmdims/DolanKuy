<!-- Update Modal -->
<div class="modal fade" id="updateModal-{{ $user_data->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModal"
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
                <form method="POST" action="{{ route('users.update', $user_data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user_data->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="admin" {{ $user_data->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="manager" {{ $user_data->role == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="seller" {{ $user_data->role == 'seller' ? 'selected' : '' }}>Seller</option>
                        </select>
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
