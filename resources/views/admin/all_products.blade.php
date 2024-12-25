@extends('admin.adminLayout')

@section('content')  
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="list-product-header">
            <div>
              <a class="btn btn-primary" href="{{ route('admin.add_new_product') }}"><i class="fa fa-plus"></i>Add
                Product</a>
            </div>
          </div>
          <div class="list-product">

            <!-- noor code  -->

            <!-- noor code  -->


            <table class="table" id="project-status">
              <thead>
                <tr>
                  <th> <span class="f-light f-w-600">Product Name</span></th>
                  <th> <span class="f-light f-w-600">description</span></th>
                  <th> <span class="f-light f-w-600">Category</span></th>
                  <th> <span class="f-light f-w-600">allergen_info</span></th>
                  <th> <span class="f-light f-w-600">Salad </span></th>
                  <th> <span class="f-light f-w-600">sauces</span></th>

                  <th> <span class="f-light f-w-600">extras</span></th>
                  <th> <span class="f-light f-w-600">drinks</span></th>

                  <th> <span class="f-light f-w-600">Price</span></th>
                  <th> <span class="f-light f-w-600">Discount Applied</span></th>

                  <th> <span class="f-light f-w-600">Action</span></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr class="product-removes">
                    <td>
                    <div class="product-names">
                      <div class="light-product-box">
                      <img class="img-fluid"
                        src="{{ $product->image ? asset('storage/' . $product->image) : asset('default-image-path.jpg') }}"
                        alt="{{ $product->title }}">
                      </div>
                      <p>{{ $product->title }}</p>
                    </div>
                    </td>
                    <td>
                    <p class="f-light">{{ $product->description ?? 'N/A' }}</p>
                    </td>
                    <td>
                    <p class="f-light">{{ $product->category->name ?? 'N/A' }}</p>
                    </td>
                    <td>
                    <p class="f-light">
                      {{ $product->allergen_info ? implode(', ', json_decode($product->allergen_info)) : 'N/A' }}
                    </p>
                    </td>
                    <td>
                    <p class="f-light">
                      {{ $product->salad == 1 ? 'Yes' : ($product->salad == 0 ? 'No' : 'N/A') }}
                    </p>
                    </td>
                    <td>
                    <p class="f-light">
                      @php
                            // Fetch the sauce ids related to this product
                            $sauceIds = DB::table('sauce_product')
                            ->where('product_id', $product->id)
                            ->pluck('sauce_id'); // Get all related sauce IDs

                            // Fetch sauce names using the retrieved sauce IDs
                            $sauces = DB::table('sauces')
                            ->whereIn('id', $sauceIds)
                            ->pluck('name'); // Get the names of the sauces

                            // If sauces exist, display them, otherwise display "N/A"
                            $saucesList = $sauces->isNotEmpty() ? $sauces->join(', ') : 'N/A';
                          @endphp

                      {{ $saucesList }}
                    </p>

                    </td>
                    <td>
                    <p class="f-light">
                      @php
            // Fetch the sauce ids related to this product
            $extraIds = DB::table('extra_product')
            ->where('product_id', $product->id)
            ->pluck('extra_id'); // Get all related extra IDs

            // Fetch extra names using the retrieved extra IDs
            $extras = DB::table('extras')
            ->whereIn('id', $extraIds)
            ->pluck('name'); // Get the names of the extras

            // If extras exist, display them, otherwise display "N/A"
            $extrasList = $extras->isNotEmpty() ? $extras->join(', ') : 'N/A';
          @endphp

                      {{ $extrasList }}
                    </p>

                    </td>
                    <td>
                    <p class="f-light">
                      @php
            // Fetch the sauce ids related to this product
            $drinkIds = DB::table('drink_product')
            ->where('product_id', $product->id)
            ->pluck('drink_id'); // Get all related drink IDs

            // Fetch drink names using the retrieved drink IDs
            $drinks = DB::table('drinks')
            ->whereIn('id', $drinkIds)
            ->pluck('name'); // Get the names of the drinks

            // If drinks exist, display them, otherwise display "N/A"
            $drinksList = $drinks->isNotEmpty() ? $drinks->join(', ') : 'N/A';
          @endphp

                      {{ $drinksList }}
                    </p>

                    </td>
                    <td>
                    <p class="f-light">{{ number_format($product->price, 2) }}</p>
                    </td>
                    <td>
                    <p class="f-light">
                      {{ $product->discount == 1 ? 'Yes' : ($product->discount == 0 ? 'No' : 'N/A') }}
                    </p>
                    </td>
                    <td>
                    <div class="product-action">


                      <form action="{{ route('delete.product', $product->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                        <i class="fa fa-trash"></i>
                      </button>
                      </form>
                    </div>
                    </td>
                  </tr>
            @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
@endsection