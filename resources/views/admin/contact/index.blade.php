@extends('layouts.admin')

@section('title', 'Kontak')

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

      <table class="data-table data-table-pagination data-table-standard responsive nowrap hover" id="datatableHover">
        <thead>
          <tr>
            <th class="text-muted text-small text-uppercase">#</th>
            <th class="text-muted text-small text-uppercase">Kategori</th>
            <th class="text-muted text-small text-uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php $iteration = 1; @endphp
          @foreach($contact as $contact_data)
        <tr>
        <td>{{ $iteration }}.</td>
        <td>{{ $contact_data->name }}</td>
        <td>
          <div class="d-flex align-items-center" style="height: 100%;">
          <a data-bs-toggle="modal" data-bs-target="#detailModal-{{ $contact_data->id }}" type="button"
            class="btn btn-icon btn-icon-only btn-info me-1" title="Detail">
            <i data-acorn-icon="search"></i>
          </a>
          <a data-bs-toggle="modal" data-bs-target="#updateModal-{{ $contact_data->id }}" type="button"
            class="btn btn-icon btn-icon-only btn-warning me-1" title="Update">
            <i data-acorn-icon="edit"></i>
          </a>
          <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $contact_data->id }}" type="button"
            class="btn btn-icon btn-icon-only btn-danger" title="Delete">
            <i data-acorn-icon="bin"></i>
          </a>
          </div>
        </td>
        </tr>
        @include('admin.category.detail', ['category_data' => $contact_data])
        @include('admin.category.update', ['category_data' => $contact_data])
        @include('admin.category.delete', ['category_data' => $contact_data])
        @php  $iteration++; @endphp
      @endforeach
        </tbody>
      </table>

    </div>
  </div>
</section>

@endsection