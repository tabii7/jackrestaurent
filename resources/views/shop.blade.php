@extends('shoplayout')

@section('content')  
<!-- home section start -->
<section class="pt-4 home3">
    <div class="custom-container">
        <div class="position-relative">
            <img src="assets/images/home-bg2.png" class="img-fluid bg-home-img" alt="">
            <div class="home-content">
                <div class="row w-100 h-100">
                    <div class="col-sm-6 col-12">
                        <div class="home-left-content">
                            <label>50% off on First delivery</label>
                            <h2>Made with love,<br />Savored with interest.</h2>
                            <p>Browse out top categories here to discover different food cuision.
                            </p>
                            <div class="search-section">
                                <form class="auth-form search-head" target="_blank">
                                    <div class="form-group">
                                        <div class="form-input mb-0">
                                            <input type="search" class="form-control search" id="inputusername"
                                                placeholder="Search for Restaurant">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </form>
                                <a class="btn theme-btn mt-0" href="#" role="button">Search</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-sm-block d-none">
                        <div class="home-right position-relative">
                            <img src="assets/images/mobile.png" class="img-fluid base-phone" alt="">
                            <div class="animated-img">
                                <div class="food1">
                                    <img src="assets/images/food1.png" data-aos="fade-down" data-aos-easing="linear"
                                        data-aos-anchor-placement="top-center" data-aos-duration="1200"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="food2">
                                    <img src="assets/images/food2.png" data-aos-duration="1200" data-aos="fade-down"
                                        data-aos-anchor-placement="bottom-center" class="img-fluid" alt="">
                                </div>
                                <div class="food3">
                                    <img src="assets/images/food3.png" data-aos="fade-down" data-aos-easing="linear"
                                        data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- home section end -->
<style>
    /* Custom scrollbar for web view */
    .nav {
        scrollbar-width: thin;
        /* Firefox */
        scrollbar-color: #ccc transparent;
        /* Firefox */
    }

    .nav::-webkit-scrollbar {
        height: 1px;
    }

    .nav::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 3px;
    }

    .nav::-webkit-scrollbar-track {
        background: transparent;
    }
</style>

<!-- Featured Restaurants section starts -->
<section class="restaurant-list section-b-space banner-section ratio3_2" style=" padding-top: 0px;">
    <div class="container">
 
        <div class="col-lg-12" style="   padding-bottom: 50px; ">
            <div class="order-status-content">

                <div class="shipping-details">
                    <h4>Kaani Kaana Pickup</h4>
                    <ul class="delivery-list">
                        <li>
                            <div class="order-address">
                                <img class="img-fluid place-icon" src="assets/images/svg/driver.svg" alt="delivery">
                                <div>
                                    <h5>Important Notice !</h5>
                                    <h6 class="delivery-place">During Peak hours on Fridays and Saturdays (6PM-8PM)
                                        delivery and collection times may vary, please expect a longer wait time.
                                    </h6>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="title restaurant-title w-border pb-0">
            <ul class="nav nav-pills restaurant-tab tab-style2 w-100 border-0 m-0" id="Tab" role="tablist"
                style="display: flex; flex-wrap: nowrap; overflow-x: auto; overflow-y: hidden; white-space: nowrap;">
                @foreach ($categories as $key => $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($key == 0) active @endif" id="tab-{{ $category->id }}"
                            data-bs-toggle="pill" data-bs-target="#content-{{ $category->id }}" type="button" role="tab">
                            {{ $category->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>


        <div class="tab-content restaurant-content" id="TabContent">
            @foreach ($categories as $key => $category)
                <div class="tab-pane fade @if($key == 0) show active @endif" id="content-{{ $category->id }}"
                    role="tabpanel">
                    <div class="row g-lg-4 g-3">
                        @foreach ($products->where('category_id', $category->id) as $product)

                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="pharmacy-product-box">
                                    <div>
                                        <div class="pharmacy-product-img bg-white">
                                            <img class="bg-img img"
                                                src="{{ $product->image ? asset('storage/' . $product->image) : asset('default-image-path.jpg') }}"
                                                alt="{{ $product->title }}">
                                        </div>
                                    </div>
                                    <div class="pharmacy-product-details">
                                        <h5 class="product-name dark-text">
                                            {{ $product->title }}
                                        </h5>
                                        <div class="d-flex align-items-center justify-content-between my-1">
                                            <h5 class="fw-medium theme-color price">
                                                ${{ $product->price }}

                                            </h5>
                                           
                                            <div class="bottom-panel d-flex align-items-center justify-content-between gap-1">
                                                <a href="{{ route('view.product.detail', $product->id) }}" class="btn theme-outline cart-btn rounded-2">Add to Cart</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <!-- order details modal starts -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('popup');

    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const productId = button.getAttribute('data-product-id');
        const productTitle = button.getAttribute('data-product-title');
        const productPrice = button.getAttribute('data-product-price');
        const productDescription = button.getAttribute('data-product-description');
        const productAllergen = button.getAttribute('data-product-allergen') || "No allergens specified.";
        const productDiscount = button.getAttribute('data-product-discount');
        const productSalad = button.getAttribute('data-product-salad');

        // Update modal static content
        document.getElementById('modalProductTitle').textContent = productTitle;
        document.getElementById('modalProductDescription').textContent = productDescription;
        document.getElementById('modalAllergenInfo').textContent = `Allergen Info: ${productAllergen}`;
        document.getElementById('modalTotalPrice').textContent = `£${productPrice}`;

        // Display discount message if applicable
        const modalDiscountInfo = document.getElementById('modalDiscountInfo');
        if (modalDiscountInfo) {
            modalDiscountInfo.textContent = productDiscount === "0" ? "Discount not applicable on this product" : "";
        }

        // Display salad options if available
        const modalOptions = document.getElementById('modalOptions');
        if (productSalad === "1") {
            let saladHtml = '<h5>Salad (Optional)</h5>';
            saladHtml += `
                <div class="option-item">
                    <input type="radio" id="salad-yes" name="salad" value="1">
                    <label for="salad-yes">With Salad</label>
                </div>
                <div class="option-item">
                    <input type="radio" id="salad-no" name="salad" value="0" checked>
                    <label for="salad-no">No Salad</label>
                </div>
            `;
            modalOptions.innerHTML += saladHtml;
        }

        // Fetch and display dynamic options like sauces, extras, and drinks
        fetch(`/get-product-options/${productId}`)
            .then(response => response.json())
            .then(data => {
                modalOptions.innerHTML = ''; // Clear existing content

                if (data.sauces.length > 0) {
                    let saucesHtml = '<h5>Sauces (Optional)</h5>';
                    data.sauces.forEach(sauce => {
                        saucesHtml += `
                            <div class="option-item">
                                <input type="radio" id="sauce-${sauce.id}" name="sauce" value="${sauce.id}">
                                <label for="sauce-${sauce.id}">
                                   <img src="/storage/${sauce.image}" class="img-fluid icon" alt="${sauce.name}" style="height: 50px;">
                                    ${sauce.name} (+£${sauce.price})
                                </label>
                            </div>
                        `;
                    });
                    modalOptions.innerHTML += saucesHtml;
                }

                if (data.extras.length > 0) {
                    let extrasHtml = '<h5>Extras (Optional)</h5>';
                    data.extras.forEach(extra => {
                        extrasHtml += `
                            <div class="option-item">
                                <input type="checkbox" id="extra-${extra.id}" name="extras[]" value="${extra.id}">
                                <label for="extra-${extra.id}">
                                    <img src="/storage/${extra.image}" class="img-fluid icon" alt="${extra.name}" style="height: 50px;">
                                    ${extra.name} (+£${extra.price})
                                </label>
                            </div>
                        `;
                    });
                    modalOptions.innerHTML += extrasHtml;
                }

                if (data.drinks.length > 0) {
                    let drinksHtml = '<h5>Drinks (Optional)</h5>';
                    data.drinks.forEach(drink => {
                        drinksHtml += `
                            <div class="option-item">
                                <input type="checkbox" id="drink-${drink.id}" name="drinks[]" value="${drink.id}">
                                <label for="drink-${drink.id}">
                                    <img src="/storage/${drink.image}" class="img-fluid icon" alt="${drink.name}" style="height: 50px;">
                                    ${drink.name} (+£${drink.price})
                                </label>
                            </div>
                        `;
                    });
                    modalOptions.innerHTML += drinksHtml;
                }
            })
            .catch(error => console.error('Error fetching product options:', error));
    });
});

  </script>
    <!-- order details modal starts -->
    <div class="modal order-details-modal fade" id="popup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-medium" id="exampleModalToggleLabel">Add to Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="order-details-box">
                    <div class="order-content">
                        <h3 class="brand-name dark-text fw-medium" id="modalProductTitle"></h3>
                    </div>
                </div>
                <br><hr>
                <p id="modalProductDescription" style="font-size: medium;"></p>
                <div id="modalAllergenInfo" class="text-danger" style="font-size: small; margin-bottom: 15px;"></div>
                                
                </div>
                <div id="modalOptions"></div>
                <div id="modalDiscountInfo" class="text-warning" style="font-size: small; margin-bottom: 15px;"></div>  
                <div class="total-amount mt-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-medium dark-text">Total</h6>
                        <h6 class="fw-medium dark-text" id="modalTotalPrice">£0.00</h6>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn theme-btn mt-0">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- order details modal end -->

    <!-- order details modal end -->
</section>
<!-- featured Restaurants section end -->
@endsection