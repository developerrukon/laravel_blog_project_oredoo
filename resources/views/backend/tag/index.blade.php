@extends('layouts.backendApp')
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
            <h class="m-0">{{ __('Tags') }}</h>
        </div>
    </div>
</div>
{{--  input form --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>{{ __('All Tag') }}</h2>

            </div>

            <div class="card-body">
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"/>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
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
