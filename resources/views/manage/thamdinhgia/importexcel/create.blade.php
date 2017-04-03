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
                    {!! Form::open(['url'=>'hoso-thamdinhgia/import-view', 'id' => 'import_thamdinhgia', 'class'=>'horizontal-form','enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ thẩm định<span class="require">*</span></label>
                                        <input type="text" id="hosotdgia" name="hosotdgia" class="form-control required" autofocus>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                        <input type="date" id="thoidiem" name="thoidiem" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa điểm thẩm định<span class="require">*</span></label>
                                        <input type="text" id="diadiem" name="diadiem" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phương pháp thẩm định thẩm định</label>
                                        <input type="text" id="ppthamdinh" name="ppthamdinh" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mục đích thẩm định<span class="require">*</span></label>
                                        <input type="text" id="mucdich" name="mucdich" class="form-control required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                        <input type="text" id="dvyeucau" name="dvyeucau" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguồn vốn<span class="require">*</span></label>
                                        <select class="form-control" name="nguonvon" id="nguonvon">
                                            <option value="Cả hai">Cả hai (Nguồn vốn thường xuyên và Nguồn vốn đầu tư)</option>
                                            <option value="Thường xuyên">Nguồn vốn thường xuyên</option>
                                            <option value="Đầu tư">Nguồn vốn đầu tư</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thuế VAT</label>
                                        <select class="form-control" name="thuevat" id="thuevat">
                                            <option value="Giá bao gồm thuế VAT">Giá bao gồm thuế VAT</option>
                                            <option value="Giá chưa bao gồm thuế VAT">Giá chưa bao gồm thuế VAT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                        <input data-mask="fdecimal" id="songaykq" name="songaykq" class="form-control" value="0">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn sử dụng kết quả thẩm định<span class="require">*</span></label>
                                        <input type="date" id="thoihan" name="thoihan" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-section" style="color: #0000ff">Thông tin dữ liệu import</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài sản<span class="require">*</span></label>
                                        {!!Form::text('tents', 'B', array('id' => 'tents','class' => 'form-control','required' => 'required','autofocus' => 'autofocus'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đặc điểm pháp lý</label>
                                        {!!Form::text('dacdiempl', '', array('id' => 'dacdiempl','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thông số kỹ thuật</label>
                                        {!!Form::text('thongsokt', 'C', array('id' => 'thongsokt','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguồn gốc</label>
                                        {!!Form::text('nguongoc', 'D', array('id' => 'nguongoc','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị tính</label>
                                        {!!Form::text('dvt', 'E', array('id' => 'dvt','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số lượng<span class="require">*</span></label>
                                        {!!Form::text('sl', 'F', array('id' => 'sl','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguyên giá đề nghị<span class="require">*</span></label>
                                        {!!Form::text('nguyengiadenghi', 'G', array('id' => 'nguyengiadenghi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá đề nghị<span class="require">*</span></label>
                                        {!!Form::text('giadenghi', 'H', array('id' => 'giadenghi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguyên giá thẩm định<span class="require">*</span></label>
                                        {!!Form::text('nguyengiathamdinh', 'I', array('id' => 'nguyengiathamdinh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá thẩm định<span class="require">*</span></label>
                                        {!!Form::text('giatritstd', 'J', array('id' => 'giatritstd','class' => 'form-control required'))!!}
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
                                        {!!Form::text('sodong', '1000', array('id' => 'sodong','class' => 'form-control required','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Sheet lấy dữ liệu<span class="require">*</span></label>
                                        {!!Form::text('sheet', '0', array('id' => 'sheet','class' => 'form-control required','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File thông tin<span class="require">*</span></label>
                                        <input name="fexcel" class="required" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File dữ liệu mẫu<span class="require">*</span></label>
                                        <a href="{{url('mauexceltdg')}}" class="btn btn-warning btn-xs"><i class="fa fa-download"></i> Tải file Excel mẫu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-plus"></i> Đồng ý</button>
                            <button type="reset" class="btn default"> Hủy</button>

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
            var validator = $("#import_thamdinhgia").validate({
                rules: {
                    fexcel :"required",
                    diachi :"required",
                    username :"required",
                    password :"required"
                },
                messages: {
                    fexcel :"Chưa chọn file dữ liệu",
                    diachi :"Chưa nhập dữ liệu",
                    username :"Chưa nhập dữ liệu",
                    password :"Chưa nhập dữ liệu"
                }
            });
        }
        $('#songaykq').change(function(){
            addngay();
        });
        $('#thoidiem').change(function(){
            addngay();
        });
        function addngay(){
            var thoidiem = $('#thoidiem').val();
            var songay = $('#songaykq').val();
            if(thoidiem!='' && songay!=''){
                var date = new Date(thoidiem);
                date.setDate(date.getDate()+parseInt(songay));
                var dd = date.getDate();
                var mm = date.getMonth() + 1;
                var y = date.getFullYear();
                if(dd<10) {
                    dd='0'+dd
                }
                if(mm<10) {
                    mm='0'+mm
                }
                $('#thoihan').val(y+ '-'+mm + '-' + dd  );
            }
        }
    </script>

@stop