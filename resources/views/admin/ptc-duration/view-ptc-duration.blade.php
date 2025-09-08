@extends('layouts.adminLayout.admin-design')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12 align-self-center">
                    <h5 class="font-medium text-uppercase mb-0">PTC Duration</h5>
                </div>
                <div class="col-lg-8 col-md-4 col-xs-12 align-self-center">
                    <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                        <ol class="breadcrumb mb-0 justify-content-end p-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">PTC Duration</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="button-group">
                        <a href="{{ url('/admin/add-ptc-duration') }}">
                            <button type="button" class="btn waves-effect waves-light btn-success">Add PTC
                                Duration</button>
                        </a>
                    </div>
                </div>
            </div>
            @if (Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            @if (Session::has('flash_message_success'))
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
                                            <th>Seconds</th>
                                            <th>Token Take</th>
                                            <th>Token Give</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($ptc_durations as $data)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $data->seconds }}</td>
                                                <td>{{ $data->tokens_take_per_view }}</td>
                                                <td>{{ $data->tokens_give_per_view }}</td>
                                                <td>
                                                    @if ($data->isActive == 1)
                                                        Active
                                                    @else
                                                        Deactive
                                                    @endif
                                                </td>

                                                <td class="center">
                                                    <a href="{{ url('/admin/edit-ptc-duration/' . $data->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <button type="button"
                                                        class="btn waves-effect waves-light btn-danger"><a
                                                            class="text-white sa-confirm-delete"
                                                            param-id="{{ $data->id }}" param-route="delete-ptc-duration"
                                                            href="javascript:">Delete</a></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Seconds</th>
                                            <th>Token Take</th>
                                            <th>Token Give</th>
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
