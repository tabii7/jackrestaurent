@extends('admin.adminLayout')

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>New User Voucher</h4>
                </div>
                <div class="card-body">
                    <div class="card-wrapper border rounded-3">
                    <form class="row g-3" method="POST" action="{{ route('admin.storeVoucher') }}" enctype="multipart/form-data">
                    @csrf
                            <div class="col-md-12">
                                <label class="form-label" for="name">Voucher Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter Voucher Name" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="amount">Voucher Amount</label>
                                <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Voucher amount" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="expiry">Expiry (days)</label>
                                <input class="form-control" id="expiry" name="expiry" type="number" placeholder="Enter Voucher expiry" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="drink_image">Voucher Image</label>
                                <input class="form-control" id="drink_image" name="image" type="file" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="list-category-header mb-3">
                        <h3>All Vouchers</h3>
                    </div>
                    <div class="list-category">
                        <table class="table" id="category-table">
                            <thead>
                                <tr>
                                <th><span class="f-light f-w-600">Voucher Image</span></th>

                                    <th><span class="f-light f-w-600">Voucher Name</span></th>
                                    <th><span class="f-light f-w-600">Voucher Amount</span></th>
                                    <th><span class="f-light f-w-600">Voucher Expiry</span></th>

                                    <th><span class="f-light f-w-600">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($vouchers as $voucher)
                                <tr>
                                    <td>
                                    <img src="{{ asset('storage/' . $voucher->image) }}" alt="{{ $voucher->name }}" style="width: 80px;">
                                    </td>
                                    
                                    <td>
                                        <p class="f-light">{{ $voucher->name }}</p>
                                    </td>
                                    <td>
                                        <p class="f-light">{{ $voucher->amount }} $</p>
                                    </td>
                                    <td>
                                        <p class="f-light">{{ $voucher->expiry }} days</p>
                                    </td>
                                    <td>
                                        <div class="category-action">
                                           
                                        <form action="{{ route('admin.deleteVoucher', $voucher->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this voucher?')">Delete</button>
                    </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
            <tr>
                <td colspan="5" class="text-center">No vouchers available</td>
            </tr>
        @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for editing category -->
        <div class="col-12">
            <div class="modal fade" id="category-pill-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5">Edit Voucher</h3>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body custom-input">
                            <form id="edit-category-form" method="POST" action="">
                                @csrf
                                <input type="hidden" id="edit-category-id" name="id" value=""> <!-- Updated the hidden input -->

                                <div>
                                    <label class="form-label" for="edit-category-name">Voucher Name <span class="txt-danger">*</span></label>
                                    <input class="form-control m-0" id="edit-category-name" name="name" type="text" required>
                                </div>
                                <div>
                                    <label class="form-label" for="edit-formFile">Voucher amount</label>
                                    <input class="form-control m-0" id="edit-category-name" name="name" type="text" required>
                                </div>
                                <div>
                                    <label class="form-label" for="edit-formFile">Voucher Expiry</label>
                                    <input class="form-control m-0" id="edit-category-name" name="name" type="text" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="update-category" type="button">Save changes</button>
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

@endsection
