@extends('layouts.frontLayout.front-design')
@section('content')

<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>About Us</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>About Us</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

@if(!empty($about_sections))
  @foreach($about_sections as $about_section)
    @if ($about_section->section_condition == 1)
        <div class="about">
         <div class="container" style="padding-top: 50px; padding-bottom: 50px;">
            <div class="row justify-content-center" style="padding-bottom: 15px;">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="about_box" style="text-align: center;">
                         <h3>{{ $about_section->title }}</h3>
                         <p>{{ $about_section->title_brief_detail }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="about_box">
                     <p>{!! html_entity_decode($about_section->description) !!}</p>
                  </div>
               </div> 
            </div>
         </div>
      </div>
      <!-- <hr> -->
    @elseif ($about_section->section_condition == 2)
      <img src="{{ asset('images/backend-images/about/'.$about_section->image) }}" alt="{{ $about_section->image }}" style="width: 100%; height: auto;">
    @elseif ($about_section->section_condition == 3)
      <div class="about">
         <div class="container" style="padding-top: 50px; padding-bottom: 50px;">
            <div class="row justify-content-center" style="padding-bottom: 15px;">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="about_box" style="text-align: center;">
                         <h3>{{ $about_section->title }}</h3>
                         <p>{{ $about_section->title_brief_detail }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                  <div class="about_box">
                     <p>{!! html_entity_decode($about_section->description) !!}</p>
                  </div>
               </div> 
               <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                  <img src="{{ asset('images/backend-images/about/'.$about_section->image) }}" alt="{{ $about_section->image }}" style="width: 100%; height: auto;">
               </div>
            </div>
         </div>
      </div>
      <!-- <hr> -->
    @elseif ($about_section->section_condition == 4)
      <div class="about">
         <div class="container" style="padding-top: 50px; padding-bottom: 50px;">
            <div class="row justify-content-center" style="padding-bottom: 15px;">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="about_box" style="text-align: center;">
                         <h3>{{ $about_section->title }}</h3>
                         <p>{{ $about_section->title_brief_detail }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                  <img src="{{ asset('images/backend-images/about/'.$about_section->image) }}" alt="{{ $about_section->image }}" style="width: 100%; height: auto;">
               </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                  <div class="about_box">
                     <p>{!! html_entity_decode($about_section->description) !!}</p>
                  </div>
               </div> 
            </div>
         </div>
      </div>
      <!-- <hr> -->
    @elseif ($about_section->section_condition == 5)
      <div class="about">
         <div class="container" style="padding-top: 50px; padding-bottom: 50px;">
            <div class="row justify-content-center" style="padding-bottom: 15px;">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="about_box" style="text-align: center;">
                         <h3>{{ $about_section->title }}</h3>
                         <p>{{ $about_section->title_brief_detail }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <div class="about_box">
                     <p>{!! html_entity_decode($about_section->description) !!}</p>
                  </div>
               </div> 
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                  <div class="about_box">
                     <p>{!! html_entity_decode($about_section->description_2) !!}</p>
                  </div>
               </div> 
            </div>
         </div>
      </div>
      <!-- <hr> -->
    @elseif ($about_section->section_condition == 6)
      <img src="{{ asset('images/backend-images/about/'.$about_section->image) }}" alt="{{ $about_section->image }}" style="width: 50%; height: auto;">
      <img src="{{ asset('images/backend-images/about/'.$about_section->image_2) }}" alt="{{ $about_section->image_2 }}" style="width: 50%; height: auto; float: right;">
      <!-- <hr> -->
    @endif
  @endforeach
@endif

@endsection