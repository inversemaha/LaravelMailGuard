@extends('layouts.app')

@section('title', 'Your Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card profile-card shadow-lg">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 profile-header">Organization Profile</h2>
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <strong>Nature of Ownership:</strong> {{ $profile->nature_of_ownership }}
                    </div>

                    <div class="mb-3">
                        <strong>TIN:</strong> {{ $profile->tin }}
                    </div>

                    <div class="mb-3">
                        <strong>BIN:</strong> {{ $profile->bin ?? 'N/A' }}
                    </div>

                    <div class="mb-3">
                        <strong>Year of Registration:</strong> {{ $profile->year_of_registration }}
                    </div>

                    <div class="mb-3">
                        <strong>Years in Operation:</strong> {{ $profile->years_in_operation }}
                    </div>

                    <div class="mb-3">
                        <strong>Registered Office Address:</strong> {{ $profile->registered_office_address }}
                    </div>

                    <div class="mb-3">
                        <strong>Website URL:</strong> <a href="{{ $profile->website_url }}"
                                                         target="_blank">{{ $profile->website_url ?? 'N/A' }}</a>
                    </div>

                    <div class="mb-3">
                        <strong>Contact Person Name:</strong> {{ $profile->contact_person_name }}
                    </div>

                    <div class="mb-3">
                        <strong>Contact Person Email:</strong> {{ $profile->contact_person_email }}
                    </div>

                    <div class="mb-3">
                        <strong>Contact Person Phone:</strong> {{ $profile->contact_person_phone }}
                    </div>

                    <!-- Display File Links -->
                    <div class="mb-3">
                        <strong>Trade License:</strong>
                        <a href="/doc/{{$profile->trade_license}}" target="_blank">View Document</a>
                    </div>

                    <div class="mb-3">
                        <strong>TIN Certificate:</strong>
                        <a href="/doc/{{$profile->tin_certificate}}" target="_blank">View Document</a>
                    </div>

                    @if ($profile->bin_certificate)
                        <div class="mb-3">
                            <strong>BIN Certificate:</strong>
                            <a href="/doc/{{$profile->bin_certificate}}" target="_blank">View Document</a>
                        </div>
                    @endif

                    @if ($profile->certificate_of_incorporation)
                        <div class="mb-3">
                            <strong>Certificate of Incorporation:</strong>
                            <a href="/doc/{{$profile->certificate_of_incorporation}}" target="_blank">View Document</a>
                        </div>
                    @endif



                @if ($profile->certificate_of_incorporation)
                        <div class="mb-3">
                            <strong>Certificate of Incorporation:</strong>
                            <a href="/doc/{{$profile->certificate_of_incorporation}}" target="_blank">View
                                Document</a>
                        </div>
                    @endif

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
