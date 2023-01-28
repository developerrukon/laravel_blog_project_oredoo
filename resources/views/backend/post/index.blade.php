@extends('layouts.backendMaster')
@section('title', 'Post')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post</li>
                    </ol>
                </nav>
                <h1 class="m-0">Post</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <!--all Post -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
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

                    <div class="tab-content" id="nav-tabContent">
                        <!--active Post start-->
                        <div class="tab-pane  show active" id="active">

                            <div class="pagination justify-content-center">
                                <table class="table table-bordered  table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Post View</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Create-date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as  $sl => $post)
                                            <tr>

                                                <td>{{ $sl }}</td>
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
                                                    @php
                                                        $post_tags = explode(',',$post->tags);

                                                    @endphp
                                                    @foreach ($post_tags as $tag_id)
                                                        @php
                                                            $tag_table = App\Models\Tag::where('id', $tag_id)->get();
                                                        @endphp
                                                        @foreach ($tag_table as $tag)
                                                        <span class="badge bg-info">{{ $tag->tag_name }}</span>

                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td>{{ $post->status }}</td>
                                                {{--  post status  --}}
                                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                                {{--  post action  --}}
                                                <td>

                                                    <div class="btn-group">
                                                        <button class="btn btn-info btn-lg dropdown-toggle" type="button" data-toggle="dropdown">

                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('backend.post.show', $post->id) }}"
                                                                class="btn btn-outline-primary">View</a>
                                                            <a href="{{ route('backend.post.edit', $post->id) }}"
                                                                class="btn btn-outline-success my-1 mx-1">Edit</a>
                                                                <form class="d-inline" action="{{ route('backend.post.destroy', $post->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="'submit" class="my-1 mx-1 btn btn-outline-danger">Delete</button>
                                                                </form>
                                                        </div>
                                                      </div>

                                                </td>

                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="5">Data Not Found!</td>
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
                            Deactive
                        </div>
                        <!--deactive Post end-->
                        <!--trash Post start-->
                        <div class="tab-pane " id="trash">

                            <div class="pagination justify-content-center">
                                <table class="table table-bordered  table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Post View</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Create-date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($allTrashPost as  $sl => $trashPost)
                                            <tr>

                                                <td>{{ $sl }}</td>
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

                                                {{--  tag  --}}
                                                <td>
                                                    @php
                                                        $post_tags = explode(',',$post->tags);

                                                    @endphp
                                                    @foreach ($post_tags as $tag_id)
                                                        @php
                                                            $tag_table = App\Models\Tag::where('id', $tag_id)->get();
                                                        @endphp
                                                        @foreach ($tag_table as $tag)
                                                        <span class="badge bg-info">{{ $tag->tag_name }}</span>

                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                {{--  post view  --}}
                                                <td>{{ $trashPost->post_view }}</td>
                                                    {{--  post tags  --}}
                                                <td>
                                                    @php
                                                        $post_tags = explode(',',$post->tags);

                                                    @endphp
                                                    @foreach ($post_tags as $tag_id)
                                                        @php
                                                            $tag_table = App\Models\Tag::where('id', $tag_id)->get();
                                                        @endphp
                                                        @foreach ($tag_table as $tag)
                                                        <span class="badge bg-info">{{ $tag->tag_name }}</span>

                                                        @endforeach
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
                                                            <a href="{{ route('backend.post.restore', $trashPost->id)}}" class="btn btn-outline-warning">Restore</a>
                                                            <form class="d-inline" action="{{ route('backend.post.permanent.delete', $trashPost->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="'submit" class="my-1 mx-1 btn btn-outline-danger">Permanent Delete</button>
                                                            </form>
                                                        </div>
                                                      </div>

                                                </td>

                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="5">Data Not Found!</td>
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
@endsection
