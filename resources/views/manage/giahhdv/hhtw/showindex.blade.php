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
                var thoidiem = $('#thoidiem').val();
                var url = '/thongtin-tw/thoidiem='+thoidiem+'/nam='+nambc+'&pb=all';

                window.location.href = url;
            });
            $('#ttpb').change(function() {
                var nambc = $('#nambc').val();
                var ttpb = $('#ttpb').val();
                var thoidiem = $('#thoidiem').val();
                var url = '/thongtin-tw/thoidiem='+thoidiem+'/nam='+nambc+'&pb='+ttpb;

                window.location.href = url;
            });
        })
    </script>


@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ<small>&nbsp;giá hàng hóa, dịch vụ do địa phương quy định</small>
    </h3>
    <input type="hidden" name="thoidiem" id="thoidiem" value="{{$thoidiem}}">

    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <select name="nambc" id="nambc" class="form-control">
                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                    @if ($nam_stop = intval(date('Y')) + 5 ) @endif
                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                        <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>{{$i}}</option>
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
                <!--div class="portlet-title">
                    <div class="caption">

                    </div>
                    <div class="actions">

                    </div>
                </div-->
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Phòng ban</th>
                            <th style="text-align: center" width="20%">Ngày nhập</th>
                            <th style="text-align: center" width="25%%">Thị trường</th>
                            <th style="text-align: center">Loại giá</th>
                            <th style="text-align: center">Loại hàng hóa</th>
                            <!--th style="text-align: center">Trạng thái</th-->
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active">{{$tt->tenpb}}</td>
                                <td>{{getDayVn($tt->tgnhap)}}</td>
                                <td>{{$tt->thitruong}}</td>
                                <td>{{$tt->tenloaigia}}</td>
                                <td>{{$tt->tenloaihh}}</td>
                                <!--td style="text-align: center">
                                    @if($tt->trangthai == 'Công bố')
                                        <span class="label label-sm label-success">
									    Công bố </span>
                                    @else
                                        <span class="label label-sm label-danger">
										Chưa công bố </span>
                                    @endif
                                </td-->
                                <td>

                                    @if($tt->hoso == 'CHITIET')
                                        <a href="{{url('thongtin-tw/'.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                    @else
                                        <a href="{{url('/data/uploads/attack/'.$tt->filedk)}}" class="btn btn-default btn-xs mbs" target="_blank">Tải file đính kèm</a>
                                    @endif

                                    @if(session('admin')->level == 'T')
                                        <button type="button" onclick="confirmHuy('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huy-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hủy hoàn thành</button>
                                        <!--a href="{{url('hoso-thamdinhgia/'.$tt->mahs.'/history')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Lịch sử</a-->
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-offset-5 col-md-2">
                    <a class="btn blue" href="{{url('/thongtin-tw')}}"><i class="fa fa-mail-reply"></i>  Quay lại</a>
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