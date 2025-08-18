@extends('layouts.adminLayout.admin-design')
@section('content')

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 35px;
    }
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 35px;
        user-select: none;
        -webkit-user-select: none;
    }
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #e9ecef;
        border-radius: 4px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #888 transparent transparent transparent;
        border-style: solid;
        border-width: 5px 4px 0 4px;
        height: 0;
        left: 50%;
        margin-left: -4px;
        margin-top: -2px;
        position: absolute;
        top: 60%;
        width: 0;
    }
    .select2-container--default .select2-selection--multiple {
        background-color: white;
        border: 1px solid #e9ecef;
        border-radius: 4px;
        cursor: text;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border:  1px solid rgba(0,0,0,.25);
        outline: 0;
    }
</style>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Add Meta Tags</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/view-meta-tags') }}">Meta Tags</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Meta Tags</li>
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-meta-tags') }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <select name="title" id="service_id" class="select2 form-control custom-select" style="width: 100%;" required="">
                                                <option selected="" disabled >Select</option>
                                                <option value="Faucet" >Home</option>
                                                <option value="About" >About</option>
                                                <option value="Contact" >Contact</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Keywords</label>
                                            <input type="text" id="keywords" name="keywords" class="form-control" placeholder="webapp, app, php, laravel, mysql," required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea id="texteditor"  name="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                                <a href="{{ url('/admin/view-meta-tags')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
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
