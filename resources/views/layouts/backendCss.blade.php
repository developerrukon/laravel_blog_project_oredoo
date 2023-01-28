<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('backend/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('backend/css/vendor-material-icons.css') }}" rel="stylesheet">
    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{ asset('bacend/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/sweetalert2.min.css') }} "/>
    @yield('css')
</head>
