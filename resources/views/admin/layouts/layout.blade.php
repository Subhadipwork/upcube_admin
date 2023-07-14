<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Subhadip - @yield('title', 'Dashboard')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
  <meta content="Themesdesign" name="author">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.ico') }}">

  <!-- jquery.vectormap css -->
  <link href="{{ asset('admin_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">

  <!-- DataTables -->
  <link href="{{ asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Responsive datatable examples -->
  <link href="{{ asset('admin_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Bootstrap Css -->
  <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
  <!-- Icons Css -->
  <link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
  <!-- App Css -->
  <link href="{{ asset('admin_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
</head>

<body data-topbar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">

  @include('admin.layouts.header')

  <!-- ========== Left Sidebar Start ========== -->
  @section('sidebar')
    @include('admin.layouts.sidebar')
  @show

  <!-- Left Sidebar End -->

  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content">
    @hasSection('content')
      @yield('content')
    @else
      <h2>Page Not Found</h2>
    @endif

    <!-- End Page-content -->
    @include('admin.layouts.footer')

  </div>
  <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->

<!-- Right bar overlay-->
{{-- <div class="rightbar-overlay"></div> --}}

<!-- JAVASCRIPT -->
<script src="{{ asset('admin_assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/node-waves/waves.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('admin_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- jquery.vectormap map -->
<script src="{{ asset('admin_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('admin_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('admin_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin_assets/js/app.js') }}"></script>

@stack('scripts') <!-- Dynamic Scripts -->

</body>

</html>
