@extends('admin.adminLayout')

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <h5>Loyalty Program</h5>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header pb-0">


                </div>

                <div class="card-body">
                    <div class="card-wrapper border rounded-3">
                        <form class="row g-3" method="POST" action="{{ route('loyalty_program.update') }}">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="amount">Amount</label>
                                <input class="form-control" id="amount" name="amount" type="number"
                                    value="{{ $loyaltyProgram->amount }}" placeholder="Enter amount" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="points">Points</label>
                                <input class="form-control" id="points" name="points" type="number"
                                    value="{{$loyaltyProgram->points  }}" placeholder="Enter Points" required>
                            </div>
                            <p>Add amount = how many points</p>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Create Coupon </h5>

                </div>
                <div class="card-body">
                    <div class="card-wrapper border rounded-3">

                        <form class="row g-3" method="POST" action="{{ route('admin.storeCoupon') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-3">
                                <label class="form-label" for="points">Points</label>
                                <input class="form-control" id="points" name="points" type="number"
                                    placeholder="Enter Points" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="discount">Discount ($)</label>
                                <input class="form-control" id="discount" name="discount" type="number"
                                    placeholder="Enter discount amount" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="expiry">Expiry (Days)</label>
                                <input class="form-control" id="expiry" name="expiry" type="number"
                                    placeholder="Enter Expiry days" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="drink_image">Coupon Image</label>
                                <input class="form-control" id="drink_image" name="image" type="file" required>
                            </div>
                            <p>Add Points = how much Discount</p>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="list-category-header mb-3">
                        <h3>All Coupons</h3>
                    </div>
                    <div class="list-category">
                        <table class="table" id="category-table">
                            <thead>
                                <tr>
                                    <th><span class="f-light f-w-600">Coupon Image</span></th>
                                    <th><span class="f-light f-w-600">Points</span></th>
                                    <th><span class="f-light f-w-600">Discount</span></th>
                                    <th><span class="f-light f-w-600">Expiry</span></th>

                                    <th><span class="f-light f-w-600">Action</span></th>
                                </tr>

                            </thead>
                            <tbody>
                                @forelse($coupons as $coupon)
                                    <tr>
                                        <td>
                                            <img class="img-fluid" src="{{ asset('storage/' . $coupon->image) }}"
                                                alt="{{ $coupon->id }}" style="width: 80px;">
                                        </td>
                                        <td>
                                            <p class="f-light">{{ $coupon->points }}</p>
                                        </td>
                                        <td>
                                            <p class="f-light">{{ $coupon->discount }} $</p>
                                        </td>
                                        <td>
                                            <p class="f-light">{{ $coupon->expiry }} Days</p>
                                        </td>
                                        <td>
                                            <div class="category-action">
                                                <!-- Edit Button -->
                                                <a href="#!" class="edit-category" data-id="{{ $coupon->id }}"
                                                    data-points="{{ $coupon->points }}"
                                                    data-discount="{{ $coupon->discount }}"
                                                    data-expiry="{{ $coupon->expiry }}"
                                                    data-image="{{ asset('storage/' . $coupon->image) }}"
                                                    data-bs-toggle="modal" data-bs-target="#category-pill-modal"
                                                    title="Edit">
                                                    <i class="fa fa-edit me-2"></i>
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.deleteCoupon', $coupon->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this coupon?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No coupons available</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Editing Coupon -->
        <div class="col-12">
            <div class="modal fade" id="category-pill-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5">Edit Coupon</h3>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body custom-input">
                        <form id="edit-category-form" method="POST" action="{{ route('admin.updateCoupon') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="edit-coupon-id" name="id">
                            <div>
                                <label class="form-label" for="edit-points">Points <span
                                        class="txt-danger">*</span></label>
                                <input class="form-control m-0" id="edit-points" name="points" type="number" required>
                            </div>
                            <div>
                                <label class="form-label" for="edit-discount">Discount <span
                                        class="txt-danger">*</span></label>
                                <input class="form-control m-0" id="edit-discount" name="discount" type="number"
                                    required>
                            </div>
                            <div>
                                <label class="form-label" for="edit-expiry">Expiry <span
                                        class="txt-danger">*</span></label>
                                <input class="form-control m-0" id="edit-expiry" name="expiry" type="number" required>
                            </div>
                            <div>
                                <label class="form-label" for="edit-image">Image</label>
                                <input class="form-control" id="edit-image" name="image" type="file">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="update-category" form="edit-category-form"
                            type="submit">Save
                            changes</button>
                    </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-category');
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const couponId = this.dataset.id;
                const points = this.dataset.points;
                const discount = this.dataset.discount;
                const expiry = this.dataset.expiry;

                // Populate modal fields
                document.getElementById('edit-coupon-id').value = couponId;
                document.getElementById('edit-points').value = points;
                document.getElementById('edit-discount').value = discount;
                document.getElementById('edit-expiry').value = expiry;
            });
        });
    });
</script>

@endsection