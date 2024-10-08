@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')
<section class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-start">
                        <h4 class="font-weight-bolder">Sign In</h4>
                        <p class="mb-0">Enter your email and password to sign in</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                    aria-label="Email" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" aria-label="Password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign
                                up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection