@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
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
                                            <span class="bg-info py-1 px-2">{{ $role['name'] }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('seen')
                                        <a href="{{ url('user/view', $user->id) }}" class="btn btn-sm btn-primary">View</a>
                                        @endcan
                                        @can('edit')
                                        <a href="{{ url('user/edit', $user->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        @endcan
                                        @can('delete')
                                        <a href="{{ url('user/delete', $user->id) }}" class="btn btn-sm  btn-danger">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                      
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
