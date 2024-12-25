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
                            <li class="active">
                                <i class="ri-user-3-line"></i>
                                <a href="{{ route('profile.view') }}">Change Profile</a>
                            </li>
                            <li>
                                <i class="ri-shopping-bag-3-line"></i>
                                <a href="{{ route('profile.view') }}">My Order</a>
                            </li>
                            <li>
                                <i class="ri-map-pin-line"></i>
                                <a href="{{ route('profile.view') }}">Saved Address</a>
                            </li>
                          
                        
                            <li>
                                <i class="ri-logout-box-r-line"></i>
                                <a href="#log-out" data-bs-toggle="modal">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="change-profile-content">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>Change Profile</h3>
                        </div>
                        <ul class="profile-details-list">
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-user-3-fill"></i>
                                        <span>Name :</span>
                                    </div>
                                    <h6>Mark Jecno</h6>
                                </div>
                                <a href="#name" class="btn theme-outline" data-bs-toggle="modal">Edit</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-mail-fill"></i>
                                        <span>Email :</span>
                                    </div>
                                    <h6>mark-jecno@gmail.com</h6>
                                </div>
                                <a href="#email" class="btn theme-outline" data-bs-toggle="modal">Change</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-phone-fill"></i>
                                        <span>Phone Number :</span>
                                    </div>
                                    <h6>+1 (692)52 - 95555</h6>
                                </div>
                                <a href="#number" class="btn theme-outline mt-0" data-bs-toggle="modal">Change</a>
                            </li>
                            <li>
                                <div class="profile-content">
                                    <div class="d-flex align-items-center gap-sm-2 gap-1">
                                        <i class="ri-lock-2-fill"></i>
                                        <span>Password :</span>
                                    </div>
                                    <h6>********</h6>
                                </div>
                                <a href="#password" class="btn theme-outline mt-0" data-bs-toggle="modal">Change</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->
@endsection