@extends('layouts.backendApp')
@section('title', 'Update Role')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Update role') }}</li>
                    </ol>
                </nav>
                <h1 class="m-0">{{ __('Update role') }}</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Update role') }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.role.update', $role->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                        </div>
                        {{--  //all checkbox input  --}}
                        <div class="form-check">
                            <label class="bg-light m">
                            <input type="checkbox" value="" id="checkAll">
                                {{ __('All Permissions') }}
                            </label>
                            <hr/>
                        {{--  //checkbox input  --}}
                        </div>
                            @foreach ($permissions as $permission)
                                <label class="col-sm-2 bg-light py-2 mx-2 border">
                                    {{ $permission->name }}
                                    <input type="checkbox" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked': ''}} value="{{ $permission->id }}" />
                                </label>
                            @endforeach
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
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
    $('#checkAll').on('change', function(){
    if($(this).attr('checked')){
        $('input[type=checkbox]').attr('checked',true);
    }
    else{
        $('input[type=checkbox]').removeAttr('checked');
    }
});
</script>

@endsection
