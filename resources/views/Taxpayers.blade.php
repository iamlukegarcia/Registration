<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taxpayer Search</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <style>
        /* Style the DataTables search input */
        .dataTables_filter input {
            width: 525px !important;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
        }

        /* Optional: Right-align or center the search bar */
        .dataTables_filter {
            text-align: center !important;
            /* change to center or right if needed */
            margin-bottom: 1rem;
        }

        
    </style>

</head>

<body>

    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Taxpayer Registration</h3>
            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Company Name</th>
                            <th>Guest Name</th>
                            <th>Table #</th>
                            <th>Usher</th>
                            <th>Batch #</th>
                            <th>Location</th>
                            <th>Confirmed?</th>
                            <th width="120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
<div class="modal fade" id="editGuestModal" tabindex="-1" aria-labelledby="editGuestLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editGuestForm">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editGuestLabel">Edit Guest Name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="edit_id" name="id">
          <div class="mb-3">
            <label for="guest_name" class="form-label">Guest Name</label>
            <input type="text" class="form-control" id="guest_name" name="guest_name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>


</body>



<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            
            ajax: "{{ route('taxpayers.index') }}",
            language: {
                search: "Search here:",
                searchPlaceholder: "Enter information here..."
            },
            columns: [{
                    data: 'rank',
                    name: 'rank',
                },
                {
                    data: 'CompanyName',
                    name: 'CompanyName',
                },
                {
                    data: 'GuestName',
                    name: 'GuestName',
                },
                 {
                    data: 'Table#',
                    name: 'Table#',
                },
                 {
                    data: 'Usher',
                    name: 'Usher',
                },
                {
                    data: 'Batch#',
                    name: 'Batch#',
                },
                {
                    data: 'LOC',
                    name: 'LOC',
                },
                {
                    data: 'confirmed',
                    name: 'confirmed',
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });


    $(document).on('click', '.confirm-btn', function() {
        let id = $(this).data('id');

        $.ajax({
            url: '/taxpayer/confirm/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    $('.data-table').DataTable().ajax.reload(null,
                        false); // reload without changing page
                }
            },
            error: function(xhr) {
                alert("Failed to confirm taxpayer.");
            }
        });
    });


    $(document).on('click', '.edit-btn', function () {
    let id = $(this).data('id');
    let guest = $(this).data('guest');

    $('#edit_id').val(id);
    $('#guest_name').val(guest);

    $('#editGuestModal').modal('show');
});

    $('#editGuestForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: '{{ route("taxpayer.updateGuest") }}',
            method: 'POST',
            data: formData,
            success: function (res) {
                if (res.success) {
                    $('#editGuestModal').modal('hide');
                    $('.data-table').DataTable().ajax.reload(null, false);
                }
            },
            error: function () {
                alert('Failed to update guest name.');
            }
        });
    });

</script>

</body>

</html>
