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
        $(function(){
            $('#nambc').change(function() {
                var nambc = $('#nambc').val();
                var ttpb = $('#ttpb').val();
                var maloaigia = $('#maloaigia').val();
                var url = '/giadat_phanloai/loaidat='+maloaigia+'/nam='+nambc+'&pb='+ttpb;
                window.location.href = url;
            });
            $('#ttpb').change(function() {
                var nambc = $('#nambc').val();
                var ttpb = $('#ttpb').val();
                var maloaigia = $('#maloaigia').val();
                var url = '/giadat_phanloai/loaidat='+maloaigia+'/nam='+nambc+'&pb='+ttpb;
                window.location.href = url;
            });
        })
    </script>


@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ giá đất<small> theo phân loại đất</small>
        <input type="hidden" name="maloaigia" id="maloaigia" value="{{$maloaigia}}">
    </h3>

    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <select name="nambc" id="nambc" class="form-control">
                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                    @if ($nam_stop = intval(date('Y')) + 5 ) @endif
                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                        <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>Năm {{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control select2me" id="ttpb" name="ttpb">
                    <option value="all">--Tất cả phòng ban--</option>
                    @foreach($modelpb as $ttpb)
                        <option value="{{$ttpb->ma}}" {{($pb == $ttpb->ma) ? 'selected' : ''}}>{{$ttpb->ten}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Phòng ban</th>
                            <th style="text-align: center">Ngày nhập</th>
                            <th style="text-align: center">Ngày áp dụng</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active">{{$tt->tenpb}}</td>
                                <td>{{getDayVn($tt->tgnhap)}}</td>
                                <td>{{getDayVn($tt->tgapdung)}}</td>
                                <td>
                                    @if($tt->phanloai == 'DINHKEM')
                                        <a href="{{url('/data/uploads/attack/'.$tt->filedk)}}" class="btn btn-default btn-xs mbs" target="_blank">Tải file đính kèm</a>
                                    @else
                                        <a href="{{url('thongtin_giadat_phanloai/'.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                    @endif

                                    @if(session('admin')->level == 'T')
                                        <button type="button" onclick="confirmHuy('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huy-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hủy hoàn thành</button>
                                    @endif
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
    <div class="clearfix">
    </div>
    <!--Modal Huỷ hoàn tất-->
    @include('includes.e.modal-unapprove')
@stop