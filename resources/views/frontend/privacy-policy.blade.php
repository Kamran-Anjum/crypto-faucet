@extends('layouts.frontLayout.front-design')
@section('content')

<style type="text/css">
    .g-5{
        padding-top: 60px;
        padding-bottom: 60px;
    }

    .mb-3{
        margin-top: 25px;
        padding-bottom: 5px;
    }
    p{
        font-size: 16px;
    }
    li{
        font-size: 16px;
        padding-bottom: 5px;
    }
</style>

<!-- start wpo-page-title -->
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Privacy Policy</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Privacy Policy</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<div class="container">
    <div class="row g-5">
        <div class="col-lg-12">
            {!! html_entity_decode($privacy_policy->description) !!}
        </div>
    </div>
</div>

@endsection