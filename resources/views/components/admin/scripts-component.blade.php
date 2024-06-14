<script src="{{ asset('admin/assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript">
</script>
<script src="{{ asset('admin/assets/js/feather.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/fancybox/jquery.fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
@stack('scripts')
<script src="{{ asset('admin/assets/js/admin.js') }}" type="text/javascript"></script>

<script>
    @if (Session::has('message'))
        Swal.fire({
            title: 'Success',
            text: "{{ session('message') }}",
            icon: 'success',
        });
    @endif

    @if (Session::has('error'))
        Swal.fire({
            title: 'Error',
            text: "{{ session('error') }}",
            icon: 'error',
        });
    @endif

    @if (Session::has('info'))
        Swal.fire({
            title: 'Info',
            text: "{{ session('info') }}",
            icon: 'info',
        });
    @endif

    @if (Session::has('warning'))
        Swal.fire({
            title: 'Warning',
            text: "{{ session('warning') }}",
            icon: 'warning',
        });
    @endif

    @if (Session::has('success'))
        Swal.fire({
            title: 'Success',
            text: "{{ session('success') }}",
            icon: 'success',
        });
    @endif

    @if (Session::has('danger'))
        Swal.fire({
            title: 'Danger',
            text: "{{ session('danger') }}",
            icon: 'error',
        });
    @endif
</script>
