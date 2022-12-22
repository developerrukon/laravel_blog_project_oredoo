@extends('layouts.backendApp')
@section('title', 'Role Create')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Role</li>
                    </ol>
                </nav>
                <h1 class="m-0">All Role</h1>
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
                   <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)

                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge bg-info text-light">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-primary">View</a>
                                    <a class="btn btn-success">Edit</a>
                                    <a class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection
