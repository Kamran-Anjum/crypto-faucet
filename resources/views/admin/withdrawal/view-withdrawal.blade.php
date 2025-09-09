@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">User Withdrawals</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/amdin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Withdrawals</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12">

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

                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>User Name</th>
                                        <th>FaucetPay Address</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                        <th>TX ID</th>
                                        <th>Withdrawal On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($withdrawals as $data)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><a href="{{ url('/admin/view-user/'.$data->user_id)}}">{{ $data->userName }}</a></td>
                                            <td>{{ $data->address }}</td>
                                            <td>{{ $data->amount }}</td>
                                            <td>{{ $data->currency }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->tx_id }}</td>
                                            <td>{{ date('d M Y', strtotime($data->created_at)) }}</td>                               
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S No.</th>
                                        <th>User Name</th>
                                        <th>FaucetPay Address</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                        <th>TX ID</th>
                                        <th>Withdrawal On</th>
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