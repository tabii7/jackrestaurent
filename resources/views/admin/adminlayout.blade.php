<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <title>Admin Dashboard</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/feather-icon.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/intltelinput.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/tagify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/dropzone.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/bootstrap.css') }}">

    <!-- App CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">

    <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start   -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <!-- Page body Start -->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper" data-layout="stroke-svg">
                <div>
                    <div class="logo-wrapper">
                        <a href="{{ route('admin.dashboard') }}">
                            <img class="img-fluid for-light" src="{{ asset('admin/assets/images/logo/logo.png') }}"
                                alt="Light Logo">
                            <img class="img-fluid for-dark" src="{{ asset('admin/assets/images/logo/logo_dark.png') }}"
                                alt="Dark Logo">

                        </a>
                        <div class="toggle-sidebar">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="{{ route('admin.dashboard') }}"><img class="img-fluid"
                                src="../assets/images/logo/logo-icon.png" alt=""></a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i class="fas fa-arrow-left"></i></div>
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">

                                <!-- Pinned Section -->
                                <li class="pin-title sidebar-main-title">
                                    <div>
                                        <h6>Pinned</h6>
                                    </div>
                                </li>

                                <!-- Dashboard -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-home"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Restaurant</h6>
                                    </div>
                                </li>

                                <!-- Categories -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="{{ route('admin.add_new_category') }}">
                                        <i class="fas fa-list"></i>
                                        <span>Categories</span>
                                    </a>
                                </li>

                                <!-- Orders -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="{{ route('admin.all_orders') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>

                                <!-- Products -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="#">
                                        <i class="fas fa-box-open"></i>
                                        <span>Products</span>
                                        <i class="fas fa-chevron-right" style="position: absolute; right: 20px;"></i>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{ route('admin.add_new_product') }}">Add New Product</a></li>
                                        <li><a href="{{ route('admin.all_products') }}">All Products</a></li>
                                    </ul>
                                </li>

                                <!-- Extras -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="#">
                                        <i class="fas fa-plus-circle"></i>
                                        <span>Extras</span>
                                        <i class="fas fa-chevron-right" style="position: absolute; right: 20px;"></i>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{ route('admin.add_new_extras') }}">Add New Extra</a></li>
                                        <li><a href="{{ route('admin.allExtras') }}">All Extras</a></li>
                                    </ul>
                                </li>

                                <!-- Sauces -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="#">
                                        <i class="fas fa-mortar-pestle"></i>
                                        <span>Sauces</span>
                                        <i class="fas fa-chevron-right" style="position: absolute; right: 20px;"></i>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{ route('admin.add_new_sauce') }}">Add New Sauce</a></li>
                                        <li><a href="{{ route('all.sauces') }}">All Sauces</a></li>
                                    </ul>
                                </li>

                                <!-- Drinks -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="#">
                                        <i class="fas fa-glass-martini-alt"></i>
                                        <span>Drinks</span>
                                        <i class="fas fa-chevron-right" style="position: absolute; right: 20px;"></i>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{ route('admin.add_new_drinks') }}">Add New Drink</a></li>
                                        <li><a href="{{ route('all.drinks') }}">All Drinks</a></li>
                                    </ul>
                                </li>

                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Discount Settings</h6>
                                    </div>
                                </li>

                                <!-- Loyalty Program -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="{{ route('admin.loyalty_program') }}">
                                        <i class="fas fa-gift"></i>
                                        <span>Loyalty Program</span>
                                    </a>
                                </li>

                                <!-- New User Voucher -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="{{ route('admin.new_user_voucher') }}">
                                        <i class="fas fa-ticket-alt"></i>
                                        <span>New User Voucher</span>
                                    </a>
                                </li>

                                <!-- Pickup Discount -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="{{ route('admin.discount_voucher') }}">
                                        <i class="fas fa-tags"></i>
                                        <span>Pickup Discount</span>
                                    </a>
                                </li>

                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Other</h6>
                                    </div>
                                </li>

                                <!-- Store Settings -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="#">
                                        <i class="fas fa-cogs"></i>
                                        <span>Store Settings</span>
                                    </a>
                                </li>

                                <!-- Customers -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="#">
                                        <i class="fas fa-users"></i>
                                        <span>Customers</span>
                                    </a>
                                </li>

                                <!-- Logout -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="#">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="right-arrow" id="right-arrow"><i class="fas fa-arrow-right"></i></div>
                    </nav>


                </div>
            </div>

            <!-- Page Sidebar Ends-->
            <div class="page-body" style="margin-top: 0px !important;">
                <div class="container-fluid">


                    <div class="page-title">
                        <div class="row">
                            <div class="col-xl-4 col-sm-7 box-col-3">
                                <h3>Admin Dashboard</h3>
                            </div>
                            <div class="col-5 d-none d-xl-block">
                                <!-- Empty for alignment -->
                            </div>
                            <div class="col-xl-3 col-sm-5 box-col-4">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}">
                                            <i class="fas fa-home"></i> <!-- Replaced with FontAwesome home icon -->
                                        </a>
                                    </li>


                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')

            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 p-0 footer-copyright">
                            <p class="mb-0">Copyright 2024 © All rights Reserved.</p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Latest jQuery -->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('admin/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Scrollbar JS -->
    <script src="{{ asset('admin/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollbar/custom.js') }}"></script>

    <!-- Sidebar and Config JS -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sidebar-pin.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('admin/assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('admin/assets/js/header-slick.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/morris-chart/raphael.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/morris-chart/morris.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/morris-chart/prettify.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('admin/assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('admin/assets/js/owlcarousel/owl-custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/flat-pickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/assets/js/flat-pickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/tagify.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/tagify.polyfills.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/intltelinput.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/add-product/select4-custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/editors/quill.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom-add-product.js') }}"></script>
    <script src="{{ asset('admin/assets/js/height-equal.js') }}"></script>
    <script src="{{ asset('admin/assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('admin/assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('admin/assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ecommerce.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/theme-customizer/customizer.js') }}"></script>

    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Load Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom scripts -->

</body>


</html>