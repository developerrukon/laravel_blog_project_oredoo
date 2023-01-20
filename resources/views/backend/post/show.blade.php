@extends('layouts.backendApp')
@section('title', 'View Post')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('View Post') }}</li>
                    </ol>
                </nav>
                <h1 class="m-0">{{ __('View Post') }}</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <!--all Post -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered  table-hover">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <th>:</th>
                                <td>{{ $post->id }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <th>:</th>
                                <td>
                                    <img width="200" src="{{ asset('storage/post/' . $post->image) }}" alt="{{ $post->title }}">
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <th>:</th>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <th>:</th>
                                <td>
                                    {!! $post->description !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>:</td>
                                <td>
                                    @foreach ($post->categories as $category)
                                    <span class="badge badge-info">{{ $category->name }},</span>
                                    @endforeach
                                </td>

                            </tr>
                            <tr>
                                <th>Status</th>
                                <th>:</th>
                                <td>{{ $post->status }}</td>
                            </tr>
                            <tr>
                                <th>Update-date</th>
                                <th>:</th>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <th>Update-date</th>
                                <th>:</th>
                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <td>Action</td>
                                <td>:</td>
                                <td>
                                    <a href="{{ route('backend.post.edit', $post->id) }}"
                                        class="btn btn-info my-1 mx-1">Edit</a>
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
