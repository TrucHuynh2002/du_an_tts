@extends('layout.layout_acount')
@section('title', 'Đổi mật khẩu')
@section('main_acount')
<div class="logo-header" data-background-color="blue">				
				<a href="/" class="logo">
					<img style="width: 100%; height:200px; margin-top: -100px;" src="/img/logo.PNG" alt="logo" class="logo">
				</a>
			</div>
    <form method="POST" action="{{ route('password.update') }}">
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        @csrf
        <h1>Reset password</h1>
         <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="form-group">
            <label for="email">Email*</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus>
        </div>
    
        <div class="form-group">
            <label for="pwd">Password*</label>
            <input class="form-control" placeholder="Password" id="pwd" type="password" name="password" required>
        </div> 
        
        <div class="form-group">
            <label for="password_confirmation">Confirm Password*</label>
            <input class="form-control" placeholder="Password" id="password_confirmation" type="password"
            name="password_confirmation" required>
        </div> 

        <button style="width:100%;" type="submit" value="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>		
    </form>
@endsection