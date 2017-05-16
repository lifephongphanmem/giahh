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
                var url = '/gia-thuetruocba/nam='+namhs;

                window.location.href = url;
            });

        })
        function confirmDelete(id) {
            document.getElementById("iddelete").value=id;
        }
        function confirmHoantat(id) {
            document.getElementById("idhoantat").value=id;
        }
        function get_attack(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/gia-thuetruocba-dk/dinhkem',
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
        Thông tin bảng giá<small>&nbsp;thuế trước bạ</small>
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
                        <a href="{{url('gia-thuetruocba/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới hồ sơ chi tiết </a>
                        <a href="{{url('gia-thuetruocba-dk/create')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới hồ sơ đính kèm</a>
                        <!--a href="{{url('hoso-thamdinhgia/import')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Import file</a-->
                        <!--a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a-->
                    </div>
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
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Ngày nhập</th>
                            <th style="text-align: center">Số quyết định</th>
                            <th style="text-align: center">Loại xe</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center" width="33%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active" style="text-align: center">{{getDayVn($tt->ngaynhap)}}</td>
                                <td style="text-align: center">{{$tt->soqd}}</td>
                                <td style="text-align: center">{{$tt->tenloai}}</td>
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
                                    @if($tt->trangthai == 'Hoàn tất')
                                        @if($tt->hoso == 'DINHKEM')
                                            <button type="button" onclick="get_attack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#dinhkem-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Tải file đính kèm</button>
                                        @else
                                            <a href="{{url('gia-thuetruocba/'.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                        @endif
                                    @else
                                        @if(can('gttruocba','edit'))
                                            @if($tt->hoso == 'DINHKEM')
                                                <a href="{{url('gia-thuetruocba-dk/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            @else
                                                <a href="{{url('gia-thuetruocba/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            @endif
                                        @endif

                                        @if(can('gttruocba','delete'))
                                            <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            Xóa</button>
                                        @endif

                                        @if(can('gttruocba','approve'))
                                            <button type="button" onclick="confirmHoantat('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoantat-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn tất</button>
                                        @endif

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
    @include('includes.e.modal-attackfile')
    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'gia-thuetruocba/delete','id' => 'frm_delete'])!!}
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
        {!! Form::open(['url'=>'gia-thuetruocba/hoantat','id' => 'frm_hoantat'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hoàn tất hồ sơ?</h4>

                    <input type="hidden" name="idhoantat" id="idhoantat">

                </div>
                <div class="modal-body">
                    <h5><i style="color: #0000FF">Hồ sơ đã hoàn tất sẽ không được phép chỉnh sửa và hủy hoàn tất hồ sơ nữa!Bạn cần liên hệ cơ quan chủ quản để chỉnh sửa hồ sơ nếu cần!</i></h5>
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