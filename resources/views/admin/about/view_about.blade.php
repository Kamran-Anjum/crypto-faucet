@extends('layouts.adminLayout.admin-design')
@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">About Us</h5>
            </div>
            <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="button-group">
                    <a href="{{ url('/admin/add-about-us')}}">
                        <button type="button" class="btn waves-effect waves-light btn-success">Add About Us</button>
                    </a>
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
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Section No.</th>
                                        <th>Section Condition</th>
                                        <th>Is Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($about_us as $data)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $data->section_no }}</td>
                                            <td>
                                                @if ($data->section_condition == 1)
                                                    Only Text
                                                @elseif ($data->section_condition == 2)
                                                    Only Image
                                                @elseif ($data->section_condition == 3)
                                                    Text - Image
                                                @elseif ($data->section_condition == 4)
                                                    Image - Text
                                                @elseif ($data->section_condition == 5)
                                                    Text - Text
                                                @elseif ($data->section_condition == 6)
                                                    Image - Image
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->isActive == 1)
                                                    Active
                                                @else
                                                    Not Active
                                                @endif
                                            </td>
                                           
                                            <td class="center">
                                                <a href="{{ url('/admin/view-about-us/'.$data->id)}}" class="btn btn-info">Detail</a>
                                                <a href="{{ url('/admin/edit-about-us/'.$data->id)}}" class="btn btn-primary">Edit</a>
                                               <button type="button" class="btn waves-effect waves-light btn-danger"><a class="text-white sa-confirm-delete" param-id="{{$data->id}}" param-route="delete-about-us" href="javascript:">Delete</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Section No.</th>
                                        <th>Section Condition</th>
                                        <th>Is Active</th>
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
