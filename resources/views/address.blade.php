@extends('shoplayout')
<style>

    .address-details {
    white-space: nowrap;        /* Prevent text from wrapping */
    overflow: hidden;          /* Hide overflowing text */
    text-overflow: ellipsis;   /* Add ellipsis (...) for overflow */
    display: block;            /* Ensure proper block-level behavior */
    max-width: 100%;           /* Adjust width as needed */
    word-wrap: break-word;     /* Break long words (optional for responsiveness) */

    
}

.btn-black {
    background-color: black;
    color: white;
}
.btn-gray {
    background-color: gray;
    color: white;
}




    </style>
@section('content')  
<!--  account section starts -->
<section class="account-section section-b-space pt-0">
    <div class="container">
        <div class="layout-sec">
            <div class="row g-lg-4 g-4">
                <div class="col-lg-8">
                    <div class="process-section">
                        <ul class="process-list">
                            <li class="done">
                                <a href="{{ route('cart.view') }}">
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="assets/images/svg/user.svg" alt="user">
                                    </div>
                                    <h6>Account</h6>
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{ route('select.address') }}">
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="assets/images/svg/location-active.svg"
                                            alt="location">
                                    </div>
                                    <h6>Address</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('payment') }}">
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="assets/images/svg/wallet-add.svg"
                                            alt="wallet-add">
                                    </div>
                                    <h6>Payment</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('confirm_order') }}">
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="assets/images/svg/verify.svg" alt="verify">
                                    </div>
                                    <h6>Confirm</h6>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="address-section">
                        <div class="title">
                            <div class="loader-line"></div>
                            <h3>Select Saved Address</h3>
                            <h6>
                                You’ve add some address before, You can select one of below.
                            </h6>
                        </div>
                        <div class="row g-3">
                            @foreach (auth()->check() ? auth()->user()->addresses : session('guest_addresses', []) as $address)
                            <div class="col-md-6" id="address-{{ $loop->index }}">
                                <div class="address-box">
                                    <div class="address-title">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="ri-home-4-fill icon"></i>
                                            <h6>{{ $address->label ?? $address['label'] }}</h6>
                                        </div>
                                        <a href="#edit-address" class="edit-btn" data-bs-toggle="modal"
                                        data-label="{{ $address->label ?? $address['label'] }}"
                                        data-address="{{ $address->address ?? $address['address'] }}"
                                        data-phone="{{ $address->phone ?? $address['phone'] }}"
                                        data-index="{{ $loop->index }}">Edit</a>    
                                    </div>
                                    <div class="address-details">
                                        <h6>{{ $address->address ?? $address['address'] }}</h6>
                                        <h6 class="phone-number">{{ $address->phone ?? $address['phone'] }}</h6>
                                        <div class="option-section">
                                            
                                            <a href="javascript:void(0)" class="btn gray-btn rounded-2 mt-0 deliver-btn"
                                            data-address-id="{{ $address->id ?? $loop->index }}"
                                            @if (isset($address->selected) && $address->selected == 1 || (isset($address['selected']) && $address['selected'] == 1))
                                            class="btn-black"
                                                style="background-color: black; color: white;"
                                            @endif>
                                                @if (isset($address->selected) && $address->selected == 1 || (isset($address['selected']) && $address['selected'] == 1))
                                                    Selected
                                                @else
                                                    Deliver Here
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                            
                            <div class="col-md-6">
                                <div class="address-box new-address-box">
                                    <a href="#address-details" class="btn theme-outline rounded-2"
                                        data-bs-toggle="modal">Add New Address</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-summery-section sticky-top">
                    <div class="checkout-detail">
                        <ul>

                     @php 
                     $total_price = 0;
                     @endphp
                        @foreach ($cart as $index => $item)
                            <li>
                                <div class="horizontal-product-box">
                                    <div class="product-content">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5>{{ $item['product_name'] }}</h5>
                                            <h6 class="product-price">${{$item['product_price']}}</h6>
                                        </div>
                                        @if(isset($item['salad']) &&  $item['salad'] == '1')
                                        <div class="mt-2 mb-2">
                                        <h5 class="ingredients-text">Salad</h5>
                                        </div>
                                        @endif
                                        @if (!empty($item['extras']))
                                            <h5 class="ingredients-text">Extras</h5>
                                            
                                            @foreach ($item['extras'] as $extra)
                                            <div class="d-flex align-items-center justify-content-between mt-md-2 mt-1 gap-1">
                                                    <h6 class="place">{{ $extra['name'] }} x {{ $extra['quantity'] }}</h6>
                                                    <h6 class="extras-price">${{ $extra['quantity'] * $extra['price'] }}</h6>
                                            </div>
                                            @endforeach
                                                

                                        @endif

                                        @if (!empty($item['drinks']))
                                            <h5 class="ingredients-text">Drinks</h5>
                                            @foreach ($item['drinks'] as $drink)
                                            <div class="d-flex align-items-center justify-content-between mt-md-2 mt-1 gap-1">
                                                <h6 class="place">
                                                        {{ $drink['name'] }} x {{ $drink['quantity'] }}<br>
                                                    </h6>
                                                    <h6 class="extras-price">${{$drink['quantity'] * $drink['price'] }}</h6>
                                                </div>
                                                    @endforeach
                                                
                                            @endif
                                            
                                            @if (!empty($item['sauces']))
                                            <h5 class="ingredients-text">Sauces</h5>
                                            @if (!empty($item['sauces']))
                                            
                                            @foreach ($item['sauces'] as $sauce)
                                            <div class="d-flex align-items-center justify-content-between mt-md-2 mt-1 gap-1">
                                                    <h6 class="place">
                                                        {{ $sauce['name']}}   
                                                    </h6>

                                                    <h6 class="sauce-price">${{ $sauce['price'] }}</h6>

                                                </div>
                                                    @endforeach
                                                  
                                                @endif
                                            @endif
                                    </div>
                                </div>
                            </li>

                            @php
                            $total_price += number_format($item['total_price'], 2);
                            @endphp
                        @endforeach
                    </ul>

                            <h5 class="bill-details-title fw-semibold dark-text">
                                Bill Details
                            </h5>
                            <div class="sub-total">
                                <h6 class="content-color fw-normal">Sub Total</h6>
                                <h6 class="fw-semibold">${{$total_price}}</h6>
                            </div>
                            <div class="sub-total">
                                <h6 class="content-color fw-normal">
                                    Delivery Charge (2 kms)
                                </h6>
                                <h6 class="fw-semibold success-color">Free</h6>
                            </div>
                            <div class="grand-total">
                                <h6 class="fw-semibold dark-text">To Pay</h6>
                                <h6 class="fw-semibold amount">${{$total_price}}</h6>
                            </div>
                            <a href="{{ route('payment') }}" class="btn theme-btn restaurant-btn w-100 rounded-2">PROCEED TO PAYMENT</a>

                            <img class="dots-design" src="{{ asset('assets/images/svg/dots-design.svg') }}" alt="dots">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal to Add New Address -->
<div class="modal fade" id="address-details" tabindex="-1" aria-labelledby="address-details-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="address-details-label">Add New Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="address-form">
                    @csrf
                    <div class="mb-3">
                        <label for="label" class="form-label">Address Label</label>
                        <input type="text" class="form-control" id="label" name="label" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" class="btn theme-outline rounded-2">Save Address</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Editing Address -->
<div class="modal fade" id="edit-address" tabindex="-1" aria-labelledby="edit-address-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-address-label">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-address-form">
                    @csrf
                    <div class="mb-3">
                        <label for="edit-label" class="form-label">Address Label</label>
                        <input type="text" class="form-control" id="edit-label" name="label" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="edit-address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="edit-phone" name="phone" required>
                    </div>
                    <input type="hidden" id="edit-address-index" name="index">
                    <button type="submit" class="btn theme-outline rounded-2">Update Address</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- account section end -->
@endsection

@section('custom-scripts')
<script>


$(document).ready(function () {
    $('#address-form').submit(function (e) {
        e.preventDefault();

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('save.guest.address') }}",  // Route to save address
            method: "POST",
            data: formData,
            success: function (response) {
                // On success, close the modal and reload address list
                if (response.success) {
                    $('#address-details').modal('hide');
                    updateAddressList(response.address);

                    location.reload();
                }
            },
            error: function (response) {
                alert('Error saving address. Please try again.');
            }
        });
    });
});

function updateAddressList(address) {
    var addressHTML = `
        <div class="col-md-6">
            <div class="address-box">
                <div class="address-title">
                    <div class="d-flex align-items-center gap-2">
                        <i class="ri-home-4-fill icon"></i>
                        <h6>${address.label}</h6>
                    </div>
                    <a href="#edit-address" class="edit-btn" data-bs-toggle="modal">Edit</a>
                </div>
                <div class="address-details">
                    <h6>${address.address}</h6>
                    <h6 class="phone-number">${address.phone}</h6>
                    <div class="option-section">
                        <a href="{{route('payment')}}" class="btn gray-btn rounded-2 mt-0">Deliver Here</a>
                    </div>
                </div>
            </div>
        </div>
    `;
    $('#address-list').append(addressHTML);
}

</script>

<script>
    $(document).ready(function () {
    // Populate the modal with the selected address data
    $('a.edit-btn').on('click', function () {
        var label = $(this).data('label');
        var address = $(this).data('address');
        var phone = $(this).data('phone');
        var index = $(this).data('index');

        // Set values in the modal form
        $('#edit-label').val(label);
        $('#edit-address').val(address);
        $('#edit-phone').val(phone);
        $('#edit-address-index').val(index);
    });

    // Submit edited address form
    $('#edit-address-form').submit(function (e) {
        e.preventDefault();

        // Get the edited form data
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('update.guest.address') }}",  // Route to save edited address
            method: "POST",
            data: formData,
            success: function (response) {
                if (response.success) {
                    $('#edit-address').modal('hide');
                    updateAddress(response.address, response.index);

                    location.reload();
                }
            },
            error: function () {
                alert('Error updating address. Please try again.');
            }
        });
    });
});

function updateAddress(address, index) {
    // Update the address in the list dynamically
    $('#address-' + index + ' .address-title h6').text(address.label);
    $('#address-' + index + ' .address-details h6').text(address.address);
    $('#address-' + index + ' .phone-number').text(address.phone);
}


$(document).on('click', '.deliver-btn', function () {
    var addressId = $(this).data('address-id');
    
    $.ajax({
        url: '{{ route("update.selected.address") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            address_id: addressId
        },
        success: function (response) {
            if (response.success) {
                // Reset all buttons to the default state
                $('.deliver-btn').removeClass('btn-black').addClass('btn-gray');
                $('.deliver-btn').text('Deliver Here');

                // Highlight the selected button
                $('#address-' + addressId + ' .deliver-btn').addClass('btn-black').removeClass('gray-btn');
                $('#address-' + addressId + ' .deliver-btn').text('Selected');

                location.reload();
            }
        }
    });
});

    </script>

@endsection