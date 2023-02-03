@extends('layouts.backendMaster')
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
              <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __('User') }}</li>
            </ol>
          </nav>
          <h3 class="my-4">{{ __('User') }}</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">


                @if ($user->image)
                <img src="{{ asset('storage/users/'.$user->image) }}" alt="{{ $user->name }}">
                @else
                <img src="{{ Avatar::create($user->name)->setDimension(150)->setFontSize(35)->toBase64() }}" alt="{{ $user->name }}">
                @endif
                <h5 class="my-3">{{ auth()->user()->name }}</h5>
              <p class="text-muted mb-1">{{ $user->email }}</p>
              <div class="d-flex justify-content-center mb-2">
                    <a href="{{ route('backend.users.edit', $user->id) }}" type="button" class="btn btn-primary">Edit Profile</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">{{ __('Full Name') }}</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->name }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">{{ __('Email') }}</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">{{ __('Phone') }}</p>
                  </div>
                  <div class="col-sm-9">

                      @if($user->phone)
                      <p class="text-muted mb-0"> {{ $user->phone }}</p>
                      @endif

                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">{{ __('Address') }}</p>
                  </div>
                  <div class="col-sm-9">
                      @if($user->address)
                      <p class="text-muted mb-0"> {{ $user->address }}</p>
                      @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card mb-4 mb-md-0">

                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>

@endsection
