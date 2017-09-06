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
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/giadatpl/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#tttsedit').replaceWith(data.message);
                        $('#tentsedit').focus();
                        InputMask();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin!", "Lỗi!");
                }
            })
        }

        function updatets(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giadatpl/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id:$('input[name="idedit"]').val(),
                    khuvuc: $('input[name="khuvucedit"]').val(),
                    vitri1: $('input[name="vitri1edit"]').val(),
                    vitri2: $('input[name="vitri2edit"]').val(),
                    vitri3: $('input[name="vitri3edit"]').val(),
                    vitri4: $('input[name="vitri4edit"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-wide-width').modal("hide");

                    }else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }

        function deleteRow(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giadatpl/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin trường thành công!", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    //}
                }
            })

        }

    </script>
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
        Thông tin giá đất theo phân loại đất<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'giadat_phanloai/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttgiahhdvtn']) !!}
                    <div class="form-body">
                        <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời gian nhập</label>
                                    {!!Form::text('tgnhap',date('d/m/Y',  strtotime($model->tgnhap)), array('id' => 'tgnhap','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời điểm áp dụng</label>
                                    {!!Form::text('tgapdung',date('d/m/Y',  strtotime($model->tgapdung)), array('id' => 'tgapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>

                        <!--/row-->
                        <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Khu vực<span class="require">*</span></label>
                                    <input type="text" name="khuvuc" id="khuvuc" class="form-control require">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Vị trí 1</label>
                                    <input type="text" name="vitri1" id="vitri1" class="form-control" data-mask="fdecimal" value="0">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Vị trí 2</label>
                                    <input type="text" name="vitri2" id="vitri2" class="form-control" data-mask="fdecimal" value="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Vị trí 3</label>
                                    <input type="text" name="vitri3" id="vitri3" class="form-control" data-mask="fdecimal" value="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Vị trí 4</label>
                                    <input type="text" name="vitri4" id="vitri4" class="form-control" data-mask="fdecimal" value="0">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" id="capnhatts" name="capnhatts" class="btn btn-primary">Cập nhật</button>
                                    &nbsp;
                                </div>
                            </div>
                        </div>

                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Khu vực</th>
                                        <th style="text-align: center">Vị trí 1</th>
                                        <th style="text-align: center">Vị trí 2</th>
                                        <th style="text-align: center">Vị trí 3</th>
                                        <th style="text-align: center">Vị trí 4</th>
                                        <th style="text-align: center" width="15%">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ttts">
                                    @foreach ($modeltthh as $key => $ct)
                                    <tr>
                                       <td style="text-align: center">{{($key + 1) }} </td>
                                        <td class="active">{{ $ct->khuvuc }}</td>
                                        <td style="text-align: right">{{number_format($ct->vitri1) }}</td>
                                        <td style="text-align: right">{{ number_format($ct->vitri2) }}</td>
                                        <td style="text-align: right">{{ number_format($ct->vitri3) }}</td>
                                        <td style="text-align: right">{{ number_format($ct->vitri4) }}</td>
                                        <td>
                                            <button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('{{ $ct->id }}');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                            <button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('{{ $ct->id }}')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="maloaigia" id="maloaigia" value="{{$maloaigia}}">

                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
            <div class="row">
                <div style="text-align: center;">
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <a href="{{url('giathuetn/nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_ttgiahhdvtn").validate({
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
        jQuery(document).ready(function($) {
            $('button[name="capnhatts"]').click(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/giadatpldefault/store',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        maloaigia: $('#maloaigia').val(),
                        khuvuc: $('#khuvuc').val(),
                        vitri1: $('#vitri1').val(),
                        vitri2: $('#vitri2').val(),
                        vitri3: $('#vitri3').val(),
                        vitri4: $('#vitri4').val()

                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Cập nhật thông tin giá hàng hóa dịch vụ thành công", "Thành công!");
                            $('#dsts').replaceWith(data.message);
                            jQuery(document).ready(function() {
                                TableManaged.init();
                            });
                            $('#khuvuc').val('');

                            $('#vitri1').val('0');
                            $('#vitri2').val('0');
                            $('#vitri3').val('0');
                            $('#vitri4').val('0');

                            $('#khuvuc').focus();
                        }
                        else {
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                            $('#khuvuc').focus();
                        }
                    }
                })
            });

        }(jQuery));
    </script>

    <!--Modal Wide Width-->
    <div class="modal fade bs-modal-lg" id="modal-wide-width" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin</h4>
                </div>
                <div class="modal-body" id="tttsedit">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatets()">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')
@stop