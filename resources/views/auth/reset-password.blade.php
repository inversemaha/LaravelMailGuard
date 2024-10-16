@extends('layouts.app')

@section('title', 'Reset Password')

@section('head')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card login-card shadow-lg border-0 rounded-3">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 login-header">Reset Your Password</h2>
                    <p class="text-center mb-4" style="color: #777;">
                        {{ __('Please enter your new password to reset your account.') }}
                    </p>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                            <label for="email">Email Address</label>
                            @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="New Password" required autocomplete="new-password">
                            <label for="password">New Password</label>
                            @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            <label for="password_confirmation">Confirm New Password</label>
                            @error('password_confirmation')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn login-button">Reset Password</button> <!-- Using login-button class -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
