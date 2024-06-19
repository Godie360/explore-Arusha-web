<x-vendor-layout>

    @push('scripts')
        <script>
            (function() {
                "use strict";
                var datatable_url = "{{ route('web.users.services.amenities.index') }}";
                var table;
                var datatable;
                table = document.querySelector('#amenity-table');
                datatable = $(table).DataTable({
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
                            // location.reload();
                        }
                    },
                    order: [
                        [3, 'DESC'],
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
                            data: 'icon',
                            name: 'icon'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            type: 'num',
                            render: {
                                _: 'display',
                                sort: 'timestamp'
                            },
                            searchable: false,
                        },
                        {
                            data: 'action',
                            name: 'action',
                            searchable: false,
                            orderable: false
                        }
                    ]
                });
                $(document).on('submit', 'form#categ-form', function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var data = form.serialize();
                    form.find('button[type="submit"]').prop('disabled', true);
                    $.ajax({
                        method: 'POST',
                        url: $(this).attr('action'),
                        dataType: 'json',
                        data: data,
                        success: function(response) {
                            $('#add-modal').modal('hide');
                            form.find('button[type="submit"]').prop('disabled', false);
                            datatable.ajax.reload();
                            Swal.fire({
                                icon: "success",
                                title: "Successfuly.",
                                text: response.message,
                            });

                            $('#add-modal').modal('hide');
                        },
                        error: function(xhr) {
                            var error = JSON.parse(xhr.responseText);
                            form.find('button[type="submit"]').prop('disabled', false);
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: error.message,
                            });
                            $('#add-modal').modal('hide');
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
                $(document).on('click', '.view-edit-button', function(e) {
                    e.preventDefault();
                    let dataUrl = $(this).attr('href');
                    let dataType = $(this).data('type');
                    $.ajax({
                        method: 'GET',
                        url: dataUrl,
                        success: function(response) {
                            console.log(response);
                            if (dataType == 'view') {
                                disableFormElements();
                                $('#view-edit-modal-title').text('View Amenity');
                                $('#view-edit-button').addClass('d-none');
                            } else {
                                enableFormElements();
                                $('#view-edit-modal-title').text('Eidt Amenity');
                                $('#view-edit-button').removeClass('d-none');
                            }
                            $("#view-edit-name").val(response.data.name);
                            $("#view-edit-icon").val(response.data.icon);

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
                $(document).on('submit', 'form#view-edit-form', function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var data = form.serialize();
                    form.find('button[type="submit"]').prop('disabled', true);
                    $.ajax({
                        method: 'POST',
                        url: $(this).attr('action'),
                        dataType: 'json',
                        data: data,
                        success: function(response) {
                            $('#view-edit-modal').modal('hide');
                            form.find('button[type="submit"]').prop('disabled', false);
                            datatable.ajax.reload();
                            Swal.fire({
                                icon: "success",
                                title: "Successfuly.",
                                text: response.message,
                            });

                            $('#view-edit-modal').modal('hide');

                        },
                        error: function(xhr) {
                            console.log(xhr);
                            var error = JSON.parse(xhr.responseText);
                            form.find('button[type="submit"]').prop('disabled', false);
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: error.message,
                            });

                            $('#view-edit-modal').modal('hide');
                        }
                    });
                });
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
                                    datatable.ajax.reload();
                                    Swal.fire({
                                        icon: "success",
                                        title: "Successfuly.",
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
                <h4>Lists of Amenities</h4>
                <a class="nav-link add-listing" href="javascript:void(0)" data-bs-toggle="modal"
                    data-bs-target="#add-modal">
                    <span><i class="fa-solid fa-plus"></i></span>Create Amenity
                </a>

                <div class="modal fade" id="add-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Amenity</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="categ-form" class="needs-validation"
                                    action="{{ route('web.users.services.amenities.store') }}" method="POST"
                                    novalidate>
                                    @csrf
                                    <div class="row g-3">

                                        <div class="form-row col-md-6">
                                            <div class="form-set">
                                                <label class="col-form-label required" for="name">Amenity
                                                    Name</label>
                                                <input name="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" placeholder="Enter Amenity Name"
                                                    required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row col-md-6">
                                            <div class="form-set">
                                                <label class="col-form-label required" for="icon">Amenity
                                                    Icon</label>
                                                <input name="icon" type="text"
                                                    class="form-control @error('icon') is-invalid @enderror"
                                                    value="{{ old('icon') }}" placeholder="ie: fa-users" required>
                                                @error('icon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                                <button type="reset" class="btn btn-light px-4">
                                                    Reset
                                                </button>
                                                <button type="submit" id="categ-submit" class="btn btn-primary px-4">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="listing-table datatable" id="amenity-table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="view-edit-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="view-edit-modal-title">Edit Amenity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="view-edit-form" class="needs-validation"
                        action="{{ route('web.users.services.amenities.update', ':id') }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="form-row col-md-6">
                                <div class="form-set">
                                    <label class="col-form-label required" for="name">Amenity
                                        Name</label>
                                    <input name="name" type="text" id="view-edit-name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Enter Amenity Name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row col-md-6">
                                <div class="form-set">
                                    <label class="col-form-label required" for="icon">Amenity
                                        Icon</label>
                                    <input name="icon" type="text" id="view-edit-icon"
                                        class="form-control @error('icon') is-invalid @enderror"
                                        value="{{ old('icon') }}" placeholder="ie: fa-users" required>
                                    @error('icon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                    <button type="reset" class="btn btn-light px-4">
                                        Reset
                                    </button>
                                    <button type="submit" id="view-edit-button" class="btn btn-primary px-4">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-vendor-layout>
