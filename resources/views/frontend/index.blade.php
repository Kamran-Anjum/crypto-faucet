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

@if(!empty($about_main))
  <!-- about start -->
  <section class="about-section section-padding">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-xl-6 col-12">
                  <div class="about-left-content">
                      <div class="image">
                          <img src="{{ asset('images/backend-images/about/'.$about_main->image) }}" alt="">
                      </div>
                      <!-- <div class="award-content">
                          <div class="icon">
                              <img src="{{ asset('images/backend-images/about/'.$about_main->pop_card_image) }}" alt="">
                          </div>
                          <h2>{{ $about_main->pop_card }}</h2>
                          <p>{{ $about_main->pop_card_description }}</p>
                      </div> -->
                  </div>
              </div>
              <div class="col-xl-6 col-12">
                  <div class="about-right-content">
                      <h2 class="title">{{ $about_main->heading }}</h2>
                      <h3 class="sub-title">{{ $about_main->title }}</h3>
                      <p class="text">{!! html_entity_decode($about_main->description) !!}</p>
                      <div class="ceo-content">
                          <div class="signeture">
                              <img src="{{ asset('images/backend-images/about/'.$about_main->signature_image) }}" alt="">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="shape-1">
          <svg width="429" height="593" viewBox="0 0 429 593" fill="none">
              <circle cx="296.5" cy="296.5" r="296.5" fill="url(#paint0_radial)" />
              <defs>
                  <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse"
                      gradientTransform="translate(296.5 296.5) rotate(90) scale(296.5)">
                      <stop offset="0" stop-color="#CED0FF" />
                      <stop offset="1" stop-color="white" stop-opacity="0" />
                  </radialGradient>
              </defs>
          </svg>
      </div>
      <div class="shape-2">
          <svg width="529" height="529" viewBox="0 0 529 529" fill="none">
              <circle cx="264.5" cy="264.5" r="264.5" fill="url(#paint0_radial_318_1508)" />
              <defs>
                  <radialGradient id="paint0_radial_318_1508" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse"
                      gradientTransform="translate(264.5 264.5) rotate(90) scale(264.5)">
                      <stop offset="0" stop-color="#FBB132" stop-opacity="0.2" />
                      <stop offset="1" stop-color="white" stop-opacity="0" />
                  </radialGradient>
              </defs>
          </svg>
      </div>
  </section>
@endif


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