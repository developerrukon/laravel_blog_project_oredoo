@extends('layouts.backendMaster')
@section('title', 'Role Create')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Create role') }}</li>
                    </ol>
                </nav>
                <h1 class="m-0">{{ __('Create Role & Permission') }}</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Permission') }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.role.permission.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Permission Name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="permission name">

                            @error('name')
                            <span>
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--  role and permission  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h2>{{ __('Create Role') }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Role Name') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="role name" value="{{ old('role_name') }}">
                            @error('name')
                            <span>
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <label class="bg-light m">
                                <input type="checkbox" value="" id="checkAll">
                                {{ __('All') }}
                            </label>
                            <hr />

                        </div>
                        @foreach ($permissions as $permission)
                            <label class="col-sm-2 bg-light py-2 mx-2 border">
                                {{ $permission->name }}
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"/>
                            </label>
                        @endforeach
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <script>
        $('#checkAll').on('change', function() {
            if ($(this).attr('checked')) {
                $('input[type=checkbox]').attr('checked', true);
            } else {
                $('input[type=checkbox]').removeAttr('checked');
            }
        });

    </script>

@endsection
