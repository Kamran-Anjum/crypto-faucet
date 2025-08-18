@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Edit User</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="page-content container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8">
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-user/'.$user->id) }}" > {{ csrf_field() }}
                            <div class="form-body">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Full Name<span style="color: red;">*</span></label>
                                            <input required type="text" id="name" name="name" class="form-control" placeholder="" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email<span style="color: red;">*</span></label>
                                            <input required type="text" id="email" name="email" class="form-control" placeholder="" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <br/>
                                            @if($user->isActive == '1')
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
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                <a href="{{ url('/admin/view-users')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-4">

                @if(Session::has('flash_message_error1'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_error1') !!}</strong>
                    </div>
                @endif
                @if(Session::has('flash_message_success1'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_success1') !!}</strong>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/user/change-password') }}" > {{ csrf_field() }}
                            <div class="form-body">
                                <input type="hidden" id="chkemail" name="chkemail" class="form-control" value="{{ $user->email }}">
                                <div class="row">
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input required type="password" id="newPassword" name="newpassword" class="form-control" placeholder="Enter New Password">
                                            <small id="password_msg" style="display: none; color: red;">(Password must be atleast 8 characters long.)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password</label>
                                        <input required type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Re-Enter New Password">
                                            <small id="confirm_password_msg" style="display: none; color: red;">(Password not match.)</small>
                                    </div>
                               </div>
                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success" id="change_password" disabled> <i class="fa fa-check"></i> Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    window.onload = function () {

        $('#newPassword').keyup(function(e) {

            var var_Password = $("#newPassword").val();

            if (var_Password.length < 8){
              $('#password_msg').css('display', 'block');
            }else{
                $('#password_msg').css('display', 'none');
            }

        });

        $('#confirmPassword').keyup(function(e) {

            var var_Password = $("#newPassword").val();
            var var_Confirm_Password = $("#confirmPassword").val();

            if (var_Password != var_Confirm_Password){
                $('#confirm_password_msg').css('display', 'block');
                $('#change_password').prop('disabled', true);
            }else{
                $('#confirm_password_msg').css('display', 'none');
                $('#change_password').prop('disabled', false);
            }

        });
            
    }

</script>

@endsection
