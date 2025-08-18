@extends('layouts.frontLayout.front-design')
@section('content')

<div class="wpo-login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="wpo-accountWrapper" enctype="multipart/form-data" id="contactForm" method="post" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="wpo-accountInfo">
                        <div class="image">
                            <img src="{{ asset('images/frontend-images/login.png' ) }}" alt="">
                        </div>
                    </div>
                    <div class="wpo-accountForm form-style">
                        <div class="fromTitle">
                            <h2>Login</h2>
                            <p>Sign into your account</p>
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
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="pwd6" type="password" id="password" required="" name="password">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default reveal" type="button"><i class="ti-eye"></i></button>
                                    </span>
                                    <small id="password_msg" style="display: none; color: red; margin-bottom: 10px;">(Password must be atleast 8 characters long.)</small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="check-box-wrap">
                                    <div class="input-box">
                                        <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">
                                        <label for="fruit4">Remember Me</label>
                                    </div>
                                    <div class="forget-btn">
                                        <a href="{{ url('/forgot-password') }}">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="submit" id="loginbtn" disabled class="wpo-accountBtn">Login</button>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 mt-15">
                                <label>Don't have an account?<strong><a href="{{ url('/signup') }}">Signup</a></strong></label>
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

            if (var_Password.length < 8)
            {
              $('#password_msg').css('display', 'block');
              $('#loginbtn').prop('disabled', true);
            }else{
                $('#password_msg').css('display', 'none');
                $('#loginbtn').prop('disabled', false);

                $('#password').keypress(function(e) {

                    var key = e.which;
                    if (key == 13) // the enter key code
                    {
                      $('#loginbtn').trigger('click');
                      return false;
                    }
                });
            }
        });
            
    }

</script>