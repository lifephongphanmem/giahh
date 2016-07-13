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
                url: '/thamdinhgiadefault/edit',
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
                url: '/thamdinhgiadefault/update',
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
                url: '/thamdinhgiadefault/delete',
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
        function InputMask(){
        //$(function(){
        // Input Mask
        if($.isFunction($.fn.inputmask))
        {
        $("[data-mask]").each(function(i, el)
        {
        var $this = $(el),
        mask = $this.data('mask').toString(),
        opts = {
        numericInput: attrDefault($this, 'numeric', false),
        radixPoint: attrDefault($this, 'radixPoint', ''),
        rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
        },
        placeholder = attrDefault($this, 'placeholder', ''),
        is_regex = attrDefault($this, 'isRegex', '');


        if(placeholder.length)
        {
        opts[placeholder] = placeholder;
        }

        switch(mask.toLowerCase())
        {
        case "phone":
        mask = "(999) 999-9999";
        break;

        case "currency":
        case "rcurrency":

        var sign = attrDefault($this, 'sign', '$');;

        mask = "999,999,999.99";

        if($this.data('mask').toLowerCase() == 'rcurrency')
        {
        mask += ' ' + sign;
        }
        else
        {
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
        autoGroup		: true,
        groupSize		: 3,
        radixPoint		: attrDefault($this, 'rad', '.'),
        groupSeparator	: attrDefault($this, 'dec', ',')
        });
        }

        if(is_regex)
        {
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
        Thông tin hồ sơ<small> thẩm định</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ thẩm định</label>
                                        <input type="text" class="form-control" value="{{$model->hosotdgia}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Thời điểm thẩm định</label>
                                        <input type="date" class="form-control" value="{{$model->thoidiem}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa điểm thẩm định</label>
                                        <input type="text" id="diadiem" name="diadiem" class="form-control" readonly value="{{$model->diadiem}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Phương pháp thẩm định thẩm định</label>
                                        <input type="text" id="ppthamdinh" name="ppthamdinh" class="form-control" value="{{$model->ppthamdinh}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mục đích thẩm định</label>
                                        <input type="text" id="mucdich" name="mucdich" class="form-control" value="{{$model->mucdich}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Đơn vị yêu cầu thẩm định</label>
                                        <input type="text" id="dvyeucau" name="dvyeucau" class="form-control" value="{{$model->dvyeucau}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn sử dụng kết quả thẩm định</label>
                                        <input type="date" id="thoihan" name="thoihan" class="form-control" value="{{$model->thoihan}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Số thông báo kết luận</label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control" value="{{$model->sotbkl}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->
                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
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
                                                <th style="text-align: center">Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ttts">
                                            @foreach($modelts as $key=>$tt)
                                                <tr>
                                                    <td style="text-align: center">{{$key +1}}</td>
                                                    <td>{{$tt->tents}}</td>
                                                    <td>{{$tt->dacdiempl}}</td>
                                                    <td>{{$tt->nguongoc}}</td>
                                                    <td style="text-align: center">{{$tt->dvt}}</td>
                                                    <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->giadenghi)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->giatritstd)}}</td>
                                                    <td>{{$tt->ghichu}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions right">
                            <a href="{{url('hoso-thamdinhgia/nam='.$model->nam.'&pb=all')}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
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

            var validator = $("#create_tthstd").validate({
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
            $('input[name="khvb"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkkhvb',
                    data: {
                        _token: CSRF_TOKEN,
                        khvb:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập lại ký hiệu văn bản", "Ký hiệu văn bản nhập vào đã tồn tại!!!");
                            $('input[name="khvb"]').val('');
                            $('input[name="khvb"]').focus();
                        }
                    }

                });
            })
        }(jQuery));
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('button[name="capnhatts"]').click(function(){
                //alert($('input[name="tents"]').val());
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/thamdinhgiadefault/store',
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
    @include('includes.script.create-header-scripts')
@stop