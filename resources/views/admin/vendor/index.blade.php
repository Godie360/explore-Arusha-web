<x-admin-layout>
    @push('scripts')
        <script>
            (function() {
                "use strict";
                var datatable_url = "{{ route('admin.vendors.index') }}";
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
                            data: 'company_name',
                            name: 'company_name'
                        },
                        {
                            data: 'business_name',
                            name: 'business_name'
                        },
                        {
                            data: 'status',
                            name: 'status'
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
                                        title: "Data deleted successfuly.",
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
    <div class="content">
        <div class="content-page-header content-page-headersplit">
            <h5>Lists of Vendors</h5>
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
                        <a class="btn btn-primary" href="{{ route('admin.vendors.create') }}"><i
                                class="fa fa-plus me-2"></i>Add
                            Vendor </a>
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
                                <th>SN</th>
                                <th>Company Name</th>
                                <th>Business Name</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</x-admin-layout>
