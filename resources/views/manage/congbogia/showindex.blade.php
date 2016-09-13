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
                var url = '/thongtin-congbogia/nam='+namhs+'&pb=all';

                window.location.href = url;
            });
            $('#ttpb').change(function() {
                var namhs = $('#namhs').val();
                var ttpb = $('#ttpb').val();
                var url = '/thongtin-congbogia/nam='+namhs+'&pb='+ttpb;

                window.location.href = url;
            });
        })
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin hồ sơ<small>&nbsp;công bố giá</small>
    </h3>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <select name="namhs" id="namhs" class="form-control">
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
                    <div class="actions">
                    </div>
                </div-->
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Phòng ban</th>
                            <th style="text-align: center">Phân loại hồ sơ</th>
                            <th style="text-align: center">Nguồn vốn</th>
                            <th style="text-align: center" width="10">Số hồ sơ</th>
                            <th style="text-align: center" width="15%">Số thông báo<br>kết luận</th>
                            <th style="text-align: center">Thời điểm nhập</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td class="active">{{$tt->tenpb}}</td>
                                <td>{{$tt->plhs}}</td>
                                <td>{{$tt->nguonvon}}</td>
                                <td>{{$tt->sohs}}</td>
                                <td>{{$tt->sotbkl}}</td>
                                <td>{{getDayVn($tt->ngaynhap)}}</td>
                                <td>
                                    <a href="{{url('hoso-congbogia/'.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
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
@stop