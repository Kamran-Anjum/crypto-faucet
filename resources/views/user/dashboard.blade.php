@extends('layouts.userLayout.user-design')
@section('content')

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Dashboard</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <!-- <button class="btn btn-danger text-white float-right ml-3 d-none d-md-block">Buy Ample Admin</button> -->
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="page-content container-fluid">
        <!-- ============================================================== -->
        <!-- First Cards Row  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Your Total Reward</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-trophy-variant text-primary"></i></h2>
                            <div class="ml-auto">
                                <h2 class="mb-0 display-6"><span class="font-normal">{{ $user_detail->total_reward }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Your Total {{ $user_detail->currency }}</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-cash-multiple text-primary"></i></h2>
                            <div class="ml-auto">
                                <h2 class="mb-0 display-6"><span class="font-normal">{{ rtrim(rtrim(sprintf('%.10F', $cur_total), '0'), '.') }} {{ $user_detail->currency }}</span></h2>
                                <!-- <h2 class="mb-0 display-6"><span class="font-normal">{{ rtrim(rtrim(sprintf('%.10F', $user_detail->total_reward_value), '0'), '.') }} {{ $user_detail->currency }}</span></h2> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

@endsection