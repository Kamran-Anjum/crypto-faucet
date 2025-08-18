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
                <h5 class="font-medium text-uppercase mb-0">Edit About Us</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/view-about-us') }}">About Us</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit About Us</li>
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-about-us/'.$about->id) }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Section<span style="color: red;">*</span></label>
                                            <input type="text" readonly name="section_no" id="section_no" class="form-control" value="{{ $about->section_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Section Condition<span style="color: red;">*</span></label>
                                            <select name="section_condition" id="section_condition" class="select2 form-control custom-select about_section_condition" style="width: 100%;" required="">
                                                @if ($about->section_condition == 1)
                                                    <option value="1" selected>Only Text</option>
                                                    <option value="2" >Only Image</option>
                                                    <option value="3" >Text - Image</option>
                                                    <option value="4" >Image - Text</option>
                                                    <option value="5" >Text - Text</option>
                                                    <option value="6" >Image - Image</option>
                                                @elseif ($about->section_condition == 2)
                                                    <option value="1" >Only Text</option>
                                                    <option value="2" selected>Only Image</option>
                                                    <option value="3" >Text - Image</option>
                                                    <option value="4" >Image - Text</option>
                                                    <option value="5" >Text - Text</option>
                                                    <option value="6" >Image - Image</option>
                                                @elseif ($about->section_condition == 3)
                                                    <option value="1" >Only Text</option>
                                                    <option value="2" >Only Image</option>
                                                    <option value="3" selected>Text - Image</option>
                                                    <option value="4" >Image - Text</option>
                                                    <option value="5" >Text - Text</option>
                                                    <option value="6" >Image - Image</option>
                                                @elseif ($about->section_condition == 4)
                                                    <option value="1" >Only Text</option>
                                                    <option value="2" >Only Image</option>
                                                    <option value="3" >Text - Image</option>
                                                    <option value="4" selected>Image - Text</option>
                                                    <option value="5" >Text - Text</option>
                                                    <option value="6" >Image - Image</option>   
                                                @elseif ($about->section_condition == 5)
                                                    <option value="1" >Only Text</option>
                                                    <option value="2" >Only Image</option>
                                                    <option value="3" >Text - Image</option>
                                                    <option value="4" >Image - Text</option>
                                                    <option value="5" selected>Text - Text</option>
                                                    <option value="6" >Image - Image</option>    
                                                @elseif ($about->section_condition == 6)
                                                    <option value="1" >Only Text</option>
                                                    <option value="2" >Only Image</option>
                                                    <option value="3" >Text - Image</option>
                                                    <option value="4" >Image - Text</option>
                                                    <option value="5" >Text - Text</option>
                                                    <option value="6" selected>Image - Image</option>    
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 hide" id="title_f">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" name="desc_title" id="desc_title" class="form-control" placeholder="Title" value="{{ $about->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 hide" id="title_sec">
                                        <div class="form-group">
                                            <label class="control-label">Title Brief Detial</label>
                                            <input type="text" name="desc_title_sec" id="desc_title_sec" class="form-control" placeholder="Title" value="{{ $about->title_brief_detail }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 hide" id="dec_f">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" id="texteditor" class="form-control">{{ $about->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 hide" id="dec_sec">
                                        <div class="form-group">
                                            <label class="control-label">Description 2</label>
                                            <textarea name="description_sec" id="texteditornew" class="form-control">{{ $about->description_2 }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 hide" id="img_f">
                                        <div class="form-group">
                                            <label class="control-label">Image</label>
                                            @if($about->image != "")
                                                <img onclick="window.open(this.src)" height="50" width="50" src="{{asset('/images/backend-images/about/'.$about->image)}}">
                                            @endif
                                            <input class="form-control" type="file" id="image" name="image">
                                            <input type="hidden" name="cur_image" value="{{ $about->image }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 hide" id="img_sec">
                                        <div class="form-group">
                                            <label class="control-label">Image 2</label>
                                            @if($about->image_2 != "")
                                                <img onclick="window.open(this.src)" height="50" width="50" src="{{asset('/images/backend-images/about/'.$about->image_2)}}">
                                            @endif
                                            <input class="form-control" type="file" id="image" name="image_sec">
                                            <input type="hidden" name="cur_image_sec" value="{{ $about->image_2 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <br/>
                                            @if($about->isActive == '1')
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
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Edit</button>
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


<script>

    $(window).on('load', function() {

        var section_condition = $("#section_condition").val();    

        if (section_condition == 1) {

            $('#title_f').removeClass('hide'); 
            $('#title_sec').removeClass('hide'); 
            $('#dec_f').removeClass('hide'); 
            $('#img_f').addClass('hide'); 

            $('#dec_sec').addClass('hide'); 
            $('#img_sec').addClass('hide'); 

        } else if (section_condition == 2) {

            $('#title_f').addClass('hide'); 
            $('#dec_f').addClass('hide'); 
            $('#img_f').removeClass('hide'); 

            $('#title_sec').addClass('hide'); 
            $('#dec_sec').addClass('hide'); 
            $('#img_sec').addClass('hide'); 
            
        }  else if (section_condition == 3 || section_condition == 4) {

            $('#title_f').removeClass('hide'); 
            $('#title_sec').removeClass('hide'); 
            $('#dec_f').removeClass('hide'); 
            $('#img_f').removeClass('hide'); 

            $('#dec_sec').addClass('hide'); 
            $('#img_sec').addClass('hide'); 
            
        }  else if (section_condition == 5) {

            $('#title_f').removeClass('hide'); 
            $('#title_sec').removeClass('hide'); 
            $('#dec_f').removeClass('hide'); 
            $('#img_f').addClass('hide'); 

            $('#dec_sec').removeClass('hide'); 
            $('#img_sec').addClass('hide'); 
            
        }  else if (section_condition == 6) {

            $('#title_f').addClass('hide'); 
            $('#dec_f').addClass('hide'); 
            $('#img_f').removeClass('hide'); 

            $('#title_sec').addClass('hide'); 
            $('#dec_sec').addClass('hide'); 
            $('#img_sec').removeClass('hide'); 
            
        }  else {

            $('#title_f').addClass('hide'); 
            $('#dec_f').addClass('hide'); 
            $('#img_f').addClass('hide'); 

            $('#title_sec').addClass('hide'); 
            $('#dec_sec').addClass('hide'); 
            $('#img_sec').addClass('hide'); 
            
        }  
        
    });

</script>

@endsection
