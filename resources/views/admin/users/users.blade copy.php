@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="container-fluid py-4">

  <!-- Check message -->
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
        class="fa fa-close"></i></button>
  </div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header pb-0">
          <div class="d-lg-flex">
            <div>
              <h5 class="font-weight-bolder">@yield('title')</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <a data-bs-toggle="modal" data-bs-target="#createModal" type="button"
                  class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Create @yield('title')</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush table-striped" id="products-list">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user_data)
                <tr>
                  <td class="text-sm font-weight-bold">{{ $user_data->id }}</td>
                  <td class="text-sm font-weight-bold">{{ $user_data->email }}</td>
                  <td class="text-sm font-weight-bold">{{ $loop->iteration }}.</td>
                  <td class="text-sm font-weight-bold">{{ $user_data->email }}</td>
                  <td class="text-sm font-weight-bold">{{ $user_data->username }}</td>
                  <td class="text-sm font-weight-bold">{{ $user_data->name }}</td>
                  <td class="text-sm font-weight-bold">{{ $user_data->role }}</td>
                  <td class="text-sm">
                    <div class="btn-group" role="group" aria-label="action buttons">
                      <button data-bs-toggle="modal" data-bs-target="#detailModal-{{ $user_data->id }}"
                        class="btn bg-gradient-success btn-icon-only" type="button" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Detail">
                        <i class="fas fa-search"></i>
                      </button>
                      <button data-bs-toggle="modal" data-bs-target="#updateModal-{{ $user_data->id }}"
                        class="btn bg-gradient-primary btn-icon-only" type="button" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Update">
                        <i class="fas fa-pen"></i>
                      </button>
                      <button data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user_data->id }}"
                        class="btn bg-gradient-danger btn-icon-only" type="button" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Delete">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                @include('admin.users.users-detail', ['user_data' => $user_data])
                @include('admin.users.users-update', ['user_data' => $user_data])
                @include('admin.users.users-delete', ['user_data' => $user_data])
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModal">Create @yield('title')</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select class="form-select" name="role">
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="seller">Seller</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="text" class="form-control" name="password" required>
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

  @endsection