@extends('layouts.backendApp')
@section('title', 'Role Create')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create role</li>
                    </ol>
                </nav>
                <h1 class="m-0">Create Role</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Permission</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.permission.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Permission Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create Role</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            @foreach ($permissions as $permission)
                                <label class="col-sm-2 bg-light py-2 mx-2 border">
                                    {{ $permission->name }}
                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}"/>
                                </label>
                            @endforeach

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
