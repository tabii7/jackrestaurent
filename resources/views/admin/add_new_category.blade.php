@extends('admin.adminLayout')

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Add New Category</h4>
                </div>
                <div class="card-body">
                    <div class="card-wrapper border rounded-3">
                        <form class="row g-3" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label" for="name">Category Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter Category Name" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="formFile">Category Image</label>
                                <input class="form-control" id="formFile" name="image" type="file" required>
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
                        <h3>All Categories</h3>
                    </div>
                    <div class="list-category">
                        <table class="table" id="category-table">
                            <thead>
                                <tr>
                                    <th><span class="f-light f-w-600">Category Image</span></th>
                                    <th><span class="f-light f-w-600">Category Name</span></th>
                                    <th><span class="f-light f-w-600">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <div class="product-names">
                                            <div class="light-product-box">
                                                <img class="img-fluid" src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="f-light">{{ $category->name }}</p>
                                    </td>
                                    <td>
                                        <div class="category-action">
                                            <a href="#!" class="edit-category" data-id="{{ $category->id }}" data-bs-toggle="modal"
                                            data-bs-target="#category-pill-modal" title="Edit">
                                                <i class="fa fa-edit me-2"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this category?')">
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

        <!-- Modal for editing category -->
        <div class="col-12">
            <div class="modal fade" id="category-pill-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5">Edit Category</h3>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body custom-input">
                            <form id="edit-category-form" method="POST" action="">
                                @csrf
                                <input type="hidden" id="edit-category-id" name="id" value=""> <!-- Updated the hidden input -->

                                <div>
                                    <label class="form-label" for="edit-category-name">Category Name <span class="txt-danger">*</span></label>
                                    <input class="form-control m-0" id="edit-category-name" name="name" type="text" required>
                                </div>
                                <div>
                                    <label class="form-label" for="edit-formFile">Category Image</label>
                                    <input class="form-control" id="edit-formFile" name="image" type="file">
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
<script>
$(document).ready(function() {
    // When clicking on an edit button, fetch the category data
    $(document).on('click', '.edit-category', function () {
        let id = $(this).data('id'); // Get the category ID from the button's data attribute

        // Fetch the category data
        $.get('/categories/' + id + '/edit', function (data) {
            // Populate the form with the fetched data
            $('#edit-category-id').val(data.id); // Set the ID in the hidden input
            $('#edit-category-name').val(data.name); // Set the category name in the input
            $('#edit-category-form').attr('action', '/categories/update/' + data.id); // Set the correct form action
            $('#category-pill-modal').modal('show'); // Show the modal
        }).fail(function (jqXHR) {
            console.error("Error fetching category:", jqXHR);
            alert('Failed to fetch category data. Please try again.');
        });
    });

    // When clicking the update button in the modal
    $('#update-category').click(function () {
        let id = $('#edit-category-id').val(); // Get the ID from the hidden input
        let formData = new FormData($('#edit-category-form')[0]);
        formData.append('_token', '{{ csrf_token() }}'); // Include CSRF token for security

        $.ajax({
            url: '/categories/update/' + id, // Ensure this matches your route
            type: 'POST',
            data: formData,
            processData: false, // Important for FormData
            contentType: false, // Important for FormData
            success: function(response) {
                // Handle success, e.g., close the modal and refresh the category list
                $('#category-pill-modal').modal('hide');
                location.reload(); // Refresh the page or update the UI dynamically
            },
            error: function(jqXHR) {
                console.error("AJAX error response:", jqXHR);
                alert('Failed to update category. Please try again.');
            }
        });
    });
});
</script>
<!-- Container-fluid Ends-->
@endsection
