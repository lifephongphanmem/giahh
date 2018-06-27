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
    @include('includes.crumbs.script_inputdate')
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });

    </script>
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/giahhtt/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#tttsedit').replaceWith(data.message);
                        $('#tentsedit').focus();
                        InputMask();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin hàng hóa dịch vụ!", "Lỗi!");
                }
            })
        }

        function updatets(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giahhtt/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id:$('input[name="idedit"]').val(),
                    masopnhom: $('input[name="masopnhomedit"]').val(),
                    mahh: $('input[name="mahhedit"]').val(),
                    giatu: $('input[name="giatuedit"]').val(),
                    giaden: $('input[name="giadenedit"]').val(),
                    soluong: $('input[name ="soluongedit"]').val(),
                    nguontin: $('input[name="nguontinedit"]').val(),
                    gc: $('textarea[name="gcedit"]').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin hàng hóa dịch vụ thành công", "Thành công!");
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
                url: '/giahhtt/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin hàng hóa dịch vụ thành công!", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
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
        Thông tin giá hàng hóa dịch vụ trong nước
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'giahhdv-thitruong/update', 'class'=>'horizontal-form','id'=>'update_ttgiahhdvtn']) !!}
                    <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}" />
                    <div class="form-body">
                        <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời gian nhập<span class="require">*</span></label>
                                    {!!Form::text('tgnhap',date('d/m/Y',  strtotime($model->tgnhap)), array('id' => 'tgnhap','class' => 'form-control','readonly'=>'true'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thị trường<span class="require">*</span></label>
                                    <select class="form-control required" name="thitruong" id="thitruong">
                                        @foreach($thitruong as $ct)
                                            <option value="{{$ct->thitruong}}" {{$ct->thitruong==$model->thitruong?'selected':''}}>{{$ct->thitruong}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> Nội dung</label>
                                    {!! Form::textarea('noidung',null,array('id' => 'noidung', 'class' => 'form-control','rows'=>'3'))!!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h4>Thông tin chi tiết hồ sơ</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="button" data-target="#modal-dichvu" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp;Bổ sung hàng hóa, dịch vụ</button>
                            </div>
                        </div>

                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                        <tr style="background: #F5F5F5">
                                            <th width="2%" style="text-align: center">STT</th>
                                            <th style="text-align: center">Mã hàng hóa</th>
                                            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                                            <th style="text-align: center">Giá từ</th>
                                            <th style="text-align: center" >Giá đến</th>
                                            <th style="text-align: center" >Số lượng</th>
                                            <th style="text-align: center">Nguồn tin</th>
                                            <th style="text-align: center">Ghi chú</th>
                                            <th style="text-align: center" width="15%">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ttts">
                                    @if(isset($modeltthh))
                                        @foreach($modeltthh as $key=>$tt)
                                            <tr>
                                                <td style="text-align: center">{{$key +1}}</td>
                                                <td>{{$tt->mahh}}</td>
                                                <td class="active">{{$tt->tenhh}}</td>
                                                <td style="text-align: right">{{number_format($tt->giatu)}}</td>
                                                <td style="text-align: right">{{number_format($tt->giaden)}}</td>
                                                <td style="text-align: center">{{number_format($tt->soluong)}}</td>
                                                <td>{{$tt->nguontin}}</td>
                                                <td>{{$tt->gc}}</td>
                                                <td>
                                                    <button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}});"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                                    <button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow({{$tt->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan="9" style="text-align: center">Chưa có thông tin</td>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!--Modal Wide Width-->
    <div class="modal fade bs-modal-lg" id="modal-dichvu" tabindex="-1" aria-labelledby="myModalLabel" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thông tin hàng hóa, dịch vụ</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nhóm hàng hóa- dịch vụ<span class="require">*</span></label>
                                <select class="form-control" id="manhom" name="manhom">
                                    <option value="">--Chọn nhóm hàng hóa- dịch vụ--</option>
                                    @foreach($nhomhh as $nhom)
                                        <option value="{{$nhom->manhom}}">{{$nhom->tennhom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Tên hàng hóa-dịch vụ<span class="require">*</span></label>
                                <div id="tthh">
                                    <select class="form-control select2me" name="mahh" id="mahh">
                                        <option value="">--Chọn hàng hóa- dịch vụ--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá từ<span class="require">*</span></label>
                                <input type="text" name="giatu" id="giatu" class="form-control" data-mask="fdecimal" value="0">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá đến<span class="require">*</span></label>
                                <input type="text" name="giaden" id="giaden" class="form-control" data-mask="fdecimal" value="0">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số lượng</label>
                                <input type="text" name="soluong" id="soluong" class="form-control" data-mask="fdecimal" value="1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nguồn tin</label>
                                <input type="text" name="nguontin" id="nguontin" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Ghi chú</label>
                                <textarea id="gc" class="form-control" name="gc" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="iddv" name="iddv"/>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" id="capnhatts" name="capnhatts" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_ttgiahhdvtn").validate({
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
                    url: '/giahhtt/store',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        masopnhom: $('#manhom').val(),
                        mahh: $('#mahh').val(),
                        giatu: $('#giatu').val(),
                        giaden: $('#giaden').val(),
                        soluong: $('#soluong').val(),
                        nguontin: $('#nguontin').val(),
                        gc: $('textarea[name="gc"]').val(),
                        mahs: $('#mahs').val()

                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Cập nhật thông tin giá hàng hóa dịch vụ thành công", "Thành công!");
                            $('#dsts').replaceWith(data.message);
                            jQuery(document).ready(function() {
                                TableManaged.init();
                            });
                            $('#manhom').val('');
                            $('#mahh').val('');
                            $('#mahh').children().remove().end().append('<option selected value="">--Chọn hàng hóa- dịch vụ--</option>') ;
                            $('#mahh').select2({
                                placeholder: '--Chọn hàng hóa- dịch vụ--'});
                            $('#giatu').val('0');
                            $('#giaden').val('0');
                            $('#soluong').val('1');
                            $('#nguontin').val('');
                            $('#gc').val('');

                            $('#manhom').focus();
                        }
                        else {
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                            $('#manhom').focus();
                        }
                    }
                })
            });

        }(jQuery));
    </script>
    <script><!--change select2-->
        jQuery(document).ready(function($) {
            $('#manhom').change(function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/giahhttdefault/gettthh',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        manhom: $('#manhom').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Chọn nhóm hàng hóa dịch vụ thành công - Bạn cần chọn tên hàng hóa thị trường", "Thành công!");
                            $('#tthh').replaceWith(data.message);
                            $('#mahh').select2();
                        }
                        else
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
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
                    <h4 class="modal-title">Chỉnh sửa thông tin hàng hóa dịch vụ</h4>
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