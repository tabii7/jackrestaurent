@extends('shoplayout')
<style>
    .address {
        white-space: nowrap;
        /* Prevent text from wrapping */
        overflow: hidden;
        /* Hide overflowing text */
        text-overflow: ellipsis;
        /* Add ellipsis (...) for overflow */
        display: block;
        /* Ensure proper block-level behavior */
        max-width: 100%;
        /* Adjust width as needed */
        word-wrap: break-word;
        /* Break long words (optional for responsiveness) */
    }

    .address-multiline {
        white-space: normal;
        /* Allow normal line wrapping */
        word-wrap: break-word;
        /* Break long words */
        overflow: hidden;
        /* Hide excess content */
        max-height: 3em;
        /* Limit the height (optional) */
        line-height: 1.5em;
        /* Adjust line height */
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
                                <li class="done">
                                    <a href="{{ route('select.address') }}">
                                        <div class="process-icon">
                                            <img class="img-fluid icon" src="assets/images/svg/location-active.svg"
                                                alt="location">
                                        </div>
                                        <h6>Address</h6>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="{{ route('payment') }}">
                                        <div class="process-icon">
                                            <img class="img-fluid icon" src="assets/images/svg/wallet-add-active.svg"
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
                        <div class="payment-section">
                            <div class="title mb-0">
                                <div class="loader-line"></div>
                                <h3>Choose Payment Method</h3>
                                <h6>There are many Types of Payment Method</h6>
                            </div>
                            <div class="accordion payment-accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Credit / Debit Card
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form class="row g-3" id="payment-form">
                                                <!-- Card Number -->
                                                <div class="col-12">
                                                    <label for="card-element" class="form-label">Card Number</label>
                                                    <div id="card-element" class="form-control"></div>
                                                    <div id="card-errors" role="alert"></div>
                                                </div>
                                                @php
                                                    $total_amount = 0;
                                                @endphp
                                                @foreach ($cart as $index => $item)
                                                    @php
                                                        $total_amount += number_format($item['total_price'], 2);
                                                    @endphp
                                                @endforeach
                                                <input type="hidden" name="price" id="price"
                                                    value="{{ $total_amount ?? '0' }}">
                                                <input type="hidden" name="new_user_coup" id="new_user_coup"
                                                    value="0">
                                                <!-- Cardholder Name -->
                                                <div class="col-12">
                                                    <label for="cardholder-name" class="form-label">Cardholder Name</label>
                                                    <input type="text" class="form-control" id="cardholder-name"
                                                        placeholder="John Doe" required>
                                                </div>

                                                <!-- Expiration Date and CVV -->
                                                <!-- <div class="col-sm-6">
                                                                        <label for="exp-date" class="form-label">Expiration Date</label>
                                                                        <input type="text" class="form-control" id="exp-date" placeholder="MM/YY" maxlength="5" required>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="cvv" class="form-label">CVV</label>
                                                                        <input type="text" class="form-control" id="cvv" placeholder="123" maxlength="4" required>
                                                                    </div> -->

                                                <!-- Submit Button -->
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn theme-btn mt-0"
                                                        id="submit-button">Submit Payment</button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="payment-list-box">
                                                                <div class="form-check d-flex justify-content-between ps-0 w-100">
                                                                    <label class="form-check form-check-reverse" for="flexRadioDefault4">Cash On
                                                                        Delivery</label>
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault4">
                                                                </div>
                                                            </div> -->
                        </div>
                    </div>
                    @php
                        // Check if the user is authenticated and retrieve the addresses accordingly
                        if (auth()->check()) {
                            // For logged-in users, retrieve the addresses from the user's addresses and filter for the selected address
    $address = auth()->user()->addresses->where('selected', 1)->first(); // Retrieve the first address where selected = 1
} else {
    // For guest users, retrieve the guest addresses from the session and filter for the selected address
    $guestAddresses = session()->get('guest_addresses', []);
    $address = collect($guestAddresses)->firstWhere('selected', 1); // Get the first selected address for the guest
                        }
                    @endphp

                    <div class="col-lg-4">
                        <div class="order-summery-section sticky-top">
                            <div class="checkout-detail">
                                <div class="cart-address-box">
                                    <div class="add-img">
                                        <img class="img-fluid img" src="assets/images/home.png" alt="rp1">
                                    </div>
                                    @if ($address)
                                        <div class="add-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="dark-text deliver-place">
                                                    Deliver to: {{ $address['label'] ?? 'Default Label' }}
                                                </h5>
                                                <a href="{{ route('select.address') }}" class="change-add">Change</a>
                                            </div>
                                            <h6 class="address mt-2 content-color">
                                                {{ $address['address'] ?? 'Default Address' }}
                                            </h6>
                                            <h6 class="phone mt-2 content-color">
                                                {{ $address['phone'] ?? 'Default Phone' }}
                                            </h6>
                                        </div>
                                    @endif

                                </div>
                                <h3 class="fw-semibold dark-text checkout-title">
                                    Order Summery
                                </h3>
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
                                                        <h6 class="product-price">${{ $item['product_price'] }}</h6>
                                                    </div>
                                                    @if (isset($item['salad']) && $item['salad'] == '1')
                                                        <div class="mt-2 mb-2">
                                                            <h5 class="ingredients-text">Salad</h5>
                                                        </div>
                                                    @endif
                                                    @if (!empty($item['extras']))
                                                        <h5 class="ingredients-text">Extras</h5>

                                                        @foreach ($item['extras'] as $extra)
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mt-md-2 mt-1 gap-1">
                                                                <h6 class="place">{{ $extra['name'] }} x
                                                                    {{ $extra['quantity'] }}</h6>
                                                                <h6 class="extras-price">
                                                                    ${{ $extra['quantity'] * $extra['price'] }}</h6>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                    @if (!empty($item['drinks']))
                                                        <h5 class="ingredients-text">Drinks</h5>
                                                        @foreach ($item['drinks'] as $drink)
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mt-md-2 mt-1 gap-1">
                                                                <h6 class="place">
                                                                    {{ $drink['name'] }} x {{ $drink['quantity'] }}<br>
                                                                </h6>
                                                                <h6 class="extras-price">
                                                                    ${{ $drink['quantity'] * $drink['price'] }}</h6>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                    @if (!empty($item['sauces']))
                                                        <h5 class="ingredients-text">Sauces</h5>
                                                        @if (!empty($item['sauces']))
                                                            @foreach ($item['sauces'] as $sauce)
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between mt-md-2 mt-1 gap-1">
                                                                    <h6 class="place">
                                                                        {{ $sauce['name'] }}
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
                                <div class="promo-code position-relative d-none">
                                    <input type="email" class="form-control code-form-control"
                                        placeholder="Enter promo code">
                                    <a href="#" class="btn theme-btn apply-btn mt-0">APPLY</a>
                                </div>
                                @php
                                    use Carbon\Carbon;

                                    // Get the current date
                                    $currentDate = Carbon::now();

                                    // Query to get the coupons that have not expired
                                    $cccoupons = DB::table('coupons')
                                        ->whereRaw('DATE_ADD(created_at, INTERVAL expiry DAY) >= ?', [$currentDate])
                                        ->get();
                                    $new_user_coupons = DB::table('new_user_coupons')
                                        ->whereRaw('DATE_ADD(created_at, INTERVAL expiry DAY) >= ?', [$currentDate])
                                        ->get();

                                @endphp

                                @if ($cccoupons->isNotEmpty())
                                    <h5 class="bill-details-title fw-semibold dark-text">
                                        Coupon
                                    </h5>
                                    <p>Your Points Available: {{ Auth()->user()->points }}</p>

                                    <h5 class="bill-details-title fw-semibold dark-text">
                                        Use Points Discount
                                    </h5>

                                    <!-- Radio buttons to choose coupon or None -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="coupon_id" id="coupon_none"
                                            value="none" checked>
                                        <label class="form-check-label" for="coupon_none" style="    margin-bottom: 6%;">
                                            None
                                        </label>
                                    </div>

                                    @foreach ($cccoupons as $coupon)
                                        <!-- Show coupon only if user has enough points -->
                                        @if (Auth()->user()->points >= $coupon->points)
                                            @php
                                                // Calculate the expiry date by adding 'expiry' days to 'created_at'
                                                $expiryDate = Carbon::parse($coupon->created_at)->addDays(
                                                    $coupon->expiry,
                                                );
                                                // Calculate the remaining days until the coupon expires
                                                $daysLeft = $expiryDate->diffInDays($currentDate, false); // Allow negative values if expired
                                                // Ensure we are showing the absolute number of days left (no decimals)
                                                $daysLeft = round(abs($daysLeft)); // Round to the nearest integer
                                            @endphp

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="coupon_id"
                                                    id="coupon_{{ $coupon->id }}" value="{{ $coupon->id }}"
                                                    data-discount="{{ $coupon->discount }}"
                                                    data-points="{{ $coupon->points }}">
                                                <label class="form-check-label" for="coupon_{{ $coupon->id }}"
                                                    style="    margin-bottom: 6%;">
                                                    <img src="{{ asset('storage/' . $coupon->image) }}" alt=""
                                                        style="width: 70px;">
                                                    Discount: {{ $coupon->discount }}$<br>
                                                    (Expires in: {{ $daysLeft }} days)
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

                                @if (Auth()->user()->new_user_coupen == 0)
                                    @if ($new_user_coupons->isNotEmpty())
                                        <h5 class="bill-details-title fw-semibold dark-text">
                                            New User Voucher
                                        </h5>

                                        <!-- Radio buttons to choose new user coupon or None -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="new_user_coupon_id"
                                                id="new_user_coupon_none" value="none" checked>
                                            <label class="form-check-label" for="new_user_coupon_none"
                                                style="    margin-bottom: 6%;">
                                                None
                                            </label>
                                        </div>

                                        @foreach ($new_user_coupons as $new_user_coupon)
                                            @php
                                                // Calculate the expiry date by adding 'expiry' days to 'created_at'
                                                $expiryDatenew = Carbon::parse($new_user_coupon->created_at)->addDays(
                                                    $new_user_coupon->expiry,
                                                );
                                                // Calculate the remaining days until the coupon expires
                                                $daysLeftnew = $expiryDatenew->diffInDays($currentDate, false); // Allow negative values if expired
                                                // Ensure we are showing the absolute number of days left (no decimals)
                                                $daysLeftnew = round(abs($daysLeftnew)); // Round to the nearest integer
                                            @endphp
                                            <!-- Show coupon if it is available for new users -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="new_user_coupon_id"
                                                    id="new_user_coupon_{{ $new_user_coupon->id }}"
                                                    value="{{ $new_user_coupon->id }}"
                                                    data-discount="{{ $new_user_coupon->amount }}">

                                                <label class="form-check-label"
                                                    for="new_user_coupon_{{ $new_user_coupon->id }}"
                                                    style="    margin-bottom: 6%;">
                                                    <img src="{{ asset('storage/' . $new_user_coupon->image) }}"
                                                        alt="" style="width: 70px;">
                                                    Discount: {{ $new_user_coupon->amount }}$<br>
                                                    (Expires in: {{ $daysLeftnew }} days)
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif


                                <h5 class="bill-details-title fw-semibold dark-text">
                                    Bill Details
                                </h5>

                                <!-- Subtotal Section -->
                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">Sub Total</h6>
                                    <h6 class="fw-semibold" id="total-price">${{ $total_price }}</h6>
                                </div>

                                <!-- Discount Section -->
                                <div class="sub-total" id="discount-section" style="display:none;">
                                    <h6 class="content-color fw-normal">Discount Applied</h6>
                                    <h6 class="fw-semibold" id="discount-amount" style="float: right">0.00 $</h6>
                                </div>
                                <br>

                                <!-- Delivery Charge Section -->
                                <div class="sub-total">
                                    <h6 class="content-color fw-normal">
                                        Delivery Charge (2 kms)
                                    </h6>
                                    <h6 class="fw-semibold success-color">Free</h6>
                                </div>

                                <!-- Total Amount Section -->
                                <div class="grand-total">
                                    <h6 class="fw-semibold dark-text">To Pay</h6>
                                    <h6 class="fw-semibold amount" id="total-to-pay">${{ $total_price }}</h6>
                                </div>
                                <a href="#" class="btn theme-btn restaurant-btn w-100 rounded-2">PAY
                                    NOW</a>
                                <img class="dots-design" src="assets/images/svg/dots-design.svg" alt="dots">
                            </div>
                            <script>
                                // Calculate and update the total price when a coupon is selected
                                document.querySelectorAll('input[name="coupon_id"], input[name="new_user_coupon_id"]').forEach(function(radio) {
                                    radio.addEventListener('change', function() {
                                        let totalPrice = parseFloat('{{ $total_price }}'); // Initial total price
                                        let discount = 0;

                                        // Get selected coupon and its discount
                                        let selectedCoupon = document.querySelector('input[name="coupon_id"]:checked');
                                        if (selectedCoupon && selectedCoupon.value !== 'none') {
                                            discount = parseFloat(selectedCoupon.getAttribute('data-discount'));
                                        }

                                        // Get selected new user coupon and its discount
                                        let selectedNewUserCoupon = document.querySelector(
                                            'input[name="new_user_coupon_id"]:checked');
                                        if (selectedNewUserCoupon && selectedNewUserCoupon.value !== 'none') {
                                            discount += parseFloat(selectedNewUserCoupon.getAttribute(
                                                'data-discount')); // Add discount from new user coupon
                                            document.getElementById('new_user_coup').value = 1;
                                        } else {
                                            document.getElementById('new_user_coup').value = 0;
                                        }

                                        // Calculate the new total price after applying the discount
                                        let newTotalPrice = totalPrice - discount;
                                        newTotalPrice = newTotalPrice > 0 ? newTotalPrice : 0; // Ensure price doesn't go below 0

                                        // Update the total price, discount amount, and the final total
                                        document.getElementById('total-to-pay').innerText = '$' + newTotalPrice.toFixed(2);
                                        document.getElementById('total-price').innerText = '$' + totalPrice.toFixed(2);

                                        // Update the discount section visibility and amount
                                        if (discount > 0) {
                                            document.getElementById('discount-section').style.display = 'flex';
                                            document.getElementById('discount-amount').innerText = '-$' + discount.toFixed(2);
                                        } else {
                                            document.getElementById('discount-section').style.display = 'none';
                                        }
                                        document.getElementById('price').value = newTotalPrice;
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account section end -->
@endsection

@section('custom-scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            // Initialize Stripe
            const stripe = Stripe(
                'pk_test_51L55KOB6vSzX467fJZieY8Wyk719soSUmfpLhxOOYqrMKphN7TvD0gJ0csqhGgPjshzIsUHd3b0N74UTkQNi2WPu00NW0NXOtv'
            ); // Replace with your Stripe publishable key
            const elements = stripe.elements();

            const style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card element
            const card = elements.create('card', {
                style
            });
            card.mount('#card-element');

            // Handle card input errors
            card.on('change', ({
                error
            }) => {
                const cardErrors = document.getElementById('card-errors');
                if (error) {
                    cardErrors.textContent = error.message;
                } else {
                    cardErrors.textContent = '';
                }
            });

            amountInDollars = $('#price').val();

            // Fetch the payment intent client secret from the server
            const response = await fetch("{{ route('create.payment') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    price: amountInDollars // Send amount in dollars
                })
            });

            const {
                clientSecret
            } = await response.json();

            // Handle form submission
            const form = document.getElementById('payment-form');
            form.addEventListener('submit', async (event) => {
                event.preventDefault(); // Prevent form from submitting the default way

                // Disable the submit button to prevent repeated clicks
                const submitButton = document.getElementById('submit-button');
                submitButton.disabled = true;
                const price = document.getElementById('price').value;
                const new_user_coup = document.getElementById('new_user_coup').value;

                const pointsUsed = document.querySelector('input[name="coupon_id"]:checked')
                    ?.getAttribute('data-points') || 0;

                // Confirm the payment
                const {
                    paymentIntent,
                    error
                } = await stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card,
                        billing_details: {
                            name: document.getElementById('cardholder-name')
                                .value // Get the cardholder name from the form
                        }
                    }
                });

                if (error) {
                    // Display error.message in the UI
                    const cardErrors = document.getElementById('card-errors');
                    cardErrors.textContent = error.message;
                    submitButton.disabled = false;
                } else {
                    // Payment successful, save details in the database
                    fetch("{{ route('save.payment.details') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                            body: JSON.stringify({
                                payment_method: "Credit Card", // Replace with actual method if dynamic
                                price: price, // Include the price
                                points_used: pointsUsed, // Include the points used
                                new_user_coup: new_user_coup, // Include the points used

                            }),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.success) {
                                // Redirect to confirmation page
                                window.location.href = "{{ route('confirm_order') }}";
                            } else {
                                alert("Error saving payment details: " + data.error);
                            }
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                }
            });
        });

        // Function to detect card type and update icon
        function getCardType(cardNumber) {
            const patterns = {
                visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
                mastercard: /^5[1-5][0-9]{14}$/,
                amex: /^3[47][0-9]{13}$/,
                discover: /^6(?:011|5[0-9]{2})[0-9]{12}$/,
                diners: /^3(?:0[0-5]|[68][0-9])[0-9]{11}$/,
                jcb: /^(?:2131|1800|35\d{3})\d{11}$/,
                unionpay: /^62[0-9]{14,17}$/,
            };

            for (const [type, pattern] of Object.entries(patterns)) {
                if (pattern.test(cardNumber)) {
                    return type;
                }
            }

            return 'default'; // Return 'default' if no match is found
        }

        document.addEventListener('DOMContentLoaded', () => {
            const cardNumberInput = document.getElementById('card-number');
            const cardTypeIcon = document.getElementById('card-type-icon');

            // Function to detect card type
            const getCardType = (number) => {
                const regexMap = {
                    visa: /^4/,
                    mastercard: /^5[1-5]/,
                    amex: /^3[47]/,
                    discover: /^6(?:011|5)/,
                };

                for (const [card, regex] of Object.entries(regexMap)) {
                    if (regex.test(number)) return card;
                }
                return 'default';
            };

            // Function to format card number
            const formatCardNumber = (number) => {
                return number.replace(/\D/g, '') // Remove non-digits
                    .replace(/(.{4})/g, '$1 ') // Add space every 4 digits
                    .trim(); // Remove trailing space
            };


        });
    </script>
@endsection
