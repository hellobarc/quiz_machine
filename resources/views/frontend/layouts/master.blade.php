    @include('frontend.partials.head')

    @include('frontend.partials.header')
    <!-- main section start -->
    @yield('main-content')
    <!-- main section end -->
    @include('frontend.partials.footer')
    @include('frontend.partials.script')
   