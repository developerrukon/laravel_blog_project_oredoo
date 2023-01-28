@extends('layouts.backendMaster')
@section('title', 'Post Edit')
@section('contact')
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Post Edit') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('Post Edit') }}</h1>
        </div>
    </div>

    <form action="{{ route('backend.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="py-3 mx-1">
                        <div class="card-hader text-center">
                            <h3>{{ __('Post Edit') }}</h3>
                        </div>
                        <div class="card-body">
                                <!--name input-->
                                <div class="form-group mb-1">
                                    <label class="form-label">Post Title<span class="text-danger">*</span></label>
                                    {{ $post->id }}
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="enter name" value="{{ $post->title }}" />
                                </div>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">please.! name max 200 character</small>
                                <!--description input-->
                                <div class="form-group">
                                    <label class="form-label">Post Body:</label>
                                    <textarea name="description" id='summernote' class="form-control">{{ $post->description }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">please.! description max 20k character</small>
                                </div>
                                <div class="form-group">
                                    @php
                                        $explode_tag = explode(',',$post->tags);
                                    @endphp
                                    @foreach ($tags as $tag)
                                    <label class="col-sm-2 bg-light py-2 mx-2 border">

                                        <input   type="checkbox"
                                        @foreach ($explode_tag as $tag_id)
                                            {{ $tag_id==$tag->id? 'checked': '' }}
                                        @endforeach

                                        name="tags[]" value="{{ $tag->id }}"/>
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
                                <label class="form-label">Category Select:</label>
                                <select name='categories[]' class="form-control categories" multiple='multiple'>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"
                                            {{ in_array($categorie->id, $post->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $categorie->name }}</option>
                                    @endforeach

                                </select>
                                @error('categories')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">choose you prent category.!</small>
                                </div>
                                <!--Choose select-->
                                <div class="form-group mt-2">
                                    <label class="form-label">Status Select:</label>
                                    <select name='status' class="form-control">
                                            <option value="publish" {{ $post->status == 'publish' ? 'selected' : '' }}>publish</option>
                                            <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>draft</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">choose you post status!</small>
                                </div>
                                <!--image upload-->
                                <div class="form-group">
                                    <label class="form-label">Post Image</label>
                                    <input type="file" name="image" />
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">please!upload max 2mb & image size mix width 1100 px hight 600 px & iamge type jpg, jpeg, png,gif or svg</small>
                                    <div>
                                        <img src="{{ asset('storage/post/'.$post->image) }}" alt="" width="80">
                                    </div>

                                </div>
                                <!--submit button-->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create Post<i class="material-icons">add</i></button>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
    $('#summernote').summernote({
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

    </script>

@endsection
