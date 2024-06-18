<x-vendor-layout>

    @push('scripts')
        <script>
            (function() {
                "use strict";
                var datatable_url = "{{ route('web.users.staffs.index') }}";
                var table;
                var datatable;
                table = document.querySelector('#staff-table');
                datatable = $(table).DataTable({
                    bFilter: false,
                    info: false,
                    ordering: true,
                    processing: true,
                    serverSide: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    pageLength: 25,
                    paging: true,
                    ajax: {
                        url: datatable_url,
                        data: function(d) {},
                        error: function(xhr, errorType, exception) {
                            // Reload the page on error
                            location.reload();
                        }
                    },
                    order: [
                        [2, 'DESC'],
                    ],
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'system_number',
                            name: 'system_number'
                        },
                        {

                            data: 'name',
                            name: 'name',
                            searchable: false,
                            orderable: false
                        },

                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            searchable: false,
                            orderable: false
                        }
                    ],
                });



                function disableFormElements() {
                    $('#view-edit-form :input').prop('disabled', true);
                }
                // Function to enable all form elements
                function enableFormElements() {
                    $('#view-edit-form :input').prop('disabled', false);
                }
                $(document).on('click', '.delete_button', function(e) {
                    e.preventDefault();
                    const deleteDataLink = $(this).attr('href');
                    const token = $('meta[name="csrf-token"]').attr('content');
                    Swal.fire({
                        text: "Are you sure you want to delete this data?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                "url": deleteDataLink,
                                "type": "POST",
                                data: {
                                    _token: token,
                                    _method: "DELETE",
                                },
                                success: function(response) {
                                    console.log(response);
                                    datatable.ajax.reload();
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success",
                                        text: response.message,
                                    });
                                },
                                error: function(xhr) {
                                    var error = JSON.parse(xhr.responseText);
                                    Swal.fire({
                                        icon: "error",
                                        title: "Oops...",
                                        text: error.message,
                                    });
                                }
                            });
                        }
                    });
                });
            })();
        </script>
    @endpush


    <div class="dash-listingcontent dashboard-info">
        <div class="dash-cards card">
            <div class="card-header">
                <h4>Services List</h4>
                <a class="nav-link add-listing" href="{{ route('web.users.services.create') }}">
                    <span><i class="fa-solid fa-plus"></i></span>Add Service
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="listing-table datatable" id="staff-table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>System Number</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-vendor-layout>
