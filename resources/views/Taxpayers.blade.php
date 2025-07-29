<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taxpayer Search</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
                            <th>Confirmed?</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
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
</script>

</body>

</html>
