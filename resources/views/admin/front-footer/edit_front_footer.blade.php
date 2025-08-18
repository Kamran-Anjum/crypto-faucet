@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Edit Front Footer Item</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/view-front-footer-item') }}">Front Footer Item</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Front Footer Item</li>
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-front-footer-item/'.$column_name.'/'.$front_footer->id) }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                @if($column_name == 'email')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Email<span class="text-danger">*</span></label>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="info@example.com" required="required" value="{{ $front_footer->email }}">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'phone_1')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Phone 1<span class="text-danger">*</span></label>
                                                <input type="text" id="phone_1" name="phone_1" class="form-control" placeholder="+92-346-0329659" required="required" value="{{ $front_footer->phone_1 }}">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'phone_2')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Phone 2</label>
                                                <input type="text" id="phone_2" name="phone_2" class="form-control" placeholder="+92-346-0329659" value="{{ $front_footer->phone_2 }}">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'address')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Address<span class="text-danger">*</span></label>
                                                <textarea id="address"  name="address" class="form-control" rows="5" required="">{{ $front_footer->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'facebook-link')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Facebook</label>
                                                <input type="text" id="facebook" name="facebook" class="form-control" placeholder="https://www.facebook.com/yourname" value="{{ $front_footer->facebook }}">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'google-link')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Google</label>
                                                <input type="text" id="google" name="google" class="form-control" placeholder="https://www.google.com/yourname" value="{{ $front_footer->google }}">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'instagram-link')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Instagram</label>
                                                <input type="text" id="instagram" name="instagram" class="form-control" placeholder="https://www.instagram.com/yourname">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'linkedin-link')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Linkedin</label>
                                                <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="https://www.linkedin.com/yourname" value="{{ $front_footer->linkedin }}">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'twitter-link')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Twitter</label>
                                                <input type="text" id="twitter" name="twitter" class="form-control" placeholder="https://www.twitter.com/yourname" value="{{ $front_footer->twitter }}">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($column_name == 'youtube-link')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Youtube</label>
                                                <input type="text" id="youtube" name="youtube" class="form-control" placeholder="https://www.youtube.com/yourname" value="{{ $front_footer->youtube }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Edit</button>
                                <a href="{{ url('/admin/view-front-footer-item')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
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
