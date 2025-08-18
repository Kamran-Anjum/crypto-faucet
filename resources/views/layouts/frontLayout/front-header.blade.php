<?php $user = Auth::user(); ?>
<style type="text/css">
    
</style>
<!-- Start header -->
<header id="header">
    <div class="wpo-site-header s3">
        <nav class="navigation navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                        <div class="mobail-menu">
                            <button type="button" class="navbar-toggler open-btn">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar first-angle"></span>
                                <span class="icon-bar middle-angle"></span>
                                <span class="icon-bar last-angle"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 col-6">
                        <div class="navbar-header">
                            <a class="navbar-brand"  href="{{ url('/') }}">
                                <img src="{{ asset('images/backend-images/app-logo/'.$app_settings->app_logo) }}" alt="logo-img">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-1 col-1">
                        <div id="navbar" class="collapse navbar-collapse navigation-holder">
                            <button class="menu-close"><i class="ti-close"></i></button>
                            <ul class="nav navbar-nav mb-2 mb-lg-0">

                                
                                <li>
                                    <a class="@if(Request::path() == '/') active @endif" href="{{ url('/')}}" >Home</a>
                                </li>
                                <li>
                                    <a class="@if(Request::path() == 'about') active @endif" href="{{ url('/about')}}" >About</a>
                                </li>
                                <!-- <li>
                                    <a class="@if(Request::path() == 'blog') active @endif" href="{{ url('/blog')}}">Blog</a>
                                </li>  -->                           
                                <li>
                                    <a class="@if(Request::path() == 'contact') active @endif" href="{{ url('/contact')}}">Contact</a>
                                </li>
                                @if(!empty($user))
                                    <li>
                                        <a class="@if(Request::path() == '/user/profile') active @endif" href="{{ url('/user/profile') }}">My Account</a>
                                    </li>
                                    <li>
                                        <a class="@if(Request::path() == '/user-logout') active @endif" href="{{ url('/user-logout') }}">Logout</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="@if(Request::path() == 'login') active @endif" href="{{ url('/login')}}">LOGIN</a>
                                    </li>
                                @endif
                            </ul>

                        </div><!-- end of nav-collapse -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-2">
                        <div class="header-right">
                            <a class="call-number">
                                <div class="icon">
                                    <img src="{{ asset('images/frontend-images/telephone.svg') }}" alt="">
                                </div>
                                <div class="text">
                                    <!-- <span class="title">Hotline 24/7</span> -->
                                    <span class="number">{{ $front_footer->phone_1 }}</span>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div><!-- end of container -->
        </nav>
    </div>
</header>
<!-- end of header -->