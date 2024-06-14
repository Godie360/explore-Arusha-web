<x-admin-layout>
    @push('scripts')
        <script>
            (function() {
                "use strict";
                var datatable_url = "{{ route('admin.news-categories.index') }}";
                var table;
                var datatable;
                table = document.querySelector('#news-table');
                datatable = $(table).DataTable({
                    bFilter: false,
                    sDom: "fBtlpi",
                    pagingType: "numbers",
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
                            name: 'name',
                            searchable: false,
                            orderable: false
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
                    ],
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
                            $('#categ-modal').modal('hide');
                            form.find('button[type="submit"]').prop('disabled', false);
                            datatable.ajax.reload();
                            $('#categ-modal').modal('hide');
                            Swal.fire({
                                icon: "success",
                                title: "Data deleted successfuly.",
                                text: response.message,
                            });
                        },
                        error: function(xhr) {
                            var error = JSON.parse(xhr.responseText);
                            form.find('button[type="submit"]').prop('disabled', false);
                            $('#categ-modal').modal('hide');
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
                                $('#view-edit-modal-title').text('View Category');
                                $('#view-edit-button').addClass('d-none');
                            } else {
                                enableFormElements();
                                $('#view-edit-modal-title').text('Eidt Category');
                                $('#view-edit-button').removeClass('d-none');
                            }
                            $("#view-edit-name").val(response.data.name);
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
                            $('#view-edit-modal').modal('hide');
                            Swal.fire({
                                icon: "success",
                                title: "Data deleted successfuly.",
                                text: response.message,
                            });
                            form[0].reset();
                        },
                        error: function(xhr) {
                            var error = JSON.parse(xhr.responseText);
                            form.find('button[type="submit"]').prop('disabled', false);
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: error.message,
                            });
                            form[0].reset();
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
                                    Lobibox.notify('success', {
                                        pauseDelayOnHover: true,
                                        continueDelayOnInactiveTab: false,
                                        position: 'top right',
                                        icon: 'bx bx-check-circle',
                                        sound: false,
                                        msg: response.message
                                    });
                                },
                                error: function(xhr) {
                                    var error = JSON.parse(xhr.responseText);
                                    Lobibox.notify('error', {
                                        pauseDelayOnHover: true,
                                        continueDelayOnInactiveTab: false,
                                        position: 'top right',
                                        icon: 'bx bx-x-circle',
                                        sound: false,
                                        msg: "Sorry, " + error.message
                                    });
                                }
                            });
                        }
                    });
                });
            })();
        </script>
    @endpush
    <div class="content">
        <div class="content-page-header content-page-headersplit">
            <h5>All News Categories</h5>
            <div class="list-btn">
                <ul>
                    <li>
                        <div class="filter-sorting">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="filter-sets"><img
                                            src="{{ asset('admin/assets/img/icons/filter1.svg    ') }}" class="me-2"
                                            alt="img">Filter</a>
                                </li>
                                <li>
                                    <span><img src="{{ asset('admin/assets/img/icons/sort.svg') }}" class="me-2"
                                            alt="img"></span>
                                    <div class="review-sort">
                                        <select class="select select2-hidden-accessible" tabindex="-1"
                                            aria-hidden="true">
                                            <option>Sort by A - Z</option>
                                            <option>Sort by Z - A</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#categ-modal"><i class="fa fa-plus me-2"></i>Create
                            Category</button>
                        <div class="modal fade" id="categ-modal" tabindex="-1" aria-labelledby="categ-modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="categ-modalLabel">Create Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <form class="row g-3 needs-validation" id="categ-form"
                                            action="{{ route('admin.news-categories.store') }}" method="POST"
                                            novalidate>
                                            @csrf
                                            <div class="col-md-12">
                                                <label for="name" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter Category Name" required>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" id="categ-submit"
                                                        class="btn btn-primary px-4">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 ">
                <div class="table-resposnive table-div">
                    <table class="table " id="news-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view-edit-modal" tabindex="-1" aria-labelledby="view-edit-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="view-edit-modal-title">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <form class="row g-3 needs-validation" id="view-edit-form"
                            action="{{ route('admin.news-categories.update', ':update') }}" method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="name" id="view-edit-name"
                                    placeholder="Enter Category Name" required>
                                <div class="valid-feedback">
                                    Looks good!
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-admin-layout>
