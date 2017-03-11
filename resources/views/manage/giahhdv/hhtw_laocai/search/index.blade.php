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
        Thông tin giá hàng hóa trong nước<small> do TW quy định</small>
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
                        <a href="{{url('timkiem-giahhdv-trunguong')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-mail-reply"></i> Quay lại tìm kiếm </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Thời gian nhập</th>
                            <th style="text-align: center">Phòng ban</th>
                            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Giá từ</th>
                            <th style="text-align: center">Giá đến</th>
                            <th style="text-align: center" width="10%">Nguồn tin</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($model)
                            @foreach($model as $key=>$tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{getDayVn($tt->tgnhap)}}</td>
                                    <td>{{$tt->tenpb}}</td>
                                    <td class="active">{{$tt->tenhh}}</td>
                                    <td style="text-align: center;">{{number_format($tt->soluong)}}</td>
                                    <td style="text-align: right">{{number_format($tt->giatu)}}</td>
                                    <td style="text-align: right">{{number_format($tt->giaden)}}</td>
                                    <td>{{$tt->nguontin}}</td>
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