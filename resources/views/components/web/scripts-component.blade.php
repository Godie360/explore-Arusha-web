<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/aos/aos.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/backToTop.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/feather.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/ion-rangeslider/js/custom-rangeslider.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/rangeslider.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
@stack('scripts')
<script>
    $('.modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
    });
</script>


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
