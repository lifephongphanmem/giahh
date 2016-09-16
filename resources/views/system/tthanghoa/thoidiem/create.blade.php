@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Thông tin thời điểm<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'dmthoidiem', 'id' => 'create_ttthoidiem', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên thời điểm<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="tenthoidiem" id="tenthoidiem">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Từ ngày</label>
                                        <input type="text" class="form-control" name="tungay" id="tungay">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đến ngày</label>
                                        <input type="text" class="form-control" name="denngay" id="denngay">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nhóm báo cáo</label>
                                        <select class="form-control" id="nhom" name="nhom">
                                            <option value="Tuần">Tuần</option>
                                            <option value="Tháng">Tháng</option>
                                            <option value="Quý">Quý</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại báo cáo</label>
                                        <select class="form-control" id="plbc" name="plbc">
                                            <option value="Hàng hóa thị trường">Hàng hóa thị trường</option>
                                            <option value="Hàng hóa,dịch vụ">Hàng hóa,dịch vụ</option>
                                            <option value="Hàng hóa xuất nhập khẩu">Hàng hóa xuất nhập khẩu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Submit</button>
                            <button type="reset" class="btn default">Cancel</button>
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

            var validator = $("#create_ttthoidiem").validate({
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
            $('input[name="mathoidiem"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkmathoidiem',
                    data: {
                        _token: CSRF_TOKEN,
                        mathoidiem:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập mã thời điểm khác", "Mã thời điểm nhập vào đã tồn tại!!!");
                            $('input[name="mathoidiem"]').val('');
                            $('input[name="mathoidiem"]').focus();
                        }else
                            toastr.success("Mã thời điểm có thể sử dụng", "Thành công");
                    }

                });
            })
        }(jQuery));
    </script>
@stop