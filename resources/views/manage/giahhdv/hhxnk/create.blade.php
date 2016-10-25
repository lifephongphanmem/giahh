@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/giahhxnkdefault/edit',
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
                        toastr.error("Không thể chỉnh sửa thông tin hàng hóa xuất nhập khẩu!", "Lỗi!");
                }
            })
        }

        function updatets(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giahhxnkdefault/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id:$('input[name="idedit"]').val(),
                    masoloai: $('input[name="masoloaiedit"]').val(),
                    mahh: $('input[name="mahhedit"]').val(),
                    giatu: $('input[name="giatuedit"]').val(),
                    giaden: $('input[name="giadenedit"]').val(),
                    soluong: $('input[name ="soluongedit"]').val(),
                    nguontin: $('input[name="nguontinedit"]').val(),
                    gc: $('textarea[name="gcedit"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin hàng hóa xuất nhập khẩu thành công", "Thành công!");
                        $('#ttts').replaceWith(data.message);
                        $('#modal-wide-width').modal("hide");

                    }else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }

        function deleteRow(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giahhxnkdefault/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin hàng hóa xuất nhập khẩu thành công!", "Thành công!");
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
        Thông tin giá hàng hóa xuất nhập khẩu<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        {!! Form::open(['url'=>'giahh-xuatnhapkhau', 'id' => 'create_ttgiahhxnk', 'class'=>'horizontal-form']) !!}
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập<span class="require">*</span></label>
                                        <input type="date" id="tgnhap" name="tgnhap" class="form-control required" autofocus>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại giá<span class="require">*</span></label>
                                        <select class="form-control" id="maloaigia" name="maloaigia">
                                            @foreach($loaigia as $hh)
                                                <option value="{{$hh->maloaigia}}">{{$hh->tenloaigia}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <input type="hidden" name="mathoidiem" id="mathoidiem" value="{{$mathoidiem}}">

                            <!--/row-->
                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Nhóm hàng hóa<span class="require">*</span></label>
                                        <select class="form-control select2me" id="manhom" name="manhom">
                                            <option value="">--Chọn nhóm hàng hóa--</option>
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
                                        <label class="control-label">Phân nhóm hàng hóa<span class="require">*</span></label>
                                        <div id="ttpnhom">
                                            {!! Form::select(
                                            'mapnhom',
                                            array(
                                            '' => '--Chọn phân nhóm hàng hóa--',
                                            ),null,
                                            array('id' => 'mapnhom', 'class' => 'form-control select2me'))
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Loại hàng hóa<span class="require">*</span></label>
                                        <div id="ttloai">
                                            {!! Form::select(
                                            'maloai',
                                            array(
                                            '' => '--Chọn loại hàng hóa--',
                                            ),null,
                                            array('id' => 'maloai', 'class' => 'form-control select2me'))
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Tên hàng hóa<span class="require">*</span></label>
                                        <div id="tthh">
                                            <select class="form-control select2me" name="mahh" id="mahh">
                                                <option value="">--Chọn hàng hóa--</option>
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
                                    <div class="form-group has-error">
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
                                                <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                                                <th style="text-align: center" width="10%">Giá từ</th>
                                                <th style="text-align: center" width="10%">Giá đến</th>
                                                <th style="text-align: center" width="5%">Số lượng</th>
                                                <th style="text-align: center">Nguồn tin</th>
                                                <th style="text-align: center">Ghi chú</th>
                                                <th style="text-align: center" width="12%">Thao tác</th>
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
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
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

            var validator = $("#create_ttgiahhxnk").validate({
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
                    url: '/giahhxnkdefault/store',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        masoloai: $('#maloai').val(),
                        mahh: $('#mahh').val(),
                        giatu: $('#giatu').val(),
                        giaden: $('#giaden').val(),
                        soluong: $('#soluong').val(),
                        nguontin: $('#nguontin').val(),
                        gc: $('textarea[name="gc"]').val()

                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Cập nhật thông tin giá hàng hóa dịch vụ thành công", "Thành công!");
                            $('#ttts').replaceWith(data.message);
                            $('#manhom').children().end().append('<option selected value="">--Chọn nhóm hàng hóa--</option>') ;
                            $('#manhom').select2({
                                placeholder: '--Chọn nhóm hàng hóa--'});
                            $('#mapnhom').children().remove().end().append('<option selected value="">--Chọn phân nhóm hàng hóa--</option>') ;
                            $('#mapnhom').select2({
                                placeholder: '--Chọn phân nhóm hàng hóa--'});
                            $('#maloai').children().remove().end().append('<option selected value="">--Chọn loại hàng hóa--</option>') ;
                            $('#maloai').select2({
                                placeholder: '--Chọn loại hàng hóa--'});
                            $('#mahh').children().remove().end().append('<option selected value="">--Chọn hàng hóa--</option>') ;
                            $('#mahh').select2({
                                placeholder: '--Chọn hàng hóa--'});
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

            $('#manhom').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/giahhxnkdefault/getpnhom',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        manhom: $('#manhom').val()

                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Chọn nhóm hàng hóa thành công - Bạn cần chọn tiếp phân nhóm hàng hóa", "Thành công!");
                            $('#ttpnhom').replaceWith(data.message);
                            $('#mapnhom').select2();
                            //alert(data.message);
                            get();

                        }
                        else
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                    }
                })
            });
            function get() {
                $('#mapnhom').change(function () {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '/giahhxnkdefault/getloai',
                        type: 'GET',
                        data: {
                            _token: CSRF_TOKEN,
                            masopnhom: $('#mapnhom').val()

                        },
                        dataType: 'JSON',
                        success: function (data) {
                            if(data.status == 'success') {
                                toastr.success("Chọn phân nhóm hàng hóa thành công - Bạn cần chọn tiếp loại hàng hóa ", "Thành công!");
                                $('#ttloai').replaceWith(data.message);
                                $('#maloai').select2();
                                gethh();
                            }
                            else
                                toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                        }
                    })
                });
            }
            function gethh() {
                $('#maloai').change(function () {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '/giahhxnkdefault/gethh',
                        type: 'GET',
                        data: {
                            _token: CSRF_TOKEN,
                            masoloai: $('#maloai').val()

                        },
                        dataType: 'JSON',
                        success: function (data) {
                            if (data.status == 'success') {
                                toastr.success("Chọn loại hàng hóa thành công - Bạn cần chọn tiếp hàng hóa ", "Thành công!");
                                $('#tthh').replaceWith(data.message);
                                $('#mahh').select2();
                            }
                            else
                                toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                        }
                    })
                });
            }

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