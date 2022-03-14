<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- iCheck -->
<link rel="stylesheet"
    href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/media.css') }}">
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">

<style>
    .toast-top-container {
        position: absolute;
        top: 65px;
        width: 280px;
        right: 40px;
        height: auto;
    }

    .btn-red {
        color: red;
    }

    .btn-blue {
        color: blue;
    }

</style>
@yield('styles')
@livewireStyles