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
        Thông tin hồ sơ<small>&nbsp;công bố giá</small>
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
                        <a href="{{url('timkiem-congbogia')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-mail-reply"></i> Quay lại tìm kiếm </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Thời gian<br> công bố giá</th>
                            <th style="text-align: center" width="10%">Phân loại hồ sơ</th>
                            <th style="text-align: center">Số công bố</th>
                            <th style="text-align: center" width="10%">Nguồn vốn</th>
                            <th style="text-align: center" width="15%">Tài sản</th>
                            <th style="text-align: center" width="10%">Đơn vị <br>tính</th>
                            <th style="text-align: center" width="10%">Thông số kỹ thuật</th>
                            <th style="text-align: center" width="10%">Nguồn gốc</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Giá công bố</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td>{{getDayVn($tt->ngaynhap)}}</td>
                                <td>{{$tt->plhs}}</td>
                                <td>{{$tt->sotbkl}}</td>
                                <td>{{$tt->nguonvon}}</td>
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
    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'hoso-thamdinhgia/delete','id' => 'frm_delete'])!!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                        <input type="hidden" name="iddelete" id="iddelete">

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdelete()">Đồng ý</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickdelete(){
            $('#frm_delete').submit();
        }
    </script>

@stop