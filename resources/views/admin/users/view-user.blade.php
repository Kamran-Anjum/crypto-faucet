@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">List Users</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Users</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="button-group">
                    <a href="{{ url('admin/create-user') }}"><button type="button" class="btn waves-effect waves-light btn-success">Add New</button></a>
                </div>
            </div>
        </div>
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
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

    </div>

    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Experiance</th>
                                        <th>Level</th>
                                        <th>Tokens Per Claim</th>
                                        <th>Reg. On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($users as $user)
                                        <tr class="gradeX">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->userName }}</td>
                                            <td>{{ $user->userEmail }}</td>
                                            <td>{{ $user->experiance }}</td>
                                            <td>{{ $user->level }}</td>
                                            <td>{{ $user->base_reward_token }}</td>
                                            <td>{{ date('j M Y', strtotime($user->created_at)) }}</td>
                                            <td>
                                                @if($user->isActive == 1)
                                                    Active
                                                @else
                                                    Deactive
                                                @endif
                                            </td>
                                            <td class="center">
                                                <a href="{{ url('/admin/view-user/'.$user->user_id ) }}" class="btn btn-info btn-mini">View Details</a>
                                                <a href="{{ url('/admin/edit-user/'.$user->user_id ) }}" class="btn btn-primary btn-mini">Edit</a>

                                                    <!-- <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{ $user->id }}" param-route="delete-user" href="javascript:">Delete</a></button> -->
                                               
                                                    <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-warning-delete" param-name="{{$user->userName}}" href="javascript:">Remove</a></button>
                                               

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Experiance</th>
                                        <th>Level</th>
                                        <th>Tokens Per Claim</th>
                                        <th>Reg. On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
