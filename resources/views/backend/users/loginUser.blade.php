@extends('layouts.backendApp')
@section('title', "Create User")
@section('contact')
<div class="container-fluid page__heading-container">
{{--  breadcrumb email  --}}
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ol>
          </nav>
          <h3 class="my-4">My Profile</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                @if (auth()->user()->image == true)
                <img src="{{ asset('storage/users/'.auth()->user()->image) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">

                @else
                <img src="{{ Avatar::create(auth()->user()->name)->setDimension(150)->setFontSize(35)->toBase64() }}" alt="{{ auth()->user()->name }}">

                @endif

              <h5 class="my-3">{{ auth()->user()->name }}</h5>
              <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
              <div class="d-flex justify-content-center mb-2">
                @if (Route::is('backend.login.user.edit') == false)
                <a href="{{ route('backend.login.user.edit') }}" type="button" class="btn btn-primary">
                    @if (Route::is('backend.login.user.edit') == true)
                    <a href="{{ route('backend.login.user.edit') }}" type="button" class="btn btn-primary">Edit Profile</a>
                    Update Profile
                    @else
                    Edit Profile
                    @endif

                </a>

                @else

                @endif
              </div>
            </div>
          </div>
        </div>
        @if (Route::is('backend.login.user.edit') == true)
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Udate User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('backend.login.user.update') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            {{--  input name  --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" required/>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  input email  --}}
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{  auth()->user()->email }} " required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    {{--  phone input  --}}
                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{  auth()->user()->phone }}" >

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                        {{--  address email  --}}
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ auth()->user()->address }}">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--   password  --}}
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--  confirm password  --}}
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{--  confirm password  --}}
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="" name="image">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{--  submit buttton  --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">

                      @if(auth()->user()->phone)
                      <p class="text-muted mb-0"> {{ auth()->user()->phone }}</p>
                      @endif

                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                      @if(auth()->user()->address)
                      <p class="text-muted mb-0"> {{ auth()->user()->address }}</p>
                      @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

              @foreach ($posts as $post)
             <a href="{{ route('backend.post.show', $post->id) }}">
                <div class="col-md-6">
                    <div class="card">
                        @if ($post->image)
                        <img width="100%" src="{{ asset('storage/post/' . $post->image) }}"  alt="{{ $post->title }}">
                        @else

                        @endif
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{!! Str::limit($post->description, 100, '...') !!}</p>
                        <a href="{{ route('backend.post.show', $post->id) }}" class="text-dark ">Read more</a>
                        <p class="card-text "><small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small></p>

                    </div>
                    </div>
                  </div>
             </a>
              @endforeach
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
</div>

@endsection
