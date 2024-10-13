@extends('layouts.admin')

@section('title', 'Destinasi Wisata')

@section('content')
<!-- Controls Start -->
<div class="row">
  <!-- Search Start -->
  <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
    <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
      <input class="form-control datatable-search" placeholder="Cari" data-datatable="#datatableRows" />
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
    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
      <!-- Add Button Start -->
      <button data-bs-toggle="modal" data-bs-target="#createModal"
        class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip"
        data-bs-placement="top" title="Tambah" type="button" data-bs-delay="0">
        <i data-acorn-icon="plus"></i>
      </button>
      <!-- Add Button End -->

      <!-- Edit Button Start -->
      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow edit-datatable disabled"
        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" type="button" data-bs-delay="0">
        <i data-acorn-icon="edit"></i>
      </button>
      <!-- Edit Button End -->

      <!-- Delete Button Start -->
      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow disabled delete-datatable"
        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" type="button" data-bs-delay="0">
        <i data-acorn-icon="bin"></i>
      </button>
      <!-- Delete Button End -->
    </div>
    <div class="d-inline-block">
      <!-- Print Button Start -->
      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print"
        data-datatable="#datatableRows" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Print"
        type="button">
        <i data-acorn-icon="print"></i>
      </button>
      <!-- Print Button End -->

      <!-- Export Dropdown Start -->
      <div class="d-inline-block datatable-export" data-datatable="#datatableRows">
        <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
          <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0"
            data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
            <i data-acorn-icon="download"></i>
          </span>
        </button>
        <div class="dropdown-menu shadow dropdown-menu-end">
          <button class="dropdown-item export-copy" type="button">Salin</button>
          <button class="dropdown-item export-excel" type="button">Excel</button>
          <button class="dropdown-item export-cvs" type="button">Cvs</button>
        </div>
      </div>
      <!-- Export Dropdown End -->

      <!-- Length Start -->
      <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows"
        data-childSelector="span">
        <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false" data-bs-offset="0,3">
          <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-delay="0" title="Item Count">
            10 Item
          </span>
        </button>
        <div class="dropdown-menu shadow dropdown-menu-end">
          <a class="dropdown-item" href="#">10 Item</a>
          <a class="dropdown-item active" href="#">5 Item</a>
          <a class="dropdown-item" href="#">20 Item</a>
        </div>
      </div>
      <!-- Length End -->
    </div>
  </div>
</div>
<!-- Controls End -->

<div class="data-table-responsive-wrapper">
  <table id="datatableRows" class="data-table nowrap hover">
    <thead>
      <tr>
        <th class="text-muted text-small text-uppercase">#</th>
        <th class="text-muted text-small text-uppercase">Nama Destinasi</th>
        <th class="text-muted text-small text-uppercase">Alamat</th>
        <th class="text-muted text-small text-uppercase">Kota</th>
        <th class="text-muted text-small text-uppercase">Provinsi</th>
        <th class="empty">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      @foreach($destination as $destinasi_data)
      <tr>
      <td>{{ $loop->iteration }}.</td>
      <td>{{ $destinasi_data->nama_destinasi }}</td>
      <td>{{ $destinasi_data->alamat }}</td>
      <td>{{ $destinasi_data->kota }}</td>
      <td>{{ $destinasi_data->provinsi }}</td>
      <td></td>
      </tr>
      @include('admin.destination.detail', ['destinasi_data' => $destinasi_data])
      @include('admin.destination.update', ['destinasi_data' => $destinasi_data])
      @include('admin.destination.delete', ['destinasi_data' => $destinasi_data])
    @endforeach
    </tbody>
  </table>
</div>

<!-- Create Modal -->
<div class="modal fade modal-close-out" id="createModal" tabindex="-1" role="dialog" aria-labelledby="Modal"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Modal">Tambah @yield('title')</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('destination.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_destinasi" class="form-label">Nama Destinasi</label>
            <input type="text" class="form-control" name="nama_destinasi" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" required></textarea>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
          </div>
          <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" name="kota" required>
          </div>
          <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" required>
          </div>
          <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" name="latitude" placeholder="Optional">
          </div>
          <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" name="longitude" placeholder="Optional">
          </div>
          <div class="mb-3">
            <label for="jam_buka" class="form-label">Jam Buka</label>
            <input type="time" class="form-control" name="jam_buka" required>
          </div>
          <div class="mb-3">
            <label for="jam_tutup" class="form-label">Jam Tutup</label>
            <input type="time" class="form-control" name="jam_tutup" required>
          </div>
          <div class="mb-3">
            <label for="harga_tiket" class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" name="harga_tiket" required>
          </div>
          <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <textarea class="form-control" name="fasilitas" placeholder="Optional"></textarea>
          </div>
          <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" name="kontak" placeholder="Optional">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection