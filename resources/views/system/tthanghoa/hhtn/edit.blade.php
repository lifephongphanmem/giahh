@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin hàng hóa trong nước<small> thêm mới</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmhanghoa-trongnuoc/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tthhtn']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã hàng hóa<span class="require">*</span></label>
                                        {!!Form::text('mahh', null, array('id' => 'mahh','class' => 'form-control', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên hàng hóa<span class="require">*</span></label>
                                        {!!Form::text('tenhh', null, array('id' => 'tenhh','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đặc điểm kỹ thuật</label>
                                        {!!Form::text('dacdiemkt', null, array('id' => 'dacdiemkt','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị tính</label>
                                        <input type="text" class="form-control" name="dvt" id="dvt">
                                        {!!Form::text('dvt', null, array('id' => 'dvt','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nơi sản xuất</label>
                                        {!!Form::text('nsx', null, array('id' => 'nsx','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nơi sản xuất</label>
                                        {!! Form::select(
                                        'theodoi',
                                        array(
                                        'Có' => 'Có',
                                        'Không' => 'Không',
                                        ),null,
                                        array('id' => 'theodoi', 'class' => 'form-control'))
                                        !!}
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú<span class="require">*</span></label>
                                        {!!Form::text('gc', null, array('id' => 'gc','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Update</button>
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

            var validator = $("#update_tthhtn").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
@stop