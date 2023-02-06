@extends('layouts.backendMaster')
@section('title', 'Dashboard')
@section('contact')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                </ol>
            </nav>
            <h3 class="m-0">{{ __('Dashboard') }}</h3>
        </div>
    </div>
</div>


@endsection
