@extends('shoplayout')

@section('content')  
    <!--  account section starts -->
    <section class="account-section section-b-space pt-0">
        <div class="container">
            <div class="layout-sec">
                <div class="row g-lg-4 g-4">
                    <div class="col-lg-12">
                        <div class="process-section d-none">
                            <ul class="process-list">
                                <li class="done">
                                    <a href="#">
                                        <div class="process-icon">
                                            <img class="img-fluid icon" src="assets/images/svg/user.svg" alt="user">
                                        </div>
                                        <h6>Account</h6>
                                    </a>
                                </li>

                            @if(session('order.type') !== 'Pickup')
                            <li class="done">
                                    <a href="#">
                                        <div class="process-icon">
                                            <img class="img-fluid icon" src="{{ asset('assets/images/svg/location-active.svg') }}" alt="location">
                                        </div>
                                        <h6>Address</h6>
                                    </a>
                                </li>
                                @endif
                                <li class="done">
                                    <a href="#">
                                        <div class="process-icon">
                                            <img class="img-fluid icon" src="assets/images/svg/wallet-add-active.svg"
                                                alt="wallet-add">
                                        </div>
                                        <h6>Payment</h6>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                        <div class="process-icon">
                                            <img class="img-fluid icon" src="assets/images/svg/verify-active.svg"
                                                alt="verify">
                                        </div>
                                        <h6>Confirm</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="account-part confirm-part">
                            <img class="img-fluid account-img w-25" src="assets/images/gif/confirm.gif" alt="confirm">
                            <h3>Your order has been successfully placed</h3>
                            <p>
                                Sit and relax while your order is being worked on. It’ll take
                                5 min before you get it.
                            </p>
                           
                        </div>
                    </div>
                    <!-- <div class="col-lg-4">
                        <div class="order-summery-section sticky-top">
                            <div class="checkout-detail">
                                <div class="cart-address-box">
                                    <div class="add-img">
                                        <img class="img-fluid img sm-size" src="assets/images/svg/location.svg"
                                            alt="rp1">
                                    </div>
                                    <div class="add-content">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="dark-text deliver-place">
                                                Deliver to : Home
                                            </h5>
                                        </div>
                                        <h6 class="address mt-2 content-color">
                                            93, Songbird Cir, South Carolina, USA
                                        </h6>
                                    </div>
                                </div>
                                <div class="cart-address-box mt-3">
                                    <div class="add-img">
                                        <img class="img-fluid img sm-size" src="assets/images/svg/wallet-add.svg"
                                            alt="rp1">
                                    </div>
                                    <div class="add-content">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="dark-text deliver-place">Payment Method:</h5>
                                        </div>
                                        <h6 class="address mt-2 content-color">
                                            Card: 98** **** **20
                                        </h6>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="horizontal-product-box">
                                            <div class="product-content">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5>Ultimate Loaded Nacho Fiesta</h5>
                                                    <h6 class="product-price">$20</h6>
                                                </div>
                                                <h6 class="ingredients-text">Hot Nacho Chips</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="horizontal-product-box">
                                            <div class="product-content">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5>Smoked Salmon Bagel</h5>
                                                    <h6 class="product-price">$40</h6>
                                                </div>
                                                <h6 class="ingredients-text">Smoked Biscuit</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="horizontal-product-box">
                                            <div class="product-content">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5>Cranberry Club Sandwich</h5>
                                                    <h6 class="product-price">$50</h6>
                                                </div>
                                                <h6 class="ingredients-text">Vegetables</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <h5 class="bill-details-title fw-semibold dark-text">
                                    Bill Details
                                </h5>
                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">Sub Total</h6>
                                    <h6 class="fw-semibold">$110</h6>
                                </div>
                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">
                                        Delivery Charge (2 kms)
                                    </h6>
                                    <h6 class="fw-semibold success-color">Free</h6>
                                </div>
                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">Discount (10%)</h6>
                                    <h6 class="fw-semibold">$10</h6>
                                </div>
                                <div class="grand-total">
                                    <h6 class="fw-semibold dark-text">Total</h6>
                                    <h6 class="fw-semibold amount">$100</h6>
                                </div>
                                <img class="dots-design" src="assets/images/svg/dots-design.svg" alt="dots">
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- account section end -->
@endsection