<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
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
</head>

<body>
    <!--loading -->
    <div class="loader">
        <div class="loader-element"></div>
    </div>

    <!-- Header-->
    <header class="header navbar-expand-lg fixed-top ">
        <div class="container-fluid ">
            <div class="header-area ">
                <!--logo-->
                <div class="logo">
                    <a href="{{ route('frontend.index') }}">
                        <img src="{{ asset('frontend/img/logo/logo-dark.png') }}" alt="" class="logo-dark">
                        <img src="{{ asset('frontend/img/logo/logo-white.png') }}" alt="" class="logo-white">
                    </a>
                </div>
                <div class="header-navbar">
                    <nav class="navbar">
                        <!--navbar-collapse-->
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ">
                                <li class="nav-item ">
                                    <a class="nav-link {{ Route::is('frontend.index') ? 'active' : '' }}" href="{{ route('frontend.index') }}"> Home </a>
                                </li>
                                @foreach ($categories as $key => $categorie)
                                <li class="nav-item">
                                    <a class="nav-link {{ ($categorie->id == $key) ? 'active' : ''}}"  href="{{ route('frontend.category.archive',$categorie->slug) }}">{{ $categorie->name }} </a>
                                </li>
                                @endforeach
                                <li class="nav-item ">
                                    <a class="nav-link {{ Route::is('frontend.author.list')? 'active' : '' }}" href="{{ route('frontend.author.list') }}" > Author </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link {{ Route::is('frontend.contact') ? 'active' : '' }}"  href="{{ route('frontend.contact') }}"> Contact </a>
                                </li>
                            </ul>
                        </div>
                        <!--/-->
                    </nav>
                </div>

                <!--header-right-->
                <div class="header-right ">
                    <!--theme-switch-->
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <span class="slider round ">
                                <i class="lar la-sun icon-light"></i>
                                <i class="lar la-moon icon-dark"></i>
                            </span>
                        </label>
                    </div>
                    <!--search-icon-->
                    <div class="search-icon">
                        <i class="las la-search"></i>
                    </div>

                    @guest
                        <div class="botton-sub">
                            <a href="{{ route('login') }}" class="btn-subscribe mx-2">Sign In</a>
                        </div>
                        <div class="botton-sub">
                            <a href="{{ route('register') }}" class="btn-subscribe">Sign Up</a>
                        </div>
                    @else
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ auth()->user()->name }}
                        </button>
                        {{--  dropdown menu  --}}
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ route('backend.login.user.show') }}">Profile</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </div>
                      </div>

                    @endguest

                    <!--navbar-toggler-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- content section start-->

    @yield('content')


    <!-- content section end-->
    <!--footer-->
    <div class="footer">
        <div class="footer-area">
            <div class="footer-area-content">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="menu">
                                <h6>Menu</h6>
                                <ul>
                                    <li><a href="#">Homepage</a></li>
                                    <li><a href="#">about us</a></li>
                                    <li><a href="#">contact us</a></li>
                                    <li><a href="#">privarcy</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--newslatter-->
                        <div class="col-md-6">
                            <div class="newslettre">
                                <div class="newslettre-info">
                                    <h3>Subscribe To OurNewsletter</h3>
                                    <p>Sign up for free and be the first to get notified about new posts.</p>
                                </div>

                            </div>
                        </div>
                        <!--/-->
                        <div class="col-md-3">
                            <div class="menu">
                                <h6>Follow us</h6>
                                <ul>
                                    <li><a href="#">facebook</a></li>
                                    <li><a href="#">instagram</a></li>
                                    <li><a href="#">youtube</a></li>
                                    <li><a href="#">twitter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-copyright-->
            <div class="footer-area-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <p>© 2022, Copyright by developer | Rukon</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div>

    <!--Back-to-top-->
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>

    <!--Search-form-->
    <div class="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 m-auto">
                    <div class="search-width">
                        <button type="button" class="close">
                            <i class="far fa-times"></i>
                        </button>
                        <form class="search-form" action="" method="GET">
                            <input type="search" value="" placeholder="What are you looking for?">
                            <button type="submit" class="search-btn"> search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>


    <!-- JS Plugins  -->
    <script src="{{ asset('frontend/js/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset('frontend/js/ajax-contact.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/switch.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.marquee.js') }}"></script>


    <!-- JS main  -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    @yield('script')


</body>

</html>
