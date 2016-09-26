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
                var url = '/hoso-congbogia/nam='+namhs+'&pb=all';

                window.location.href = url;
            });
        })
        function confirmDelete(id) {
            document.getElementById("iddelete").value=id;
        }
        function confirmHoantat(id) {
            document.getElementById("idhoantat").value=id;
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin hồ sơ<small>&nbsp;công bố giá VLXD</small>
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

    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(can('congbogia','create'))
                        <a href="{{url('hoso-congbogia/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới </a>
                        <a href="{{url('hoso-congbogia/import')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Import file</a>
                        @endif
                        <!--a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a-->
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center" width="15%">Phòng ban</th>
                            <th style="text-align: center" width="10%">Thời điểm nhập</th>
                            <th style="text-align: center" width="10%">Phân loại hồ sơ</th>
                            <th style="text-align: center">Nguồn vốn</th>
                            <th style="text-align: center" width="10%">Số hồ sơ</th>
                            <th style="text-align: center" width="10%">Số thông báo<br>kết luận</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center" width="33%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key +1}}</td>
                                <td class="active">{{$tt->tenpb}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngaynhap)}}</td>
                                <td>{{$tt->plhs}}</td>
                                <td>{{$tt->nguonvon}}</td>
                                <td>{{$tt->sohs}}</td>
                                <td>{{$tt->sotbkl}}</td>
                                <td style="text-align: center">
                                    @if($tt->trangthai == 'Đang làm')
                                        <span class="label label-sm label-danger">
										Đang làm </span>
                                    @else
                                        <span class="label label-sm label-success">
										Hoàn tất </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('hoso-congbogia/'.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                    @if($tt->trangthai != 'Hoàn tất')
                                        @if(can('congbogia','edit'))
                                        <a href="{{url('hoso-congbogia/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        @endif
                                        @if(can('congbogia','delete'))
                                        <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            Xóa</button>
                                        @endif
                                        @if(can('congbogia','approve'))
                                        <button type="button" onclick="confirmHoantat('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoantat-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn tất</button>
                                        @endif
                                    @endif
                                    <!--a href="" class="btn btn-default btn-xs mbs"><i class="fa fa-search"></i>&nbsp;Lịch sử</a-->
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
        {!! Form::open(['url'=>'hoso-congbogia/delete','id' => 'frm_delete'])!!}
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
    <!--Modal Hoàn tất-->
    <div id="hoantat-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'hoso-congbogia/hoantat','id' => 'frm_hoantat'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hoàn tất hồ sơ?</h4>

                    <input type="hidden" name="idhoantat" id="idhoantat">

                </div>
                <div class="modal-body">
                    <h5<i style="color: #0000FF">Hồ sơ đã hoàn tất sẽ không được phép chỉnh sửa và hủy hoàn tất hồ sơ nữa!Bạn cần liên hệ cơ quan chủ quản để chỉnh sửa hồ sơ nếu cần!</i></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhoantat()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickhoantat(){
            $('#frm_hoantat').submit();
        }
    </script>

@stop