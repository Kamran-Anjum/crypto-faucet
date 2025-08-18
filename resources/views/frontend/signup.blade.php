@extends('layouts.frontLayout.front-design')
@section('content')

<div class="wpo-login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="wpo-accountWrapper" enctype="multipart/form-data" id="contactForm" method="post" action="{{ url('/signup') }}">
                    {{ csrf_field() }}
                    <div class="wpo-accountInfo">
                        <div class="image">
                            <img src="{{ asset('images/frontend-images/login.png' ) }}" alt="">
                        </div>
                    </div>
                    <div class="wpo-accountForm form-style">
                        <div class="fromTitle">
                            <h2>Singup</h2>
                            <p>Signup your account</p>
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
                                <label>Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <label>Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="pwd6" id="password" type="password" required="" name="password">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default reveal" type="button"><i class="ti-eye"></i></button>
                                    </span>
                                    <small id="password_msg" style="display: none; color: red; margin-bottom: 10px;">(Password must be atleast 8 characters long.)</small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="pwd6" id="confirm_password" type="password" required="" name="confirm_password">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default reveal" type="button"><i class="ti-eye"></i></button>
                                    </span>
                                    <small id="confirm_password_msg" style="display: none; color: red; margin-bottom: 10px;">(Password not match.)</small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div>
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="submit" id="reg_btn" disabled class="wpo-accountBtn">Signup</button>
                                <label>Already have an account? <strong><a href="{{ url('/login') }}">Login</a></strong></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<script>

    window.onload = function () {

        $('#password').keyup(function(e) {

            var var_Password = $("#password").val();

            if (var_Password.length < 8){
              $('#password_msg').css('display', 'block');
            }else{
                $('#password_msg').css('display', 'none');
            }

        });

        $('#confirm_password').keyup(function(e) {

            var var_Password = $("#password").val();
            var var_Confirm_Password = $("#confirm_password").val();

            if (var_Password != var_Confirm_Password){
                $('#confirm_password_msg').css('display', 'block');
                $('#reg_btn').prop('disabled', true);
            }else{
                $('#confirm_password_msg').css('display', 'none');
                $('#reg_btn').prop('disabled', false);
            }

        });
            
    }

</script>
