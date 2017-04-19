@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
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
        Thông tin giá đất theo phân loại đất<small></small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập</label>
                                        <input type="date" id="tgnhap" name="tgnhap" class="form-control required" autofocus value="{{$model->tgnhap}}" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời điểm áp dụng</label>
                                        <input type="date" id="tgapdung" name="tgapdung" class="form-control required" value="{{$model->tgapdung}}">
                                    </div>
                                </div>
                            </div>


                            <!--/row-->
                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                                        <thead>
                                            <tr style="background: #F5F5F5">
                                                <th width="2%" style="text-align: center">STT</th>
                                                <th style="text-align: center">Khu vực</th>
                                                <th style="text-align: center">Vị trí 1</th>
                                                <th style="text-align: center">Vị trí 2</th>
                                                <th style="text-align: center">Vị trí 3</th>
                                                <th style="text-align: center">Vị trí 4</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ttts">
                                        @foreach($modeltthh as $key=>$ct)
                                            <tr>
                                                <td style="text-align: center">{{($key + 1) }} </td>
                                                <td class="active">{{ $ct->khuvuc }}</td>
                                                <td style="text-align: right">{{number_format($ct->vitri1) }}</td>
                                                <td style="text-align: right">{{ number_format($ct->vitri2) }}</td>
                                                <td style="text-align: right">{{ number_format($ct->vitri3) }}</td>
                                                <td style="text-align: right">{{ number_format($ct->vitri4) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row" style="text-align: center">
            <a href="{{url('thongtin_giadat_phanloai/loaidat='.$ct->maloaigia.'/nam='.$model->nam.'&pb=all')}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
        </div>
            <!-- END VALIDATION STATES-->
    </div>
@stop