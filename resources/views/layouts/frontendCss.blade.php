 <!-- Meta -->
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">

 <!-- favicon -->
 <link rel="icon" sizes="16x16" href="assets/img/favicon.png') }}">

 <meta name="csrf-token" content="{{ csrf_token() }}">
 <title>@yield('title') - {{ config('app.name', 'Oredoo') }}</title>
 <!-- CSS Plugins -->
 <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.min.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">

 <!-- main style -->
 <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
 @yield('css')
