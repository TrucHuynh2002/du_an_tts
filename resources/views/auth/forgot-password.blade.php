@extends('layout.layout_acount')
@section('title', 'Quên mật khẩu')
@section('main_acount')
<div class="boydy">
<div class="logo-header" data-background-color="blue">				
				<a href="/" class="logo">
					<img style="width: 100%; height:200px; margin-top: -100px;" src="/img/logo.PNG" alt="logo" class="logo">
				</a>
			</div>
    <form style="padding: 30px;" method="POST" action="{{ route('password.email') }}">
        @csrf
        <h1>Forgot password</h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="form-group">
            <label for="email">Email*</label>
            <input class="form-control" placeholder="Your email" id="email" type="email" name="email" :value="old('email')" required autofocus>
        </div>

        <button  style="width: 100%;" type="submit" value="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>	
    </form></div>
@endsection