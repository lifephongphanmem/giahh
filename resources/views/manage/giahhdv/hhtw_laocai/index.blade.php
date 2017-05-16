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
                var masopnhom = $('#masopnhom').val();
                var url = '{{$url}}'+'maso='+masopnhom+'&nam='+nambc;
                window.location.href = url;
            });
        })
        function get_attack(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giahhdv-trunguong-dk/dinhkem',
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
        Thông tin hồ sơ giá hàng hóa<small> do TW quy định</small>
    </h3>
    <input type="hidden" name="masopnhom" id="masopnhom" value="{{$masopnhom}}">


    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">

                    </div>
                    <div class="actions">
                        @if(can('kkgtw','create'))
                            <a href="{{url($url.'maso='.$masopnhom.'/create')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Thêm mới hồ sơ chi tiết </a>
                            <a href="{{url('giahhdv-trunguong-dk/maso='.$masopnhom.'/create_dk')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Thêm mới hồ sơ đính kèm </a>
                        @endif
                        <a class="btn btn-default btn-sm" href="{{url($url)}}"><i class="fa fa-mail-reply"></i>  Quay lại</a>
                        <!--a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a-->
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="nambc" id="nambc" class="form-control">
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
                            <!--th style="text-align: center">Phòng ban</th-->
                            <th style="text-align: center">Ngày nhập</th>
                            <th style="text-align: center">Thị trường</th>
                            <th style="text-align: center">Loại giá</th>
                            <th style="text-align: center">Loại hàng hóa</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <!--td class="active">{{$tt->tenpb}}</td-->
                                <td>{{getDayVn($tt->tgnhap)}}</td>
                                <td>{{$tt->thitruong}}</td>
                                <td>{{$tt->tenloaigia}}</td>
                                <td>{{$tt->tenloaihh}}</td>
                                <td style="text-align: center">
                                    @if($tt->trangthai == 'Hoàn tất')
                                        <span class="label label-sm label-success">Hoàn tất</span>
                                    @else
                                        <span class="label label-sm label-danger">Chưa hoàn tất</span>
                                    @endif
                                </td>
                                <td>
                                    @if($tt->trangthai == 'Hoàn tất')
                                        @if($tt->hoso == 'DINHKEM')
                                            <button type="button" onclick="get_attack('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#dinhkem-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Tải file đính kèm</button>
                                        @else
                                            <a href="{{url($url.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                        @endif
                                    @else
                                        @if(can('kkgtw','edit') && $tt->mahuyen == session('admin')->mahuyen)
                                            @if($tt->hoso == 'DINHKEM')
                                                <a href="{{url('giahhdv-trunguong-dk/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            @else
                                                <a href="{{url($url.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            @endif
                                        @endif
                                        @if(can('kkgtw','delete') && $tt->mahuyen == session('admin')->mahuyen)
                                            <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Xóa</button>
                                        @endif
                                        @if(can('kkgtw','approve'))
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
            <!--div class="row">
                <div class="col-md-12" style="text-align: center">
                    <a class="btn blue" href="{{url('/giahhdv-tw')}}"><i class="fa fa-mail-reply"></i>  Quay lại</a>
                </div>
            </div-->
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