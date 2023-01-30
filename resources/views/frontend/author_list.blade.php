@extends('layouts.frontendMaster')
@section('title', 'Author List')
@section('content')
<!--section-heading-->
<div class="section-heading " >
    <div class="container-fluid">
        <div class="section-heading-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading-2-title ">
                        <h1>All Authors</h1>
                        <p class="links"><a href="{{ route('frontend.index') }}">Home <i class="las la-angle-right"></i></a> All Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--blog-layout-1-->
<div class="authors ">
    <div class="container-fluid">
        <div class="authors-area">
            <div class="row">
                {{-- all users list --}}
                @forelse ($author_list as $post)
                <div class="col-md-6 ">
                    <div class="authors-single">
                        <div class="authors-single-image">
                            <a href="author.html">
                                @if ($post->user->image)
                                <img src="{{ asset('storage/users/'.$post->user->image) }}" alt="{{ $post->user->name }}">

                                @else
                                <img src="{{ Avatar::create($post->user->name)->setDimension(150)->setFontSize(35)->toBase64() }}" alt="{{ $post->user->name }}">

                                @endif
                            </a>
                        </div>
                        <div class="authors-single-content ">
                            <div class="left">
                                <h6> <a href="author.html">{{ $post->user->name }}</a></h6>
                                <p >22 articles</p>
                            </div>
                            <div class="right">
                                <div class="more-icon">
                                    <i class="las la-angle-double-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</div>


<!--pagination-->
<div class="pagination">
    <div class="container-fluid">
        <div class="pagination-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-list">
                        <ul class="list-inline">
                            <li><a href="#" ><i class="las la-arrow-left"></i></a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#" ><i class="las la-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
