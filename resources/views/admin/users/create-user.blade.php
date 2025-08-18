@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Create User</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create User</li>
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/create-user') }}" > {{ csrf_field() }}
                            <div class="form-body">

                                <h5 class="card-title">User Details</h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Full Name<span style="color: red;">*</span></label>
                                            <input required type="text" id="name" name="name" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email<span style="color: red;">*</span></label>
                                            <input required type="email" id="email" name="email" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Password<span style="color: red;">*</span></label>
                                            <input required type="password" id="password" name="password" required class="form-control" placeholder="">
                                            <small id="password_msg" style="display: none; color: red;">(Password must be atleast 8 characters long.)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Confirm Password<span style="color: red;">*</span></label>
                                            <input required type="password" id="confirmPassword" name="confirmPassword" required class="form-control" placeholder="">
                                            <small id="confirm_password_msg" style="display: none; color: red;">(Password not match.)</small>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success" id="add_user" disabled> <i class="fa fa-check"></i> Add</button>
                                <a href="{{ url('/admin/view-users')}}"><button type="button" class="btn btn-dark">Cancel</button></a>
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

        $('#password').keyup(function(e) {

            var var_Password = $("#password").val();

            if (var_Password.length < 8){
              $('#password_msg').css('display', 'block');
            }else{
                $('#password_msg').css('display', 'none');
            }

        });

        $('#confirmPassword').keyup(function(e) {

            var var_Password = $("#password").val();
            var var_Confirm_Password = $("#confirmPassword").val();

            if (var_Password != var_Confirm_Password){
                $('#confirm_password_msg').css('display', 'block');
                $('#add_user').prop('disabled', true);
            }else{
                $('#confirm_password_msg').css('display', 'none');
                $('#add_user').prop('disabled', false);
            }

        });
            
    }

</script>

@endsection

