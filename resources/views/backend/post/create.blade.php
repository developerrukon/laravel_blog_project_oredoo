@extends('layouts.backendMaster')
@section('title', 'Post-Create')
@section('contact')

<div class="page__heading d-flex align-items-end">
    <div class="flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Post Create') }}</li>
            </ol>
        </nav>
        <h2 class="m-0">{{ __('Post Create') }}</h2>
    </div>
</div>
@can('post_create')
<form action="{{ route('backend.post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="py-3 mx-1">
                    <div class="card-hader text-center">
                        <h3>{{ __('Post Create') }}</h3>
                    </div>
                    <div class="card-body">
                            <!--name input-->
                            <div class="form-group mb-1">
                                <label class="form-label">{{ __('Post Title') }}<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="post title" value="{{ old('title') }}" />
                                <small class="form-text text-muted">{{ __('please.! title max 500 character') }}</small>

                            </div>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!--description input-->
                            <div class="form-group">
                                <label class="form-label">Post Body:</label>
                                <textarea name="description" id='summernote' class="form-control" placeholder="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">{{ __('please.! description max 20k character') }}</small>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                @foreach ($tags as $tag)
                                <label class="col-sm-2 bg-light py-2 mx-2 border">

                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"/>
                                    {{ $tag->tag_name }}
                                </label>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="py-3 mx-1">
                    <div class="card-body">
                            <!--Choose select-->
                            <div class="form-group mt-2">
                            <label class="form-label">{{ __('Category Select:') }}</label>
                            <select name='categories[]' class="form-control categories" multiple='multiple'>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"> {{ $categorie->name }}</option>
                                @endforeach

                            </select>
                            @error('categories')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">{{ __('choose you prent category.!') }}</small>
                            </div>
                            <!--Choose select-->
                            <div class="form-group mt-2">
                                <label class="form-label">{{ __('Status Select:') }}</label>
                                <select name='status' class="form-control">
                                    @foreach (auth()->user()->roles as $role)
                                    @if ($role->name == 'user' || $role->name == 'author')
                                    <option value="draft">{{ __('draft') }}</option>
                                    @else
                                    <option value="publish">{{ __('publish') }}</option>
                                    <option value="draft">{{ __('draft') }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">{{ __('choose you post status!') }}</small>
                            </div>
                            <!--image upload-->
                            <div class="form-group">
                                <label class="form-label">{{ __('Post Image') }}</label>
                                <input type="file" name="image" />
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">{{ __('please!upload max 2mb & image size mix width 1100 px hight 600 px & iamge type jpg, jpeg, png,gif or svg') }}</small>

                            </div>
                            <!--submit button-->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Create Post') }}<i class="material-icons">add</i></button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endcan



@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }} "/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css"/>

@endsection
@section('js')
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.categories').select2();
    });
    $(document).ready(function() {
        $('#summernote').summernote();
      });
    </script>

@endsection
