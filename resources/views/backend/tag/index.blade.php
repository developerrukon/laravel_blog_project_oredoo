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
                                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#deactive"
                                                type="button">Deactive</button>
                                            <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#trash"
                                                type="button">Trash</button>
                                        </div>
                                    </nav>
                                    {{--  toggle button  start--}}
                                    <div class="tab-content" id="nav-tabContent">
                                        <!--active category start-->
                                        <div class="tab-pane  show active" id="active">
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
                                        <!--active category end-->
                                        <!--deactive category start-->
                                        <!--deactive category end-->
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
                            <input id="tag_name" type="text" class="form-control" name="tag_name" value="{{ old('tag_name') }}"/>

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
</div>

@endsection
