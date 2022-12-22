@extends('layouts.backendApp')
@section('title', "All Users")
@section('contact')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Users</li>
                </ol>
            </nav>
            <h1 class="m-0">All Users</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>All Users</h2>
            </div>
            <div class="card-body">
               <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Create_At</th>
                            <th>Varified_At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                 @foreach ($user->roles as $role)
                                    <span class="badge bg-info">{{ $role->name }}</span>
                                 @endforeach
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    @if ($user->email_varified_at )
                                        {{ 'Varified User' }}
                                        @else
                                        {{ 'Not Varified User' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary">View</a>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
@endsection