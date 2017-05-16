@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
@stop

@section('content')
    <h3 class="page-title">
        Hồ sơ thẩm định<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <meta name="csrf_token" content="{{ csrf_token() }}" />
                    <!-- BEGIN FORM-->
                        {!! Form::open(['url'=>'hoso-thamdinhgia-dk', 'id' => 'create_tthstd', 'class'=>'horizontal-form','enctype'=>'multipart/form-data']) !!}
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
                                    <div class="form-group has-error">
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
                                    <div class="form-group has-error">
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
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                        <input type="text" id="dvyeucau" name="dvyeucau" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
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
                                    <div class="form-group has-error">
                                        <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                        <input data-mask="fdecimal" id="songaykq" name="songaykq" class="form-control" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
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
                                            <label class="control-label">File đính kèm 1</label>
                                            <input name="filedk" id="filedk" type="file">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">File đính kèm 2</label>
                                            <input name="filedk1" id="filedk1" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">File đính kèm 3</label>
                                            <input name="filedk2" id="filedk2" type="file">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">File đính kèm 4</label>
                                            <input name="filedk3" id="filedk3" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">File đính kèm 5</label>
                                            <input name="filedk4" id="filedk4" type="file">
                                        </div>
                                    </div>
                                </div>

                                <!--/span-->
                            </div>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <a href="{{url('hoso-thamdinhgia/nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
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
    @include('includes.script.create-header-scripts')
@stop