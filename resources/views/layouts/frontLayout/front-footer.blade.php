<!--start of wpo-site-footer-section -->
<footer class="wpo-site-footer">
    <div class="wpo-upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget about-widget">
                        <div class="logo widget-title">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/backend-images/app-logo/'.$app_settings->app_logo_footer) }}" alt="logo-img" width="150">
                            </a>
                        </div>
                        <!-- <p>Mattis inelit neque quis donec eleifnd amet. Amet sed et cursus eu euismod. Egestas in morbi tristique.</p> -->

                        <div class="social-widget">
                            <ul>
                                @if($front_footer_count > 0)
                                    @if(!empty($front_footer->facebook))
                                        <li>
                                            <a href="{{ $front_footer->facebook }}" target="_blank">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty($front_footer->google))
                                        <li>
                                            <a href="{{ $front_footer->google }}" target="_blank">
                                                <i class="ti-google"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty($front_footer->instagram))
                                        <li>
                                            <a href="{{ $front_footer->instagram }}" target="_blank">
                                                <i class="ti-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty($front_footer->linkedin))
                                        <li>
                                            <a href="{{ $front_footer->linkedin }}" target="_blank">
                                                <i class="ti-linkedin"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty($front_footer->twitter))
                                        <li>
                                            <a href="{{ $front_footer->twitter }}" target="_blank">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>                                
                                    @endif
                                    @if(!empty($front_footer->youtube))
                                        <li>
                                            <a href="{{ $front_footer->youtube }}" target="_blank">
                                                <i class="ti-youtube"></i>
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Quick Links</h3>
                        </div>
                        <ul>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget s2">
                        <div class="widget-title">
                            <h3>Useful Links</h3>
                        </div>
                        <ul>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                            <!-- <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li> -->
                            <!-- <li><a href="{{ url('/terms-and-conditions') }}">Terms & Conditions</a></li> -->
                        </ul>
                    </div>
                </div>

                <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="widget contact-widget">
                        <div class="widget-title">
                            <h3>Contact Us</h3>
                        </div>
                        <ul>
                            @if($front_footer_count > 0)

                                
                                @if(!empty($front_footer->address))
                                    <li>
                                        <img src="{{ asset('images/frontend-images/map.svg') }}" alt="">
                                        <span>{{ $front_footer->address }}</span>
                                    </li>
                                @endif
                                @if(!empty($front_footer->email))
                                    <li>
                                        <img src="{{ asset('images/frontend-images/mail.svg') }}" alt="">
                                        <span>{{ $front_footer->email }}</span>
                                    </li>
                                @endif
                                @if(!empty($front_footer->phone_1))
                                    <li>
                                        <img src="{{ asset('images/frontend-images/phone.svg') }}" alt=""> 
                                        <span>
                                            {{ $front_footer->phone_1 }} 
                                            @if(!empty($front_footer->phone_2))
                                                <br> {{ $front_footer->phone_2 }}
                                            @endif
                                        </span>
                                    </li>
                                @endif
                                
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <div class="wpo-lower-footer">
        <div class="container">
            <div class="row g-0">
                <div class="col col-lg-6 col-12">
                    <p class="copyright"> Copyright &copy; <?php echo date('Y')?> <a href="{{ $app_settings->app_url }}" target="_blank">{{ $app_settings->app_name }}</a>. All Rights Reserved.</p>
                </div>
                <!-- <div class="col col-lg-6 col-12">
                    <ul>
                        <li><a href="{{ url('/privacy-policy') }}">Privace & Policy</a></li>
                        <li><a href="{{ url('/terms-and-condition') }}">Terms</a></li>
                        <li><a href="{{ url('/about') }}">About us</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<!-- end of wpo-site-footer-section