@include('frontend.layouts.include.header')

<!-- Banner part -->


@hasSection('content')
@yield('content')
@else
  <h2>Page Not Found</h2>
@endif


@include('frontend.layouts.include.footer')