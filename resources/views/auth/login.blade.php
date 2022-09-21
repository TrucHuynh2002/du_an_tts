@extends('layout.layout_acount')
@section('title', 'Đăng nhập')
@section('main_acount')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <h1>Login</h1>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus>
    </div>

    <div class="form-group">
        <label for="pwd">Password</label>
        <input class="form-control" placeholder="Password" id="pwd" type="password" name="password"
        required autocomplete="current-password">
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>
    <button type="submit" value="submit" class="btn btn-primary">{{ __('Login') }}</button>								
    <div class="form-group">
        @if (Route::has('password.request'))
            <a class="nderline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
            </a>
        @endif
    </div>
</form>
@endsection