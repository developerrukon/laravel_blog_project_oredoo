@extends('layouts.backendMaster')
@section('title', 'All Roles')

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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('All Role') }}</li>
                    </ol>
                </nav>
                <h1 class="m-0">{{ __('All Role') }}</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="header-title">{{ __('All Role & permission') }}</h3>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width='5%'>{{ __('Sl') }}</th>
                                    <th width='10%'>{{ __('Name') }}</th>
                                    <th width='60%'>{{ __('Permissions') }}</th>
                                    <th width='10%'>{{ __('Created At') }}</th>
                                    <th width='15%'>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)

                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge bg-info mr-1">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $role->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('backend.role.edit', $role->id) }}" class="btn btn-outline-primary m-1">Edit</a>
                                        <form class="d-inline" method="POST" action="{{ route('backend.role.destroy', $role->id) }}">
                                            @csrf
                                            @method('DELETE')
                                              <input type="submit" class="btn btn-danger" value="Delete">
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
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script>
        if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }

</script>
@endsection
