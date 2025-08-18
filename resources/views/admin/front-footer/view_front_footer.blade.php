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
                <h5 class="font-medium text-uppercase mb-0">Front Footer Items</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Front Footer Items</li>
                    </ol>
                </nav>
            </div>
        </div>
        @if($front_footer_count == 0)
        <div class="row">
            <div class="col-12">
                <div class="button-group">
                    <a href="{{ url('/admin/add-front-footer-item')}}">
                        <button type="button" class="btn waves-effect waves-light btn-success">Add Front Footer Items</button>
                    </a>
                </div>
            </div>
        </div>
        @endif
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

    <div class="row gutters-sm">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            <h4 class="d-flex align-items-center mb-3">Front Footer Items</h4>
            <hr>
            @if($front_footer_count > 0)
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->address))
                    {{ $front_footer->address }}
                  @endif
                </div> 
                @if(!empty($front_footer->address))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/address/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/address" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/address/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Phone 1</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->phone_1))
                    {{ $front_footer->phone_1 }}
                  @endif
                </div>  
                @if(!empty($front_footer->phone_1))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/phone_1/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/phone_1" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/phone_1/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Phone 2</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->phone_2))
                    {{ $front_footer->phone_2 }}
                  @endif
                </div>  
                @if(!empty($front_footer->phone_2))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/phone_2/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/phone_2" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/phone_2/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">E-mail</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->email))
                    {{ $front_footer->email }}
                  @endif
                </div>  
                @if(!empty($front_footer->email))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/email/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/email" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/email/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Facebook</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->facebook))
                    {{ $front_footer->facebook }}
                  @endif
                </div>  
                @if(!empty($front_footer->facebook))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/facebook-link/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/facebook-link" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/facebook-link/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Google</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->google))
                    {{ $front_footer->google }}
                  @endif
                </div>  
                @if(!empty($front_footer->google))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/google-link/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/google-link" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/google-link/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Instagram</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->instagram))
                    {{ $front_footer->instagram }}
                  @endif
                </div>  
                @if(!empty($front_footer->instagram))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/instagram-link/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/instagram-link" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/instagram-link/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Linkedin</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->linkedin))
                    {{ $front_footer->linkedin }}
                  @endif
                </div>  
                @if(!empty($front_footer->linkedin))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/linkedin-link/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/linkedin-link" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/linkedin-link/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Twitter</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->twitter))
                    {{ $front_footer->twitter }}
                  @endif
                </div>  
                @if(!empty($front_footer->twitter))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/twitter-link/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/twitter-link" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/twitter-link/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-1">
                  <h6 class="mb-0">Youtube</h6>
                </div>
                <div class="col-sm-8 text-secondary">
                  @if(!empty($front_footer->youtube))
                    {{ $front_footer->youtube }}
                  @endif
                </div>  
                @if(!empty($front_footer->youtube))
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/edit-front-footer-item/youtube-link/'.$front_footer->id)}}" class="btn btn-primary">Edit</a>
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $front_footer->id }}" param-route="delete-front-footer-item/youtube-link" href="javascript:">Delete</a></button>
                  </div>
                @else
                  <div class="col-sm-1">
                    <a href="{{ url('/admin/add-front-footer-item/youtube-link/'.$front_footer->id)}}" class="btn btn-success">Add</a>
                  </div>
                @endif
              </div>
            @else
              <h5 class="text-center">No Footer Items Added Yet</h5>
            @endif
          </div>
        </div>           
      </div>
    </div>

    </div>
  </div>
</div>

@endsection
