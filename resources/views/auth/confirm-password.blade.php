@extends('layouts.app')

@section('title', 'Confirm Password')

@section('head')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card login-card shadow-lg border-0 rounded-3">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 login-header">Confirm Your Password</h2>
                    <p class="text-center mb-4" style="color: #777;">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- Password Field -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autocomplete="current-password">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn login-button">Confirm Password</button> <!-- Using login-button class -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
