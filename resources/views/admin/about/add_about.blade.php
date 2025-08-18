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
                <h5 class="font-medium text-uppercase mb-0">Add About Us</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/view-about-us') }}">About Us</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add About Us</li>
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-about-us') }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Section<span class="text-danger">*</span></label>
                                            <select name="section_no" id="section_no" class="select2 form-control custom-select" style="width: 100%;" required="">
                                                <option selected="" disabled >Select</option>
                                                <option value="Section 1" >Section 1</option>
                                                <option value="Section 2" >Section 2</option>
                                                <option value="Section 3" >Section 3</option>
                                                <option value="Section 4" >Section 4</option>
                                                <option value="Section 5" >Section 5</option>
                                                <option value="Section 6" >Section 6</option>
                                                <option value="Section 7" >Section 7</option>
                                                <option value="Section 8" >Section 8</option>
                                                <option value="Section 9" >Section 9</option>
                                                <option value="Section 10" >Section 10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Section Condition<span style="color: red;">*</span></label>
                                            <select name="section_condition" id="section_condition" class="select2 form-control custom-select" style="width: 100%;" required="">
                                                <option selected="" disabled="">Select</option>
                                                <option value="1" >Only Text</option>
                                                <option value="2" >Only Image</option>
                                                <option value="3" >Text - Image</option>
                                                <option value="4" >Image - Text</option>
                                                <option value="5" >Text - Text</option>
                                                <option value="6" >Image - Image</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 hide" id="title_f">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" name="desc_title" id="desc_title" class="form-control" placeholder="Description Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 hide" id="title_sec">
                                        <div class="form-group">
                                            <label class="control-label">Title Brief Detial</label>
                                            <input type="text" name="desc_title_sec" id="desc_title_sec" class="form-control" placeholder="Title Brief Detail" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 hide" id="dec_f">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" id="texteditor" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 hide" id="dec_sec">
                                        <div class="form-group">
                                            <label class="control-label">Description 2</label>
                                            <textarea name="description_sec" id="texteditornew" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 hide" id="img_f">
                                        <div class="form-group">
                                            <label class="control-label">Image</label>
                                            <input class="form-control" type="file" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6 hide" id="img_sec">
                                        <div class="form-group">
                                            <label class="control-label">Image 2</label>
                                            <input class="form-control" type="file" id="image" name="image_sec">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                                <a href="{{ url('/admin/view-about-us')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
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
