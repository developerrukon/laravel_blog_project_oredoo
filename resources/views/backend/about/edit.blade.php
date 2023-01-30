@extends('layouts.backendMaster')
@section('title', 'About Us')
@section('contact')
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('About Us') }}</li>
                </ol>
            </nav>
            <h2 class="m-0">{{ __('About') }}</h2>
        </div>
    </div>

        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __("About Us") }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("backend.about.update") }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <!-- Email input -->
                            <div class="form-group">
                                <label class="form-label" for="form4Example1">{{ __('About Image') }}</label>
                                <input type="file" name="image" id="form4Example2" class="w-100"/>
                                <small class="form-text text-muted">please!upload max 2mb & iamge type jpg, jpeg, png, or svg</small>
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-1">
                                    <img width="80" src="{{ asset('storage/about/'.$about->image) }}" alt="{{ $about->image }}">
                                </div>
                            </div>

                            <!-- description input -->
                            <div class="form-group">
                            <label class="form-label">Post Body:</label>
                            <textarea name="description" id='summernote' class="form-control">{{ $about->description }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">please.! description max 20k character</small>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css"/>

@endsection
@section('js')
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
