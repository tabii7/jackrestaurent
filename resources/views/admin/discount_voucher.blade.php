@extends('admin.adminLayout')

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Edit Pickup Discount</h4>
                </div>
                <div class="card-body">
                    <div class="card-wrapper border rounded-3">
                        <form class="row g-3" method="POST" action="{{ route('admin.updatePpickupDiscount') }}">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label" for="amount">Amount </label>
                                <input class="form-control" id="amount" name="amount" type="number"
                                    placeholder="Enter amount" value="{{ $discount->amount ?? 'Nan' }}" required>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
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

<!-- Your custom script for handling categories -->

@endsection