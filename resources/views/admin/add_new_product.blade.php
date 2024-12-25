@extends('admin.adminLayout')
@section('content')  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
    // When the "Select All" checkbox for Sauces is clicked
    $('#select-all-sauces').change(function () {
      // Check/uncheck all sauce checkboxes based on "Select All" checkbox
      $('.sauce-checkbox').prop('checked', this.checked);
    });

    // If any individual sauce checkbox is changed, update the "Select All" checkbox
    $('.sauce-checkbox').change(function () {
      // If all sauce checkboxes are checked, check the "Select All" checkbox
      if ($('.sauce-checkbox:checked').length === $('.sauce-checkbox').length) {
        $('#select-all-sauces').prop('checked', true);
      } else {
        $('#select-all-sauces').prop('checked', false);
      }
    });

    // When the "Select All" checkbox for Extras is clicked
    $('#select-all-extras').change(function () {
      // Check/uncheck all extra checkboxes based on "Select All" checkbox
      $('.extra-checkbox').prop('checked', this.checked);
    });

    // If any individual extra checkbox is changed, update the "Select All" checkbox
    $('.extra-checkbox').change(function () {
      // If all extra checkboxes are checked, check the "Select All" checkbox
      if ($('.extra-checkbox:checked').length === $('.extra-checkbox').length) {
        $('#select-all-extras').prop('checked', true);
      } else {
        $('#select-all-extras').prop('checked', false);
      }
    });

    // When the "Select All" checkbox for Drinks is clicked
    $('#select-all-drinks').change(function () {
      // Check/uncheck all drink checkboxes based on "Select All" checkbox
      $('.drink-checkbox').prop('checked', this.checked);
    });

    // If any individual drink checkbox is changed, update the "Select All" checkbox
    $('.drink-checkbox').change(function () {
      // If all drink checkboxes are checked, check the "Select All" checkbox
      if ($('.drink-checkbox:checked').length === $('.drink-checkbox').length) {
        $('#select-all-drinks').prop('checked', true);
      } else {
        $('#select-all-drinks').prop('checked', false);
      }
    });
  });
</script>

<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Product Form</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-xl-5 g-3">
              <div class="col-xxl-3 col-xl-4 box-col-4e sidebar-left-wrapper">
                <ul class="sidebar-left-icons nav nav-pills" id="add-product-pills-tab" role="tablist">
                  <li class="nav-item"><a class="nav-link active" id="detail-product-tab" data-bs-toggle="pill"
                      href="#detail-product" role="tab" aria-controls="detail-product" aria-selected="false">
                      <div class="nav-rounded">
                        <div class="product-icons">
                          <svg class="stroke-icon">
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#product-detail">
                            </use>
                          </svg>
                        </div>
                      </div>
                      <div class="product-tab-content">
                        <h6>Add Product Details</h6>
                        <p>Add Product name & details</p>
                      </div>
                    </a></li>
                  <li class="nav-item"> <a class="nav-link" id="gallery-product-tab" data-bs-toggle="pill"
                      href="#gallery-product" role="tab" aria-controls="gallery-product" aria-selected="false">
                      <div class="nav-rounded">
                        <div class="product-icons">
                          <svg class="stroke-icon">
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#product-gallery">
                            </use>
                          </svg>
                        </div>
                      </div>
                      <div class="product-tab-content">
                        <h6>Product gallery</h6>
                        <p>Add Product thumbnail</p>
                      </div>
                    </a></li>
                  <li class="nav-item"> <a class="nav-link" id="category-product-tab" data-bs-toggle="pill"
                      href="#category-product" role="tab" aria-controls="category-product" aria-selected="false">
                      <div class="nav-rounded">
                        <div class="product-icons">
                          <svg class="stroke-icon">
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#product-category">
                            </use>
                          </svg>
                        </div>
                      </div>
                      <div class="product-tab-content">
                        <h6>Product Categories</h6>
                        <p>Add Product category and Tags</p>
                      </div>
                    </a></li>
                  <li class="nav-item"> <a class="nav-link" id="extraoptions-product-tab" data-bs-toggle="pill"
                      href="#extraoptions-product" role="tab" aria-controls="extraoptions-product"
                      aria-selected="false">
                      <div class="nav-rounded">
                        <div class="product-icons">
                          <svg class="stroke-icon">
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#product-category">
                            </use>
                          </svg>
                        </div>
                      </div>
                      <div class="product-tab-content">
                        <h6>Extras</h6>
                        <p>Add Extras and Drinks</p>
                      </div>
                    </a></li>
                  <li class="nav-item"><a class="nav-link" id="pricings-tab" data-bs-toggle="pill" href="#pricings"
                      role="tab" aria-controls="pricings" aria-selected="false">
                      <div class="nav-rounded">
                        <div class="product-icons">
                          <svg class="stroke-icon">
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#pricing"> </use>
                          </svg>
                        </div>
                      </div>
                      <div class="product-tab-content">
                        <h6>Selling prices</h6>
                        <p>Add Product basic price & Discount</p>
                      </div>
                    </a></li>

                </ul>
              </div>
              <div class="col-xxl-9 col-xl-8 box-col-8 position-relative">
                <div class="tab-content" id="add-product-pills-tabContent">

                  <!-- Product Details Tab -->
                  <div class="tab-pane fade show active" id="detail-product" role="tabpanel"
                    aria-labelledby="detail-product-tab">
                    <div class="mb-3">
                      <label for="title" class="form-label">Product Name<span class="txt-danger">*</span></label>
                      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        required>
                      @error('title')
              <div class="text-danger">{{ $message }}</div>
            @enderror
                    </div>

                    <div class="mb-3">
                      <label for="description" class="form-label">Product Description<span
                          class="txt-danger">*</span></label>
                      <textarea class="form-control" id="description" name="description" rows="4" required
                        title="Please add a description"> {{ old('description') }}</textarea>
                      @error('description')
              <div class="text-danger">{{ $message }}</div>
            @enderror
                    </div>
                  </div>

                  <!-- Image Upload Tab -->
                  <div class="tab-pane fade" id="gallery-product" role="tabpanel" aria-labelledby="gallery-product-tab">
                    <div class="mb-3">
                      <label for="image" class="form-label">Thumbnail Image<span class="txt-danger">*</span></label>
                      <input type="file" class="form-control" id="image" name="image" accept="image/*">
                      @error('image')
              <div class="text-danger">{{ $message }}</div>
            @enderror
                    </div>
                  </div>

                  <!-- Category Tab -->
                  <div class="tab-pane fade" id="category-product" role="tabpanel"
                    aria-labelledby="category-product-tab">
                    <div class="sidebar-body">
                      <div class="row g-lg-4 g-3">
                        <div class="col-12">
                          <div class="row g-3">
                            <div class="col-sm-6">
                              <div class="row g-2">
                                <div class="col-12">
                                  <label class="form-label m-0" for="category_id">Add Category<span
                                      class="txt-danger">*</span></label>
                                </div>
                                <div class="col-12">
                                  <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
                                  </select>
                                  @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                                  <p class="f-light">A product will be added to a category</p>
                                </div>
                              </div>
                            </div>

                            <!-- Allergen Info Section -->
                            <div class="col-sm-6">
                              <div class="row g-2 product-tag">

                                <div class="mb-3">
                                  <label for="allergen_info" class="form-label">Allergen Information (Optional)</label>
                                  <input type="text" class="form-control" id="allergen_info" name="allergen_info[]"
                                    placeholder="Comma-separated item names e.g (milk,sugar,salt)"
                                    value="{{ old('allergen_info') }}">
                                  <p class="f-light">Allergen Items here</p>
                                </div>

                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="row g-3">
                        <!-- Sauces Section -->
                        <div class="col-sm-6">
                          <div class="row g-2">
                            <div class="col-12">
                              <label class="form-label d-block m-0">Add Sauces (Optional)</label>
                            </div>
                            <div class="col-12">
                              <label>
                                <input type="checkbox" id="select-all-sauces"> All
                              </label>
                            </div>
                            @foreach($sauces as $sauce)
                <div class="col-12">
                  <label>
                  <input type="checkbox" name="sauces[]" value="{{ $sauce->id }}" class="sauce-checkbox">
                  {{ $sauce->name }} (+£{{ number_format($sauce->price, 2) }})
                  </label>
                </div>
              @endforeach
                            @error('sauces')
                <div class="text-danger">{{ $message }}</div>
              @enderror
                          </div>
                        </div>

                        <!-- Salad Option Section -->
                        <div class="col-sm-6">
                          <div class="row g-2 product-tag">
                            <div class="col-12">
                              <label class="form-label d-block m-0" for="salad">Salad<span
                                  class="txt-danger">*</span></label>
                              <p class="f-light">Select if this product has salad as an option or not</p>
                            </div>
                            <div class="col-12">
                              <label>
                                <input type="radio" name="salad" value="1" {{ old('salad') == 1 ? 'checked' : '' }}> Yes
                              </label>
                              <label>
                                <input type="radio" name="salad" value="0" {{ old('salad') == 0 ? 'checked' : '' }}> No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Extras Tab -->
                  <div class="tab-pane fade" id="extraoptions-product" role="tabpanel"
                    aria-labelledby="extraoptions-product-tab">
                    <div class="sidebar-body">
                      <div class="row g-lg-4 g-3">
                        <div class="col-12">
                          <div class="row g-3">
                            <div class="col-sm-6">
                              <div class="row g-2">
                                <div class="col-12">
                                  <label class="form-label d-block m-0" for="extras">Add Extras (Optional)</label>
                                </div>
                                <div class="col-12">
                                  <label>
                                    <input type="checkbox" id="select-all-extras"> All
                                  </label>
                                </div>
                                @foreach($extras as $extra)
                  <div class="col-12">
                    <label>
                    <input type="checkbox" name="extras[]" value="{{ $extra->id }}"
                      class="extra-checkbox">
                    {{ $extra->name }} (+£{{ number_format($extra->price, 2) }})
                    </label>
                  </div>
                @endforeach
                                @error('extras')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                              </div>
                            </div>

                            <!-- Drinks Section -->
                            <div class="col-sm-6">
                              <div class="row g-2">
                                <div class="col-12">
                                  <label class="form-label d-block m-0" for="drinks">Add Drinks (Optional)</label>
                                </div>
                                <div class="col-12">
                                  <label>
                                    <input type="checkbox" id="select-all-drinks"> All
                                  </label>
                                </div>
                                @foreach($drinks as $drink)
                  <div class="col-12">
                    <label>
                    <input type="checkbox" name="drinks[]" value="{{ $drink->id }}"
                      class="drink-checkbox">
                    {{ $drink->name }} (+£{{ number_format($drink->price, 2) }})
                    </label>
                  </div>
                @endforeach
                                @error('drinks')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Pricing Tab -->
                  <div class="tab-pane fade" id="pricings" role="tabpanel" aria-labelledby="pricings-tab">
                    <div class="sidebar-body">
                      <form class="price-wrapper">
                        <div class="row g-3 custom-input">
                          <div class="col-sm-12">
                            <label class="form-label" for="price">Price <span class="txt-danger">*</span></label>
                            <input class="form-control" id="price" name="price" type="number" value="{{ old('price') }}"
                              required>
                            @error('price')
                <div class="text-danger">{{ $message }}</div>
              @enderror
                          </div>

                          <div class="col-sm-12">
                            <label class="form-label" for="discount">Discount<span class="txt-danger">*</span></label>
                            <div class="col-12">
                              <label>
                                <input type="radio" name="discount" value="1" {{ old('discount') == 1 ? 'checked' : '' }}>
                                Yes
                              </label>
                              <label>
                                <input type="radio" name="discount" value="0" {{ old('discount') == 0 ? 'checked' : '' }}>
                                No
                              </label>
                            </div>
                            <p class="f-light">Discount and Vouchers can be applied to this product</p>
                            @error('discount')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                          </div>
                          <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
</div>


@endsection