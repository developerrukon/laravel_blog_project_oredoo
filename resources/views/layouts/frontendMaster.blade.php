<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   @include('layouts.frontendCss')
</head>

<body>
    <!--loading -->
    <div class="loader">
        <div class="loader-element"></div>
    </div>

    <!-- Header-->
    @include('layouts.frontendNabbar')
    <!-- content section start-->

    @yield('content')


    <!-- content section end-->
    <!--footer-->
    @include('layouts.frontendFooter')

    <!--Back-to-top-->
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>

    <!--Search-form-->
    @include('layouts.frontendSearch')

   @include('layouts.frontendScript')
    @yield('script')


</body>

</html>
