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

            $('#namvb').change(function() {
                var namvb = $('#namvb').val();
                var url = '/thongtu-quyetdinh-tw/nam='+namvb+'&pl=all';

                window.location.href = url;
            });
            $('#plvb').change(function() {
                var namvb = $('#namvb').val();
                var plvb = $('#plvb').val();
                var url = '/thongtu-quyetdinh-tw/nam='+namvb+'&pl='+plvb;

                window.location.href = url;
            });
        })
        function confirmDelete(id) {
            document.getElementById("iddelete").value=id;
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tư quyết định<small>&nbsp;nhà nước</small>
    </h3>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <select name="namvb" id="namvb" class="form-control">
                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                    @if ($nam_stop = intval(date('Y')) + 5 ) @endif
                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                        <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control" name="plvb" id="plvb">
                    <option value="all" {{$pl == 'all' ? 'selected' : ''}}>--Loại văn bản--</option>
                    <option value="TT" {{$pl == 'TT' ? 'selected' : ''}}>Thông tư</option>
                    <option value="QD" {{$pl == 'QD' ? 'selected' : ''}}>Quyết định</option>
                </select>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                @if(session('admin')->level == 'T')
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">

                        <a href="{{url('thongtu-quyetdinh-tw/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới </a>
                        <a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a>
                    </div>
                </div>
                @endif
                <div class="portlet-body">
                    <!--div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Ngày ban hành</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Áp dụng từ ngày</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label></label>
                                    <button type="button" class="btn btn-default"><i class="fa fa-search"></i> Tìm kiếm</button>
                                </div>
                            </div>
                    </div-->
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Đơn vị ban hành</th>
                            <th style="text-align: center" width="10">Loại văn bản</th>
                            <th style="text-align: center" width="15%">Ngày ban hành/<br>Ngày áp dụng</th>
                            <th style="text-align: center">Tiêu đề</th>
                            <th style="text-align: center">Ghi chú</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active">{{$tt->dvbanhanh}}</td>
                                @if($tt->plttqd == 'TT')
                                <td style="text-align: center">
                                    Thông tư
                                </td>
                                @else
                                <td style="text-align: center">
                                    Quyết định
                                </td>
                                @endif
                                <td style="text-align: center">{{getDayVn($tt->ngaybh)}} || {{getDayVn($tt->ngayad)}}</td>
                                <td class="success">{{$tt->tieude}}</td>
                                <td>{{$tt->ghichu}}</td>
                                <td>
                                    <a href="{{url('thongtu-quyetdinh-tw/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                    @if($tt->tailieu)
                                    <a href="{{url('/data/uploads/ttqd/'.$tt->tailieu)}}"><span class="btn btn-default btn-xs mbs"><i class="fa fa-download"></i> Tải tệp</span></a>
                                    @endif
                                    <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                        Xóa</button>
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
    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'thongtu-quyetdinh-tw/delete','id' => 'frm_delete'])!!}
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