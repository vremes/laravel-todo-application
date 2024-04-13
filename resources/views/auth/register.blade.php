@extends('layouts.default')

@section('title', 'Register')

@section('content')
<div class="container">
    <div>
        <form action="{{ route('auth.handle_register') }}" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Username') }}</label>
                <input type="text" name="name" class="form-control" placeholder="Enter username" minlength="4" maxlength="48" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email address (optional)') }}</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email address (optional)" maxlength="255">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" placeholder="{{ __('Enter password') }}" minlength="8" maxlength="70" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm password') }}</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm password') }}" minlength="8" maxlength="70" required>
            </div>
            <div>
                @csrf()
                <button type="submit" class="btn btn-outline-primary">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
