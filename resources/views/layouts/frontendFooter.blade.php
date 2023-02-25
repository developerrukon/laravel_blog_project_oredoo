<div class="footer">
    <div class="footer-area">
        <div class="footer-area-content">
            <div class="container">
                <div class="row ">
                    <div class="col-md-3">
                        <div class="menu">
                            <h6>Menu</h6>
                            <ul>
                                <li><a href="{{ route('frontend.index') }}">Homepage</a></li>
                                <li><a href="{{ route('frontend.about') }}">about us</a></li>
                                <li><a href="{{ route('frontend.contact') }}">contact us</a></li>
                                <li><a href="">privarcy</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--newslatter-->
                    <div class="col-md-6">
                        <div class="newslettre">
                            <div class="newslettre-info">
                                <h3>About Us</h3>
                                @if ($setting)
                                <p>{{ $setting->description }}.</p>
                                @endif

                            </div>

                        </div>
                    </div>
                    <!--/-->
                    <div class="col-md-3">
                        <div class="menu">
                            <h6>Follow us</h6>
                            <ul>
                                @if($setting->facebook)<li><a target="_blank" href="{{ $setting->facebook }}">facebook</a></li>@endif
                                @if($setting->instagram)<li><a target="_blank" href="{{ $setting->instagram }}">instagram</a></li>@endif
                                @if($setting->youtube)<li><a target="_blank" href="{{ $setting->youtube }}">youtube</a></li>@endif
                                @if($setting->twitter)<li><a target="_blank" href="{{ $setting->twitter }}">twitter</a></li>@endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-copyright-->
        <div class="footer-area-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright">
                            <p>{{ $setting->copyright }} | <a style="color:rgba(255, 0, 4, 0.925)" target="_blank" href="{{ $setting->facebook }}">Rukon</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/-->
    </div>
</div>
