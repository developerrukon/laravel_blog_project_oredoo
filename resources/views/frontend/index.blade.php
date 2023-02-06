@extends('layouts.frontendMaster')
@section('title', 'Home')
@section('content')
     <section class="blog blog-home4 d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel">
                        <!--slider start-->
                        @foreach ($post_sliders as $slider)
                        <div class="blog-item" style="background-image: url('{{ asset('storage/post/'.$slider->image) }}')">
                            <div class="blog-banner">
                                <div class="post-overly">
                                    <div class="post-overly-content">
                                       <div class="entry-cat">
                                        @foreach ($slider->categories as $categorie)
                                        <a href="{" class="category-style-2">{{ $categorie->name }}</a>
                                         @endforeach
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="{{ route('frontend.post.singlePost', $slider->slug) }}">{{ Str::limit($slider->title, 70, '...') }}</a>
                                        </h2>
                                        <ul class="entry-meta">
                                            <li class="post-author"> <a href="{{ route('frontend.author.post', $slider->user_id) }}">{{ $slider->user->name }}</a></li>
                                            <li class="post-date"> <span class="line"></span>{{ $slider->created_at->format('d/m/Y')}}</li>
                                            <li class="post-timeread"> <span class="line"></span> {{ $slider->post_view }} mins read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!--slider-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top categories-->
    <div class="categories">
        <div class="container-fluid">
            <div class="categories-area">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="categories-items">

                        @foreach ($categorys as $category)
                        <a class="category-item" href="{{ route('frontend.category.archive',$category->slug) }}">
                            <div class="image">
                            @if ($category->image)
                            <img src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->name }}">
                            @else
                            <img src="{{ Avatar::create($category->name)->setShape('square') }}" alt="{{ $category->name }}">
                            @endif
                            </div>
                            <p>{{ $category->name }}<span>{{ $category->posts_count }}</span> </p>
                        </a>

                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent articles-->
    <section class="section-feature-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                        <div class="section-title">
                            <h3>recent Articles </h3>
                            <p>Discover the most outstanding articles in all topics of life.</p>
                        </div>

                        <!--post start-->
                        @foreach ($posts as $post)
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="{{ route('frontend.post.singlePost', $post->slug) }}">
                                    <img src="{{ asset('storage/post/' . $post->image) }}"  alt="{{ $post->title }}">                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        @foreach ($post->categories as $categorie)
                                        <a href="" class="category-style-1">{{ $categorie->name }}</a>
                                        @endforeach
                                    </li>
                                    <li class="post-date"> <span class="line"></span>{{ $post->created_at->format('d/m/Y')}}</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="{{ route('frontend.post.singlePost', $post->slug) }}">{{ Str::limit($post->title, 60, '...') }}</a>
                                </h5>

                                <div class="post-btn">
                                    <a href="{{ route('frontend.post.singlePost', $post->slug) }}" class="btn-read-more">{{ __('Continue Reading ') }}<i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!--post end-->
                        <!--pagination-->
                        <div class="my-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>

                <!--Sidebar-->
                <div class="col-lg-4 oredoo-sidebar">
                    <div class="theiaStickySidebar">
                        <div class="sidebar">
                            <!--search-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Search</h5>
                                </div>
                                <div class=" widget-search">
                                    <form action="https://oredoo.assiagroupe.net/Oredoo/search.html">
                                        <input type="search" id="gsearch" name="gsearch" placeholder="Search ....">
                                        <a href="search.html" class="btn-submit"><i class="las la-search"></i></a>
                                    </form>
                                </div>
                            </div>

                            <!--popular-posts-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>{{ __('popular Posts') }}</h5>
                                </div>

                                <ul class="widget-popular-posts">
                                     <!--post start-->
                                     @foreach ($popularPosts as $key => $popularPost)
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="{{ route('frontend.post.singlePost', $popularPost->slug) }}">
                                                <img src="{{ asset('storage/post/'.$popularPost->image) }}" alt="{{ $popularPost->title }}">
                                                <small class="nb">{{ +$key }}</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="{{ route('frontend.post.singlePost', $popularPost->slug) }}">{{ Str::limit($popularPost->title, 40, '...') }}</a>
                                            </p>
                                            <small> <span class="slash"></span>{{ $popularPost->created_at->format('d/m/Y') }}</small>
                                        </div>
                                    </li>
                                    @endforeach
                                    <!--post end-->
                                </ul>
                            </div>


                            <!--stay connected-->
                            <div class="widget ">
                                <div class="widget-title">
                                    <h5>Stay connected</h5>
                                </div>

                                <div class="widget-stay-connected">
                                    <div class="list">
                                        @if ($setting->facebook)
                                        <a target="_blank" href="{{$setting->facebook}}">
                                        <div class="item color-facebook">

                                            <p><i class="fab fa-facebook"></i> Facebook</p>
                                        </div>
                                        </a>
                                        @endif
                                        @if ($setting->instagram)
                                        <a target="_blank" href="{{$setting->instagram}}">
                                        <div class="item color-instagram">

                                            <p><i class="fab fa-instagram"></i> Instagram</p>
                                        </div>
                                        </a>
                                        @endif
                                        @if ($setting->twitter)
                                        <a target="_blank" href="{{$setting->twitter}}">
                                        <div class="item color-twitter">

                                            <p> <i class="fab fa-twitter"></i> Twitter</p>
                                        </div>
                                        </a>
                                        @endif

                                        @if ($setting->youtube)
                                        <a target="_blank" href="{{$setting->youtube}}">
                                        <div class="item color-youtube">

                                            <p><i class="fab fa-youtube"></i> Youtube</p>
                                        </div>
                                         </a>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <!--Tags-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Tags</h5>
                                </div>
                                <div class="widget-tags">
                                    <ul class="list-inline">

                                        @foreach ( $tags as $tag)
                                        <li>
                                            <a href="{{ route('frontend.post.tag',$tag->tag_slug) }}">{{ $tag->tag_name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/-->
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
