<x-vendor-layout>
    @push('scripts')
        <script>
            (function() {
                "use strict";
                var datatable_url = "{{ route('web.users.staff-type.index') }}";
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
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'no_staff',
                            name: 'no_staff'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            searchable: false,
                            orderable: false
                        }
                    ],
                });

                $(document).on('click', '.view-edit-button', function(e) {
                    e.preventDefault();
                    let dataUrl = $(this).attr('href');
                    let dataType = $(this).data('type');
                    $.ajax({
                        method: 'GET',
                        url: dataUrl,
                        success: function(response) {
                            if (dataType == 'view') {
                                disableFormElements();
                                $('#view-edit-modal-title').text('View Staff Type');
                                $('#view-edit-button').addClass('d-none');
                            } else {
                                enableFormElements();
                                $('#view-edit-modal-title').text('Eidt Staff Type');
                                $('#view-edit-button').removeClass('d-none');
                            }
                            $("#view-edit-name").val(response.data.name);
                            $("#view-edit-description").val(response.data.description);
                            var formUrl = $('#view-edit-form').attr('action');
                            let last = formUrl.split("/").pop();
                            let url = formUrl.replace(last, response.data.id);
                            $('#view-edit-form').attr('action', url);
                            $('#view-edit-modal').modal('show');
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
                <h4>Staff Types</h4>
                <button type="button" class="nav-link add-listing" data-bs-toggle="modal" data-bs-target="#addStaffType">
                    <span><i class="fa-solid fa-plus"></i></span>Add Staff Type </button>
                <div class="modal fade" id="addStaffType" tabindex="-1" aria-labelledby="addStaffTypeLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('web.users.staff-type.store') }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addStaffTypeLabel">Staff Type</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="form-row col-md-12">
                                            <div class="form-set">
                                                <label class="col-form-label required" for="name">Name</label>
                                                <input name="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" placeholder="Enter Name" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row col-md-12">
                                            <div class="form-set">
                                                <label class="col-form-label" for="description">Description</label>
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30"
                                                    rows="3"></textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="listing-table datatable" id="staff-table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>No of Staffs</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="view-edit-modal" tabindex="-1" aria-labelledby="view-edit-Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="view-edit-form"action="{{ route('web.users.staff-type.update',':id') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="view-edit-modal-title">Staff Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="form-row col-md-12">
                                <div class="form-set">
                                    <label class="col-form-label required" for="name">Name</label>
                                    <input name="name" id="view-edit-name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Enter Name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row col-md-12">
                                <div class="form-set">
                                    <label class="col-form-label" for="description">Description</label>
                                    <textarea name="description" id="view-edit-description" class="form-control @error('description') is-invalid @enderror"
                                        cols="30" rows="3"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-vendor-layout>
