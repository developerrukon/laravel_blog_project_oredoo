@extends('layouts.backendMaster')
@section('title', 'Settings')
@section('contact')
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Settings') }}</li>
                </ol>
            </nav>
            <h2 class="m-0">{{ __('Settings') }}</h2>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Settings</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("backend.setting.update") }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <!-- Name input -->
                            <div class="form-group">
                                <label class="form-label"  for="form4Example1">Site Name</label>

                                <input type="text" name="website_name" placeholder="site name" id="form4Example1" class="form-control" value="{{ $settings->website_name }}"/>
                            </div>
                            <!-- socical input -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="form4Example1">Facebook</label>
                                        <input type="facebook" name='facebook' placeholder="facebook url" id="form4Example1" class="form-control" value="{{ $settings->facebook }}"/>
                                        </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="form4Example1">Twitter</label>
                                        <input type="twitter" name="twitter" placeholder="twitter url" id="form4Example1" class="form-control"value="{{ $settings->twitter }}" />
                                        </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="form4Example1">Instagram</label>
                                        <input type="instagram" name="instagram" placeholder="instagram url" id="form4Example1" class="form-control" value="{{ $settings->instagram }}" />
                                        </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="form4Example1">Youtube</label>
                                        <input type="youtube" name="youtube" placeholder="youtube url" id="form4Example1" class="form-control" value="{{ $settings->youtube }}"/>
                                        </div>
                                </div>
                            </div>
                            <!-- footer input -->
                            <div class="form-group">
                                <label class="form-label" for="form4Example1">Footer Text</label>
                                <input type="text"  name="copyright" placeholder="copyright" id="form4Example2" class="form-control" value="{{ $settings->copyright }}"/>
                            </div>

                            <!-- Email input -->
                            <div class="form-group">
                                <label class="form-label" for="form4Example1">Site Logo</label>
                                <input type="file" name="logo" id="form4Example2" class="w-100"/>
                            </div>

                            <!-- Message input -->
                            <div class="form-group">
                                <label class="form-label" for="form4Example3">Site Description</label>
                                <textarea class="form-control" name="description" placeholder="site description" id="form4Example3" rows="4">{{ $settings->description }}</textarea>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
