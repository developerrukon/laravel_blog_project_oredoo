@extends('layouts.backendApp')
@section('title', 'Category')
@section('contact')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ $category->name }}</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Categoris
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>:</td>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>:</td>
                            <td>
                                @if ($category->image)
                                    <img width="60" src="{{ asset('storage/category/' . $category->image) }}"
                                        alt="{{ $category->name }}">
                                @else
                                    <img src="{{ Avatar::create($category->name)->setDimension(50)->setFontSize(18)->toBase64() }}"
                                        alt="{{ $category->name }}">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td> {{ $category->name }} </td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>:</td>
                            <td>{{ $category->slug }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>{{ $category->description }}</td>
                        </tr>
                        <tr>

                            <td>Count</td>
                            <td>:</td>
                            <td>{{ $category->posts_count }}</td>
                        </tr>
                    </tbody>

                </table>
                <div>
                    <a class="btn btn-primary" href="{{ route('backend.category.index') }}">All Categorys</a>

                </div>
            </div>
        </div>
    </div>
</div>
<h2>Category Related Post</h2>
<div class="card-columns">
    @foreach ($category->posts as $post)
    <a href="{{ route('backend.post.show', $post->id) }}">
        <div class="card">
            @if ($post->image)
            <img width="60"
                src="{{ asset('storage/category/' . $post->image) }}"
                alt="{{ $post->title }}">
            @else

            @endif
            <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ Str::limit($post->description, 100, '...') }}</p>
            <a href="" class="text-dark ">Read more</a>
            <p class="card-text "><small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small></p>
            </div>
        </div>
    </a>
    @endforeach
</div>

@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.css" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        //secrch category
        $('.search').select2();
        //switch alert

    });
    //alert
    $('.permanent_delete').on('click', function() {
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
