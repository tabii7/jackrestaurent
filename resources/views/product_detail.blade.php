@extends('shoplayout')

@section('content')
<!-- account section starts -->
<section class="account-section section-b-space pt-0">
    <div class="container">
        <div class="layout-sec">
            <div class="row g-lg-4 g-4">
                <div class="col-lg-8">
                    <div class="account-part" style="padding-top: 0px;">
                        <img class="img-fluid account-img" style="max-height: 700px"
                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('default-image-path.jpg') }}"
                            alt="account">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-summery-section sticky-top">
                        <div class="checkout-detail">
                            <ul>
                                <!-- Product details -->
                                <li>
                                    <div class="horizontal-product-box">
                                        <div class="product-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h3>{{ $product->title }}</h3>
                                            </div>
                                            <h6 class="ingredients-text">
                                                {{ $product->description }}
                                            </h6>
                                        </div>
                                    </div>
                                </li>

                                <!-- Allergen Information -->
                                @if($product->allergen_info && !empty(json_decode($product->allergen_info)) && json_decode($product->allergen_info) !== [null])
                                    <li>
                                        <div class="horizontal-product-box">
                                            <div class="product-content">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5>Allergen info</h5>
                                                </div>
                                                <h6 class="ingredients-text">The Product Contains Following Allergens:</h6>
                                                <a href="#" class="btn theme-outline mt-0">
                                                    {{ implode(', ', json_decode($product->allergen_info)) }}
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                                <!-- Salad Options -->
                                @if($product->salad == 1)
                                    <li>
                                        <div class="horizontal-product-box">
                                            <div class="product-content">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5>Any Salad?</h5>
                                                </div>
                                                <h6 class="ingredients-text">
                                                    <label>
                                                        <input type="radio" name="salad" value="1" class="addon-checkbox"
                                                            data-price="0"> Salad
                                                    </label>
                                                </h6>
                                                <h6 class="ingredients-text">
                                                    <label>
                                                        <input type="radio" name="salad" value="0" checked
                                                            class="addon-checkbox" data-price="0"> No Salad
                                                    </label>
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                                <!-- Sauce Options -->
                                <li>
                                    <div class="horizontal-product-box">
                                        <div class="product-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5>Any Sauce?</h5>
                                            </div>
                                            @php
                                                $sauceIds = DB::table('sauce_product')
                                                    ->where('product_id', $product->id)
                                                    ->pluck('sauce_id');
                                                $sauces = DB::table('sauces')
                                                    ->whereIn('id', $sauceIds)
                                                    ->get();
                                            @endphp
                                            @if($sauces->isNotEmpty())
                                                @foreach($sauces as $sauce)
                                                    <h6 class="ingredients-text">
                                                        <label>
                                                            <input type="checkbox" name="sauces[]" value="{{ $sauce->id }}"
                                                                class="addon-checkbox" data-price="{{ $sauce->price }}">
                                                            {{ $sauce->name }} (+£{{ number_format($sauce->price, 2) }})
                                                        </label>
                                                    </h6>
                                                @endforeach
                                            @else
                                                <h6 class="ingredients-text">N/A</h6>
                                            @endif
                                        </div>
                                    </div>
                                </li>

                                <!-- Extras Options -->
                                <li>
                                    <div class="horizontal-product-box">
                                        <div class="product-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5>Any Extras?</h5>
                                            </div>
                                            @php
                                                $extraIds = DB::table('extra_product')
                                                    ->where('product_id', $product->id)
                                                    ->pluck('extra_id');
                                                $extras = DB::table('extras')
                                                    ->whereIn('id', $extraIds)
                                                    ->get();
                                            @endphp
                                            @if($extras->isNotEmpty())
                                                @foreach($extras as $extra)
                                                    <h6 class="ingredients-text"
                                                        style="display: flex; justify-content: space-between; align-items: center;">
                                                        <label style=" float: inline-start;">
                                                            <input type="checkbox" name="extras[]" value="{{ $extra->id }}"
                                                                class="addon-checkbox" data-price="{{ $extra->price }}">
                                                            {{ $extra->name }} (+£{{ number_format($extra->price, 2) }})
                                                        </label>
                                                        <div class="plus-minus" style="display: flex; align-items: center;">
                                                            <i class="ri-subtract-line sub"></i>
                                                            <input type="number" value="1" min="1" max="10"
                                                                class="addon-quantity" style=" text-align: center;">
                                                            <i class="ri-add-line add"></i>
                                                        </div>
                                                    </h6>
                                                @endforeach
                                            @else
                                                <h6 class="ingredients-text">N/A</h6>
                                            @endif
                                        </div>
                                    </div>
                                </li>

                                <!-- Drinks Options -->
                                <li>
                                    <div class="horizontal-product-box">
                                        <div class="product-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5>Any Drinks?</h5>
                                            </div>
                                            @php
                                                $drinkIds = DB::table('drink_product')
                                                    ->where('product_id', $product->id)
                                                    ->pluck('drink_id');
                                                $drinks = DB::table('drinks')
                                                    ->whereIn('id', $drinkIds)
                                                    ->get();
                                            @endphp
                                            @if($drinks->isNotEmpty())
                                                @foreach($drinks as $drink)
                                                    <h6 class="ingredients-text"
                                                        style="display: flex; justify-content: space-between; align-items: center;">
                                                        <label style="margin-right: auto;">
                                                            <input type="checkbox" name="drinks[]" value="{{ $drink->id }}"
                                                                class="addon-checkbox" data-price="{{ $drink->price }}">
                                                            {{ $drink->name }} (+£{{ number_format($drink->price, 2) }})
                                                        </label>
                                                        <div class="plus-minus" style="display: flex; align-items: center;">
                                                            <i class="ri-subtract-line sub"></i>
                                                            <input type="number" value="1" min="1" max="10"
                                                                class="addon-quantity" style=" text-align: center;">
                                                            <i class="ri-add-line add"></i>
                                                        </div>
                                                    </h6>

                                                @endforeach
                                            @else
                                                <h6 class="ingredients-text">N/A</h6>
                                            @endif
                                        </div>
                                    </div>
                                </li>

                            </ul>
                            <div id="summary-section" class="order-summary mt-4">
                                <h5>Selected Items Summary:</h5>
                                <ul id="summary-list" class="list-unstyled">
                                    <!-- Summary items will be appended here dynamically -->
                                </ul>
                                <div class="sub-total mt-3">
                                    <h6>Total</h6>
                                    <h6 id="summary-total">£{{ number_format($product->price, 2) }}</h6>
                                </div>
                            </div>

                            <!-- Bill Details -->
                            <div class="sub-total">
                                <h6>Total</h6>
                                <h6 id="subtotal">£{{ number_format($product->price, 2) }}</h6>
                            </div>

                            <a href="#" class="btn theme-btn restaurant-btn w-100 rounded-2" id="add-to-cart">Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account section end -->

<script>
 document.addEventListener('DOMContentLoaded', function () {
    const addonCheckboxes = document.querySelectorAll('.addon-checkbox');
    const quantityInputs = document.querySelectorAll('.addon-quantity');
    const subtotalElement = document.getElementById('subtotal');
    const summaryList = document.getElementById('summary-list');
    const summaryTotalElement = document.getElementById('summary-total');
    const originalPrice = parseFloat(subtotalElement.textContent.replace(/[^0-9.-]+/g, ''));

    function updateSummary() {
        summaryList.innerHTML = ''; // Clear previous summary
        let total = originalPrice;

        addonCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const parent = checkbox.closest('h6');
                const quantityInput = parent.querySelector('.addon-quantity');
                const quantity = quantityInput ? parseInt(quantityInput.value, 10) : 1;
                const price = parseFloat(checkbox.dataset.price) || 0;

                // Add to summary list
                const listItem = document.createElement('li');
                listItem.textContent = `${checkbox.nextSibling.textContent.trim()} (x${quantity}) - £${(price * quantity).toFixed(2)}`;
                summaryList.appendChild(listItem);

                // Update total
                total += price * quantity;
            }
        });

        subtotalElement.textContent = `£${total.toFixed(2)}`;
        summaryTotalElement.textContent = `£${total.toFixed(2)}`;
    }

    addonCheckboxes.forEach(checkbox => checkbox.addEventListener('change', updateSummary));
    quantityInputs.forEach(input => {
        input.addEventListener('input', function () {
            this.value = Math.max(1, Math.min(this.value, 10)); // Limit input
            updateSummary();
        });

        const addButton = input.nextElementSibling;
        const subtractButton = input.previousElementSibling;

        if (addButton) addButton.addEventListener('click', () => { input.value++; updateSummary(); });
        if (subtractButton) subtractButton.addEventListener('click', () => { input.value = Math.max(1, input.value - 1); updateSummary(); });
    });

    // Initialize summary on page load
    updateSummary();
});

</script>

<script>
  document.getElementById('add-to-cart').addEventListener('click', function (e) {
    e.preventDefault();

    const productId = {{ $product->id }};
    const productName = "{{ $product->title }}";
    const salad = document.querySelector('input[name="salad"]:checked')?.value || null;
    const sauces = Array.from(document.querySelectorAll('input[name="sauces[]"]:checked')).map(el => el.value);
    const extras = Array.from(document.querySelectorAll('input[name="extras[]"]:checked')).map(el => ({
        id: el.value,
        quantity: el.closest('h6').querySelector('.addon-quantity').value
    }));
    const drinks = Array.from(document.querySelectorAll('input[name="drinks[]"]:checked')).map(el => ({
        id: el.value,
        quantity: el.closest('h6').querySelector('.addon-quantity').value
    }));
    const totalPrice = parseFloat(document.getElementById('subtotal').textContent.replace(/[^0-9.-]+/g, ''));

    fetch('{{ route('cart.add') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
            product_id: productId,
            product_name: productName,
            salad,
            sauces,
            extras,
            drinks,
            total_price: totalPrice,
        }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.message) {
                alert(data.message);
                updateCartSummary(data.cart);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

function updateCartSummary(cart) {
    const cartSummary = document.getElementById('cart-summary');
    cartSummary.innerHTML = ''; // Clear the cart summary

    cart.forEach(item => {
        const itemElement = `
            <div class="cart-item">
                <h5>${item.product_name}</h5>
                <p>Salad: ${item.salad ? 'Yes' : 'No'}</p>
                <p>Sauces: ${item.sauces.join(', ')}</p>
                <p>Extras:</p>
                <ul>
                    ${item.extras.map(extra => `<li>${extra.id} x ${extra.quantity}</li>`).join('')}
                </ul>
                <p>Drinks:</p>
                <ul>
                    ${item.drinks.map(drink => `<li>${drink.id} x ${drink.quantity}</li>`).join('')}
                </ul>
                <p>Total Price: £${item.total_price.toFixed(2)}</p>
            </div>
        `;
        cartSummary.innerHTML += itemElement;
    });
}


</script>
@endsection