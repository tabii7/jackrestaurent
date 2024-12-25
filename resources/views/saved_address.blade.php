@extends('shoplayout')

@section('content')  

<!-- card section starts -->
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
                        <li>
                            <i class="ri-shopping-bag-3-line"></i>
                            <a href="my-order.html">My Order</a>
                        </li>
                        <li class="active">
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
                <div class="address-section bg-color h-100 mt-0">
                    <div class="title">
                        <div class="loader-line"></div>
                        <h3>Saved Address</h3>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="address-box white-bg">
                                <div class="address-title">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="ri-home-4-fill icon"></i>
                                        <h6>Home</h6>
                                    </div>
                                    <a href="#edit-address" class="edit-btn" data-bs-toggle="modal">Edit</a>
                                </div>
                                <div class="address-details">
                                    <h6>
                                        93, Songbird Cir, Blackville, South Carolina, USA-29817
                                    </h6>
                                    <h6 class="phone-number">+33 (907) 555-0101</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-box white-bg">
                                <div class="address-title">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="ri-briefcase-4-fill icon"></i>
                                        <h6>Office</h6>
                                    </div>
                                    <a href="#edit-address" class="edit-btn" data-bs-toggle="modal">Edit</a>
                                </div>
                                <div class="address-details">
                                    <h6>703 Elizabeth Barcus Way, USA-95540</h6>
                                    <h6 class="phone-number">+33 (907) 555-3456</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-box white-bg">
                                <div class="address-title">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="ri-account-circle-fill icon"></i>
                                        <h6>Smith Jones</h6>
                                    </div>
                                    <a href="#edit-address" class="edit-btn" data-bs-toggle="modal">Edit</a>
                                </div>
                                <div class="address-details">
                                    <h6>13th Street 47 W 13th St, New York, USA-10011</h6>
                                    <h6 class="phone-number">+33 (907) 555-1235</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-box white-bg new-address-box white-bg">
                                <a href="#address-details" class="btn new-address-btn theme-outline rounded-2 mt-0"
                                    data-bs-toggle="modal">Add New Address</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- profile section end -->
@endsection