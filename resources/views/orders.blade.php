@extends('shoplayout')

@section('content')

    <!-- profile section starts -->
    <section class="profile-section section-b-space">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3">
                    <div class="profile-sidebar sticky-top">
                        <div class="profile-cover">
                            <img class="img-fluid profile-pic" src="assets/images/icons/p5.png" alt="profile">
                        </div>
                        <div class="profile-name">
                            <h5 class="user-name">Mark Jecno</h5>
                            <h6>mark-jecno@gmail.com</h6>
                        </div>
                        <ul class="profile-list">
                            <li>
                                <i class="ri-user-3-line"></i>
                                <a href="profile.html">Change Profile</a>
                            </li>
                            <li class="active">
                                <i class="ri-shopping-bag-3-line"></i>
                                <a href="my-order.html">My Order</a>
                            </li>
                            <li>
                                <i class="ri-map-pin-line"></i>
                                <a href="saved-address.html">Saved Address</a>
                            </li>

                            <li>
                                <i class="ri-logout-box-r-line"></i>
                                <a href="#log-out" data-bs-toggle="modal">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="my-order-content">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>My Order</h3>
                        </div>
                        <ul class="order-box-list">
                            <li>
                                <div class="order-box">
                                    <div class="order-box-content">
                                        <div class="brand-icon">
                                            <img class="img-fluid icon" src="assets/images/icons/brand2.png"
                                                alt="brand3">
                                        </div>
                                        <div class="order-details">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <h5 class="brand-name dark-text fw-medium">
                                                    Mcdonald's
                                                </h5>
                                                <h6 class="fw-medium content-color text-end">
                                                    Today, 3:00 PM
                                                </h6>
                                            </div>
                                            <h6 class="fw-medium dark-text">
                                                <span class="fw-normal content-color">Transaction Id :
                                                </span>
                                                #ACB12345458
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-sm-3 mt-2">
                                        <h6 class="fw-medium dark-text">
                                            <span class="fw-normal content-color">Total Amount :</span>
                                            $ 40.00
                                        </h6>
                                        <a href="#order" class="btn theme-outline details-btn"
                                            data-bs-toggle="modal">Details</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="order-box">
                                    <div class="order-box-content">
                                        <div class="brand-icon">
                                            <img class="img-fluid icon" src="assets/images/icons/brand3.png"
                                                alt="brand3">
                                        </div>
                                        <div class="order-details">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <h5 class="brand-name dark-text fw-medium">
                                                    Starbucks
                                                </h5>
                                                <h6 class="fw-medium content-color text-end">
                                                    Yesterday, 6:00 PM
                                                </h6>
                                            </div>
                                            <h6 class="fw-medium dark-text">
                                                <span class="fw-normal content-color">Transaction Id :
                                                </span>
                                                #ACB12345459
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-sm-3 mt-2">
                                        <h6 class="fw-medium dark-text">
                                            <span class="fw-normal content-color">Total Amount :</span>
                                            $ 100.00
                                        </h6>
                                        <a href="#order" class="btn theme-outline details-btn"
                                            data-bs-toggle="modal">Details</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="order-box">
                                    <div class="order-box-content">
                                        <div class="brand-icon">
                                            <img class="img-fluid icon" src="assets/images/icons/brand4.png"
                                                alt="brand3">
                                        </div>
                                        <div class="order-details">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <h5 class="brand-name dark-text fw-medium">
                                                    Pizza Hut
                                                </h5>
                                                <h6 class="fw-medium content-color text-end">
                                                    25 March 2024, 8:00 PM
                                                </h6>
                                            </div>
                                            <h6 class="fw-medium dark-text">
                                                <span class="fw-normal content-color">Transaction Id :
                                                </span>
                                                #ACB123456678
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-sm-3 mt-2">
                                        <h6 class="fw-medium dark-text">
                                            <span class="fw-normal content-color">Total Amount :</span>
                                            $ 60.00
                                        </h6>
                                        <a href="#order" class="btn theme-outline details-btn"
                                            data-bs-toggle="modal">Details</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="order-box">
                                    <div class="order-box-content">
                                        <div class="brand-icon">
                                            <img class="img-fluid icon" src="assets/images/icons/brand6.png"
                                                alt="brand3">
                                        </div>
                                        <div class="order-details">
                                            <div class="d-flex align-items-center justify-content-between w-100">
                                                <h5 class="brand-name dark-text fw-medium">
                                                    Burger King
                                                </h5>
                                                <h6 class="fw-medium content-color text-end">
                                                    20 March 2024, 9:00 PM
                                                </h6>
                                            </div>
                                            <h6 class="fw-medium dark-text">
                                                <span class="fw-normal content-color">Transaction Id :
                                                </span>
                                                #ACB123458745
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-sm-3 mt-2">
                                        <h6 class="fw-medium dark-text">
                                            <span class="fw-normal content-color">Total Amount :</span>
                                            $ 50.00
                                        </h6>
                                        <a href="#order" class="btn theme-outline details-btn"
                                            data-bs-toggle="modal">Details</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->
@endsection
