@extends('layouts.app')

@section('title', 'Log In')

@section('head')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card login-card shadow-lg border-0 rounded-3"> <!-- Using login-card class -->
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 login-header">Log In to Your Account</h2> <!-- Using login-header class -->
                    <p class="text-center mb-4" style="color: #777;">Access your account and explore new possibilities!</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address Field -->
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                            <label for="email">Email Address</label>
                        </div>

                        <!-- Password Field -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="form-check mb-3 login-remember">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <button type="submit" class="btn login-button">Log In</button> <!-- Using login-button class -->

                        <!-- Forgot Password Link -->
                        <div class="text-center mt-3">
                            <a href="{{ route('password.request') }}" class="forgot-password">Forgot Your Password?</a> <!-- Using forgot-password class -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
