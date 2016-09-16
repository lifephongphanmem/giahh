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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmloaigia/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttloaigia']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã loại giá<span class="require">*</span></label>
                                        {!!Form::text('maloaigia', null, array('id' => 'maloaigia','class' => 'form-control required', 'autofocus'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên loại giá<span class="require">*</span></label>
                                        {!!Form::text('tenloaigia', null, array('id' => 'tenloaigia','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-labal">Phân loại</label>
                                        {!! Form::select(
                                        'pl',
                                        array(
                                        'Hàng hóa thị trường' => 'Hàng hóa thị trường',
                                        'Hàng hóa dịch vụ trong nước' => 'Hàng hóa dịch vụ trong nước',
                                        'Hàng hóa xuất nhập khẩu' => 'Hàng hóa xuất nhập khẩu',
                                        ),null,
                                        array('id' => 'pl', 'class' => 'form-control'))
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú</label>
                                        {!!Form::text('gc', null, array('id' => 'gc','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
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