<!doctype html>
<html lang="en">

    {{-- head section --}}
    @include('admin.layouts.include.head')
    {{-- end head section --}}

    <body data-topbar="dark" data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('admin.layouts.include.header')
 

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.include.sidebar')
            <!-- Left Sidebar End -->

            

   
            <div class="main-content">

            @hasSection('content')
            @yield('content')
            @else
              <h2>Page Not Found</h2>
            @endif
                <!-- End Page-content -->

              @include('admin.layouts.include.footer')
              
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        @include('admin.layouts.include.foot')

 
    </body>
</html>
