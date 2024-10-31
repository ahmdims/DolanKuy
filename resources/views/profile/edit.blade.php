@extends('layouts.app')

@section('title', 'Profil ' . $user->name)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-auto d-none d-lg-flex">
            <div class="nav flex-column sw-25 mt-n2" id="settingsColumn">
                <!-- Content of this will be moved from #settingsMoveContent div based on the responsive breakpoint.  -->
            </div>
        </div>

        <div class="col">
                <h1 class="mb-0 pb-0 display-4" id="title">@yield('title')</h1>

            @include('layouts.profile')

            <div class="card mb-5">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="username" class="form-control"
                                    value="{{ old('username', $user->username) }}" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="text" name="phone_number" class="form-control"
                                    value="{{ old('phone_number', $user->phone_number) }}" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="date" name="birth_date" class="form-control"
                                    value="{{ old('birth_date', $user->birth_date) }}" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <select name="gender" class="select-single-no-search" data-width="100%"
                                    id="genderSelect">
                                    <option label="&nbsp;"></option>
                                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                                    <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Biografi</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <textarea name="bio" class="form-control"
                                    rows="3">{{ old('bio', $user->bio) }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled />
                            </div>
                        </div>
                        <div class="mb-3 row mt-5">
                            <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection