@extends('layouts.adminLayout.admin-design')
@section('content')
<Style>
  .img-head{
    text-align: center;
  }
</Style>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">About Us Details</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/view-about-us') }}">About Us</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content container-fluid">

      <style type="text/css">
          body{
              color: #1a202c;
              text-align: left;
              background-color: #e2e8f0;    
          }
          .main-body {
              padding: 15px;
          }
          .card {
              box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
          }

          .card {
              position: relative;
              display: flex;
              flex-direction: column;
              min-width: 0;
              word-wrap: break-word;
              background-color: #fff;
              background-clip: border-box;
              border: 0 solid rgba(0,0,0,.125);
              border-radius: .25rem;
          }

          .card-body {
              flex: 1 1 auto;
              min-height: 1px;
              padding: 1rem;
          }

          .gutters-sm {
              margin-right: -8px;
              margin-left: -8px;
          }

          .gutters-sm>.col, .gutters-sm>[class*=col-] {
              padding-right: 8px;
              padding-left: 8px;
          }
          .mb-3, .my-3 {
              margin-bottom: 1rem!important;
          }

          .bg-gray-300 {
              background-color: #e2e8f0;
          }
          .h-100 {
              height: 100%!important;
          }
          .shadow-none {
              box-shadow: none!important;
          }
      </style>

      @if(Session::has('flash_message_error'))
          <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{!! session('flash_message_error') !!}</strong>
          </div>
      @endif
      @if(Session::has('flash_message_success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{!! session('flash_message_success') !!}</strong>
          </div>
      @endif

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
         <div class="row">
            <div class="col-12">
                <div class="button-group">
                    <a href="{{ url('/admin/view-about-us') }}">
                        <button type="button" class="btn waves-effect waves-light btn-success">Back</button>
                    </a>
                </div>
            </div>
        </div>


    <div class="row gutters-sm">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
                <h4 class="d-flex align-items-center mb-3">Section Detail</h4>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Section No.</h6>
                  </div>
                  <div class="col-sm-10 text-secondary">
                    {{ $about_us->section_no }}
                  </div> 
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Section Condition</h6>
                  </div>
                  <div class="col-sm-10 text-secondary">
                    @if ($about_us->section_condition == 1)
                        Only Text
                    @elseif ($about_us->section_condition == 2)
                        Only Image
                    @elseif ($about_us->section_condition == 3)
                        Text - Image
                    @elseif ($about_us->section_condition == 4)
                        Image - Text
                    @elseif ($about_us->section_condition == 5)
                        Text - Text
                    @elseif ($about_us->section_condition == 6)
                        Image - Image
                    @endif
                  </div> 
                </div>
                <hr>
                @if ($about_us->section_condition == 1)
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Title</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {{ $about_us->title }}
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Title Brief Detail</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {{ $about_us->title_brief_detail }}
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {!! html_entity_decode($about_us->description) !!}
                    </div>
                  </div>
                  <hr>
                @elseif ($about_us->section_condition == 2)
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Image</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      @if(!empty($about_us->image))
                          <img src="{{asset('/images/backend-images/about/'.$about_us->image)}}" onclick="window.open(this.src)" width="150" alt="{{$about_us->image}}">
                      @endif
                    </div>
                  </div>
                  <hr>
                @elseif ($about_us->section_condition == 3)
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Title</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {{ $about_us->title }}
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Title Brief Detail</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {{ $about_us->title_brief_detail }}
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {!! html_entity_decode($about_us->description) !!}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Image</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      @if(!empty($about_us->image))
                          <img src="{{asset('/images/backend-images/about/'.$about_us->image)}}" onclick="window.open(this.src)" width="150" alt="{{$about_us->image}}">
                      @endif
                    </div>
                  </div>
                  <hr>
                @elseif ($about_us->section_condition == 4)
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Image</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      @if(!empty($about_us->image))
                          <img src="{{asset('/images/backend-images/about/'.$about_us->image)}}" onclick="window.open(this.src)" width="150" alt="{{$about_us->image}}">
                      @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Title</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {{ $about_us->title }}
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Title Brief Detail</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {{ $about_us->title_brief_detail }}
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {!! html_entity_decode($about_us->description) !!}
                    </div>
                  </div>
                  <hr>
                @elseif ($about_us->section_condition == 5)
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Title</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {{ $about_us->title }}
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Title Brief Detail</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {{ $about_us->title_brief_detail }}
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {!! html_entity_decode($about_us->description) !!}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Description 2</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      {!! html_entity_decode($about_us->description_2) !!}
                    </div>
                  </div>
                  <hr>
                @elseif ($about_us->section_condition == 6)
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Image</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      @if(!empty($about_us->image))
                          <img src="{{asset('/images/backend-images/about/'.$about_us->image)}}" onclick="window.open(this.src)" width="150" alt="{{$about_us->image}}">
                      @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mb-0">Image 2</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                      @if(!empty($about_us->image_2))
                          <img src="{{asset('/images/backend-images/about/'.$about_us->image_2)}}" onclick="window.open(this.src)" width="150" alt="{{$about_us->image}}">
                      @endif
                    </div>
                  </div>
                  <hr>
                @endif
                                  
                <div class="row">
                  <div class="col-sm-2">
                    <h6 class="mb-0">Is Active</h6>
                  </div>
                  <div class="col-sm-10 text-secondary">
                    @if($about_us->isActive == 1)
                        Active
                    @else
                        Not Active
                    @endif
                  </div>
                </div>
              </div>
            </div>

           
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
