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
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" id="rtl-link" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

<!-- Swiper CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}">

<!-- AOS CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/aos.css') }}">

<!-- Remixicon CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/remixicon.css') }}">

<!-- Theme CSS -->
<link rel="stylesheet" id="change-link" type="text/css" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="white-bg">

    <!-- Header section start -->
   <!-- Header section start -->
<header class="header-light">
    <div class="custom-container">
        <nav class="navbar navbar-expand-lg p-0">

            <!-- Logo -->
            <a href="{{ route('shop.index') }}">
                <img class="img-fluid logo" src="{{ asset('assets/images/svg/logo2.svg') }}" alt="logo">
            </a>

            <!-- Navigation Options -->
            <div class="nav-option order-md-2">

                <!-- Cart Dropdown -->
                <div class="dropdown-button">
                <a href="{{ auth()->check() ? route('select.address') : route('cart.view') }}">
                <div class="cart-button">
                       
                       <i class="ri-shopping-cart-line cart-bag"></i>
                   </div>
                </a>
                  
                   
                </div>

                <!-- Profile Dropdown -->
                <div class="profile-part dropdown-button order-md-2">
                    <img class="img-fluid profile-pic" src="{{ asset('assets/images/icons/p5.png') }}" alt="profile">
                    <div>
                        <h6 class="fw-normal">Hi, {{ auth()->user()->name ?? 'Guest' }}</h6>
                        <h5 class="fw-medium">{{ __('My Account') }}</h5>
                    </div>
                    <div class="onhover-box onhover-sm">
                        <ul class="menu-list">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.view') }}">{{ __('Profile') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('My Orders') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('address.saved') }}">{{ __('Saved Address') }}</a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="bottom-btn">
                            @if(auth()->check())
                            <a href="#" class="theme-color fw-medium d-flex" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ri-login-box-line me-2"></i>{{ __('Logout') }}
                            </a>
                            @else
                                <a href="{{ route('signin') }}" class="theme-color fw-medium d-flex">
                                    <i class="ri-login-box-line me-2"></i>{{ __('Login') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </nav>
    </div>
</header>
<!-- Header Section end -->

    <!-- Header section end -->

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

   <!-- footer section starts -->
<footer class="footer-section footer-sm">
    <img src="{{ asset('assets/images/home-bg2.png') }}" class="img-fluid footer-img" alt="">
    <div class="custom-container">
        <div class="main-footer">
            <div class="row g-3">
                <div class="col-xl-4 col-lg-12">
                    <div class="footer-logo-part">
                        <img class="img-fluid logo" src="{{ asset('assets/images/svg/logo.svg') }}" alt="logo">
                        <p>
                            Welcome to our online order website! Here, you can browse our
                            wide selection of products and place orders from the comfort
                            of your own home.
                        </p>
                        <div class="social-media-part">
                            <ul class="social-icon">
                                <li><a href="https://www.facebook.com/login/"><i class="ri-facebook-fill icon"></i></a></li>
                                <li><a href="https://twitter.com/i/flow/login"><i class="ri-twitter-fill icon"></i></a></li>
                                <li><a href="https://www.linkedin.com/login/"><i class="ri-linkedin-fill icon"></i></a></li>
                                <li><a href="https://www.instagram.com/accounts/login/"><i class="ri-instagram-fill icon"></i></a></li>
                                <li><a href="https://www.youtube.com/"><i class="ri-youtube-fill icon"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row g-3">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div>
                                <h5 class="footer-title">Company</h5>
                                <ul class="content">
                                    <li>
                                        <a class="nav-links" href="{{ route('index') }}">
                                            <h6>Home</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-links" href="{{ route('shop.index') }}">
                                            <h6>Shop</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div>
                                <h5 class="footer-title">Account</h5>
                                <ul class="content">
                                    <li>
                                        <a class="nav-links" href="{{ route('orders.index') }}">
                                            <h6>My orders</h6>
                                        </a>
                                    </li>
                                    <li>
                                    <a class="nav-links" href="{{ auth()->check() ? route('select.address') : route('cart.view') }}">
                                        <h6>Shopping Cart</h6>
                                    </a>
                                    </li>
                                    <li>
                                        <a class="nav-links" href="{{ route('address.saved') }}">
                                            <h6>Saved Address</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div>
                                <h5 class="footer-title">Useful links</h5>
                                <ul class="content">
                                    <li>
                                        <a class="nav-links" href="{{ route('signin') }}">
                                            <h6>Login</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-links" href="{{ route('signup') }}">
                                            <h6>Register</h6>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-links" href="{{ route('profile.view') }}">
                                            <h6>Profile</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-part">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <h6>&copy; Copyright 2024. All rights Reserved.</h6>
                <p style="color:gray;" >Designed and Developed by <a style="color:white; text-decoration: underline ; " href="https://nextgensol.us/" >nextgensol</a> </p>
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->


    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="{{ route('shop.index') }}" class="menu-box">
                    <i class="ri-home-4-line"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>

                <a href="{{ auth()->check() ? route('select.address') : route('cart.view') }}" class="menu-box">
                    <i class="ri-shopping-cart-2-line"></i>
                    <span>Cart</span>
                    <span class="ec-header-count cart-count-lable">{{ session('cart') ? count(session('cart')) : 0 }}</span>

                </a>
            </li>
            <li>
                <a href="{{ route('profile.view') }}" class="menu-box">
                    <i class="ri-user-line"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->



    <!-- tap to top start -->
    <button class="scroll scroll-to-top">
        <i class="ri-arrow-up-s-line arrow"></i>
    </button>
    <!-- tap to top end -->


   

    <!-- edit name modal starts -->
    <div class="modal profile-modal fade" id="name" aria-hidden="true" aria-labelledby="exampleModalToggleName"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalToggleName">Name</h1>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputName" value="Mark Jecno"
                            placeholder="Enter your name">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="profile.html" class="btn theme-btn" data-bs-dismiss="modal">Save</a>
                </div>
            </div>
        </div>
    </div>
    <!-- edit name modal end -->

    <!-- edit email modal starts -->
    <div class="modal profile-modal fade" id="email" aria-hidden="true" aria-labelledby="exampleModalToggleEmail"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalToggleEmail">Email</h1>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" value="mark-jecno@gmail.com"
                            placeholder="Enter your email">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="profile.html" class="btn theme-btn" data-bs-dismiss="modal">Save</a>
                </div>
            </div>
        </div>
    </div>
    <!-- edit email modal end -->

    <!-- edit phone number modal starts -->
    <div class="modal profile-modal fade" id="number" aria-hidden="true" aria-labelledby="exampleModalToggleCall"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalToggleCall">
                        Phone Number
                    </h1>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputNumber" class="form-label">Phone Number</label>
                        <input type="email" class="form-control" id="inputNumber" value="+1 (692)52 - 95555"
                            placeholder="Enter your number">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="profile.html" class="btn theme-btn" data-bs-dismiss="modal">Save</a>
                </div>
            </div>
        </div>
    </div>
    <!-- edit phone number modal end -->

    <!-- edit password number modal starts -->
    <div class="modal profile-modal fade" id="password" aria-hidden="true" aria-labelledby="exampleModalTogglePass"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalTogglePass">Password</h1>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputcurrentPassword" class="form-label">
                            Current Password</label>
                        <input type="password" class="form-control" id="inputcurrentPassword"
                            placeholder="Enter your current password">
                    </div>
                    <div class="form-group mt-2">
                        <label for="inputnewPassword" class="form-label">
                            New Password</label>
                        <input type="password" class="form-control" id="inputnewPassword"
                            placeholder="Enter your new password">
                    </div>
                    <div class="form-group mt-2">
                        <label for="inputconfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="inputconfirmPassword"
                            placeholder="Enter your confirm password">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="profile.html" class="btn theme-btn" data-bs-dismiss="modal">Save</a>
                </div>
            </div>
        </div>
    </div>
    <!-- edit password number modal end -->

    <!-- logout modal starts -->
    <div class="modal address-details-modal fade" id="log-out" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Logging Out</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you Sure, You are logging out</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('signin') }}" class="btn theme-btn mt-0">Log Out</a>
                </div>
            </div>
        </div>
    </div>

    <div id="menu-offcanvas-container"></div>
    <!-- logout modal end -->

<!-- Responsive Space -->
<div class="responsive-space"></div>
<!-- Responsive Space -->

<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Footer Accordion JS -->
<script src="{{ asset('assets/js/footer-accordion.js') }}"></script>

<!-- Loader JS -->
<script src="{{ asset('assets/js/loader.js') }}"></script>

<!-- Swiper JS -->
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/custom-swiper.js') }}"></script>

<!-- AOS JS -->
<script src="{{ asset('assets/js/aos.js') }}"></script>

<!-- Menu Offcanvas JS -->
<!-- <script src="{{ asset('assets/js/menu-offcanvas.html') }}"></script> -->

<!-- <script>
    // Fetch and load the menu-offcanvas.html file
    fetch('{{ asset('assets/js/menu-offcanvas.html') }}')
        .then(response => response.text())
        .then(html => {
            document.getElementById('menu-offcanvas-container').innerHTML = html;
        })
        .catch(error => console.error('Error loading menu-offcanvas:', error));
</script> -->

<!-- Script JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@yield('custom-scripts')
<script>
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        once: true
    });
    window.addEventListener('load', AOS.refresh);
</script>


</body>


</html>