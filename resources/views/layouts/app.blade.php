<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>@yield('title', 'Organization Registration')</title>

    <!-- Meta Tags for SEO -->
    <meta name="description" content="Register your organization easily and securely on our platform.">
    <meta name="keywords" content="Organization Registration, Company Registration, Digital Platform">
    <meta name="author" content="{{ config('app.author') }}">

    <!-- Open Graph Meta Tags for Social Media Sharing -->
    <meta property="og:title" content="Organization Registration">
    <meta property="og:description" content="Register your organization easily and securely on our platform.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Organization Registration">
    <meta name="twitter:description" content="Register your organization easily and securely on our platform.">
    <meta name="twitter:image" content="{{ asset('images/twitter-image.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Files -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Yield for additional page-specific CSS -->
    @yield('head')
</head>
<body>

<!-- Navigation -->
@include('partials.navigation')

<!-- Main Gradient Background Container -->
<div class="main-gradient-container d-flex align-items-center">
    <section class="container">
        @yield('content')
    </section>
</div>

<!-- Footer -->
@include('partials.footer')

<!-- Bootstrap Bundle with Popper JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
