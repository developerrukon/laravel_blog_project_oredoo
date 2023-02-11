@extends('layouts.frontendMaster')
@section('title', 'Home')
@section('content')
    <!--post-single-->
    <section class="post-single">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-12">
                    <!--post-single-image-->
                    <div class="post-single-image">
                        <img src="{{ asset('storage/post/' . $post->image) }}" alt="{{ $post->title }}">
                    </div>

                    <div class="post-single-body">
                        <!--post-single-title-->
                        <div class="post-single-title">
                            <h2>{{ $post->title }}</h2>
                            <ul class="entry-meta">
                                <li class="post-author-img">
                                    @if ($post->user->image)
                                        <img width="40"src="{{ asset('storage/post/' . $post->user->image) }}"
                                            alt="{{ $post->user->name }}">
                                    @else
                                        <img src="{{ Avatar::create($post->user->name)->setDimension(30)->setFontSize(15)->toBase64() }}"
                                            alt="">
                                    @endif
                                </li>
                                <li class="post-author"> <a href="author.html">{{ $post->user->name }}</a></li>
                                <li class="entry-cat">
                                    @foreach ($post->categories as $categorie)
                                        <a href="{{ route('frontend.category.archive', $categorie->slug) }}"
                                            class="category-style-1 "> <span
                                                class="line"></span>{{ $categorie->name }}</a>
                                    @endforeach

                                </li>
                                <li class="post-date"> <span class="line"></span>{{ $post->created_at->format('d/m/Y') }}
                                </li>
                            </ul>

                        </div>

                        <!--post-single-content-->
                        <div class="post-single-content">
                            {!! $post->description !!}
                            <div class="image-groupe">
                                <div class="image">
                                    <img src="assets/img/blog/25.jpg" alt="">

                                </div>
                                <div class="image">
                                    <img src="assets/img/blog/21.jpg" alt="">

                                </div>
                            </div>
                        </div>

                        <!--post-single-bottom-->
                        <div class="post-single-bottom">
                            <div class="tags">
                                <p>Tags:</p>
                                <ul class="list-inline">
                                    @php
                                    $post_tags = explode(',',$post->tags);

                                   @endphp
                                    @if ($post_tags)

                                   @foreach ($post_tags as $tag_id)
                                       @php
                                           $tag_table = App\Models\Tag::where('id', $tag_id)->get();
                                       @endphp
                                       @foreach ($tag_table as $tag)
                                       <li>
                                        <a href="blog-layout-2.html">{{ $tag->tag_name }}</a>
                                        </li>

                                       @endforeach
                                   @endforeach

                                    @else
                                    No Tags Founds!
                                    @endif

                                </ul>
                            </div>
                            <div class="social-media">
                                <p>Share on :</p>
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
                                        <a href="#">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--post-single-author-->
                        <div class="post-single-author ">
                            <div class="authors-info">
                                <div class="image">
                                    <a href="author.html" class="image">
                                        <img src="assets/img/author/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4>{{ $post->user->name }}</h4>
                                    <p> Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni.
                                        Pede vidi condimentum et aenean hendrerit.
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
                                                <a href="#">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--post-single-comments-->
                        <div class="post-single-comments">
                            <!--Leave-comments-->
                            @auth
                                <div class="comments-form">
                                    <h4>{{ __('Leave a Reply') }}</h4>
                                    <!--form-->
                                    <form class="form " action="{{ route('frontend.comment.store') }}" method="POST"
                                        id="main_contact_form">
                                        @csrf
                                        <h5>{{ __('Comment') }}</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- hidden input start --}}
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <input type="hidden" class="parent_id" name="parent_id" value="">
                                                {{-- hidden input end --}}
                                                <div class="form-group">
                                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*"></textarea>
                                                    @error('message')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <button type="submit" name="submit" class="btn-custom">
                                                    {{ __('Send Comment') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/-->
                                </div>
                            @else
                                <div class="comments-form">
                                    <h4>{{ __('Leave a Reply: Please! Login. ') }}</h4>
                                </div>
                            @endauth
                            <!--Comments-->
                            <h4>Comments</h4>
                            <ul class="comments">
                                <!--parent  comment start-->
                                @forelse ($comments as $comment)
                                    <li class="comment-item pt-0">
                                        @if ($post->user->image)
                                            <img class="rounded-circle" width="40"src="{{ asset('storage/users/' . $post->user->image) }}"
                                                alt="{{ $post->user->name }}">
                                        @else
                                            <img src="{{ Avatar::create($comment->user->name)->setShape('square')->setDimension(30)->setFontSize(15)->toBase64() }}"
                                                alt="{{ $post->user->image }}">
                                        @endif
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <li><a href="#">{{ $comment->user->name }}</a> </li>
                                                    @if ($comment->user_id == $comment->post->user_id)
                                                    <li class="slash"></li>
                                                    <li>Author</li>
                                                    @endif
                                                    <li class="slash"></li>
                                                    <li>{{ $comment->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </div>
                                            {!! $comment->comments !!}</p>
                                            <a href="#message" class="btn_reply" data-prent='{{ $comment->id }}'><i
                                                    class="las la-reply"></i> Reply</a>
                                        </div>
                                    </li>
                                    {{-- replay comment start --}}

                                    <ul>
                                        @if ($comment->replys)
                                            @foreach ($comment->replys as $reply)
                                            <li class="comment-item ml-4 pt-0">
                                                @if ($post->user->image)
                                                    <img class="rounded-circle"src="{{ asset('storage/users/'.$reply->user->image) }}"alt="{{ $post->user->name }}">
                                                @else
                                                    <img src="{{ Avatar::create($reply->user->name)->setShape('square')->setDimension(30)->setFontSize(15)->toBase64() }}"
                                                        alt="">
                                                @endif
                                                <div class="content">
                                                    <div class="meta">
                                                        <ul class="list-inline">
                                                            <li><a href="#">{{ $reply->user->name }}</a> </li>
                                                            @if ($reply->user_id == $reply->post->user_id)
                                                            <li class="slash"></li>
                                                            <li>Author</li>
                                                            @endif
                                                            <li class="slash"></li>
                                                            <li>{{ $reply->created_at->diffForHumans() }}</li>
                                                        </ul>
                                                    </div>
                                                    {!! $reply->comments !!}</p>
                                                    <a href="#message" class="btn_reply" data-prent='{{ $reply->id }}'><i
                                                            class="las la-reply"></i> Reply</a>
                                                </div>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    {{-- replay comment end --}}

                                @empty
                                    No Comments
                                @endforelse
                                {{-- parent  comment end --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function() {
            $('.btn_reply').on('click', function() {
                var parent = $(this).data('prent');
                $('.parent_id').val(parent);
            })
        })
    </script>
@endsection
