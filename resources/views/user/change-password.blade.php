@extends('layouts.userLayout.user-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Edit</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/user/change-password') }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" id="name" name="name" value="{{ $user_info->name }}" class="form-control" placeholder="" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" id="email" name="email" value="{{ $user_info->email }}" class="form-control" placeholder="" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Current Password</label>
                                            <input type="password" name="currentPassword" id="currentPassword" class="form-control" placeholder="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">New Password </label>
                                            <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="" >
                                            <small id="password_msg" style="display: none; color: red;">(Password must be atleast 8 characters long.)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Confirm Password </label>
                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="" >
                                            <small id="confirm_password_msg" style="display: none; color: red;">(Password not match.)</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success" id="change_password" disabled> <i class="fa fa-check"></i> Edit</button>
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
