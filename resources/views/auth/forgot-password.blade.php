@extends('layout.layout_acount')
@section('title', 'Quên mật khẩu')
@section('main_acount')

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h1>Forgot password</h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus>
        </div>

        <button type="submit" value="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>	
    </form>
@endsection