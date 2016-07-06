@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
        Thông tin <small>cấu hình hệ thống</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        <a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-check"></i> Edit </a>
                        <a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="user" class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td style="width:15%">
                                <b>Username</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">
                                Simple text field </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                First name
                            </td>
                            <td>
                                <span class="text-muted">
                                Required text field, originally empty </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop