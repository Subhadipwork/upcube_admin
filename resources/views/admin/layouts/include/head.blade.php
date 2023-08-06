<head>
        
    <meta charset="utf-8" />
    <title>Subhadip - @yield('title', 'Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.ico') }}">

 

  <!-- DataTables -->
  
  <!-- Responsive datatable examples -->
  {{-- <link href="{{ asset('admin_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"> --}}

  <!-- Bootstrap Css -->
  <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
  <!-- Icons Css -->
  <link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
  <!-- App Css -->
  <link href="{{ asset('admin_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
  @stack('styles')
  
</head>