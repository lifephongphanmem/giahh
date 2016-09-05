@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/congbogiadefault/edit',
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
                        toastr.error("Không thể chỉnh sửa thông tin tài sản!", "Lỗi!");
                }
            })
        }

        function updatets(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/congbogiadefault/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    tents: $('input[name="tentsedit"]').val(),
                    dacdiempl: $('input[name="dacdiempledit"]').val(),
                    thongsokt: $('input[name="thongsoktedit"]').val(),
                    nguongoc: $('input[name ="nguongocedit"]').val(),
                    dvt: $('input[name="dvtedit"]').val(),
                    sl: $('input[name="sledit"]').val(),
                    giadenghi: $('input[name="giadenghiedit"]').val(),
                    giatritstd: $('input[name="giatritstdedit"]').val(),
                    gc: $('textarea[name="gcedit"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin tài sản thành công", "Thành công!");
                        $('#ttts').replaceWith(data.message);
                        //$("#modal-wide-width").dialog("close");
                        //$('#modal-wide-width').fadeOut();
                        $('#modal-wide-width').modal("hide");

                    }else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }

        function deleteRow(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/congbogiadefault/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin tài sản thành công!", "Thành công!");
                    $('#ttts').replaceWith(data.message);

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
        Hồ sơ công bố giá<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        {!! Form::open(['url'=>'hoso-congbogia', 'id' => 'create_tthscbg', 'class'=>'horizontal-form']) !!}
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Phân loại hồ sơ<span class="require">*</span></label>
                                        <select class="form-control" id="plhs" name="plhs" autofocus>
                                            <option value="Công bố giá">Công bố giá</option>
                                            <option value="Công bố giá bổ xung">Công bố giá bổ xung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ thẩm định<span class="require">*</span></label>
                                        <input type="text" id="sohs" name="sohs" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày nhập<span class="require">*</span></label>
                                        <input type="date" id="ngaynhap" name="ngaynhap" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Nguồn vốn</label>
                                        <select class="form-control" id="nguonvon" name="nguonvon">
                                            <option value="Cả hai">Cả hai</option>
                                            <option value="Thường xuyên">Thường xuyên</option>
                                            <option value="Đầu tư">Đầu tư</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số văn bản đề nghị<span class="require">*</span></label>
                                        <input type="text" id="sovbdn" name="sovbdn" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Số công bố giá<span class="require">*</span></label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài sản<span class="require">*</span></label>
                                        <input type="text" id="tents" name="tents" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Đặc điểm pháp lý</label>
                                        <input type="text" id="dacdiempl" name="dacdiempl" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thông số kỹ thuật</label>
                                        <input type="text" name="thongsokt" id="thongsokt" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Nguồn gốc</label>
                                        <input type="text" name="nguongoc" id="nguongoc" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                                        <input type="text" name="dvt" id="dvt" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Số lượng<span class="require">*</span></label>
                                        <input type="text" name="sl" id="sl" class="form-control" data-mask="fdecimal" value="1">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá đề nghị<span class="require">*</span></label>
                                        <input type="text" name="giadenghi" id="giadenghi" class="form-control" data-mask="fdecimal" value="0">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Giá trị tài sản thẩm định<span class="require">*</span></label>
                                        <input type="text" name="giatritstd" id="giatritstd" class="form-control" data-mask="fdecimal" value="0">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú</label>
                                        <textarea id="gc" class="form-control" name="gc" cols="30" rows="3"></textarea>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr style="background: #F5F5F5">
                                                <th width="2%" style="text-align: center">STT</th>
                                                <th style="text-align: center">Tên tài sản</th>
                                                <th style="text-align: center">Đặc điểm kinh tế- kỹ thuật</th>
                                                <th style="text-align: center">Nguồn gốc</th>
                                                <th style="text-align: center">Đơn vị tính</th>
                                                <th style="text-align: center">Số lượng</th>
                                                <th style="text-align: center">Giá trị đề nghị</th>
                                                <th style="text-align: center">Giá trị thẩm định</th>
                                                <th style="text-align: center" width="20%">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ttts">
                                            <td colspan="9" style="text-align: center">Chưa có thông tin</td>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions right">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Submit</button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_tthscbg").validate({
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
                //alert($('input[name="tents"]').val());
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/congbogiadefault/store',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        tents: $('input[name="tents"]').val(),
                        dacdiempl: $('input[name="dacdiempl"]').val(),
                        thongsokt: $('input[name="thongsokt"]').val(),
                        nguongoc: $('input[name="nguongoc"]').val(),
                        dvt: $('input[name="dvt"]').val(),
                        sl: $('input[name="sl"]').val(),
                        giadenghi: $('input[name = "giadenghi"]').val(),
                        giatritstd:$('input[name="giatritstd"]').val(),
                        gc: $('textarea[name="gc"]').val()

                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Cập nhật thông tin tài sản thành công", "Thành công!");
                            $('#ttts').replaceWith(data.message);
                            $('#tents').val('');
                            $('#dacdiempl').val('');
                            $('#thongsokt').val('');
                            $('#nguongoc').val('');
                            $('#dvt').val('');
                            $('#sl').val('1');
                            $('#giadenghi').val('0');
                            $('#giatritstd').val('0');
                            $('#gc').val('');

                            $('#tents').focus();
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
                    <h4 class="modal-title">Chỉnh sửa thông tin tài sản</h4>
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