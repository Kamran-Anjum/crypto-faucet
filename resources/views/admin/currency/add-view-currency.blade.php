@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Add/View Currencies</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add/View Currencies</li>
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
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/currencies') }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Currency</label>
                                            <input type="text" name="currency" id="currency" class="form-control" placeholder="" required >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Amount</label>
                                            <input type="text" name="value" id="value" class="form-control" placeholder="" required >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Per Tokens</label>
                                            <input type="number" name="per_token" id="per_token" class="form-control" placeholder="" required value="{{ $reward_token->tokens }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-actions" style="margin-top: 30px;">
                                            <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-check"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>

                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Per Token</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($currency as $data)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $data->currency }}</td>
                                            <td>{{ $data->value }}</td>
                                            <td>{{ $data->per_token }}</td>
                                           
                                            <td class="center">
                                                <a href="{{ url('/admin/edit-currency/'.$data->id)}}" class="btn btn-primary">Edit</a>
                                                <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{$data->id}}" param-route="delete-currency" href="javascript:">Delete</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Per Token</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                         </div>
                    </div>
                </div>

            </div>
            <!-- Column -->
        </div>
    </div>
</div>


@endsection
