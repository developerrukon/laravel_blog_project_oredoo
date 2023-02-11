@extends('layouts.backendMaster')
@section('title', "Post Tags")
@section('contact')
<div class="container-fluid page__heading-container">
{{--  breadcrumb email  --}}
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Tags') }}</li>
                </ol>
            </nav>
            <h3 class="m-0">{{ __('All Tags') }}</h3>
        </div>
    </div>
</div>
{{--  input form --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('Totals Tag: ') }}{{ count($tags) }}</h4>

            </div>

            <div class="card-body">
                                    {{--  toggle button  start--}}
                                    <nav>
                                        <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#active"
                                                type="button">Active</button>
                                            <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#trash"
                                                type="button">Trash</button>
                                        </div>
                                    </nav>
                                    {{--  toggle button  start--}}
                                    <div class="tab-content" id="nav-tabContent">
                                        <!--active category start-->
                                        <div class="tab-pane  show active" id="active">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Tag Name</th>
                                                    <th>Tag Slug</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach ($tags as $sl => $tag )
                                                <tr>
                                                    <td>{{ $sl+1 }}</th>
                                                    <td>{{ $tag->tag_name }}</th>
                                                    <td>{{ $tag->tag_slug }}</th>
                                                    <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-info btn-lg dropdown-toggle" type="button" data-toggle="dropdown">

                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if (Route::is('backend.tag.index') == true)
                                                            <a href="{{ route('backend.tag.edit', $tag->id) }}"
                                                                class="btn btn-outline-primary">Edit</a>
                                                            @else

                                                            @endif
                                                                <form action="{{ route('backend.tag.destroy', $tag->id) }}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                                </form>
                                                        </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                                @endforeach

                                        </table>
                                            <div class="pagination justify-content-center">
                                                {{ $tags->links() }}
                                            </div>
                                        </div>
                                        <!--active category end-->

                                        <!--trash category start-->
                                        <div class="tab-pane " id="trash">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Tag Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach ($tags as $sl => $tag )
                                                <tr>
                                                    <td>{{ $sl+1 }}</th>
                                                    <td>{{ $tag->tag_name }}</th>
                                                    <td>
                                                    <form action="{{ route('backend.tag.destroy', $tag->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                    </th>
                                                </tr>
                                                @endforeach

                                        </table>

                                        <div class="pagination justify-content-center">
                                                {{ $tags->links() }}
                                            </div>
                                        </div>
                                        <!--trash category end-->
                                    </div>

            </div>
        </div>
    </div>
    @if (Route::is('backend.tag.edit') == true)
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">{{ __('Update Tag Name') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('backend.tag.update', $edit_tag->id) }}">
                    @csrf
                        {{--  input name  --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tag Name') }}</label>

                        <div class="col-md-6">
                            <input id="tag_name" type="text" class="form-control" name="tag_name" value="{{ $edit_tag->tag_name }}"/>

                            @error('tag_name')
                                <span >
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Tag') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">{{ __('Add Tag Name') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('backend.tag.store') }}">
                    @csrf
                        {{--  input name  --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tag Name') }}</label>

                        <div class="col-md-6">
                            <input id="tag_name" type="text" class="form-control" placeholder="tag name" name="tag_name" value="{{ old('tag_name') }}"/>

                            @error('tag_name')
                                <span >
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create Tag') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

</div>

@endsection
