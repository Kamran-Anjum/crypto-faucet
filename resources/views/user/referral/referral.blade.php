@extends('layouts.userLayout.user-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Referral</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Referral</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Referral link</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-link-variant text-primary"></i></h2>
                            <div class="ml-auto">
                                <h2 class="mb-0 "><span class="font-normal" style="background-color: lightcyan;">http://localhost:8000/ref={{ $user_referral->referral_code }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Referrals</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-account-multiple text-primary"></i></h2>
                            <div class="ml-auto">
                                <h2 class="mb-0 display-6"><span class="font-normal">{{ $referrals }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Commision</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-percent text-primary"></i></h2>
                            <div class="ml-auto">
                                <h2 class="mb-0 display-6"><span class="font-normal">{{ $ref_per->referral_percentage }} %</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(count($referral_users) > 0)
            <div class="row">
                <div class="col-12">
                    <div class="material-card card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Username</th>
                                            <th>Reg. On</th>
                                            <th>Total Claims</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($referral_users as $data)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ date('j M Y', strtotime($data->created_at)) }}</td>
                                                <td>{{ $data->total_claim_count }}</td>           
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Username</th>
                                            <th>Reg. On</th>
                                            <th>Total Claims</th>
                                        </tr>
                                    </tfoot>
                                </table>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


@endsection