@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
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
    </script>

    @include('includes.crumbs.script_inputdate')
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/thamdinhgia/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#tttsedit').replaceWith(data.message);
                        $('#tentsedit').focus();
                        InputMask();
                        tinhtoan();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin tài sản!", "Lỗi!");
                }
            })
        }

        function updatets() {
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thamdinhgia/update',
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
                    nguyengiadenghi: $('input[name="nguyengiadenghiedit"]').val(),
                    giadenghi: $('input[name = "giadenghiedit"]').val(),
                    nguyengiathamdinh: $('input[name="nguyengiathamdinhedit"]').val(),
                    giatritstd: $('input[name="giatritstdedit"]').val(),
                    gc: $('textarea[name="gcedit"]').val(),
                    mahs:$('input[name="mahsedit"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if (data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin tài sản thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-wide-width').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }
        function getid(id){
            document.getElementById("iddelete").value=id;
        }
        function deleteRow() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thamdinhgia/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin tài sản thành công!", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });

                    $('#modal-delete-ts').modal("hide");

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
        function tinhtoan(){
            $('#nguyengiadenghiedit').change(function () {
                var sl = $('#sledit').val();
                sl = sl.replace(/,/g, "");
                //sl = sl.replace(/./g, "");
                var nguyengiadn = $('#nguyengiadenghiedit').val();
                nguyengiadn = nguyengiadn.replace(/,/g, "");
                //nguyengiadn = nguyengiadn.replace(/./g, "");
                var tt = sl * nguyengiadn;
                //alert(nguyengiadn);
                $('#giadenghiedit').val(tt);
            });
            $('#nguyengiathamdinhedit').change(function () {
                var sl = $('#sledit').val();
                sl = sl.replace(/,/g, "");
                //sl = sl.replace(/./g, "");
                var nguyengiatd = $('#nguyengiathamdinhedit').val();
                nguyengiatd = nguyengiatd.replace(/,/g, "");
                //nguyengiatd = nguyengiatd.replace(/./g, "");
                var tt = sl * nguyengiatd;
                //alert(nguyengiatd);
                $('#giatritstdedit').val(tt);
            });
        }
    </script>


@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ<small>&nbsp;thẩm định giá</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'hoso-thamdinhgia/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tthsthamdinhgia']) !!}
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">

                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số hồ sơ thẩm định<span class="require">*</span></label>
                                {!!Form::text('hosotdgia', null, array('id' => 'hosotdgia','class' => 'form-control required','autofocus'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                {!!Form::text('thoidiem',date('d/m/Y',  strtotime($model->thoidiem)), array('id' => 'thoidiem','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Địa điểm thẩm định<span class="require">*</span></label>
                                {!!Form::text('diadiem', null, array('id' => 'diadiem','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Phương pháp thẩm định thẩm định</label>
                                {!!Form::text('ppthamdinh', null, array('id' => 'ppthamdinh','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mục đích thẩm định<span class="require">*</span></label>
                                {!!Form::text('mucdich', null, array('id' => 'mucdich','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                {!!Form::text('dvyeucau', null, array('id' => 'dvyeucau','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nguồn vốn<span class="require">*</span></label>
                                {!! Form::select(
                                'nguonvon',
                                array(
                                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                                'Đầu tư' => 'Nguồn vốn đầu tư',
                                ),null,
                                array('id' => 'nguonvon', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thuế VAT</label>
                                {!! Form::select(
                                'thuevat',
                                array(
                                'Giá bao gồm thuế VAT' => 'Giá bao gồm thuế VAT',
                                'Giá chưa bao gồm thuế VAT' => 'Giá chưa bao gồm thuế VAT',
                                ),null,
                                array('id' => 'thuevat', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                {!!Form::text('sotbkl', null, array('id' => 'sotbkl','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                <input data-mask="fdecimal" id="songaykq" name="songaykq" class="form-control" value="{{$model->songaykq}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thời hạn sử dụng kết quả thẩm định<span class="require">*</span></label>
                                {!!Form::text('thoihan',date('d/m/Y',  strtotime($model->thoihan)), array('id' => 'thoihan','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    {!! Form::close() !!}
                    <!--/row-->
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
                                <label class="control-label">Đơn vị tính</label>
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
                            <div class="form-group has-error">
                                <label class="control-label">Đơn giá đề nghị<span class="require">*</span></label>
                                <input type="text" name="nguyengiadenghi" id="nguyengiadenghi" class="form-control" data-mask="fdecimal" value="0">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá trị đề nghị<span class="require">*</span></label>
                                <input type="text" name="giadenghi" id="giadenghi" class="form-control" data-mask="fdecimal" value="0">
                            </div>
                        </div>
                        <!--/span-->

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group  has-error">
                                <label class="control-label">Đơn giá thẩm định<span class="require">*</span></label>
                                <input type="text" name="nguyengiathamdinh" id="nguyengiathamdinh" class="form-control" data-mask="fdecimal" value="0">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
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
                                <button type="button" id="capnhatts" name="capnhatts" class="btn btn-primary">Bổ xung</button>
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <!--Error test sau-->
                    <!--div class="row" style="text-align: right">
                        <div class="col-md-12" style="margin-bottom: 10px">
                            <button type="button" data-target="#modal-create-ttts" data-toggle="modal" class="btn btn-default btn-xs mbs" id="createts" name="createts">
                                <i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        </div>
                    </div-->
                    <div class="row" id="dsts">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                <tr>
                                    <th width="2%" style="text-align: center">STT</th>
                                    <th style="text-align: center">Tên tài sản</th>
                                    <th style="text-align: center">Thông số</br>kỹ thuật</th>
                                    <th style="text-align: center">Đơn vị</br>tính</th>
                                    <th style="text-align: center">Số lượng</th>
                                    <th style="text-align: center">Đơn giá</br>đề nghị</th>
                                    <th style="text-align: center">Giá trị</br>đề nghị</th>
                                    <th style="text-align: center">Đơn giá</br>thẩm định</th>
                                    <th style="text-align: center">Giá trị</br>thẩm định</th>
                                    <th style="text-align: center">Ghi chú</th>
                                    <th style="text-align: center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modelts as $key=>$tt)
                                    <tr>
                                        <td style="text-align: center">{{$key +1}}</td>
                                        <td class="active">{{$tt->tents}}</td>
                                        <td style="text-align: center">{{$tt->thongsokt}}</td>
                                        <td style="text-align: center">{{$tt->dvt}}</td>
                                        <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                        <td style="text-align: right">{{number_format($tt->nguyengiadenghi)}}</td>
                                        <td style="text-align: right">{{number_format($tt->giadenghi)}}</td>
                                        <td style="text-align: right">{{number_format($tt->nguyengiathamdinh)}}</td>
                                        <td style="text-align: right">{{number_format($tt->giatritstd)}}</td>
                                        <td style="text-align: center">{{$tt->gc}}</td>
                                        <td>
                                            <button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('{{$tt->id}}');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                            <button type="button" data-target="#modal-delete-ts" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('{{$tt->id}}');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

            <!-- END EXAMPLE TABLE PORTLET-->

            <div style="text-align: center">
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <a href="{{url('hoso-thamdinhgia/nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            </div>
        </div>

    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <!--Validate Form-->
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tthsthamdinhgia").validate({
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
        $(document).ready(function() {
            $('#nguyengiadenghi').change(function () {
                var sl = $('#sl').val();
                sl = sl.replace(/,/g, "");
                //sl = sl.replace(/./g, "");
                var nguyengiadn = $('#nguyengiadenghi').val();
                nguyengiadn = nguyengiadn.replace(/,/g, "");
                //nguyengiadn = nguyengiadn.replace(/./g, "");
                var tt = sl * nguyengiadn;
                //alert(nguyengiadn);
                $('#giadenghi').val(tt);
            });
            $('#nguyengiathamdinh').change(function () {
                var sl = $('#sl').val();
                sl = sl.replace(/,/g, "");
                //sl = sl.replace(/./g, "");
                var nguyengiatd = $('#nguyengiathamdinh').val();
                nguyengiatd = nguyengiatd.replace(/,/g, "");
                //nguyengiatd = nguyengiatd.replace(/./g, "");
                var tt = sl * nguyengiatd;
                //alert(nguyengiatd);
                $('#giatritstd').val(tt);
            });
            $('#songaykq').change(function(){
                addngay();
            });
            $('#thoidiem').change(function(){
                addngay();
            });
            $('#thuevat').change(function () {
                $('#gc').val($('#thuevat').val());
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/thamdinhgia/thuevat',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mahs: $('#mahs').val(),
                        thuevat: $('#thuevat').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        //$('#modal-wide-width').dialog('close');
                        if(data.status == 'success') {
                            toastr.success("Chỉnh sửa thông tin tài sản thành công", "Thành công!");
                            $('#dsts').replaceWith(data.message);
                            //$("#modal-wide-width").dialog("close");
                            //$('#modal-wide-width').fadeOut();
                            jQuery(document).ready(function() {
                                TableManaged.init();
                            });
                            $('#modal-wide-width').modal("hide");


                        }else
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                    }
                })
            });
        });
        function addngay(){
            var thoidiem = $('#thoidiem').val();
            var songay = $('#songaykq').val();
            $('#thoihan').val(add_date(thoidiem,songay));
        }
    </script>
    @include('includes.script.set_date_thoihanthamdinh')

    <script>
        jQuery(document).ready(function($) {
            $('button[name="capnhatts"]').click(function(){
                //alert($('input[name="tents"]').val());
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/thamdinhgia/store',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        tents: $('input[name="tents"]').val(),
                        dacdiempl: $('input[name="dacdiempl"]').val(),
                        thongsokt: $('input[name="thongsokt"]').val(),
                        nguongoc: $('input[name="nguongoc"]').val(),
                        dvt: $('input[name="dvt"]').val(),
                        sl: $('input[name="sl"]').val(),
                        nguyengiadenghi: $('input[name="nguyengiadenghi"]').val(),
                        giadenghi: $('input[name = "giadenghi"]').val(),
                        nguyengiathamdinh: $('input[name="nguyengiathamdinh"]').val(),
                        giatritstd:$('input[name="giatritstd"]').val(),
                        gc: $('textarea[name="gc"]').val(),
                        mahs: $('input[name="mahs"]').val()

                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Cập nhật thông tin tài sản thành công", "Thành công!");
                            $('#dsts').replaceWith(data.message);
                            $('#tents').val('');
                            $('#dacdiempl').val('');
                            $('#thongsokt').val('');
                            $('#nguongoc').val('');
                            $('#dvt').val('');
                            $('#sl').val('1');
                            $('#nguyengiadenghi').val('0');
                            $('#giadenghi').val('0');
                            $('#nguyengiathamdinh').val('0');
                            $('#giatritstd').val('0');
                            $('#gc').val('');

                            $('#tents').focus();
                            jQuery(document).ready(function() {
                                TableManaged.init();
                            });
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
    <!--Modal Wide Width-->
    <div class="modal fade" id="modal-delete-ts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa thông tin tài sản?</h4>
                </div>
                <input type="hidden" id="iddelete" name="iddelete">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="deleteRow()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @include('includes.script.create-header-scripts')



@stop