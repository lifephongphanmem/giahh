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
                url: '/giathuetn/edit',
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
                        toastr.error("Không thể chỉnh sửa thông tin tài nguyên!", "Lỗi!");
                }
            })
        }

        function updatets(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giathuetn/update',
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
                        toastr.success("Chỉnh sửa thông tin tài nguyên thành công", "Thành công!");
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
                url: '/giathuetn/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin tài nguyên thành công!", "Thành công!");
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
        Thông tin giá tính thuế tài nguyên<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'giathuetn-dk/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttgiahhdvtn','enctype'=>'multipart/form-data']) !!}
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập<span class="require">*</span></label>
                                        {!!Form::text('tgnhap',date('d/m/Y',  strtotime($model->tgnhap)), array('id' => 'tgnhap','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                @include('includes.crumbs.cb_phanloaitainguyen')

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Số quyết định</label>
                                        {!!Form::text('maloaigia',null, array('id' => 'maloaigia','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Nội dung chi tiết</label>
                                        {!!Form::textarea('thitruong',null, array('id' => 'thitruong','class' => 'form-control', 'rows'=>'3'))!!}
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 1</label>
                                        @if(isset($model->filedk))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk)}}" target="_blank">{{$model->filedk}}</a></p>
                                        @endif
                                        <input name="filedk" id="filedk" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 2</label>
                                        @if(isset($model->filedk1))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk1)}}" target="_blank">{{$model->filedk1}}</a></p>
                                        @endif
                                        <input name="filedk1" id="filedk1" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 3</label>
                                        @if(isset($model->filedk2))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk2)}}" target="_blank">{{$model->filedk2}}</a></p>
                                        @endif
                                        <input name="filedk2" id="filedk2" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 4</label>
                                        @if(isset($model->filedk3))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk3)}}" target="_blank">{{$model->filedk3}}</a></p>
                                        @endif
                                        <input name="filedk3" id="filedk3" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 5</label>
                                        @if(isset($model->filedk4))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk4)}}" target="_blank">{{$model->filedk4}}</a></p>
                                        @endif
                                        <input name="filedk4" id="filedk4" type="file">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}" />
                        </div>


                    <!-- END FORM-->
                </div>
            </div>
            <div class="row">
                <div style="text-align: center">
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <a href="{{url('giathuetn/nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
            <!-- END VALIDATION STATES-->
        </div>
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
                    url: '/giathuetn/store',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        masopnhom: $('#mapnhom').val(),
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
                            toastr.success("Cập nhật thông tin giá tài nguyên thành công", "Thành công!");
                            $('#dsts').replaceWith(data.message);
                            jQuery(document).ready(function() {
                                TableManaged.init();
                            });
                            $('#mapnhom').val('');
                            $('#mahh').val('');
                            $('#mahh').children().remove().end().append('<option selected value="">--Chọn tài nguyên--</option>') ;
                            $('#mahh').select2({placeholder: '--Chọn tài nguyên--'});
                            $('#giatu').val('0');
                            $('#giaden').val('0');
                            $('#soluong').val('1');
                            $('#nguontin').val('');
                            $('#gc').val('');

                            $('#mapnhom').focus();
                        }
                        else {
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                            $('#mapnhom').focus();
                        }
                    }
                })
            });

        }(jQuery));
    </script>
    <script><!--change select2-->
        jQuery(document).ready(function($) {
            $('#mapnhom').change(function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/giathuetndefault/gettthh',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mapnhom: $('#mapnhom').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Chọn nhóm tài nguyên thành công - Bạn cần chọn tên tài nguyên", "Thành công!");
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