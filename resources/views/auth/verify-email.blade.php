@extends('layouts.app')

@section('title', 'Email Verification Required')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title text-center">{{ __('Email Verification Required') }}</h3>

                    <div class="alert alert-info mt-3">
                        {{ __('Thanks for signing up! Please verify your email by clicking the link we sent to your email address.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success mt-3">
                            {{ __('A new verification link has been sent to your email.') }}
                        </div>
                    @endif

                    <div class="text-center mt-4">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
