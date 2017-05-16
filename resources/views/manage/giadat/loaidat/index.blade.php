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
                var maloaigia = $('#maloaigia').val();
                var url = '/giadat_phanloai/loaidat='+maloaigia+'/nam='+nambc;

                window.location.href = url;
            });
            $('#ttpb').change(function() {
                var nambc = $('#nambc').val();
                var ttpb = $('#ttpb').val();
                var url = '/giathuetn/nam='+nambc+'&pb='+ttpb;

                window.location.href = url;
            });
        })
        function get_attack(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giadat_phanloai_dk/dinhkem',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#dinh_kem').replaceWith(data.message);
                    }
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ giá đất<small> theo phân loại đất</small>
        <input type="hidden" name="maloaigia" id="maloaigia" value="{{$maloaigia}}">
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
                        @if(can('loaidat','create'))
                            <a href="{{url('giadat_phanloai/loaidat='.$maloaigia.'/create')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i>  Thêm mới hồ sơ chi tiết</a>

                            <a href="{{url('giadat_phanloai_dk/loaidat='.$maloaigia.'/create_dk')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Thêm mới hồ sơ đính kèm</a>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="nambc" id="nambc" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                    @if ($nam_stop = intval(date('Y'))) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Phòng ban</th>
                            <th style="text-align: center">Ngày nhập</th>
                            <th style="text-align: center">Ngày áp dụng</th>
                            <th style="text-align: center">Trạng thái</th>
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
                                <td style="text-align: center">
                                    @if($tt->trangthai == 'Hoàn tất')
                                        <span class="label label-sm label-success">Hoàn tất</span>
                                    @else
                                        <span class="label label-sm label-danger">Chưa hoàn tất</span>
                                    @endif
                                </td>
                                <td>
                                    @if($tt->trangthai == 'Hoàn tất')
                                        @if($tt->phanloai == 'DINHKEM')
                                            <button type="button" onclick="get_attack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#dinhkem-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Tải file đính kèm</button>
                                        @else
                                            <a href="{{url('giadat_phanloai/'.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                        @endif
                                    @else
                                        @if(can('loaidat','edit') && $tt->mahuyen == session('admin')->mahuyen)
                                            @if($tt->phanloai == 'DINHKEM')
                                                <a href="{{url('giadat_phanloai_dk/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            @else
                                                <a href="{{url('giadat_phanloai/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            @endif
                                        @endif
                                        @if(can('loaidat','delete') && $tt->mahuyen == session('admin')->mahuyen)
                                            <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Xóa</button>
                                        @endif
                                        @if(can('loaidat','approve'))
                                            <button type="button" onclick="confirmHoantat('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoantat-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn tất</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--div class="col-md-offset-5 col-md-2">
                    <a class="btn blue" href="{{url('/giathuetn')}}"><i class="fa fa-mail-reply"></i> Quay lại</a>
                </div-->
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <!--Modal Delete-->
    @include('includes.e.modal-delete')
    <!--Modal Hoàn tất-->
    @include('includes.e.modal-approve')
    @include('includes.e.modal-attackfile')
@stop