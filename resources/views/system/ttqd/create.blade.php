@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Thông tin loại văn bản<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'dmloaivanban', 'id' => 'create_ttphong_ban', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại văn bản<span class="require">*</span></label>
                                        <select class="form-control required" name="level" id="level">
                                            <option value="TW">Văn bản trung ương ban hành</option>
                                            <option value="T">Văn bản tỉnh ban hành</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Mã số văn bản<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="plttqd" id="plttqd">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Tên loại văn bản</label>
                                        <input type="text" class="form-control" name="tenloaivanban" id="tenloaivanban">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú</label>
                                        <input type="text" class="form-control" name="ghichu" id="ghichu">
                                    </div>
                                </div>
                                <!--/span-->
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

            var validator = $("#create_ttphong_ban").validate({
                rules: {
                    level :"required",
                    plttqd :"required",
                    tenloaivanban :"required"
                },
                messages: {
                    level :"Chưa nhập dữ liệu",
                    plttqd :"Chưa nhập dữ liệu",
                    tenloaivanban :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
@stop