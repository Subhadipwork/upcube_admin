<!doctype html>
<html lang="en">

    {{-- head section --}}
    @include('admin.layouts.head')
    {{-- end head section --}}

    <body data-topbar="dark" data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('admin.layouts.header')
 

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.sidebar')
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
        @include('admin.layouts.foot')

 
    </body>
</html>
