@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
       Nhận dữ liệu <small> hồ sơ công bố giá bổ sung</small>
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
                    {!! Form::open(['url'=>'hoso-congbobosung/import-view', 'id' => 'import_congbogia', 'class'=>'horizontal-form','enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin dữ liệu import</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài sản<span class="require">*</span></label>
                                        {!!Form::text('tents', 'B', array('id' => 'tents','class' => 'form-control required','autofocus' => 'autofocus'))!!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thông số kỹ thuật<span class="require">*</span></label>
                                        {!!Form::text('thongsokt', 'C', array('id' => 'thongsokt','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguồn gốc<span class="require">*</span></label>
                                        {!!Form::text('nguongoc', 'D', array('id' => 'nguongoc','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                                        {!!Form::text('dvt', 'E', array('id' => 'dvt','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguyên giá đề nghị<span class="require">*</span></label>
                                        {!!Form::text('nguyengiadenghi', 'F', array('id' => 'nguyengiadenghi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá đề nghị<span class="require">*</span></label>
                                        {!!Form::text('giadenghi', 'F', array('id' => 'giadenghi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguyên giá thẩm định<span class="require">*</span></label>
                                        {!!Form::text('nguyengiathamdinh', 'F', array('id' => 'nguyengiathamdinh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá thẩm định<span class="require">*</span></label>
                                        {!!Form::text('giatritstd', 'F', array('id' => 'giatritstd','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nhận từ dòng<span class="require">*</span></label>
                                        {!!Form::text('tudong', '7', array('id' => 'tudong','class' => 'form-control required','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số lượng tài sản<span class="require">*</span></label>
                                        {!!Form::text('sodong', '5000', array('id' => 'sodong','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Sheet lấy dữ liệu<span class="require">*</span></label>
                                        {!!Form::text('sheet', '1', array('id' => 'sheet','class' => 'form-control required','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File thông tin<span class="require">*</span></label>
                                        <input name="fexcel" type="file" class="required" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File dữ liệu mẫu<span class="require">*</span></label>
                                        <a href="{{url('mauexcelcbg')}}" class="btn btn-warning btn-xs"><i class="fa fa-download"></i> Tải file Excel mẫu</a>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-plus"></i> Hoàn thành</button>
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

            var validator = $("#import_congbogia").validate({
                rules: {
                    ten :"required",
                    diachi :"required",
                    username :"required",
                    password :"required"

                },
                messages: {
                    ten :"Chưa nhập dữ liệu",
                    diachi :"Chưa nhập dữ liệu",
                    username :"Chưa nhập dữ liệu",
                    password :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>

@stop