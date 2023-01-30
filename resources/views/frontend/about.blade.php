@extends('layouts.frontendMaster')
@section('title', 'About Us')
@section('content')
 <!--section-heading-->
 <div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>About us</h1>
                         <p class="links"><a href="index.html">Home <i class="las la-angle-right"></i></a> pages</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>

<!--about-us-->
<section class="about-us">
    <div class="container-fluid">
        <div class="about-us-area">
            <div class="row ">
                <div class="col-lg-12 ">
                    <div class="image">
                        <img src="{{ asset('frontend/img/other/about-1.jpg') }}" alt="">
                    </div>

                    <div class="description">
                        <h3 >Thank you for checking out our blog website.</h3>
                        <p>orem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus, nisi vitae dapibus luctus, ante magna auctor magna, aliquet lacinia mauris magna a ligula. Nunc pharetra lectus eros, at blandit nisi iaculis vel. Donec vehicula eros nibh, in efficitur libero luctus vel. Nunc ac augue sapien. Praesent mollis dolor a velit porta, non egestas mauris facilisis. Aliquam fermentum mauris ex, et tristique tortor pellentesque.
                        </p>
                        <p>
                            Quisque venenatis tempor enim, quis mollis quam hendrerit ut. Praesent tempor, eros in sodales dignissim, augue tellus convallis eros, at ultrices nibh neque sed turpis. Cras consequat placerat enim in varius. Suspendisse sem neque, lobortis vitae tristique ac, sodales non eros. Aenean vel dictum sem. Nullam ultricies cursus nisl id.
                        </p>
                        <p>orem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus, nisi vitae dapibus luctus, ante magna auctor magna, aliquet lacinia mauris magna a ligula. Nunc pharetra lectus eros, at blandit nisi iaculis vel. Donec vehicula eros nibh, in efficitur libero luctus vel. Nunc ac augue sapien. Praesent mollis dolor a velit porta, non egestas mauris facilisis. Aliquam fermentum mauris ex, et tristique tortor pellentesque.
                            Quisque venenatis tempor enim, quis mollis quam hendrerit ut. Praesent tempor, eros in sodales dignissim, augue tellus convallis eros, at ultrices nibh neque sed turpis. Cras consequat placerat enim in varius. Suspendisse sem neque, lobortis vitae tristique ac, sodales non eros. Aenean vel dictum sem. Nullam ultricies cursus nisl id.
                        </p>

                        <a href="contact.html" class="btn-custom">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
