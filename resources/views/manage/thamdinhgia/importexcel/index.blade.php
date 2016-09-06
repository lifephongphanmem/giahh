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
                    {!! Form::open(['url'=>'import-thamdinhgia', 'id' => 'import_thamdinhgia', 'class'=>'horizontal-form']) !!}
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
                                    <div class="form-group has-error">
                                        <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                        <input type="date" id="thoidiem" name="thoidiem" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->
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
                                        <label class="control-label">Thời hạn sử dụng kết quả thẩm định<span class="require">*</span></label>
                                        <input type="date" id="thoihan" name="thoihan" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4 class="form-section" style="color: #0000ff">Thông tin dữ liệu import</h4>
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
                                                <th style="text-align: center" width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody id="ttts">
                                            <td colspan="9" style="text-align: center">Chưa có thông tin</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

            var validator = $("#create_ttphong_ban").validate({
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