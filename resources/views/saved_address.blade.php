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
                                <a href="{{ route('profile.view') }}">Change Profile</a>
                            </li>
                            <li>
                                <i class="ri-shopping-bag-3-line"></i>
                                <a href="{{ route('profile.view') }}">My Order</a>
                            </li>
                            <li class="active">
                                <i class="ri-map-pin-line"></i>
                                <a href="{{ route('address.saved') }}">Saved Address</a>
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
                            @foreach ($address as $item)
                                <div class="col-md-6">
                                    <div class="address-box white-bg">
                                        <div class="address-title">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ri-home-4-fill icon"></i>
                                                <h6>{{$item->label}}</h6>
                                            </div>
                                            <a href="#edit-address{{$item->id}}" class="edit-btn" data-bs-toggle="modal">Edit</a>
                                        </div>
                                        <div class="address-details">
                                            <h6>
                                                {{$item->address}}
                                            </h6>
                                            <h6 class="phone-number">{{$item->phone}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal address-details-modal fade" id="edit-address{{$item->id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Address</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('update_address') }}" method="post">
                                            @csrf
                                            <input type="hidden" class="form-control" name="idd" value="{{$item->id}}">
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="inputName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="label" value="{{$item->label}}">
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="inputName" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" name="phone" value="{{$item->phone}}">
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="inputName" class="form-label">Address</label>
                                                        <input type="text" class="form-control" name="address" value="{{$item->address}}">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn theme-btn mt-0">Save</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-md-6">
                                <div class="address-box white-bg new-address-box white-bg">
                                    <a href="#address-details" class="btn new-address-btn theme-outline rounded-2 mt-0"
                                        data-bs-toggle="modal">Add New Address</a>
                                </div>
                            </div>
                            <div class="modal address-details-modal fade" id="address-details" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Address</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('store_address') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="inputName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="label">
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="inputName" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" name="phone">
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="inputName" class="form-label">Address</label>
                                                        <input type="text" class="form-control" name="address">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn theme-btn mt-0">Save</button>
                                            </div>
                                        </form>

                                    </div>
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
