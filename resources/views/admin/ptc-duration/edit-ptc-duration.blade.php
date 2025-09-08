@extends('layouts.adminLayout.admin-design')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                    <h5 class="font-medium text-uppercase mb-0">Edit PTC Duration</h5>
                </div>
                <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                    <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                        <ol class="breadcrumb mb-0 justify-content-end p-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/view-ptc-durations') }}">PTC Duration</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit PTC Duration</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="page-content container-fluid">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-12">

                    @if (Session::has('flash_message_error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                        </div>
                    @endif
                    @if (Session::has('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('flash_message_success') !!}</strong>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post"
                                action="{{ url('/admin/edit-ptc-duration/' . $ptc_duration->id) }}">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Seconds</label>
                                                <input type="number" id="seconds" name="seconds"
                                                    value="{{ $ptc_duration->seconds }}" class="form-control" placeholder=""
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tokens Take From User Per View</label>
                                                <input type="number" id="tokens_take_per_view" name="tokens_take_per_view"
                                                    value="{{ $ptc_duration->tokens_take_per_view }}" class="form-control" placeholder=""
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tokens Give To User Per View</label>
                                                <input type="number" id="tokens_give_per_view" name="tokens_give_per_view"
                                                    value="{{ $ptc_duration->tokens_give_per_view }}" class="form-control" placeholder=""
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <br/>
                                                @if($ptc_duration->isActive == '1')
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" value="1" id="customRadioInline1" checked="checked" name="isActive" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline1">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" value="0" id="customRadioInline2" name="isActive" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">Deactive</label>
                                                    </div>
                                                @else
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" value="1" id="customRadioInline1" name="isActive" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline1">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" value="0" id="customRadioInline2" name="isActive" checked="checked" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">Deactive</label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="form-actions mt-5">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Edit</button>
                                    <a href="{{ url('/admin/view-ptc-durations') }}"><button type="button"
                                            class="btn btn-dark">Cancel</button></a>
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
