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
        Thông tin giá đất<small> theo phân loại đất</small>
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
                        <a href="{{url('timkiem_giadat_phanloai')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-mail-reply"></i> Quay lại tìm kiếm </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                            <tr>
                                <th width="2%" style="text-align: center">STT</th>
                                <th width="10%" style="text-align: center">Phòng ban</th>
                                <th style="text-align: center">Thời gian nhập</th>
                                <th style="text-align: center">Thời gian áp dụng</th>
                                <th style="text-align: center">Khu vực</th>
                                <th style="text-align: center">Vị trí 1</th>
                                <th style="text-align: center">Vị trí 2</th>
                                <th style="text-align: center">Vị trí 3</th>
                                <th style="text-align: center">Vị trí 4</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($model))
                            @foreach($model as $key=>$tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$tt->tenpb}}</td>
                                    <td>{{getDayVn($tt->tgnhap)}}</td>
                                    <td>{{getDayVn($tt->tgapdung)}}</td>
                                    <td class="active">{{$tt->khuvuc}}</td>
                                    <td style="text-align: center">{{number_format($tt->vitri1)}}</td>
                                    <td style="text-align: right">{{number_format($tt->vitri2)}}</td>
                                    <td style="text-align: right">{{number_format($tt->vitri3)}}</td>
                                    <td style="text-align: right">{{number_format($tt->vitri4)}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" style="text-align: center">Không tìm thấy thông tin</td>
                            </tr>
                        @endif
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