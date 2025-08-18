@extends('layouts.userLayout.user-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Reward</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reward</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Your Total {{ $user_detail->currency }}</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-cash-multiple text-primary"></i></h2>
                            <div class="ml-auto">
                                <h2 class="mb-0 display-6"><span class="font-normal">{{ rtrim(rtrim(sprintf('%.10F', $user_detail->total_reward_value), '0'), '.') }} {{ $user_detail->currency }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Claim Your Reward</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-av-timer text-primary"></i></h2>
                            <div class="ml-auto">
                                <?php
                                    $curTimestamp       = strtotime($cur_time); 
                                    // $nextClaimTimestamp = strtotime($reward_timer->next_claim_after);
                                    $nextClaimTimestamp = strtotime(optional($reward_timer)->next_claim_after ?? 'now');
                                    $dbMinutes = $timer;

                                    // remaining seconds
                                    $remaining = $nextClaimTimestamp - $curTimestamp;

                                    // never negative
                                    if ($remaining < 0) {
                                        $remaining = 0;
                                    }

                                ?>
                                <h2 class="mb-0 display-6"><span class="font-normal" id="timer"></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Get Reward</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-cash-multiple text-primary"></i></h2>
                            <div class="ml-auto">
                                <h2 class="mb-0 display-6"><span class="font-normal">{{ $reward->reward_on }} Reward</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Per Day Calims</h5>
                        <div class="d-flex align-items-center mb-2 mt-4">
                            <h2 class="mb-0 display-5"><i class="mdi mdi-alert-circle-outline text-primary"></i></h2>
                            <div class="ml-auto">
                                <h2 class="mb-0 display-6"><span class="font-normal">{{ $reward_count }} / {{ $per_day_limit }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        @if($reward_count < $per_day_limit)
                            @if(!$reward_timer || $curTimestamp > $nextClaimTimestamp)
                                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/user/faucet') }}" > 
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display(['data-callback' => 'enableBtn']) !!}
                                    </div>
                                    <div class="form-actions pt-5">
                                        <button type="submit" class="btn btn-success" id="verify" disabled> <i class="fa fa-check"></i> Verify</button>    
                                    </div>
                                </form>
                            @else
                                <h3>Your next claim after this timer ends</h3>
                            @endif
                        @else
                            <h3>Your per day reward claim limit ends</h3>
                        @endif
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

<script>
    let remaining = {{ $remaining }};
    let dbMinutes = {{ $dbMinutes }};

    function startTimer() {
        let timerDisplay = document.getElementById("timer");

        if (remaining <= 0) {
            timerDisplay.innerHTML = dbMinutes+":00";
            return;
        }

        let interval = setInterval(function () {
            let minutes = Math.floor(remaining / 60);
            let secs = remaining % 60;

            timerDisplay.innerHTML =
                (minutes < 10 ? "0" : "") + minutes + ":" +
                (secs < 10 ? "0" : "") + secs;

            if (remaining <= 0) {
                clearInterval(interval);
                timerDisplay.innerHTML = "00:00";
                location.reload();
                // window.location.href = "{{ url('/user/reward') }}";
            }
            remaining--;
        }, 1000);
    }

    startTimer();
</script>


@endsection