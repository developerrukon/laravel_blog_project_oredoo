@extends('layouts.backendMaster')
@section('title', "Trash Users")
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

@endsection
@section('contact')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Trash Users') }}</li>
                </ol>
            </nav>
            <h3 class="m-0">{{ __('Trash Users') }}</h3>
        </div>
    </div>
</div>
@can('user_show')
<div class="row">
    <!-- data table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">{{ __('Totals Users : ') }}{{ $user_count }}</h3>
                <div class="data-tables">
                    <table id="dataTable" class="text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>{{ __('Id') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Create_At') }}</th>
                                @can('user_delete')

                                @endcan
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
                                    <img src="{{ Avatar::create($user->name)->setDimension(30)->setFontSize(15)->toBase64() }}" alt="{{ $user->image }}">

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
                                    @can('user_delete')
                                    <a href="{{ route('backend.users.restore', $user->id) }}" class="btn btn-outline-success">{{ __('Restore') }}</a>
                                    <form class="d-inline" method="POST" action="{{ route('backend.users.permanent.delete', $user->id ) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="my-1 mx-1 btn btn-outline-danger permanent_delete">{{ __('Permanent Delete') }}</button>
                                    </form>
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
@endcan
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }} "/>
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="{{ asset('backend/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        //secrch category
        $('.search').select2();
        //switch alert

    });
    //alert message
    $('permanent_delete').on('click', function(){
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
