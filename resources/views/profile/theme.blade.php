@extends('layouts.app')

@section('title', 'Tampilan Warna')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-auto d-none d-lg-flex">
            <div class="nav flex-column sw-25 mt-n2" id="settingsColumn">
            </div>
        </div>

        <div class="col">
                <h1 class="mb-0 pb-0 display-4" id="title">@yield('title')</h1>

            @include('layouts.profile')

            <div class="card mb-5">
                <div class="card-body">

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
