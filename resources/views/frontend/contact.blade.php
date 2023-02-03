@extends('layouts.frontendMaster')
@section('title', 'Contact')
@section('content')
 <!--section-heading-->
<div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>Contact us</h1>
                         <p class="links"><a href="index.html">Home <i class="las la-angle-right"></i></a> pages</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>

<!--contact-->
<section class="contact">
    <div class="container-fluid">
        <div class="contact-area">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-image">
                        <img src="{{ asset('frontend/img/other/contact.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h3>feel free to contact us</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate deserunt suscipit error deleniti
                            porro, pariatur voluptatem iste quos maxime aspernatur.</p>
                    </div>
                    <!--form-->
                    <form action="{{ route('backend.contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Name*" value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email*"  value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="subject" id="subject" class="form-control  @error('subject') is-invalid @enderror" placeholder="Subject*" value="{{ old('subject') }}">
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control  @error('description') is-invalid @enderror" placeholder="Message*">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-custom">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/sweetalert2.min.css') }} "/>
@endsection
@section('js')
<script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>
@endsection
