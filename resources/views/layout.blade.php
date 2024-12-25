<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="zomo">
    <meta name="keywords" content="zomo">
    <meta name="author" content="zomo">
    <link rel="icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/x-icon">
    <title>@yield('title', 'Restaurant')</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/favicon.png') }}">
    <meta name="theme-color" content="#ff8d2f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="zomo">
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/logo/favicon.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- Remixicon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/remixicon.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" id="change-link" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="white-bg">

    <!-- Header section start -->
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#offcanvasNavbar">
                    <span class="navbar-toggler-icon">
                        <i class="ri-menu-line"></i>
                    </span>
                </button>
                <a href="{{ url('/') }}">
                    <h3>Logo here</h3>
                </a>

                <div class="nav-option order-md-2">
                    <a target="_blank" href="{{ route('signin') }}" class="btn btn-sm theme-btn">Log in / Sign up</a>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header section end -->

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

    <!-- Tap to top start -->
    <button class="scroll scroll-to-top">
        <i class="ri-arrow-up-s-line arrow"></i>
    </button>
    <!-- Tap to top end -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Footer accordion JS -->
    <script src="{{ asset('assets/js/footer-accordion.js') }}"></script>

    <!-- Custom script JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
