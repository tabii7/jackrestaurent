@extends('admin.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="list-header mb-3">
                        <h3>All Drinks</h3>
                    </div>
                    <div class="list">
                    <table class="table" id="drink-table">
                        <thead>
                            <tr>
                                <th>Drink Image</th>
                                <th>Drink Name</th>
                                <th>Drink Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drinks as $drink)
                                <tr>
                                    <td>
                                        <img class="img-fluid" src="{{ asset('storage/' . $drink->image) }}" alt="{{ $drink->name }}" style="width: 80px;">
                                    </td>
                                    <td>{{ $drink->name }}</td>
                                    <td>{{ $drink->price }} $</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#drink-modal" class="btn btn-primary btn-sm edit-drink" data-id="{{ $drink->id }}" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('delete.drink', $drink->id) }}" method="POST" style="display:inline;">
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

        <!-- Edit drink Modal -->
        <div class="col-12">
        <div class="modal fade" id="drink-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Drink</h3>
                        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-drink-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="edit-drink-id" name="id">
                            <div class="mb-3">
                                <label for="edit-drink-name">Drink Name</label>
                                <input type="text" id="edit-drink-name" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-drink-price">Drink Price</label>
                                <input type="text" id="edit-drink-price" name="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-drink-image">Drink Image</label>
                                <input type="file" id="edit-drink-image" name="image" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" id="update-drink" type="button">Save Changes</button>
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
    // Edit drink
    $('.edit-drink').click(function () {
        const id = $(this).data('id');
        $.get(`/drinks/${id}/edit`, function (data) {
            $('#edit-drink-id').val(data.id);
            $('#edit-drink-name').val(data.name);
            $('#edit-drink-price').val(data.price);
            $('#edit-drink-form').attr('action', `/drinks/update/${data.id}`);
        });
    });

    // Update drink
    $('#update-drink').click(function () {
        const id = $('#edit-drink-id').val();
        const formData = new FormData($('#edit-drink-form')[0]);
        $.ajax({
            url: `/drinks/update/${id}`,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                $('#drink-modal').modal('hide');
                location.reload();
            },
        });
    });
});
</script>
@endsection
