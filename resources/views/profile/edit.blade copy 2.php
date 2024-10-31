@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-auto d-none d-lg-flex">
            <div class="nav flex-column sw-25 mt-n2" id="settingsColumn">
                <!-- Content of this will be moved from #settingsMoveContent div based on the responsive breakpoint.  -->
            </div>
        </div>

        <div class="col">

            @include('layouts.profile')

            <!-- Public Info Start -->
            <div class="card mb-5">
                <div class="card-body">
                    <form method="post" action="{{ route('profile.update') }}">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="text" class="form-control" value="Lisa Jackson" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="text" class="form-control" value="writerofrohan" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="text" class="form-control" value="Colored Strategies" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="text" class="form-control date-picker-close" id="birthday"
                                    value="08/08/1988" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <select class="select-single-no-search" data-width="100%" id="genderSelect">
                                    <option label="&nbsp;"></option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Biografi</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="email" class="form-control" value="me@lisajackson.com" disabled />
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
            <!-- Public Info End -->

            <!-- Contact Start -->
            <h2 class="small-title">Contact</h2>
            <div class="card mb-5">
                <div class="card-body">
                    <form>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Primary Email</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="email" class="form-control" value="me@lisajackson.com" disabled />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Secondary Email</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="email" class="form-control" value="lisajackson@gmail.com" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="text" class="form-control" value="+6443884455" />
                            </div>
                        </div>
                        <div class="mb-3 row mt-5">
                            <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Contact End -->

            <!-- Jobs Start -->
            <h2 class="small-title">Jobs</h2>
            <div class="card mb-5">
                <div class="card-body">
                    <form>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Freelance</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="customCheck1" />
                                    <label class="form-check-label" for="customCheck1">I am available for hire</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row mt-5">
                            <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Jobs End -->
        </div>
    </div>
</div>

@endsection