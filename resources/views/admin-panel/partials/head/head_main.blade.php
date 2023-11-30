<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.ico') }}">
    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/daterangepicker/daterangepicker.css') }}">
    <!-- Quill css -->
    <link href="{{ asset('admin-assets/vendor/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendor/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
    <!-- Vector Map css -->
    <link rel="stylesheet"
        href="{{ asset('admin-assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Theme Config Js -->
    <script src="{{ asset('admin-assets/js/hyper-config.js') }}"></script>
    <!-- App css -->
    <link href="{{ asset('admin-assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    
    <!-- Icons css -->
    <link href="{{ asset('admin-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
</head>

<body>
<!-- Pre-loader -->
<div id="preloader">
    <div id="status">
        <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
    </div>
</div>
<!-- End Preloader-->