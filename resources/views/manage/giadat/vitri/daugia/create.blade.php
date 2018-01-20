@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });

    </script>
    @include('includes.crumbs.script_inputdate')

    <script>
        function InputMask() {
            //$(function(){
            // Input Mask
            if ($.isFunction($.fn.inputmask)) {
                $("[data-mask]").each(function (i, el) {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if (placeholder.length) {
                        opts[placeholder] = placeholder;
                    }

                    switch (mask.toLowerCase()) {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');
                            ;

                            mask = "999,999,999.99";

                            if ($this.data('mask').toLowerCase() == 'rcurrency') {
                                mask += ' ' + sign;
                            }
                            else {
                                mask = sign + ' ' + mask;
                            }

                            opts.numericInput = true;
                            opts.rightAlignNumerics = false;
                            opts.radixPoint = '.';
                            break;

                        case "email":
                            mask = 'Regex';
                            opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                            break;

                        case "fdecimal":
                            mask = 'decimal';
                            $.extend(opts, {
                                autoGroup: true,
                                groupSize: 3,
                                radixPoint: attrDefault($this, 'rad', '.'),
                                groupSeparator: attrDefault($this, 'dec', ',')
                            });
                    }

                    if (is_regex) {
                        opts.regex = mask;
                        mask = 'Regex';
                    }

                    $this.inputmask(mask, opts);
                });
            }
            //});
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin giá đất đấu giá<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        {!! Form::open(['url'=>'/giadat/daugia/store', 'id' => 'create_kekhai', 'class'=>'horizontal-form','method'=>'post']) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Tên thửa đất</label>
                                        <textarea id="tenthuadat" class="form-control" name="tenthuadat" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-default" data-target="#modal-vitri" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Lấy vị trí đất</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Vị trí thửa đất<span class="require">*</span></label>
                                        <textarea id="tenvitri" class="form-control" name="tenvitri" rows="3" readonly required="required"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="maso" id="maso"/>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá đất (theo danh mục)</label>
                                        <input type="text" name="giagoc" id="giagoc" class="form-control" data-mask="fdecimal" value="0" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá đấu giá đất<span class="require">*</span></label>
                                        <input type="text" name="giadaugia" id="giadaugia" class="form-control" data-mask="fdecimal" required="required" value="0">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày nhập</label>
                                        <input type="date" id="ngaynhap" name="ngaynhap" class="form-control required" />
                                    </div>
                                </div>
                            </div>
                        </div>


                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
            <div class="row">
                <div style="text-align: center;">
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <a href="{{url('/giadat/thuedat/danh_sach?nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_kekhai").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>

    <script>
        $(function(){
            $('#madiaban').change(function () {
                getvitridat(1);
            });
            $('#maphanloai').change(function () {
                getvitridat(2);
            });
            $('#mavitri').change(function () {
                getvitridat(3);
            });
        });

        function getvitridat(capdo){
            var madiaban = $('#madiaban').val();
            var maphanloai = $('#maphanloai').val();
            var mavitri = $('#mavitri').val();
            //chạy lấy lại mã
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giadat/getvitri',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    madiaban: madiaban,
                    maphanloai: maphanloai,
                    mavitri: mavitri,
                    capdo: capdo
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#vitridat').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $(function(){
                            $('#madiaban').change(function () {
                                getvitridat(1);
                            });
                            $('#maphanloai').change(function () {
                                getvitridat(2);
                            });
                            $('#mavitri').change(function () {
                                getvitridat(3);
                            });
                        });
                    }
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }

        function set_vitri(e, maso){
            var tr = $(e).closest('tr');
            $('#tenvitri').val($(tr).find('td[name=vitri]').text());
            $('#giagoc').val($(tr).find('td[name=giadat]').text());
            $('#maso').val(maso);
            $('#modal-vitri').modal('hide');
        }
    </script>

    <!--Modal Wide Width-->
    <div class="modal fade in" id="modal-vitri" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thông tin vị trí đất</h4>
                </div>
                <div class="modal-body" id="vitridat">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Địa bàn quản lý</label>
                                <select name="madiaban" id="madiaban" class="form-control">
                                    @foreach($model_diaban as $ct)
                                        <option value="{{$ct->maso}}"> {{$ct->vitri}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Phân loại giá đất</label>
                                <select name="maphanloai" id="maphanloai" class="form-control">
                                    @foreach($model_phanloai as $ct)
                                        <option value="{{$ct->maso}}"> {{$ct->vitri}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Vị trí, khu vực đất</label>
                                <select name="mavitri" id="mavitri" class="form-control">
                                    @foreach($model_vitri as $ct)
                                        <option value="{{$ct->maso}}"> {{$ct->vitri}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Vị trí thửa đất</th>
                            <th style="text-align: center">Giá đất</th>
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_danhmuc as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td name="vitri">{{$tt->vitri}}</td>
                                <td name="giadat">{{number_format($tt->giadat)}}</td>
                                <td>
                                    <button type="button" onclick="set_vitri(this,'{{$tt->maso}}')" class="btn btn-default btn-xs mbs" data-target="#dinhkem-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                        Lấy vị trí</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')
@stop