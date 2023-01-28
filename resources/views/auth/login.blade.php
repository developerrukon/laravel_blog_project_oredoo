@extends('layouts.frontendApp')

@section('content')
 <!--Login-->
 <section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-8 m-auto">
                <div class="login-content">
                    <h4>{{ __('Sign In') }}</h4>
                    <!--form-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" placeholder="enter you email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                             @endif
                            <button type="submit" class="btn-custom">{{ __('Login') }}</button>

                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('frontend.github.redirect') }}"  class="btn btn-light">login with github <img width="25" src="https://i.postimg.cc/FRp6F5kD/github.png" alt="{{ __('github') }}"></a>
                                <a href="{{ route('frontend.google.redirect') }}"  class="btn btn-light" >login with google <img width="25" src="https://i.postimg.cc/C5KQzPjY/google.png" alt="{{ __('google') }}"></a>
                            </div>

                        </div>
                        <div class="form-group  text-center">
                            <small>Do'nt have an acount? <a href="{{ route('register') }}">Create One</a></small>
                        </div>

                    </form>
                       <!--/-->
                </div>
            </div>
         </div>
    </div>
</section>

@endsection
