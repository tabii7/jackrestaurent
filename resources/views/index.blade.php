@extends('layout')

@section('content')  

    <!-- Signin Page Start -->
    <section class="login-hero-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
                    <p>
                        <b>We’re a takeaway, But different.</b>
                        <br><br>
                        We are customer-obsessed. And second, we are all about food. We’re committed to making a
                        difference and revolutionising the Indian takeaway food market. It’s not just a meal, it’s the
                        whole experience.
                    </p>
                    <br><br>

                    <!-- Order Type Buttons -->
                    <div class="process-section">
                        <ul class="process-list" style="justify-content: space-around;">
                            <li class="active" id="delivery-button" onclick="showForm('delivery')">
                                <a>
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="{{ asset('assets/images/svg/location-active.svg') }}"
                                            alt="Delivery">
                                    </div>
                                    <h6>Delivery</h6>
                                </a>
                            </li>
                            <li id="pickup-button" onclick="showForm('pickup')">
                                <a>
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="{{ asset('assets/images/svg/user.svg') }}" alt="Pickup">
                                    </div>
                                    <h6>Pickup</h6>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Delivery Form -->
                   <!-- Pickup Form -->
<div id="pickup-form" class="order-form" style="display: none;">
    <h3>2. Confirm Pickup Date</h3>
    <form method="POST" action="{{ route('save.pickup.details') }}" class="row g-3">
        @csrf
        <!-- Pickup Date Selection -->
        <div class="col-12">
            <label class="form-label">Pickup Date *</label>
            <select class="form-control" name="pickup_date" id="pickup-date-type" onchange="toggleDateField()">
                <option value="{{ \Carbon\Carbon::today()->toDateString() }}">Today</option>
                <option value="future">Future Date</option>
            </select>
        </div>

        <!-- Future Date Picker (Hidden by Default) -->
        <div class="col-12" id="future-date-field" style="display: none;">
            <label class="form-label">Select Future Date *</label>
            <input type="date" class="form-control" name="future_date" id="future-date">
        </div>

        <!-- Time Slot Selection -->
        <div class="col-12">
            <label class="form-label">Choose Pickup Timeslot *</label>
            <select class="form-control" name="pickup_time" id="time_pickup">
                <option>Select Time Slot</option>
                <option>9:00 AM - 10:00 AM</option>
                <option>10:00 AM - 11:00 AM</option>
                <option>11:00 AM - 12:00 PM</option>
            </select>
        </div>

        <!-- Confirm Pickup Button -->
        <div class="buttons" style="padding: 30px;">
            <button type="submit" class="btn theme-btn mt-0" style="width: -webkit-fill-available;" id="confirm_pickup">
                Confirm Pickup
            </button>
        </div>
    </form>
</div>

<!-- Delivery Form -->
<div id="delivery-form" class="order-form">
    <h3>2. Enter your postcode</h3>
    <form method="POST" action="{{ route('save.delivery.details') }}" class="row g-3">
        @csrf
        <div class="col-12">
            <input type="number" name="postcode" id="postcode" class="form-control" placeholder="Enter your postcode here">
        </div>
        <div class="buttons" style="padding: 30px;">
            <button type="submit" class="btn theme-btn mt-0" style="width: -webkit-fill-available;" id="shop_now">
                Shop Now
            </button>
        </div>
    </form>
</div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 m-auto">
                    <img class="img-fluid account-img" src="{{ asset('assets/images/foodone.jpg') }}" alt="Food Image">
                </div>
            </div>
        </div>
    </section>
    <!-- Signin Page End -->

    <script>
        // Function to toggle forms
        function showForm(type) {
            const deliveryForm = document.getElementById('delivery-form');
            const pickupForm = document.getElementById('pickup-form');
            const deliveryButton = document.getElementById('delivery-button');
            const pickupButton = document.getElementById('pickup-button');

            if (type === 'delivery') {
                deliveryForm.style.display = 'block';
                pickupForm.style.display = 'none';
                deliveryButton.classList.add('active');
                pickupButton.classList.remove('active');
            } else if (type === 'pickup') {
                deliveryForm.style.display = 'none';
                pickupForm.style.display = 'block';
                deliveryButton.classList.remove('active');
                pickupButton.classList.add('active');
            }
        }

        function toggleDateField() {
            const pickupDateType = document.getElementById('pickup-date-type').value;
            const futureDateField = document.getElementById('future-date-field');

            if (pickupDateType === 'future') {
                futureDateField.style.display = 'block'; // Show future date picker
            } else {
                futureDateField.style.display = 'none'; // Hide future date picker
            }
        }
    </script>

    <style>
        .process-list .active h6 {
            font-weight: bold;
            color: #007bff;
        }

        .order-form {
            margin-top: 20px;
        }

        .order-form h3 {
            margin-bottom: 15px;
        }
    </style>

@endsection
