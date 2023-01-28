@extends('layouts.backendMaster')
@section('title', "Active Users")
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }} "/>
@endsection
@section('contact')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Active Users') }}</li>
                </ol>
            </nav>
            <h2 class="m-0">{{ __('Active Users') }}</h2>
        </div>
    </div>
</div>

<div class="row">
    <!-- data table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">{{ __('Total Users : ') }}{{ $user_count }}</h3>
                <div class="data-tables">
                    <table id="dataTable" class="text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Create_At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    @if ($user->image)
                                    <img width="30" class="rounded-circle" src="{{ asset('storage/users/'.$user->image) }}" alt="{{ $user->image }}">
                                    @else
                                    <img src="{{ Avatar::create($user->name)->setDimension(30)->setFontSize(15)->toBase64() }}" alt="{{ auth()->user()->name }}">

                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ Str::limit($user->address, 20, '...') }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-info mr-1">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('backend.users.show', $user->id) }}" class="btn btn-outline-info">View</a>
                                    <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-outline-success">Edit</a>
                                    <form class="d-inline" method="POST" action="{{ route('backend.users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                          <input type="submit" class="btn btn-outline-danger" value="Delete">
                                    </form>
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

@section('js')
<script src="{{ asset('backend/js/select2.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script>

        //alert message
        $('.permanent_delete').on('click', function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(this).parent().submit();
            }
            })
        });
        //datatable
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

    </script>

@endsection
