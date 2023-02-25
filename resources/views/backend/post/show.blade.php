@extends('layouts.backendMaster')
@section('title', 'View Post')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('View Post') }}</li>
                    </ol>
                </nav>
                <h2 class="m-0">{{ __('View Post') }}</h2>
            </div>
        </div>
    </div>
@can('post_author_details')

<div class="row">
    <!--all Post -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered  table-hover">
                    <tbody>
                        <tr>
                            <td>{{ __('Id') }}</td>
                            <td>:</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Post Image') }}</td>
                            <td>:</td>
                            <td>
                                <img width="200" src="{{ asset('storage/post/' . $post->image) }}" alt="{{ $post->title }}">
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Post Title') }}</td>
                            <td>:</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Description') }}</td>
                            <td>:</td>
                            <td>
                                {!! $post->description !!}
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Post Category') }}</td>
                            <td>:</td>
                            <td>
                                @foreach ($post->categories as $category)
                                <span class="badge badge-info">{{ $category->name }},</span>
                                @endforeach
                            </td>

                        </tr>
                        <tr>
                            <td>{{ __('Tags') }}</td>
                            <td>:</td>
                            <td>
                                @foreach ($post->tags as $tag)
                                <span class="badge badge-info">{{ $tag->tag_name }},</span>
                                @endforeach
                            </td>

                        </tr>
                        <tr>
                            <td>{{ __('Post Status') }}</td>
                            <td>:</td>
                            <td>{{ $post->status }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Post View') }}</td>
                            <td>:</td>
                            <td>{{ $post->post_view }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Update-date') }}</td>
                            <td>:</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                        </tr>

                        <tr>
                            <td>{{ __('Author') }}</td>
                            <td>:</td>
                            <td>{{ $post->user->name }}</td>

                        </tr>
                        <tr>
                            <td>{{ __('Action') }}</td>
                            <td>:</td>
                            @can('post_show')
                            <td>
                                <a href="{{ route('backend.post.index') }}"
                                    class="btn btn-success my-1 mx-1">{{ __('Back') }}</a>
                            </td>
                            @endcan
                            @can('post_edit')
                            <td>
                                <a href="{{ route('backend.post.edit', $post->id) }}"
                                    class="btn btn-info my-1 mx-1">{{ __('Edit') }}</a>
                            </td>
                            @endcan


                        </tr>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>
@endcan
@endsection
