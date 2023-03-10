@extends('layouts.backendMaster')
@section('title', 'Post')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Post') }}</li>
                    </ol>
                </nav>
                <h2 class="m-0">{{ __('Post') }}</h2>
            </div>
        </div>
    </div>

@can('post_show')
<div class="row">
    <!--all Post -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#active"
                            type="button">{{ __('Active') }}</button>
                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#deactive"
                            type="button">{{ __('Deactive') }}</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#trash"
                            type="button">{{ __('Trash') }}</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <!--active Post start-->
                    <div class="tab-pane  show active" id="active">
                        <div class="pagination justify-content-center">
                            <table class="table table-bordered  table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Author') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Post Vie') }}w</th>
                                        <th>{{ __('Tags') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Create-dat') }}e</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as  $sl => $post)
                                        <tr>

                                            <td>{{ $sl+1 }}</td>
                                            {{--  image  --}}
                                            <td>
                                                @if ($post->image)
                                                    <img width="60"src="{{ asset('storage/post/' .$post->image) }}" alt="{{ $post->title }}">
                                                @else
                                                    <img src="{{ Avatar::create($post->title)->setDimension(50)->setFontSize(18)->toBase64() }}"
                                                        alt="{{ $post->title }}">
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($post->title, 30, '...') }}</td>
                                            {{--  author name  --}}
                                            <td>{{ $post->user->name }}</td>
                                            {{--  post category  --}}
                                            <td>
                                                @foreach ($post->categories as $categorie)
                                                    <span class="badge bg-info">{{ $categorie->name }}</span>
                                                @endforeach
                                            </td>
                                            {{--  post view  --}}
                                            <td>{{ $post->post_view }}</td>
                                            {{--  post tags  --}}
                                            <td>
                                                @foreach ($post->tags as $tag)
                                                <span class="badge bg-info">{{ $tag->tag_name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($post->status == 'publish')
                                                <span class="badge bg-info">Publish</span>
                                                @else
                                                <span class="badge bg-warning">Duft</span>
                                                @endif
                                            </td>
                                            {{--  post status  --}}
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            {{--  post action  --}}
                                            <td>

                                                <div class="btn-group">
                                                    <button class="btn btn-info btn-lg dropdown-toggle" type="button" data-toggle="dropdown">

                                                    </button>
                                                    <div class="dropdown-menu">
                                                        {{-- view post --}}
                                                        @can('post_show')
                                                        <a href="{{ route('backend.post.show', $post->id) }}"
                                                            class="btn btn-outline-primary">View</a>
                                                        @endcan
                                                        {{-- edit post --}}
                                                        @can('post_edit')
                                                        <a href="{{ route('backend.post.edit', $post->id) }}"
                                                            class="btn btn-outline-success my-1 mx-1">Edit</a>
                                                        @endcan
                                                        {{-- delete post --}}
                                                            @can('post_delete')
                                                            <form class="d-inline" action="{{ route('backend.post.destroy', $post->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="'submit" class="my-1 mx-1 btn btn-outline-danger">Delete</button>
                                                            </form>
                                                            {{-- status post --}}
                                                            @if ($post->status == 'publish')
                                                            <a href="{{ route('backend.post.status', $post->id) }}"
                                                                class="btn btn-outline-warning my-1 mx-1">Draft</a>
                                                            @else
                                                            <a href="{{ route('backend.post.status', $post->id) }}"
                                                                class="btn btn-outline-info my-1 mx-1">Publish</a>
                                                            @endif
                                                            @endcan
                                                    </div>
                                                  </div>

                                            </td>

                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5">{{ __('Data Not Found!') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="pagination justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <!--active Post end-->
                    <!--deactive Post start-->
                    <div class="tab-pane " id="deactive">
                        <div class="pagination justify-content-center">
                            <table class="table table-bordered  table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Author') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Post Vie') }}w</th>
                                        <th>{{ __('Tags') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Create-dat') }}e</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($draft_post as  $sl => $post)
                                        <tr>

                                            <td>{{ $sl+1 }}</td>
                                            {{--  image  --}}
                                            <td>
                                                @if ($post->image)
                                                    <img width="60"src="{{ asset('storage/post/' .$post->image) }}" alt="{{ $post->title }}">
                                                @else
                                                    <img src="{{ Avatar::create($post->title)->setDimension(50)->setFontSize(18)->toBase64() }}"
                                                        alt="{{ $post->title }}">
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($post->title, 30, '...') }}</td>
                                            {{--  author name  --}}
                                            <td>{{ $post->user->name }}</td>
                                            {{--  post category  --}}
                                            <td>
                                                @foreach ($post->categories as $categorie)
                                                    <span class="badge bg-info">{{ $categorie->name }}</span>
                                                @endforeach
                                            </td>
                                            {{--  post view  --}}
                                            <td>{{ $post->post_view }}</td>
                                            {{--  post tags  --}}
                                            <td>
                                                @foreach ($post->tags as $tag)
                                                <span class="badge bg-info">{{ $tag->tag_name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($post->status == 'publish')
                                                <span class="badge bg-info">Publish</span>
                                                @else
                                                <span class="badge bg-warning">Duft</span>
                                                @endif
                                            </td>
                                            {{--  post status  --}}
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                            {{--  post action  --}}
                                            <td>

                                                <div class="btn-group">
                                                    <button class="btn btn-info btn-lg dropdown-toggle" type="button" data-toggle="dropdown">

                                                    </button>
                                                    <div class="dropdown-menu">
                                                            @can('post_edit')
                                                            <a href="{{ route('backend.post.status', $post->id) }}"
                                                                class="btn btn-outline-info my-1 mx-1">Publish</a>
                                                            @endcan
                                                    </div>
                                                  </div>

                                            </td>

                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5">{{ __('Data Not Found!') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="pagination justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <!--deactive Post end-->
                    <!--trash Post start-->
                    <div class="tab-pane " id="trash">

                        <div class="pagination justify-content-center">
                            <table class="table table-bordered  table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Author') }}</th>
                                        <th>{{ __('Post View') }}w</th>
                                        <th>{{ __('Tags') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Create-date') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($allTrashPost as  $sl => $trashPost)
                                        <tr>

                                            <td>{{ $sl+1 }}</td>
                                            {{--  image  --}}
                                            <td>
                                                @if ($trashPost->image)
                                                    <img width="60"src="{{ asset('storage/post/' .$trashPost->image) }}" alt="{{ $trashPost->title }}">
                                                @else
                                                    <img src="{{ Avatar::create($trashPost->title)->setDimension(50)->setFontSize(18)->toBase64() }}"
                                                        alt="{{ $trashPost->title }}">
                                                @endif
                                            </td>
                                            {{--  title  --}}
                                            <td>{{ Str::limit($trashPost->title, 30, '...') }}</td>
                                            <td>{{ $trashPost->user->name }}</td>
                                            {{--  post view  --}}
                                            <td>{{ $trashPost->post_view }}</td>
                                                {{--  post tags  --}}
                                            <td>
                                                @foreach ($trashPost->tags as $tag)
                                                <span class="badge bg-info">{{ $tag->tag_name }}</span>
                                                @endforeach
                                            </td>
                                            {{--  post status  --}}
                                            <td>{{ $trashPost->status }}</td>
                                            {{--  post delete  --}}
                                            <td>{{ $trashPost->deleted_at->diffForHumans() }}</td>
                                            {{--  post action  --}}
                                            <td>

                                                <div class="btn-group">
                                                    <button class="btn btn-info btn-lg dropdown-toggle" type="button" data-toggle="dropdown">

                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @can('post_delete')
                                                        <a href="{{ route('backend.post.restore', $trashPost->id)}}" class="btn btn-outline-warning">{{ __('Restore') }}</a>
                                                        <form class="d-inline" action="{{ route('backend.post.permanent.delete', $trashPost->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="'submit" class="my-1 mx-1 btn btn-outline-danger">{{ __('Permanent Delete') }}</button>
                                                        </form>
                                                        @endcan

                                                    </div>
                                                  </div>

                                            </td>

                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5">{{ __('Data Not Found!') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!--trash Post end-->
                </div>

            </div>
        </div>
    </div>

</div>
@endcan
@endsection
