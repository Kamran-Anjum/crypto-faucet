@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">User Details</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="button-group">
                    <a href="{{ url('admin/view-users') }}"><button type="button" class="btn waves-effect waves-light btn-success">Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content container-fluid">
        <style type="text/css">
            body{
                color: #1a202c;
                text-align: left;
                background-color: #e2e8f0;    
            }
            .main-body {
                padding: 15px;
            }
            .card {
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
            }

            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0,0,0,.125);
                border-radius: .25rem;
            }

            .card-body {
                flex: 1 1 auto;
                min-height: 1px;
                padding: 1rem;
            }

            .gutters-sm {
                margin-right: -8px;
                margin-left: -8px;
            }

            .gutters-sm>.col, .gutters-sm>[class*=col-] {
                padding-right: 8px;
                padding-left: 8px;
            }
            .mb-3, .my-3 {
                margin-bottom: 1rem!important;
            }

            .bg-gray-300 {
                background-color: #e2e8f0;
            }
            .h-100 {
                height: 100%!important;
            }
            .shadow-none {
                box-shadow: none!important;
            }
        </style>

        <div class="row gutters-sm">
            <div class="col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="d-flex align-items-center mb-3">User Details</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                {{ $user->userName }}
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                {{ $user->userEmail }} 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Reg. on</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                {{ date('j M Y', strtotime($user->created_at)) }} 
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Status</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                @if($user->isActive == 1)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Experiance</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                {{ $user->experiance }}
                            </div>                  
                            <div class="col-sm-2">
                                <h6 class="mb-0">:Level</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                {{ $user->level }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2">
                                <h6 class="mb-0">Tokens per Claim</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                {{ $user->base_reward_token }}
                            </div>
                            <div class="col-sm-2">
                                <h6 class="mb-0">Status</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                @if($user->isActive == 1)
                                    Active
                                @else
                                    Deactive
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <h4 class="d-flex align-items-center mb-3">Withdrawal Details</h4>
                        <hr>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
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
