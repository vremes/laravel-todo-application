@extends('layouts.default')

@section('title', __('Login'))

@section('content')
<div class="container">
    <div>
        <form action="{{ route('auth.handle_login') }}" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Username') }}</label>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Enter username') }}" minlength="4" maxlength="48" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}" minlength="8" maxlength="70" required>
            </div>
            <div>
                @csrf()
                <button type="submit" class="btn btn-outline-primary">{{ __('Login') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
