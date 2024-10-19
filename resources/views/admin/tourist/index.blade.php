@extends('layouts.admin')

@section('title', 'Pengunjung')

@section('content')

<section class="scroll-section" id="hover">
  <div class="card mb-5">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
          <div
            class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 border border-separator bg-foreground search-sm">
            <input class="form-control form-control-sm datatable-search" placeholder="Cari"
              data-datatable="#datatableHover" />
            <span class="search-magnifier-icon">
              <i data-acorn-icon="search"></i>
            </span>
            <span class="search-delete-icon d-none">
              <i data-acorn-icon="close"></i>
            </span>
          </div>
        </div>
        <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 text-end mb-1">
          <div class="d-inline-block">
            <button data-bs-toggle="modal" data-bs-target="#createModal"
              class="btn btn-icon btn-outline-muted btn-sm datatable-print" type="button">
              <i data-acorn-icon="plus"></i>
              <span>Tambah @yield('title')</span>
            </button>
            <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm datatable-print" type="button"
              data-datatable="#datatableHover">
              <i data-acorn-icon="print"></i>
            </button>

            <div class="d-inline-block datatable-export" data-datatable="#datatableHover">
              <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown" data-bs-toggle="dropdown"
                type="button" data-bs-offset="0,3">
                <i data-acorn-icon="download"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                <button class="dropdown-item export-copy" type="button">Salin</button>
                <button class="dropdown-item export-excel" type="button">Excel</button>
                <button class="dropdown-item export-cvs" type="button">Cvs</button>
              </div>
            </div>
            <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableHover">
              <button class="btn btn-outline-muted btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                10 Item
              </button>
              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                <a class="dropdown-item active" href="#">5 Item</a>
                <a class="dropdown-item" href="#">10 Item</a>
                <a class="dropdown-item" href="#">20 Item</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <table class="table table-hover table-striped" id="datatableHover">
        <thead>
          <tr>
            <th class="text-muted text-small text-uppercase">#</th>
            <th class="text-muted text-small text-uppercase">Email</th>
            <th class="text-muted text-small text-uppercase">Nama Pengguna</th>
            <th class="text-muted text-small text-uppercase">Name</th>
            <th class="text-muted text-small text-uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php $iteration = 1; @endphp
          @foreach($users as $user_data)
        @if($user_data->utype === 'pengunjung')
      <tr>
      <td>{{ $iteration }}.</td>
      <td>{{ $user_data->email }}</td>
      <td>{{ $user_data->username }}</td>
      <td>{{ $user_data->name }}</td>
      <td>
        <div class="d-flex align-items-center" style="height: 100%;">
        <a data-bs-toggle="modal" data-bs-target="#detailModal-{{ $user_data->id }}" type="button"
        class="btn btn-icon btn-icon-only btn-info me-1" title="Detail">
        <i data-acorn-icon="search"></i>
        </a>
        <a data-bs-toggle="modal" data-bs-target="#updateModal-{{ $user_data->id }}" type="button"
        class="btn btn-icon btn-icon-only btn-warning me-1" title="Update">
        <i data-acorn-icon="edit"></i>
        </a>
        <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $user_data->id }}" type="button"
        class="btn btn-icon btn-icon-only btn-danger" title="Delete">
        <i data-acorn-icon="bin"></i>
        </a>
        </div>
      </td>
      </tr>
      @include('admin.tourist.detail', ['user_data' => $user_data])
      @include('admin.tourist.update', ['user_data' => $user_data])
      @include('admin.tourist.delete', ['user_data' => $user_data])
      @php    $iteration++; @endphp
    @endif
      @endforeach
        </tbody>
      </table>

      <!-- Create Modal -->
      <div class="modal fade modal-close-out" id="createModal" tabindex="-1" role="dialog" aria-labelledby="Modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Modal">Tambah @yield('title')</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('tourist.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="mb-3">
                  <label for="profile" class="form-label">Foto Profil</label>
                  <small class="text-danger">*Rasio gambar 1:1 (kotak)</small>
                  <input type="file" class="form-control" name="profile" accept="image/*">

                  <input type="hidden" id="utype" name="utype" value="pengunjung">

                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
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

    </div>
  </div>
</section>

@endsection
