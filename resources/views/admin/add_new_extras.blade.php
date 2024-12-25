@extends('admin.adminLayout')

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Add New Extra</h4>
                </div>
                <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <div class="card-wrapper border rounded-3">
                        <form class="row g-3" method="POST" action="{{ route('admin.storeExtra') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label" for="extra_name">Extra Name</label>
                                <input class="form-control" id="extra_name" name="name" type="text"
                                    placeholder="Enter Extra Name" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="extra_price">Extra Price</label>
                                <input class="form-control" id="extra_price" name="price" type="text"
                                    placeholder="Enter Price" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="extra_image">Extra Image</label>
                                <input class="form-control" id="extra_image" name="image" type="file" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Add Extra</button>
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

<!-- Your custom script for handling Extras -->

<!-- Container-fluid Ends-->
@endsection