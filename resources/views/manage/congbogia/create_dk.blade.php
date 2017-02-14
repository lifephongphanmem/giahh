@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
@stop

@section('content')
    <h3 class="page-title">
        Hồ sơ công bố giá VLXD<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        {!! Form::open(['url'=>'hoso-congbogia-dk', 'id' => 'create_tthscbg', 'class'=>'horizontal-form','enctype'=>'multipart/form-data']) !!}
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Phân loại hồ sơ<span class="require">*</span></label>
                                        <select class="form-control" id="plhs" name="plhs" autofocus>
                                            <option value="Công bố giá">Công bố giá</option>
                                            <!--option value="Công bố giá bổ sung">Công bố giá bổ sung</option-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ công bố giá VLXD<span class="require">*</span></label>
                                        <input type="text" id="sohs" name="sohs" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời điểm công bố<span class="require">*</span></label>
                                        <input type="date" id="ngaynhap" name="ngaynhap" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Nguồn vốn</label>
                                        <select class="form-control" id="nguonvon" name="nguonvon">
                                            <option value="Cả hai">Cả hai</option>
                                            <option value="Thường xuyên">Thường xuyên</option>
                                            <option value="Đầu tư">Đầu tư</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa điểm công bố giá<span class="require">*</span></label>
                                        <input type="text" id="diadiemcongbo" name="diadiemcongbo" class="form-control required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Đơn vị đề nghị công bố giá<span class="require">*</span></label>
                                        <input type="text" id="donvidn" name="donvidn" class="form-control required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số văn bản đề nghị<span class="require">*</span></label>
                                        <input type="text" id="sovbdn" name="sovbdn" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Số thông báo kết luận công bố giá VLXD<span class="require">*</span></label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm</label>
                                        <input name="filedk" id="filedk" type="file" class="required">
                                    </div>
                                </div>
                            </div>
                        </div>


                    <!-- END FORM-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <a href="{{url('hoso-congbogia/nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_tthscbg").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    @include('includes.script.create-header-scripts')
@stop