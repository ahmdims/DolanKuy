@extends('layouts.admin')

@section('title', 'Pengguna')

@section('content')
<div class="container">
  <!-- Title and Top Buttons Start -->
  <div class="page-title-container">
    <div class="row g-0">
      <!-- Title Start -->
      <div class="col-auto mb-3 mb-md-0 me-auto">
        <div class="w-auto sw-md-30">
          <a href="{{ route('dashboard') }}" class="muted-link pb-1 d-inline-block breadcrumb-back">
            <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
            <span class="text-small align-middle">Beranda</span>
          </a>
          <h1 class="mb-0 pb-0 display-4" id="title">@yield('title')</h1>
        </div>
      </div>
      <!-- Title End -->

      <!-- Top Buttons Start -->
      <div class="w-100 d-md-none"></div>
      <div class="col-12 col-sm-6 col-md-auto d-flex align-items-end justify-content-end mb-2 mb-sm-0 order-sm-3">
        <a data-bs-toggle="modal" data-bs-target="#createModal" type="button"
          class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
          <i data-acorn-icon="plus"></i>
          <span>Tambah @yield('title')</span>
        </a>
      </div>
      <!-- Top Buttons End -->
    </div>
  </div>
  <!-- Title and Top Buttons End -->

  <!-- Controls Start -->
  <div class="row mb-2">
    <!-- Search Start -->
    <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
      <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
        <input class="form-control" placeholder="Search" />
        <span class="search-magnifier-icon">
          <i data-acorn-icon="search"></i>
        </span>
        <span class="search-delete-icon d-none">
          <i data-acorn-icon="close"></i>
        </span>
      </div>
    </div>
    <!-- Search End -->

    <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
      <div class="d-inline-block">
        <!-- Print Button Start -->
        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip"
          data-bs-placement="top" data-bs-delay="0" title="Print" type="button">
          <i data-acorn-icon="print"></i>
        </button>
        <!-- Print Button End -->

        <!-- Export Dropdown Start -->
        <div class="d-inline-block">
          <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
            <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0"
              data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
              <i data-acorn-icon="download"></i>
            </span>
          </button>
          <div class="dropdown-menu shadow dropdown-menu-end">
            <button class="dropdown-item export-copy" type="button">Copy</button>
            <button class="dropdown-item export-excel" type="button">Excel</button>
            <button class="dropdown-item export-cvs" type="button">Cvs</button>
          </div>
        </div>
        <!-- Export Dropdown End -->

        <!-- Length Start -->
        <div class="dropdown-as-select d-inline-block" data-childSelector="span">
          <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" data-bs-offset="0,3">
            <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="top"
              data-bs-delay="0" title="Item Count">
              10 Items
            </span>
          </button>
          <div class="dropdown-menu shadow dropdown-menu-end">
            <a class="dropdown-item" href="#">5 Items</a>
            <a class="dropdown-item active" href="#">10 Items</a>
            <a class="dropdown-item" href="#">20 Items</a>
          </div>
        </div>
        <!-- Length End -->
      </div>
    </div>
  </div>
  <!-- Controls End -->

  <!-- Check message -->
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
      class="fa fa-close"></i></button>
    </div>
  @endif

  <div class="row g-0">
    <section class="scroll-section" id="breakpointSpecificResponsive">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive-sm mb-5">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Role</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user_data)
          <tr>
            <td class="text-center">{{ $loop->iteration }}.</td>
            <td class="text-center">{{ $user_data->email }}</td>
            <td class="text-center">{{ $user_data->username }}</td>
            <td class="text-center">{{ $user_data->name }}</td>
            <td class="text-center">{{ $user_data->role }}</td>
            <td class="text-center">
            <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
              <a class="btn btn-icon btn-icon-only btn-info mb-1 me-1" type="button" title="Detail">
              <i data-acorn-icon="search"></i>
              </a>
              <a class="btn btn-icon btn-icon-only btn-warning mb-1 me-1" type="button" title="Update">
              <i data-acorn-icon="edit"></i>
              </a>
              <a class="btn btn-icon btn-icon-only btn-danger mb-1" type="button" title="Delete">
              <i data-acorn-icon="bin"></i>
              </a>
            </div>
            </td>
          </tr>
        @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Role</th>
                  <th class="text-center">Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>
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