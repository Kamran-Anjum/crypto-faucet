@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Edit About Home</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit About Home</li>
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-about-home') }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Heading</label>
                                            <input type="text" name="heading" id="heading" class="form-control" placeholder="Title" value="{{ $about->heading }}">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Experiance</label>
                                            <input type="number" name="experiance" id="experiance" class="form-control" placeholder="Title" value="{{ $about->experiance }}">
                                        </div>
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $about->title }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="description" rows="5" id="texteditor" class="form-control">{{ $about->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Image <small style="color: red;">(Size is 650x760)</small></label>
                                            @if($about->image != "")
                                                <img onclick="window.open(this.src)" height="100" width="100" src="{{asset('/images/backend-images/about/'.$about->image)}}">
                                            @endif
                                            <input class="form-control" type="file" id="image" name="image">
                                            <input type="hidden" name="cur_image" value="{{ $about->image }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Signature Image <small style="color: red;">(Size is 240x45)</small></label>
                                            @if($about->signature_image != "")
                                                <img onclick="window.open(this.src)" height="50" width="100" src="{{asset('/images/backend-images/about/'.$about->signature_image)}}">
                                                <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{$about->id}}" param-route="delete-signature-image" href="javascript:">Delete</a></button>
                                            @endif
                                            <input class="form-control" type="file" id="image" name="image_sec">
                                            <input type="hidden" name="cur_image_sec" value="{{ $about->signature_image }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Pop Card Heading</small></label>
                                            <input class="form-control" type="text" id="pop_card" name="pop_card_heading" value="{{ $about->pop_card }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Pop Card Image <small style="color: red;">(Size is 60x60)</small></label>
                                            @if($about->pop_card_image != "")
                                                <img onclick="window.open(this.src)" height="50" width="50" src="{{asset('/images/backend-images/about/'.$about->pop_card_image)}}">
                                            @endif
                                            <input class="form-control" type="file" id="image" name="pop_card_image">
                                            <input type="hidden" name="cur_pop_card_image" value="{{ $about->pop_card_image }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Pop Card Description</label>
                                            <textarea name="pop_card_description" rows="5" class="form-control">{{ $about->pop_card_description }}</textarea>
                                        </div>
                                    </div>
                                </div> -->

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
