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
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Chọn thời điểm xem<small>&nbsp;báo cáo giá hàng hóa thị trường</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box wi">
                <!--div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                    </div>
                </div-->
                <div class="portlet-body">
                    <div class="table-toolbar">

                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <!--th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                            </th-->
                            <th width="2%" style="text-align: center">STT</th>
                            <!--th style="text-align: center">Mã thời điểm</th-->
                            <th style="text-align: center">Thời điểm</th>
                            <th style="text-align: center">Từ ngày</th>
                            <th style="text-align: center">Đến ngày</th>
                            <th style="text-align: center">Nhóm</th>
                            <th width="15%" style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr>
                            <td style="text-align: center">{{$key + 1}}</td>
                            <!--td>{{$tt->mathoidiem}}</td-->
                            <td class="active">{{$tt->tenthoidiem}}</td>
                            <td>{{$tt->tungay}}</td>
                            <td>{{$tt->denngay}}</td>
                            <td>{{$tt->nhom}}</td>
                            <td>
                                <a href="{{url('thongtin-giathitruong/thoidiem='.$tt->mathoidiem.'/nam='.getGeneralConfigs()['namhethong'].'&pb=all')}}" class="btn btn-default btn-xs mbs">
                                    <i class="fa fa-edit"></i> Xem báo cáo</a>
                            </td>
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
@stop