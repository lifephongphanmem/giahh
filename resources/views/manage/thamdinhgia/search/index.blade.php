@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>


@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ<small>&nbsp;thẩm định giá</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        <a href="{{url('timkiem-thamdinhgia')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-mail-reply"></i> Quay lại tìm kiếm </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Thời điểm <br>thẩm định</th>
                            <th style="text-align: center">Số thông báo <br>kết luận</th>
                            <th style="text-align: center" width="10%">Địa điểm thẩm định</th>
                            <th style="text-align: center" width="15%">Tên tài sản</th>
                            <th style="text-align: center" width="15%">Thông số kỹ thuật</th>
                            <th style="text-align: center" width="15%">Nguồn gốc</th>
                            <th style="text-align: center" width="10%">Đơn vị<br> tính</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Giá thẩm định</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td>{{getDayVn($tt->thoidiem)}}</td>
                                <td>{{$tt->sotbkl}}</td>
                                <td>{{$tt->diadiem}}</td>
                                <td class="active">{{$tt->tents}}</td>
                                <td>{{$tt->thongsokt}}</td>
                                <td>{{$tt->nguongoc}}</td>
                                <td style="text-align: center">{{$tt->dvt}}</td>
                                <td style="text-align: center">{{$tt->sl}}</td>
                                <td style="text-align: right">{{number_format($tt->giatritstd)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>


@stop