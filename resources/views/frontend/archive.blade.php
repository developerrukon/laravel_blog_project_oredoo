@extends('layouts.frontendapp')
@section('title', 'Home')
@section('content')
    <!--section-heading-->
    <div class="section-heading ">
        <div class="container-fluid">
            <div class="section-heading-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading-2-title">
                            <h1>{{ $catPost->name }}</h1>
                            <p class="links"><a href="{{ route('frontend.index') }}">Home <i class="las la-angle-right"></i></a> {{ $catPost->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Blog Layout-2-->
    <section class="blog-layout-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--post start-->
                    @foreach ($catPost->posts as $post)
                    <div class="post-list post-list-style2">
                        <div class="post-list-image">
                            <a href="{{ route('frontend.post.singlePost', $post->slug) }}">
                                <img src="{{ asset('storage/post/'.$post->image) }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <h3 class="entry-title">
                                <a href="{{ route('frontend.post.singlePost', $post->slug) }}">{{ Str::limit($post->title, 50, '...') }}</a>
                            </h3>
                            <ul class="entry-meta">
                                <li class="post-author-img">
                                    @if ($post->user->image)
                                    <img width="40"src="{{ asset('storage/users/'.$post->user->image) }}" alt="{{ $post->user->name }}">
                                    @else
                                    <img src="{{ Avatar::create($post->user->name)->setDimension(30)->setFontSize(15)->toBase64() }}" alt="">
                                    @endif
                                </li>
                                <li class="post-author"> <a href="{{ route('frontend.author.post', $post->user_id) }}">{{ $post->user->name }}</a></li>
                                <li class="entry-cat">
                                    @foreach ($post->categories as $categorie)
                                    <a href="{{ route('frontend.category.archive',$categorie->slug) }}" class="category-style-1 "> <span
                                        class="line"></span>{{ $categorie->name }}</a>
                                    @endforeach
                                </li>
                                <li class="post-date"> <span class="line"></span> {{ $post->created_at->diffForHumans()}}</li>
                            </ul>
                            <div class="post-exerpt">
                                {!! Str::limit($post->description, 110, '...') !!}</p>
                            </div>
                            <div class="post-btn">
                                <a href="{{ route('frontend.post.singlePost', $post->slug) }}" class="btn-read-more">{{ __('Continue Reading') }} <i
                                        class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--post end-->

                </div>
            </div>
                    <!--pagination-->
        <div class="my-4">
            {{ $catPost->posts->links() }}
        </div>
        </div>
    </section>






@endsection
@section('css')
    <style>
        .page-item {
            background-color: rgb(255, 255, 255);
            border: 1px solid #525252;
            color: #ffffff;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #000000;
            border-color: #606060;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0.8rem 1.2rem;
            line-height: 1.25;
            color: #000000;
            background-color: rgb(255, 255, 255);
            border: 1px solid #ffffff;
        }
    </style>
@endsection
