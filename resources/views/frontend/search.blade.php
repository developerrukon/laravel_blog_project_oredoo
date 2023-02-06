@extends('layouts.frontendMaster')
@section('title', 'Home')
@section('content')

    <!--section-heading-->
    <div class="section-heading " >
        <div class="container-fluid">
            <div class="section-heading-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading-2-title text-left">
                            <h2>Search resultats for : branding</h2>
                            <p class="desc">{{ count($posts) }} Articles were found for keyword  <strong>branding</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <!--blog-layout-1-->
    <div class="blog-search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                    @if ($posts)
                        @foreach ($posts as $post)
                        <!--Post1-->
                        <div class="post-list post-list-style1 pt-0">
                            <div class="post-list-image">
                                <a href="post-single.html">
                                    <img src="{{ asset('storage/post/' . $post->image) }}"  alt="{{ $post->title }}">                                </a>
                                </a>
                            </div>
                            <div class="post-list-title">
                                <div class="entry-title">
                                    <h5>
                                        <a href="post-single.html">{{ $post->title }}</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="post-list-category">
                                <div class="entry-cat">
                                    <a href="blog-layout-1.html" class="category-style-1">
                                        @foreach ($post->categories  as $categorie)
                                        {{ $categorie->name }}
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    @endif

                    <!--pagination-->
                    <div class="my-4">
                        {{ $posts->links() }}
                    </div>
                    <!--/-->
                    </div>
                </div>

                 <!--sidebar-->
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

                           <!--categories-->
                           <div class="widget ">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-categories">
                                @if ($categorys)
                                @foreach ($categorys as $category)
                                <a class="category-item" href="#">
                                    <div class="image">
                                        <img src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->name }}">
                                    </div>
                                    <p>{{ $category->name }}</p>
                                </a>
                                @endforeach
                                @endif

                            </div>
                        </div>
                            <!--newslatter-->
                            <div class="widget widget-newsletter">
                                <h5>Subscribe To Our Newsletter</h5>
                                <p>No spam, notifications only about new products, updates.</p>
                                <form action="#" class="newslettre-form">
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email Adress" required="required">
                                        </div>
                                        <button class="btn-custom" type="submit">
                                        Subscribe now

                                        </button>
                                    </div>
                                </form>
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
                                <div class="tags">
                                    <ul class="list-inline">
                                        @if ($tags)
                                        @foreach ($tags as $tag)
                                        <li>
                                            <a href="#">{{ $tag->tag_name }}</a>
                                        </li>
                                        @endforeach
                                        @endif

                                    </ul>
                                </div>
                            </div>

                            <!--popular-posts-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>popular Posts</h5>
                                </div>
                                <ul class="widget-popular-posts">
                                    @if ($popularPosts)
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
                                    @endif
                                </ul>
                            </div>

                            <!--Ads-->
                            <div class="widget">
                                <div class="widget-ads">
                                    <img src="assets/img/ads/ads2.jpg" alt="">
                                </div>
                            </div>
                            <!--/-->
                        </div>
                   </div>
                </div>
                <!--/-->
            </div>
        </div>
    </div>

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
