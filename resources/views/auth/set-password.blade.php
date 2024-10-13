@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Atur Kata Sandi</h2>
    <form method="POST" action="{{ route('set-password') }}">
        @csrf
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" class="form-control" name="password" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" name="password_confirmation" required>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Atur Kata Sandi</button>
    </form>
</div>
@endsection