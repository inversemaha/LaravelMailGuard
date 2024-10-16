@extends('layouts.app')

@section('title', 'Sign Up')

@section('head')
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card signup-card shadow-lg">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 signup-header">Create Your Account</h2>
                    <p class="text-center mb-4" style="color: #777;">Join us and explore new possibilities!</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Organization Name Field -->
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="org_name"
                                   placeholder="Organization Name" required>
                            <label for="org_name">Organization Name</label>
                        </div>

                        <!-- Organization Type Dropdown -->
                        <div class="form-floating mb-3">
                            <select name="org_type" class="form-select" id="org_type" required>
                                <option value="" selected disabled>Select Organization Type</option>
                                <option value="Insurance Company">Insurance Company</option>
                                <option value="Reinsurance Company">Reinsurance Company</option>
                                <option value="Insurtech Company">Insurtech Company</option>
                                <option value="Microfinance Institutions">Microfinance Institutions</option>
                                <option value="Agritech Company">Agritech Company</option>
                                <option value="E-Marketplace Company">E-Marketplace Company</option>
                                <option value="Technology Development Company">Technology Development Company</option>
                                <option value="Mobile Network Operator">Mobile Network Operator</option>
                                <option value="Telecommunication Value Added Service">Telecommunication Value Added
                                    Service
                                </option>
                                <option value="Bank">Bank</option>
                                <option value="Non-Banking Financial Institutions">Non-Banking Financial Institutions
                                </option>
                                <option value="Agri-Input Company">Agri-Input Company</option>
                                <option value="Startup">Startup</option>
                                <option value="Veterinary Medicine/Vaccine Company">Veterinary Medicine/Vaccine
                                    Company
                                </option>
                            </select>
                            <label for="org_type">Organization Type</label>
                        </div>

                        <!-- Email Address Field -->
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address"
                                   required>
                            <label for="email">Email Address</label>
                        </div>

                        <button type="submit" class="btn signup-button">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alertBox = document.querySelector('.alert');
        if (alertBox) {
            setTimeout(() => {
                alertBox.style.display = 'none';
            }, 5000); // Hide after 5 seconds
        }
    });
</script>

