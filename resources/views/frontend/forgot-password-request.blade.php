@extends('layouts.frontLayout.front-design')
@section('content')

<div class="wpo-login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="wpo-accountWrapper" enctype="multipart/form-data" id="contactForm" method="post" action="{{ url('/forgot-password') }}">
                    {{ csrf_field() }}
                    <div class="wpo-accountInfo">
                        <div class="image">
                            <img src="{{ asset('images/frontend-images/login.png' ) }}" alt="">
                        </div>
                    </div>
                    <div class="wpo-accountForm form-style">
                        <div class="fromTitle">
                            <h2>Forgot Password</h2>
                            <p>Want To Reset Your Password</p>
                            @if(Session::has('flash_message_error'))
                              <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>{!! session('flash_message_error') !!}</strong>
                              </div>
                            @endif
                            @if(Session::has('flash_message_success'))
                              <div class="alert alert-primary alert-dismissable">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>{!! session('flash_message_success') !!}</strong>
                              </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <label>Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="submit" class="wpo-accountBtn">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection