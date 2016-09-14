@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
       Nhận dữ liệu <small> thẩm định giá</small>
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
                    {!! Form::open(['url'=>'hoso-congbogia/import-view', 'id' => 'import_congbogia', 'class'=>'horizontal-form','enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin dữ liệu import</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài sản<span class="require">*</span></label>
                                        {!!Form::text('tents', 'Tên tài sản', array('id' => 'tents','class' => 'form-control','required' => 'required','autofocus' => 'autofocus'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đặc điểm pháp lý<span class="require">*</span></label>
                                        {!!Form::text('dacdiempl', 'Đặc điểm pháp lý', array('id' => 'dacdiempl','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thông số kỹ thuật</label>
                                        {!!Form::text('thongsokt', 'Thông số kỹ thuật', array('id' => 'thongsokt','class' => 'form-control','required' => 'required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguồn gốc</label>
                                        {!!Form::text('nguongoc', 'Nguồn gốc xuất xứ', array('id' => 'nguongoc','class' => 'form-control','required' => 'required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị tính</label>
                                        {!!Form::text('dvt', 'ĐVT', array('id' => 'dvt','class' => 'form-control','required' => 'required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số lượng<span class="require">*</span></label>
                                        {!!Form::text('sl', 'Số lượng', array('id' => 'sl','class' => 'form-control','required' => 'required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá đề nghị<span class="require">*</span></label>
                                        {!!Form::text('giadenghi', 'Giá đề nghị TĐ', array('id' => 'giadenghi','class' => 'form-control','required' => 'required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá thẩm định<span class="require">*</span></label>
                                        {!!Form::text('giatritstd', 'Giá thẩm định', array('id' => 'giatritstd','class' => 'form-control','required' => 'required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nhận từ dòng<span class="require">*</span></label>
                                        {!!Form::text('tudong', '2', array('id' => 'tudong','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số lượng tài sản<span class="require">*</span></label>
                                        {!!Form::text('sodong', '1000', array('id' => 'sodong','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">

                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File thông tin<span class="require">*</span></label>
                                        <input name="fexcel" type="file">
                                    </div>
                                </div>
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
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-plus"></i> Import</button>
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

            var validator = $("#import_thamdinhgia1").validate({
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