@extends('layouts.app')

@section('title', 'Complete Your Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card profile-card shadow-lg">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 profile-header">Complete Your Organization Profile</h2>
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Nature of Ownership -->
                        <div class="form-floating mb-3">
                            <select name="nature_of_ownership" class="form-select" required>
                                <option value="" disabled {{ old('nature_of_ownership') ? '' : 'selected' }}>Select Nature of Ownership</option>
                                <option value="Sole-Proprietorship" {{ old('nature_of_ownership') == 'Sole-Proprietorship' ? 'selected' : '' }}>Sole-Proprietorship</option>
                                <option value="Private Ltd." {{ old('nature_of_ownership') == 'Private Ltd.' ? 'selected' : '' }}>Private Ltd.</option>
                                <option value="Public Ltd." {{ old('nature_of_ownership') == 'Public Ltd.' ? 'selected' : '' }}>Public Ltd.</option>
                                <option value="Partnership Business" {{ old('nature_of_ownership') == 'Partnership Business' ? 'selected' : '' }}>Partnership Business</option>
                                <option value="NGO/NPO" {{ old('nature_of_ownership') == 'NGO/NPO' ? 'selected' : '' }}>NGO/NPO</option>
                                <option value="Govt. Entity" {{ old('nature_of_ownership') == 'Govt. Entity' ? 'selected' : '' }}>Govt. Entity</option>
                            </select>
                            <label for="nature_of_ownership">Nature of Ownership</label>
                            @error('nature_of_ownership')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tax Identification Number (TIN) -->
                        <div class="form-floating mb-3">
                            <input type="number" name="tin" class="form-control" placeholder="Tax Identification Number"
                                   value="{{ old('tin') }}" required>
                            <label for="tin">Tax Identification Number (TIN)</label>
                            @error('tin')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Business Identification Number (BIN) -->
                        <div class="form-floating mb-3">
                            <input type="number" name="bin" class="form-control"
                                   placeholder="Business Identification Number" value="{{ old('bin') }}">
                            <label for="bin">Business Identification Number (BIN)</label>
                            @error('bin')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Year of Registration -->
                        <div class="form-floating mb-3">
                            <input type="number" name="year_of_registration" class="form-control"
                                   placeholder="Year of Registration" value="{{ old('year_of_registration') }}" required>
                            <label for="year_of_registration">Year of Registration</label>
                            @error('year_of_registration')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Number of Years in Operation -->
                        <div class="form-floating mb-3">
                            <input type="number" name="years_in_operation" class="form-control"
                                   placeholder="Years in Operation" value="{{ old('years_in_operation') }}" required>
                            <label for="years_in_operation">Number of Years in Operation</label>
                            @error('years_in_operation')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Registered Office Address -->
                        <div class="form-floating mb-3">
                            <input type="text" name="registered_office_address" class="form-control"
                                   placeholder="Registered Office Address" value="{{ old('registered_office_address') }}" required>
                            <label for="registered_office_address">Registered Office Address</label>
                            @error('registered_office_address')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Website URL -->
                        <div class="form-floating mb-3">
                            <input type="url" name="website_url" class="form-control" placeholder="Website URL"
                                   value="{{ old('website_url') }}">
                            <label for="website_url">Website URL</label>
                            @error('website_url')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contact Person Name -->
                        <div class="form-floating mb-3">
                            <input type="text" name="contact_person_name" class="form-control"
                                   placeholder="Contact Person Name" value="{{ old('contact_person_name') }}" required>
                            <label for="contact_person_name">Contact Person Name</label>
                            @error('contact_person_name')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contact Person Email -->
                        <div class="form-floating mb-3">
                            <input type="email" name="contact_person_email" class="form-control"
                                   placeholder="Contact Person Email" value="{{ old('contact_person_email') }}" required>
                            <label for="contact_person_email">Contact Person Email</label>
                            @error('contact_person_email')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contact Person Phone -->
                        <div class="form-floating mb-3">
                            <input type="text" name="contact_person_phone" class="form-control"
                                   placeholder="Contact Person Phone (+880...)" value="{{ old('contact_person_phone') }}" required>
                            <label for="contact_person_phone">Contact Person Phone</label>
                            @error('contact_person_phone')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- File Uploads with Error Messages -->
                        <div class="mb-3">
                            <label for="trade_license" class="form-label">Trade License (PDF, max 2MB)</label>
                            <input type="file" name="trade_license" class="form-control" required>
                            @error('trade_license')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tin_certificate" class="form-label">TIN Certificate (PDF, max 2MB)</label>
                            <input type="file" name="tin_certificate" class="form-control" required>
                            @error('tin_certificate')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bin_certificate" class="form-label">BIN Certificate (PDF, optional, max 2MB)</label>
                            <input type="file" name="bin_certificate" class="form-control">
                            @error('bin_certificate')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="certificate_of_incorporation" class="form-label">Certificate of Incorporation (PDF, optional, max 2MB)</label>
                            <input type="file" name="certificate_of_incorporation" class="form-control">
                            @error('certificate_of_incorporation')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Save Profile</button>
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
