@extends('shoplayout')

@section('content')
<!--  account section starts -->

<div class="container my-4">
    @if (count($cart) > 0)
    <h2 class="d-none">Cart</h2>
        <div class="table-responsive d-none">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Salad</th>
                        <th>Sauces</th>
                        <th>Extras</th>
                        <th>Drinks</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


    @foreach ($cart as $index => $item)
    <tr>
        <td>{{ $item['product_name'] }}</td>
        <td>{{ (($item['salad']) == '1')?'Yes': 'No' }}</td>
        <td>
        @if (!empty($item['sauces']))
        <ul>
            @foreach ($item['sauces'] as $sauce)
            <li>{{ $sauce['name'] }}@if (!$loop->last),@endif</li>
            @endforeach
        </ul>
    @else
        None
    @endif
        </td>
        <td>
            @if (!empty($item['extras']))
                <ul>
                    @foreach ($item['extras'] as $extra)
                    <li>{{ $extra['name'] }} x {{ $extra['quantity'] }}@if (!$loop->last),@endif</li>
                    @endforeach
                </ul>
            @else
                None
            @endif
        </td>
        <td>
            @if (!empty($item['drinks']))
                <ul>
                    @foreach ($item['drinks'] as $drink)
                        <li>{{ $drink['name'] }} x {{ $drink['quantity'] }}</li>
                    @endforeach
                </ul>
            @else
                None
            @endif
        </td>
        <td>£{{ number_format($item['total_price'], 2) }}</td>
        <td>
            <form action="{{ route('cart.remove', $index) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
            </form>
        </td>
    </tr>
@endforeach

                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between">
        </div>
    @else
        <p>Your cart is empty. <a href="{{ route('home') }}">Continue shopping</a>.</p>
    @endif


<section class="account-section section-b-space pt-0">
    <div class="container">
        <div class="layout-sec">
            <div class="row g-lg-4 g-4">
                <div class="col-lg-8">
                    <div class="process-section">
                        <ul class="process-list">
                            <li class="active">
                                <a href="{{ route('cart.view') }}">
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="{{ asset('assets/images/svg/user.svg') }}" alt="user">
                                    </div>
                                    <h6>Account</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('select.address') }}">
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="{{ asset('assets/images/svg/location.svg') }}" alt="location">
                                    </div>
                                    <h6>Address</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('payment') }}">
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="{{ asset('assets/images/svg/wallet-add.svg') }}" alt="wallet-add">
                                    </div>
                                    <h6>Payment</h6>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('confirm_order') }}">
                                    <div class="process-icon">
                                        <img class="img-fluid icon" src="{{ asset('assets/images/svg/verify.svg') }}" alt="verify">
                                    </div>
                                    <h6>Confirm</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="account-part">
                        <img class="img-fluid account-img" src="{{ asset('assets/images/account.svg') }}" alt="account">
                        <div class="title mb-0">
                            <div class="loader-line"></div>
                            <h3>Account</h3>
                            <p>
                                To place your order now, log in to your existing account
                                or sign up
                            </p>
                            <div class="account-btn d-flex justify-content-center gap-2">
                                <a  href="{{ route('signin') }}" class="btn theme-outline mt-0">SIGN IN</a>
                                <a  href="{{ route('signup') }}" class="btn theme-outline mt-0">SIGN UP</a>
                                <a  href="{{ route('select.address') }}" class="btn theme-outline mt-0">SKIP</a>
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

                           
                            <a href="{{ route('select.address') }}" class="btn theme-btn restaurant-btn w-100 rounded-2">PROCEED TO ADDRESS</a>

                            <img class="dots-design" src="{{ asset('assets/images/svg/dots-design.svg') }}" alt="dots">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account section end -->
@endsection
