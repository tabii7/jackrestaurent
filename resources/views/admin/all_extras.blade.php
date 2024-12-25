@extends('admin.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>All Extras</h3>

                    <!-- Display Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Extras Table -->
                    <table class="table" id="extra-table">
                        <thead>
                            <tr>
                                <th>Extra Image</th>
                                <th>Extra Name</th>
                                <th>Extra Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($extras as $extra)
                                <tr>
                                    <td>
                                        <img class="img-fluid" src="{{ asset('storage/' . $extra->image) }}" alt="{{ $extra->name }}" style="width: 80px;">
                                    </td>
                                    <td>{{ $extra->name }}</td>
                                    <td>{{ $extra->price }} $</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm edit-extra" data-id="{{ $extra->id }}" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.deleteExtra', $extra->id) }}" method="POST" style="display:inline;">
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

        <!-- Edit Modal -->
        <div class="col-12">
        <div class="modal fade" id="extra-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Extra</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-extra-form" method="POST">
                            @csrf
                            <input type="hidden" id="extra-id">
                            <div class="mb-3">
                                <label for="extra-name" class="form-label">Extra Name</label>
                                <input type="text" class="form-control" id="extra-name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="extra-price" class="form-label">Extra Price</label>
                                <input type="number" class="form-control" id="extra-price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="extra-image" class="form-label">Extra Image</label>
                                <input type="file" class="form-control" id="extra-image" name="image">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="update-extra-btn">Save Changes</button>
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
    $(document).ready(function() {
        // Edit Extra Modal
        $('.edit-extra').on('click', function() {
            const id = $(this).data('id');
            $.get(`/admin/extras/${id}/edit`, function(data) {
                $('#extra-id').val(data.id);
                $('#extra-name').val(data.name);
                $('#extra-price').val(data.price);
                $('#edit-extra-form').attr('action', `/admin/extras/update/${id}`);
                $('#extra-modal').modal('show');
            }).fail(function() {
                alert('Failed to fetch data. Please try again.');
            });
        }); 

        // Update Extra
        $('#update-extra-btn').on('click', function() {
            const id = $('#extra-id').val();
            const formData = new FormData($('#edit-extra-form')[0]);
            formData.append('_token', '{{ csrf_token() }}');
            
            $.ajax({
                url: `/admin/extras/update/${id}`,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response.success);
                    location.reload();
                },
                error: function() {
                    alert('Failed to update extra.');
                }
            });
        });
    });
</script>
@endsection
