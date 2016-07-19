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
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        <a href="{{url('cau-hinh-he-thong/'.$model->id.'/edit')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-edit"></i> Chỉnh sửa </a>
                        <a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a>
                        @if(session('admin')->sadmin == 'ssa')
                            <a href="{{url('setting')}}" class="btn btn-default btn-sm">
                                <i class="icon-settings"></i> Setting</a>
                        @endif
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="user" class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td style="width:15%">
                                <b>Mã quan hệ ngân sách</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->madv}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Tên đơn vị</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->donvi}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Địa chỉ</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->diachi}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Thủ trưởng đơn vị</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->thutruong}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Kế toán</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->ketoan}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Người lập biểu</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->nguoilapbieu}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Năm quản lý</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->namhethong}}
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop