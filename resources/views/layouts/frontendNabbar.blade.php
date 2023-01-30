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
