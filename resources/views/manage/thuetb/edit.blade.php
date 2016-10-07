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

    </script>
    <script>
        function createdsxe() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/gia-thuetruocba-ct/taomoi',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    maloai: $('#maloai').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Bạn đã tạo danh sách thông tin thành công!", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#maloaidt').val($('#maloai').val());
                        $('#create-modal').modal("hide");

                    }
                }
            })

        }
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/gia-thuetruocba-ct/chinhsua',
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
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin thuế trước bạ!", "Lỗi!");
                }
            })
        }

        function updatets() {
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/gia-thuetruocba-ct/capnhat',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    giamoi: $('#giamoiedit').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
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
        Thông tin giá<small>&nbsp;thuế trước bạ</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'gia-thuetruocba/'. $model->id, 'class'=>'horizontal-form','id'=>'update_giathuetb']) !!}
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">

                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số quyết định<span class="require">*</span></label>
                                {!!Form::text('soqd', null, array('id' => 'soqs','class' => 'form-control required','autofocus'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Ngày nhập<span class="require">*</span></label>
                                <input type="date" id="ngaynhap" name="ngaynhap" class="form-control required" value="{{$model->ngaynhap}}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại xe<span class="require">*</span></label>
                                <select class="form-control" id="maloai" name="maloai">
                                    @foreach($loais as $loai)
                                        <option value="{{$loai->maloai}}" {{$loai->maloai == $model->maloai ? 'selected': ''}}>{{$loai->tenloai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="maloaidt" id="maloaidt" value="{{$model->maloai}}">
                    </div>
                    <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" data-target="#create-modal" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tạo mới</button>
                        </div>
                    </div>

                    <!--/row-->
                    <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết</h4>



                    <div class="row" id="dsts">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                <tr>
                                    <th width="2%" style="text-align: center">STT</th>
                                    <th style="text-align: center">Tên hiệu</th>
                                    <th style="text-align: center">Thông số kỹ thuật</th>
                                    <th style="text-align: center">Dung tích</th>
                                    <th style="text-align: center">Nước sản xuất</th>
                                    <th style="text-align: center">Giá tối thiểu <br>tính lệ phí trước bạ hiện tại</th>
                                    <th style="text-align: center">Giá tối thiểu <br>tính lệ phí trước bạ mới</th>
                                    <th style="text-align: center" width="20%">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modelct as $key=>$tt)
                                    <tr>
                                        <td style="text-align: center">{{$key +1}}</td>
                                        <td class="active">{{$tt->tenhieu}}</td>
                                        <td style="text-align: center">{{$tt->thongsokt}}</td>
                                        <td style="text-align: center">{{$tt->dungtich}}</td>
                                        <td style="text-align: center">{{$tt->nuocsx}}</td>
                                        <td style="text-align: right">{{number_format($tt->giaht!= '' ? $tt->giaht : 0)}}</td>
                                        <td style="text-align: right">{{number_format($tt->giamoi!= '' ? $tt->giamoi : 0)}}</td>
                                        <td>
                                            <button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('{{$tt->id}}');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
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
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>

    <!--Validate Form-->
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_giathuetb").validate({
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
    <!--Model create-xe-->
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Tạo danh sách xe theo thông tin loại xe ở trên?</h4>
                </div>
                <div class="modal-body">
                    <h5>Tạo danh sách các loại xe theo danh mục! Nếu dữ liệu đã có sẽ bị thay đổi thành dữ liệu theo danh mục</h5>
                    <h5>Bạn cần chắc chắn khi sử dụng chức năng này</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="createdsxe()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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