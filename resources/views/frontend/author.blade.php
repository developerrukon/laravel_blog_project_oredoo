@extends('layouts.frontendMaster')
@section('title', 'Author Post')
@section('content')

<!--author-->
<section class="authors">
    <div class="container-fluid">
        <div class="row">
            <!--author-image-->
            <div class="col-lg-12 col-md-12 ">
                    <div class="authors-info">
                    <div class="image">
                        <a href="author.html" class="image">
                            @if ($author_info->image)
                            <img src="{{ asset('storage/users/'.$author_info->image) }}" alt="{{ $author_info->name }}">
                            @else
                            <img src="{{ Avatar::create($author_info->name)->setShape('square') }}" alt="{{ $author_info->name }}">
                            @endif
                        </a>
                    </div>
                    <div class="content">
                        <h4 >{{ $author_info->name }}</h4>
                        <p>
                             Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
                            Quis sem justo nisi varius.
                        </p>
                        <div class="social-media">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" >
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" >
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/-->
            </div>
        </div>
    </div>
</section>

<!-- blog-author-->
<section class="blog-author mt-30">
    <div class="container-fluid">
        <div class="row">
            <!--content-->
            <div class="col-lg-8 oredoo-content">
                <div class="theiaStickySidebar">
                    @foreach ($user_posts as $post)
                    <!--post1-->
                    <div class="post-list post-list-style4 pt-0">
                        <div class="post-list-image">
                            <a href="{{ route('frontend.post.singlePost', $post->slug) }}">
                                <img src="{{ asset('storage/post/' . $post->image) }}"  alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <ul class="entry-meta">
                                <li class="entry-cat">
                                    @foreach ($post->categories as $categorie)
                                    <a href="{{ route('frontend.category.archive',$categorie->slug) }}" class="category-style-1">

                                        {{ $categorie->name }}-

                                    </a>
                                    @endforeach
                                </li>
                                <li class="post-date"> <span class="line"></span>{{  $post->created_at->format('d/m/Y')}}</li>
                            </ul>
                            <h5 class="entry-title">
                                <a href="{{ route('frontend.post.singlePost', $post->slug) }}">{{ Str::limit($post->title, 60, '...') }}</a>
                            </h5>
                            <div class="post-btn">
                                <a href="{{ route('frontend.post.singlePost', $post->slug) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <!--/-->

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

                        <!--categories-->
                        <div class="widget ">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-categories">
                                @foreach ($categorys as $category)
                                <a class="category-item" href="{{ route('frontend.category.archive', $category->slug) }}">
                                    <div class="image">
                                        <img src="{{ asset('storage/category/' . $category->image) }}"  alt="{{ $category->name }}">
                                    </div>

                                    <p>{{ $category->name }}</p>
                                </a>

                                @endforeach
                            </div>
                        </div>

                         <!--stay connected-->
                         <div class="widget ">
                            <div class="widget-title">
                                <h5>Stay connected</h5>
                            </div>

                            <div class="widget-stay-connected">
                                <div class="list">
                                    <div class="item color-facebook">
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <p>Facebook</p>
                                    </div>

                                    <div class="item color-instagram">
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <p>instagram</p>
                                    </div>

                                    <div class="item color-twitter">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <p>twitter</p>
                                    </div>

                                    <div class="item color-youtube">
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                        <p>Youtube</p>
                                    </div>
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
                                    @foreach ($tags as $tag)
                                    <li>
                                        <a href="#">{{ $tag->tag_name }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                             </div>
                         </div>

                         <!--popular-posts-->
                         <div class="widget">
                             <div class="widget-title">
                                 <h5>popular Posts</h5>
                             </div>

                             <ul class="widget-popular-posts">
                                <!--post1-->
                                @foreach ($popularPosts as $popularPost)
                                <li class="small-post">
                                    <div class="small-post-image">
                                         <a href="{{ route('frontend.post.singlePost', $popularPost->slug) }}">
                                            <img src="{{ asset('storage/post/'.$popularPost->image) }}" alt="{{ $popularPost->title }}">
                                            <small class="nb">{{ $popularPost->post_view }}</small>
                                         </a>
                                    </div>
                                    <div class="small-post-content">
                                         <p>
                                             <a href="{{ route('frontend.post.singlePost', $popularPost->slug) }}">{{ Str::limit($popularPost->title,  40, '...') }}</a>
                                         </p>
                                         <small> <span class="slash"></span>{{ $popularPost->created_at->format('d/m/Y') }}</small>
                                    </div>
                                 </li>

                                @endforeach
                             </ul>
                         </div>

                         <!--/-->
                     </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div>
</section>

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
