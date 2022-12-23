@extends('layouts.backendApp')
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
                                            <th>Slug</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Slider</th>
                                            <th>Post View</th>
                                            <th>Status</th>
                                            <th>Create-date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @forelse ($posts as $post)
                                            <tr>

                                                <td>{{ $no }}</td>
                                                <td>
                                                    @if ($post->image)
                                                        <img width="60"src="{{ asset('storage/post/' .$post->image) }}" alt="{{ $post->title }}">
                                                    @else
                                                        <img src="{{ Avatar::create($post->title)->setDimension(50)->setFontSize(18)->toBase64() }}"
                                                            alt="{{ $post->title }}">
                                                    @endif
                                                </td>
                                                <td>{{ Str::limit($post->title, 30, '...') }}</td>
                                                <td>{{ Str::limit($post->slug, 30, '...') }}</td>
                                                <td>
                                                    @foreach ($post->categories as $categorie)
                                                        <span class="badge bg-info">{{ $categorie->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ Str::limit($post->description, 50, '...') }}</td>
                                                <td>{{ $post->slider }}</td>
                                                <td>{{ $post->post_view }}</td>
                                                <td>{{ $post->status }}</td>
                                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('backend.post.show', $post->id) }}"
                                                        class="btn btn-outline-primary">View</a>
                                                    <a href="{{ route('backend.post.edit', $post->id) }}"
                                                        class="btn btn-outline-success my-1 mx-1">Edit</a>
                                                        <form class="d-inline" action="{{ route('backend.post.destroy', $post->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="'submit" class="my-1 mx-1 btn btn-outline-danger delete">Delete</button>
                                                        </form>
                                                </td>

                                            </tr>
                                            <?php $no++; ?>
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

                            </div>
                        </div>
                        <!--trash Post end-->
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/sweetalert2.min.css') }} "/>@endsection
@section('js')
<script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>
<script>
        //alert
        $('.delete').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit();
                }
            })
        });
    </script>

@endsection
