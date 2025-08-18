@extends('layouts.frontLayout.front-design')
@section('content')

<div class="wpo-login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="wpo-accountWrapper" enctype="multipart/form-data" id="contactForm" method="post" action="{{ url('/reset-password/'.$check_user->id) }}">
                    {{ csrf_field() }}
                    <div class="wpo-accountInfo">
                        <div class="image">
                            <img src="{{ asset('images/frontend-images/login.png' ) }}" alt="">
                        </div>
                    </div>
                    <div class="wpo-accountForm form-style">
                        <div class="fromTitle">
                            <h2>Reset Password</h2>
                            <p>Set Your New Password</p>
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
                            <input type="hidden" name="user_id" value="{{ $check_user->id }}">
                            <div class="col-lg-12 col-md-12 col-12">
                                <label>Name</label>
                                <input type="text" disabled class="form-control" name="name" value="{{ $check_user->name }}" required="" />
                            </div> 
                            <div class="col-lg-12 col-md-12 col-12">
                                <label>E-mail</label>
                                <input type="email" disabled class="form-control" name="email" value="{{ $check_user->email }}" required="" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <label>New Password</label>
                                <input class="pwd6" type="password" id="password" required="" name="password">
                                
                                <small id="password_msg" style="display: none; color:red; margin-bottom: 10px;">Password must be 8 characters long</small>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <label>Confirm Password</label>
                                <input class="pwd6" type="password" id="confirm_password" required="" name="confirm_password">
                                
                                <small id="confirm_password_msg" style="display: none; color:red; margin-bottom: 10px;">Password Not Match</small>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="submit" class="wpo-accountBtn" id="pswd_btn" disabled>Reset</button>
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
                $('#pswd_btn').prop('disabled', true);
            }else{
                $('#confirm_password_msg').css('display', 'none');
                $('#pswd_btn').prop('disabled', false);
            }

        });
            
    }

</script>
