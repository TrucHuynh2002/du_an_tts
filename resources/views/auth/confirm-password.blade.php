@extends('layout.layout_acount')
@section('title', 'Xác nhận mật khẩu')
@section('main_acount')

   
    
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <h1>Confirm password</h1>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="form-group">
            <label for="pwd">Password</label>
            <input class="form-control" placeholder="Password" id="pwd" type="password" name="password"
            required autocomplete="current-password">
        </div>

        <button type="submit" value="submit" class="form-submit">{{ __('Confirm') }}</button>
    </form>
@endsection