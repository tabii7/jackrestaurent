@extends('admin.adminLayout')

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Add New Sauce</h4>
                </div>
               

                <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <div class="card-wrapper border rounded-3">
                        <form class="row g-3" method="POST" action="{{ route('admin.storeSauce') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label" for="sauce_name">Sauce Name</label>
                                <input class="form-control" id="sauce_name" name="name" type="text"
                                    placeholder="Enter Sauce Name" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="sauce_price">Sauce Price</label>
                                <input class="form-control" id="sauce_price" name="price" type="text"
                                    placeholder="Enter Price" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="sauce_image">Sauce Image</label>
                                <input class="form-control" id="sauce_image" name="image" type="file" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Add Sauce</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- Your custom script for handling Sauces -->

<!-- Container-fluid Ends-->
@endsection