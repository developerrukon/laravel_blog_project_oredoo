@extends('layouts.backendMaster')
@section('title', "Settings")
@section('contact')
<div class="container-fluid page__heading-container">
{{--  breadcrumb email  --}}
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Settings') }}</li>
                </ol>
            </nav>
            <h3 class="m-0">{{ __('Settings') }}</h3>
        </div>
    </div>
</div>
{{--  input form --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
        </div>
    </div>
</div>
@endsection
