@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Thông tin loại giá<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'dmloaigia', 'id' => 'create_ttloaigia', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã loại giá<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="maloaigia" id="maloaigia">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên loại giá<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="tenloaigia" id="tenloaigia">
                                    </div>
                                </div>

                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại<span class="require">*</span></label>
                                        <select class="form-control" name="pl" id="pl">
                                            <option value="Hàng hóa thị trường">Hàng hóa thị trường</option>
                                            <option value="Hàng hóa dịch vụ trong nước">Hàng hóa dịch vụ trong nước</option>
                                            <option value="Hàng hóa xuất nhập khẩu">Hàng hóa xuất nhập khẩu</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú</label>
                                        <input type="text" class="form-control" name="gc" id="gc">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Thêm mới</button>
                            <button type="reset" class="btn default">Hủy</button>
                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_ttloaigia").validate({
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
            $('input[name="maloaigia"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkmaloaigia',
                    data: {
                        _token: CSRF_TOKEN,
                        maloaigia:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập mã loại giá khác", "Mã loại giá nhập vào đã tồn tại!!!");
                            $('input[name="maloaigia"]').val('');
                            $('input[name="maloaigia"]').focus();
                        }else
                            toastr.success("Mã loại giá có thể sử dụng", "Thành công");
                    }

                });
            })
        }(jQuery));
    </script>
@stop