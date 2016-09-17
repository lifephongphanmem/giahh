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
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Danh mục hàng hóa<small>&nbsp;thị trường</small>
    </h3>
    <h4 style="color: #0000ff">Nhóm hàng hóa: {{$tennhom}}</h4>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption" >
                    </div>
                    <div class="actions">
                        <a href="{{url('dmhanghoa-thitruong/nhom='.$nhom.'/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">

                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <!--th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                            </th-->
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center" width="10%">Mã hàng hóa</th>
                            <th style="text-align: center">Tên hàng hóa</th>
                            <th style="text-align: center">Đặc điểm kỹ thuật</th>
                            <th style="text-align: center">Đơn vị tính</th>
                            <th style="text-align: center">Nơi sản xuất</th>
                            <th style="text-align: center">Theo dõi</th>
                            <th width="15%" style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td style="text-align: center">{{$tt->mahh}}</td>
                                <td class="active">{{$tt->tenhh}}</td>
                                <td>{{$tt->dacdiemkt}}</td>
                                <td>{{$tt->dvt}}</td>
                                <td>{{$tt->nsx}}</td>
                                <td width="10%" style="text-align: center">
                                    @if($tt->theodoi == 'Có')
                                        <span class="label label-sm label-success">
										Theo dõi </span>
                                    @else
                                        <span class="label label-sm label-danger">
										Không theo dõi </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('dmhanghoa-thitruong/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                    <button type="button" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal" onclick="getId('{{$tt->id}}')">
                                        <i class="fa fa-trash-o"></i>&nbsp; Xóa</button>
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
    <div class="clearfix"></div>
    <div class="modal fade" id="delete-modal-confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'dmhanghoa-thitruong/delete','id' => 'frm_delete'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa?</h4>
                </div>
                <input type="hidden" name="iddelete" id="iddelete">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDelete()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        function ClickDelete(){
            $('#frm-demlete').submit();
        }
    </script>
@stop