@extends('admin.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="list-header mb-3">
                        <h3>All Sauces</h3>
                    </div>
                    <div class="list">
                    <table class="table" id="sauce-table">
                        <thead>
                            <tr>
                                <th>Sauce Image</th>
                                <th>Sauce Name</th>
                                <th>Sauce Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sauces as $sauce)
                                <tr>
                                    <td>
                                        <img class="img-fluid" src="{{ asset('storage/' . $sauce->image) }}" alt="{{ $sauce->name }}" style="width: 80px;">
                                    </td>
                                    <td>{{ $sauce->name }}</td>
                                    <td>{{ $sauce->price }} $</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#sauce-modal" class="btn btn-primary btn-sm edit-sauce" data-id="{{ $sauce->id }}" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('delete.sauce', $sauce->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit sauce Modal -->
        <div class="col-12">
        <div class="modal fade" id="sauce-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Sauce</h3>
                        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-sauce-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="edit-sauce-id" name="id">
                            <div class="mb-3">
                                <label for="edit-sauce-name">Sauce Name</label>
                                <input type="text" id="edit-sauce-name" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-sauce-price">Sauce Price</label>
                                <input type="text" id="edit-sauce-price" name="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-sauce-image">Sauce Image</label>
                                <input type="file" id="edit-sauce-image" name="image" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="update-sauce" type="button">Save Changes</button>
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

<script>
$(document).ready(function () {
    // Edit sauce
    $('.edit-sauce').click(function () {
        const id = $(this).data('id');
        $.get(`/sauces/${id}/edit`, function (data) {
            $('#edit-sauce-id').val(data.id);
            $('#edit-sauce-name').val(data.name);
            $('#edit-sauce-price').val(data.price);
            $('#edit-sauce-form').attr('action', `/sauces/update/${data.id}`);
        });
    });

    // Update sauce
    $('#update-sauce').click(function () {
        const id = $('#edit-sauce-id').val();
        const formData = new FormData($('#edit-sauce-form')[0]);
        $.ajax({
            url: `/sauces/update/${id}`,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                $('#sauce-modal').modal('hide');
                location.reload();
            },
        });
    });
});
</script>
@endsection
