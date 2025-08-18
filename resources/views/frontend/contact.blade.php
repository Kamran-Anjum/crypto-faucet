@extends('layouts.frontLayout.front-design')
@section('content')

<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Contact Us</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Contact</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- start wpo-contact-pg-section -->
<section class="wpo-contact-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 offset-lg-1">
            	@if($front_footer_count > 0)
	                <div class="office-info">
	                    <div class="row">
	                        <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
	                            <div class="office-info-item">
	                                <div class="office-info-icon">
	                                    <div class="icon">
	                                        <i class="fi flaticon-placeholder"></i>
	                                    </div>
	                                </div>
	                                <div class="office-info-text">
	                                    <h2>Address</h2>
	                                    <p>{{ $front_footer->address }}</p>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
	                            <div class="office-info-item">
	                                <div class="office-info-icon">
	                                    <div class="icon">
	                                        <i class="fi flaticon-email"></i>
	                                    </div>
	                                </div>
	                                <div class="office-info-text">
	                                    <h2>Email Us</h2>
	                                    <p>{{ $front_footer->email }}</p>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
	                            <div class="office-info-item">
	                                <div class="office-info-icon">
	                                    <div class="icon">
	                                        <i class="fi flaticon-phone-call"></i>
	                                    </div>
	                                </div>
	                                <div class="office-info-text">
	                                    <h2>Call Now</h2>
	                                    <p>{{ $front_footer->phone_1 }}</p>
	                                    @if(!empty($front_footer->phone_2))
						                    <p>{{ $front_footer->phone_2 }}</p>
						                @endif
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                @endif
                <div class="wpo-contact-title" id="submit">
                    <h2>Have Any Question?</h2>
                    <p>It is a long established fact that a reader will be distracted
                        content of a page when looking.</p>
                </div>
                <div class="wpo-contact-form-area">
                	@if(Session::has('flash_message_success'))
				        <div class="alert alert-primary alert-dismissable mt-3">
				            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				            <strong>{!! session('flash_message_success') !!}</strong>
				        </div>
				    @endif
				    @if ($errors->has('g-recaptcha-response'))
				        <div class="alert alert-danger alert-dismissable">
				            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
				        </div>
					@endif

                    <form enctype="multipart/form-data" class="contact-validation-active"  method="post" action="{{ url('/contact') }}" > 
                    {{ csrf_field() }}
                        <div>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name*">
                        </div>
                        <div>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email*">
                        </div>
                        <div>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone*">
                        </div>
                        <div>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Your Subject*">
                        </div>
                        <div class="fullwidth">
                            <textarea class="form-control" name="message" id="message" placeholder="Message..."></textarea>
                        </div>

                		<div>
			                {!! NoCaptcha::renderJs() !!}
			                {!! NoCaptcha::display() !!}
		                </div>

                        <div class="submit-area">
                            <button type="submit" class="theme-btn">Get in Touch</button>
                            <div id="loader">
                                <i class="ti-reload"></i>
                            </div>
                        </div>
                        <div class="clearfix error-handling-messages">
                            <div id="success">Thank you</div>
                            <div id="error"> Error occurred while sending email. Please try again later.
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end wpo-contact-pg-section -->

<!--  start wpo-contact-map -->
<section class="wpo-contact-map-section">
    <h2 class="hidden">Contact map</h2>
    <div class="wpo-contact-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671"
            allowfullscreen></iframe>
    </div>
</section>
<!-- end wpo-contact-map -->


@endsection

<script>
    var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script>