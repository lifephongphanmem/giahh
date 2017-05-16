@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Thông tin phòng ban<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmloaivanban/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttphongban']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Phân loại văn bản<span class="require">*</span></label>
                                            {!! Form::select(
                                            'level',
                                            array(
                                            'TW'=> 'Văn bản trung ương ban hành',
                                            'T' => 'Văn bản tỉnh ban hành'
                                            ),null,
                                            array('id' => 'level', 'class' => 'form-control'))
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Mã số văn bản<span class="require">*</span></label>
                                            {!!Form::text('plttqd', null, array('id' => 'plttqd','class' => 'form-control text-muted'))!!}
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Tên loại văn bản</label>
                                            {!!Form::text('tenloaivanban', null, array('id' => 'tenloaivanban','class' => 'form-control'))!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Ghi chú</label>
                                            {!!Form::text('ghichu', null, array('id' => 'ghichu','class' => 'form-control'))!!}
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                            <button type="reset" class="btn default"> Huỷ</button>
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

            var validator = $("#update_ttphongban").validate({
                rules: {
                    ten :"required",
                    diachi :"required"
                },
                messages: {
                    ten: "Chưa nhập dữ liệu",
                    diachi: "Chưa nhập dữ liệu"
                }
            });
        }
    </script>
@stop