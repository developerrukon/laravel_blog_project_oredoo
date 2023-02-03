 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
 <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
 <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>


 <!-- JS Plugins  -->
 <script src="{{ asset('frontend/js/theia-sticky-sidebar.js') }}"></script>
 <script src="{{ asset('frontend/js/ajax-contact.js') }}"></script>
 <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('frontend/js/switch.js') }}"></script>
 <script src="{{ asset('frontend/js/jquery.marquee.js') }}"></script>
 <!-- JS main  -->
 <script src="{{ asset('frontend/js/main.js') }}"></script>
 @yield('js')
 @include('flashmessage')
