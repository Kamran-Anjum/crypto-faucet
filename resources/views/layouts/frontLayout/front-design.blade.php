<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $cur_path = Request::path(); ?>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="author" content="wpOceans">
		<meta charset="UTF-8">

	    <meta name="csrf-token" content="{{ csrf_token() }}">
	    <!-- Favicon icon -->
	    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/backend-images/app-logo/'.$app_settings->app_favicon) }}">
	    <!-- ======= Page title ========= -->
    	<title>{{ $app_settings->app_name }}</title>
	    
	    @if(Request::path() == '/' && !empty($home_meta_tags))
	    	<meta name="keywords" content="{{ $home_meta_tags->keywords }}">
	    	<meta name="description" content="{!! html_entity_decode($home_meta_tags->description) !!}">
	    @endif
	    @if(Request::path() == 'about' && !empty($about_meta_tags))
	    	<meta name="keywords" content="{{ $about_meta_tags->keywords }}">
	    	<meta name="description" content="{!! html_entity_decode($about_meta_tags->description) !!}">
	    @endif
	    @if(Request::path() == 'contact' && !empty($contact_meta_tags))
	    	<meta name="keywords" content="{{ $contact_meta_tags->keywords }}">
	    	<meta name="description" content="{!! html_entity_decode($contact_meta_tags->description) !!}">
	    @endif
	    @if(Request::path() == 'blogs' && !empty($blogs_meta_tags))
	    	<meta name="keywords" content="{{ $blogs_meta_tags->keywords }}">
	    	<meta name="description" content="{!! html_entity_decode($blogs_meta_tags->description) !!}">
	    @endif


	    @if(!empty($blogs_detail_meta_tags))
		    @foreach($blogs_detail_meta_tags as $tags)
		    	@if($cur_path == 'blog/'.$tags->table_id.'/'.$tags->url_slug)
			    	<meta name="keywords" content="{{ $tags->keywords }}">
			    	<meta name="description" content="{!! html_entity_decode($tags->description) !!}">
		    	@endif
		    @endforeach
	    @endif
	    
		@vite('resources/sass/style.scss')

		<!-- This page plugin CSS -->
	    <link href="{{ asset('css/backend-css/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	    <link rel="stylesheet" type="text/css"
	        href="{{ asset('css/backend-css/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}">

		<meta name="_token" content="{{csrf_token()}}" />
		
		<script src="{{ asset('js/app.js') }}" defer></script>

	    <style type="text/css">
	        /* Button used to open the chat form - fixed at the bottom of the page */
	        .open-button {
	          background-color: #2e3192;
	          color: white;
	          padding: 16px 20px;
	          border: none;
	          cursor: pointer;
	          /*opacity: 0.8;*/
	          position: fixed;
	          bottom: 23px;
	          right: 28px;
	          width: auto;
	          z-index: 10;
	        }

	        /* The popup chat - hidden by default */
	        .chat-popup {
	          display: none;
	          position: fixed;
	          bottom: 1px;
	          right: 10px;
	          border: 3px solid #c3c4e1;
	          border-radius: 10px, 10px, 10px, 10px;
	          z-index: 10;
	          width: 350px;
	        }

	        /* Add styles to the form container */
	        .form-container {
	          width: 350px;
	          padding: 10px;
	          background-color: white;
	        }

	        /* Set a style for the submit/send button */
	        /*.form-container .btn {
	          background-color: #2e3192;
	          color: white;
	          padding: 16px 20px;
	          border: none;
	          cursor: pointer;
	          margin-left: -15px;
	          width: 40px;
	        }*/

	        /* Add a red background color to the cancel button */
	        .form-container .cancel {
	          background-color: #2e3192;
	          color: white;
	          padding: 5px 10px;
	          border: none;
	          cursor: pointer;
	          float: right;
	          /*width: 100%;*/
	          /*margin-bottom:10px;*/
	        }

	        .chat {
	            border: 0.5px gray;
	            border-radius: 5px;
	            /*width: auto;*/
	            padding: 0.5em;
	        }

	        .chat-left {
	            background-color: #d3d4f1;
	            align-self: flex-start;
	            max-width: 80%;
	            float: left;
	            text-overflow: inherit;
	            color: black;
	        }

	        .chat-right {
	            background-color: #a1a3e5;
	            align-self: flex-end;
	            max-width: 80%;
	            float: right;
	            text-overflow: inherit;
	            margin-right: 3px;
	            color: black;

	        }
	        .chat-container {
	            display: flex;
	            flex-direction: column;
	            height: 300px;
	            overflow-y: auto;
	        }
	    </style>

	</head>

	<body>
		<!-- start page-wrapper -->
	    <div class="page-wrapper">
	        <!-- start preloader -->
	        <div class="preloader">
	            <div class="vertical-centered-box">
	                <div class="content">
	                    <div class="loader-circle"></div>
	                    <div class="loader-line-mask">
	                        <div class="loader-line"></div>
	                    </div>
	                    <img sizes="65x65" href="{{ asset('images/backend-images/app-logo/'.$app_settings->app_logo) }}">
	                </div>
	            </div>
	        </div>
	        <!--  cursor style -->

	        <!-- <div class="cursor"></div> -->
	        <!-- <div class="cursor2"></div> -->
	        <!-- end preloader -->

		    <!--  <button class="open-button" id="open_chats" onclick="openForm()">Talk To Support Team</button>

		    <div class="chat-popup form-container" id="myForm">
			    <div>
			        <button type="button" class="cancel" onclick="closeForm()">X</button>
			        <div id="app">
			            <support-chat-component 
			                :front_user = "{{ Session::get('Support_User') }}"
			                :admin = "1"
			            > 
			            </support-chat-component>
			        </div>
			    </div>
		    </div>  -->

			@include('layouts.frontLayout.front-header')

			@yield('content')

			@include('layouts.frontLayout.front-footer')

	    </div>
	    <!-- end of page-wrapper -->

	    <!-- All JavaScript files
	    ================================================== -->
	    <script src="{{ asset('js/frontend-js/jquery.min.js') }}"></script>
	    <script src="{{ asset('js/frontend-js/bootstrap.bundle.min.js') }}"></script>
	    <!-- Plugins for this template -->
	    <script src="{{ asset('js/frontend-js/modernizr.custom.js') }}"></script>
	    <script src="{{ asset('js/frontend-js/jquery-plugin-collection.js') }}"></script>
	    <!-- Custom script for this template -->
	    <script src="{{ asset('js/frontend-js/script.js') }}"></script>

	    <script src="{{ asset('js/frontend-js/testimonial-carousel.js') }}"></script>

	    <!--This page plugins -->
	    <script src="{{ asset('css/backend-css/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	    <script src="{{ asset('css/backend-css/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
	    <script src="{{ asset('js/backend-js/pages/datatable/datatable-basic.init.js') }}"></script>

		<script>
		    function openForm() {
		      document.getElementById("myForm").style.display = "block";
		    }

		    function closeForm() {
		      document.getElementById("myForm").style.display = "none";
		    }
		</script>
		
	</body>

</html>