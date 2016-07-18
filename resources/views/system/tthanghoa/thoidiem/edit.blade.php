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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmthoidiem/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttthoidiem']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã thời điểm<span class="require">*</span></label>
                                        {!!Form::text('mathoidiem', null, array('id' => 'mathoidiem','class' => 'form-control required', 'autofocus'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên thời điểm<span class="require">*</span></label>
                                        {!!Form::text('tenthoidiem', null, array('id' => 'tenthoidiem','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Từ ngày</label>
                                        {!!Form::text('tungay', null, array('id' => 'tungay','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đến ngày</label>
                                        {!!Form::text('denngay', null, array('id' => 'denngay','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nhóm báo cáo</label>
                                        {!! Form::select(
                                        'nhom',
                                        array(
                                        'Tuần' => 'Tuần',
                                        'Tháng' => 'Tháng',
                                        'Quý' => 'Quý',
                                        ),null,
                                        array('id' => 'nhom', 'class' => 'form-control'))
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại báo cáo</label>
                                        {!! Form::select(
                                        'plbc',
                                        array(
                                        'Hàng hóa,dịch vụ' => 'Hàng hóa,dịch vụ',
                                        'Hàng hóa xuất nhập khẩu' => 'Hàng hóa xuất nhập khẩu',
                                        ),null,
                                        array('id' => 'plbc', 'class' => 'form-control'))
                                        !!}
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

            var validator = $("#update_ttthoidiem").validate({
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