@extends('layouts.app')

@section('title', 'Forgot Password')

@section('head')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card login-card shadow-lg border-0 rounded-3">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 login-header">Forgot Your Password?</h2>
                    <p class="text-center mb-4" style="color: #777;">
                        {{ __('No problem. Just enter your email address, and we’ll send you a password reset link.') }}
                    </p>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                            <label for="email">Email Address</label>
                            @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn login-button">Email Password Reset Link</button> <!-- Using login-button class -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
