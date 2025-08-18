@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Edit Site Setting</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Site Setting</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">

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

                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-site-setting') }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Site Name<span class="text-danger">*</span></label>
                                            <input type="text" id="app_name" name="app_name" value="{{ $app_setting->app_name }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Site URL<span class="text-danger">*</span></label>
                                            <input type="text" id="app_url" name="app_url" value="{{ $app_setting->app_url }}" class="form-control" placeholder="" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Site Logo<span class="text-danger">* <small>(Size must be 150x50)</small></span></label>
                                            <div>
                                                <img src="{{asset('/images/backend-images/app-logo/'.$app_setting->app_logo)}}" width="150">
                                            </div>
                                            <input type="file" id="app_logo" name="app_logo" class="form-control" placeholder="" >
                                            <input type="hidden" id="cur_app_logo" name="cur_app_logo" value="{{ $app_setting->app_logo }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Site Logo Footer<span class="text-danger">* <small>(Size must be 150x50)</small></span></label>
                                            <div>
                                                <img src="{{asset('/images/backend-images/app-logo/'.$app_setting->app_logo_footer)}}" width="150">
                                            </div>
                                            <input type="file" id="app_logo_footer" name="app_logo_footer" class="form-control" placeholder="" >
                                            <input type="hidden" id="cur_app_logo_footer" name="cur_app_logo_footer" value="{{ $app_setting->app_logo_footer }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Site Favicon<span class="text-danger">* <small>(Size must be 16x16)</small></span></label>
                                            <div>
                                                <img src="{{asset('/images/backend-images/app-logo/'.$app_setting->app_favicon)}}" width="150">
                                            </div>
                                            <input type="file" id="app_favicon" name="app_favicon" class="form-control" placeholder="" >
                                            <input type="hidden" id="cur_app_favicon" name="cur_app_favicon" value="{{ $app_setting->app_favicon }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
</div>

@endsection
