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

            $('#namhs').change(function() {
                var namhs = $('#namhs').val();
                var url = '/thongtin-thamdinhgia/nam='+namhs+'&pb=all';

                window.location.href = url;
            });
            $('#ttpb').change(function() {
                var namhs = $('#namhs').val();
                var ttpb = $('#ttpb').val();
                var url = '/thongtin-thamdinhgia/nam='+namhs+'&pb='+ttpb;

                window.location.href = url;
            });
        })
        function confirmHuy(id) {
            document.getElementById("idhuy").value=id;
        }
    </script>


@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ<small>&nbsp;thẩm định giá</small>
    </h3>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <select name="namhs" id="namhs" class="form-control">
                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                    @if ($nam_stop = intval(date('Y'))) @endif
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
                            <th style="text-align: center" width="20%">Phòng ban</th>
                            <th style="text-align: center">Số hồ sơ</th>
                            <th style="text-align: center">Số thông báo<br>kết luận</th>
                            <th style="text-align: center">Thời điểm thẩm định</th>
                            <th style="text-align: center">Thuế VAT</th>
                            <th style="text-align: center">Thời hạn thẩm định</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active">{{$tt->tenpb}}</td>
                                <td style="text-align: center">{{$tt->hosotdgia}}</td>
                                <td style="text-align: center">{{$tt->sotbkl}}</td>
                                <td style="text-align: center">{{getDayVn($tt->thoidiem)}}</td>
                                <td>{{$tt->thuevat}}</td>
                                <td style="text-align: center">{{getDayVn($tt->thoihan)}}</td>
                                <td>
                                    @if($tt->phanloai == 'DINHKEM')
                                        <a href="{{url('/data/uploads/attack/'.$tt->filedk)}}" class="btn btn-default btn-xs mbs" target="_blank">Tải file đính kèm</a>
                                    @else
                                        <a href="{{url('thongtin-thamdinhgia/'.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                    @endif

                                    @if(session('admin')->level == 'T')
                                        <button type="button" onclick="confirmHuy('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huy-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hủy hoàn thành</button>
                                        <a href="{{url('hoso-thamdinhgia/'.$tt->mahs.'/history')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Lịch sử</a>
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
    <!--Modal Hủy-->
    <div id="huy-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'thongtin-thamdinhgia/huy','id' => 'frm_huy'])!!}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy hoàn thành?</h4>
                        <input type="hidden" name="idhuy" id="idhuy">

                    </div>
                    <div class="modal-body">
                        <h5><i style="color: #0000FF">Hồ sơ bị hủy hoàn thành sẽ chuyển lại cho phòng chuyên môn để chỉnh sửa lại thông tin! Hồ sơ sẽ không hiển thị trên màn hình thông tin nữa</i></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhuy()">Đồng ý</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickhuy(){
            $('#frm_huy').submit();
        }
    </script>

@stop