<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('arusha-logo.svg') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.5.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/feather/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/sweetalert2/sweetalert2.min.css') }}"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fancybox/jquery.fancybox.min.css') }}" />


    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <style>
        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 300px;
        }


    </style>
    @stack('styles')
</head>
