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
                //var thoidiem = $('#thoidiem').val();
                var url = '/giahhdv-thitruong/index?thoidiem='+'{{$inputs['thoidiem']}}'+'&nam='+nambc;
                window.location.href = url;
            });
            $('#ttpb').change(function() {
                var nambc = $('#nambc').val();
                var ttpb = $('#ttpb').val();
                //var thoidiem = $('#thoidiem').val();
                //var url = '/giahhdv-thitruong/thoidiem='+thoidiem+'/nam='+nambc;
                var url = '/giahhdv-thitruong/index?thoidiem='+'{{$inputs['thoidiem']}}'+'&nam='+nambc;
                window.location.href = url;
            });
        })
        function get_attack(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giahhdv-thitruong-dk/dinhkem',
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
        Thông tin hồ sơ<small>&nbsp;giá hàng hóa thị trường</small>
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
                        @if(can('hhthitruong','create'))
                            <button type="button" class="btn btn-default btn-sm" data-target="#create-modal-confirm" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                                Thêm mới hồ sơ chi tiết</button>

                            <a href="{{url($url.'thoidiem='.$inputs['thoidiem'].'/create_dk')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Thêm mới hồ sơ đính kèm </a>
                        @endif
                        <a class="btn btn-default btn-sm" href="{{url('/giahhdv-thitruong')}}"><i class="fa fa-mail-reply"></i>  Quay lại</a>
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
                                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
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
                            <th style="text-align: center" width="10">Ngày nhập</th>
                            <th style="text-align: center" width="15%">Thị trường</th>
                            <!--th style="text-align: center">Loại giá</th>
                            <th style="text-align: center">Loại hàng hóa</th-->
                            <th style="text-align: center" width="10%">Trạng thái</th>
                            <th style="text-align: center" width="30%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active">{{$tt->tenpb}}</td>
                                <td>{{getDayVn($tt->tgnhap)}}</td>
                                <td>{{$tt->thitruong}}</td>
                                <!--td>{{$tt->maloaigia}}</td>
                                <td>{{$tt->maloaihh}}</td-->
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
                                            <a href="{{url('giahhdv-thitruong/'.$tt->id.'/show')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Chi tiết</a>
                                        @endif
                                    @else
                                        @if(can('hhthitruong','edit') && $tt->mahuyen == session('admin')->mahuyen)
                                            @if($tt->phanloai == 'DINHKEM')
                                                <a href="{{url('giahhdv-thitruong-dk/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            @else
                                                <a href="{{url('giahhdv-thitruong/edit?mahs='.$tt->mahs)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                            @endif
                                        @endif
                                        @if(can('hhthitruong','delete') && $tt->mahuyen == session('admin')->mahuyen)
                                            <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Xóa</button>
                                        @endif
                                        @if(can('hhthitruong','approve'))
                                            <button type="button" onclick="confirmHoantat('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoantat-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn tất</button>
                                        @endif
                                    @endif
                                    <!-- Chưa làm
                                    <a href="{{url('giahhdv-thitruong/'.$tt->mahs.'/history')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Lịch sử</a-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <!--div class="col-md-12" style="text-align: center">
                <div class="row">
                    <a class="btn blue" href="{{url('/giahhdv-thitruong')}}"><i class="fa fa-mail-reply"></i>  Quay lại</a>
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
    <!-- Chọn danh mục hàng hóa -->
    <div id="create-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade bs-modal-lg">
        {!! Form::open(['url'=>$url.'create','id' => 'frm_create','method'=>'post'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thêm mới kê khai giá hàng hóa, dịch vụ</h4>
                </div>

                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label text-right">Nhóm hàng hóa, dịch vụ</label>
                                    <select name="manhomhh" id="manhomhh" class="form-control" multiple="multiple">
                                        @foreach($model_nhomhh as $ct)
                                            <option value="{{$ct->manhom}}">{{$ct->tennhom}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            <input type="hidden" id="thoidiem" name="thoidiem" value="{{$inputs['thoidiem']}}" />
                            <input type="hidden" id="manhom" name="manhom" />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default"> Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary"> Đồng ý</button>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        $(function(){
            //Multi select box
            $("#manhomhh").select2();
            $("#manhomhh").change(function(){
                $("#manhom").val( $("#manhomhh").val());
            });
            $('#frm_create :submit').click(function(){
                var str = '';
                var ok = true;

                if(!$('#manhomhh').val()){
                    str += '  - Mã nhóm hàng hóa \n';
                    $('#manhomhh').parent().addClass('has-error');
                    ok = false;
                }
                /*
                 if(!$('#ngaysinh').val()){
                 str += '  - Ngày sinh \n';
                 $('#ngaysinh').parent().addClass('state-error');
                 ok = false;
                 }
                 */
                //Kết quả
                if ( ok == false){
                    alert('Các trường: \n' + str + 'Không được để trống');
                    $("#frm_create").submit(function (e) {
                        e.preventDefault();
                    });
                }
                else{
                    $("#frm_create").unbind('submit').submit();
                }
            });
        });
    </script>
@stop