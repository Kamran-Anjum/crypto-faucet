@extends('layouts.userLayout.user-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Withdrawal</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Withdrawal</li>
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

                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning alert-block">
                            <h4><strong>Instructions</strong></h4>
                            <p style="font-size: 16px">For FaucetPay withdrawal method. Please create a FaucetPay account <strong style="font-size: large"><a href="https://faucetpay.io/">here</a></strong> and use your email address as Wallet</p>
                        </div>

                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/user/withdrawal') }}" > 
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Address </label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Tokens </label>
                                            <input type="number" name="tokens" id="tokens" value="{{ $user_detail->total_reward }}" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Amount </label>
                                            <input type="number" name="amount" id="amount" value="{{ (int) ($cur_total * 100000000) }}" class="form-control" placeholder="" readonly>
                                            {{-- <input type="number" name="amount" id="amount" value="{{ rtrim(rtrim(sprintf('%.8F', $cur_total), '0'), '.') }}" class="form-control" placeholder="" readonly> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Currency </label>
                                            <input type="nuber" name="currency" id="currency" value="{{ $user_detail->currency }}" class="form-control" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display(['data-callback' => 'enableBtn']) !!}
                                </div>
                                <hr>
                            </div>
                            <div class="form-actions mt-5">
                                <button type="submit" class="btn btn-success" id="verify" disabled> <i class="fa fa-check"></i> Withdrawal</button>
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
                                        <th>FaucetPay Address</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                        <th>TX ID</th>
                                        <th>Withdrawal On</th>
                                        {{-- <th>Action</th> --}}
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
                                           
                                            {{-- <td class="center"> --}}
                                                {{-- <a href="{{ url('/admin/view-contact-message/'.$data->id)}}" class="btn btn-primary">View Full Message</a> --}}
                                               {{-- <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{$data->id}}" param-route="delete-contact-message" href="javascript:">Delete</a></button> --}}
                                            {{-- </td> --}}
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
                                        {{-- <th>Action</th> --}}
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

<script>
function enableBtn() {
    document.getElementById("verify").disabled = false;
}
</script>


@endsection