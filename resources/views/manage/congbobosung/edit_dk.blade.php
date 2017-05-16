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
        Hồ sơ công bố giá bổ sung<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'hoso-congbobosung-dk/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tthscongbogia','enctype'=>'multipart/form-data']) !!}
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại hồ sơ<span class="require">*</span></label>
                                        {!! Form::select(
                                        'plhs',
                                        array(
                                        'Công bố giá bổ sung' => 'Công bố giá bổ sung',
                                        ),null,
                                        array('id' => 'plhs', 'class' => 'form-control'))
                                        !!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ công bố giá bổ sung<span class="require">*</span></label>
                                        {!!Form::text('sohs', null, array('id' => 'sohs','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời điểm công bố<span class="require">*</span></label>
                                        <input type="date" id="ngaynhap" name="ngaynhap" class="form-control required" value="{{$model->ngaynhap}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Nguồn vốn</label>
                                        {!! Form::select(
                                        'nguonvon',
                                        array(
                                        'Cả hai' => 'Cả hai',
                                        'Thường xuyên' => 'Thường xuyên',
                                        'Đầu tư' => 'Đầu tư',
                                        ),null,
                                        array('id' => 'nguonvon', 'class' => 'form-control'))
                                        !!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa điểm công bố giá<span class="require">*</span></label>
                                        {!!Form::text('diadiemcongbo', null, array('id' => 'diadiemcongbo','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Đơn vị đề nghị công bố giá<span class="require">*</span></label>
                                        {!!Form::text('donvidn', null, array('id' => 'donvidn','class' => 'form-control required'))!!}

                                    </div>
                                </div>
                            </div>
                            <!--div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số văn bản đề nghị<span class="require">*</span></label>
                                        {!!Form::text('sovbdn', null, array('id' => 'sovbdn','class' => 'form-control required'))!!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Số thông báo kết luận công bố giá<span class="require">*</span></label>
                                        {!!Form::text('sotbkl', null, array('id' => 'sotbkl','class' => 'form-control required'))!!}
                                    </div>
                                </div>

                            </div-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 1</label>
                                        @if(isset($model->filedk))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk)}}" target="_blank">{{$model->filedk}}</a></p>
                                        @endif
                                        <input name="filedk" id="filedk" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 2</label>
                                        @if(isset($model->filedk1))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk1)}}" target="_blank">{{$model->filedk1}}</a></p>
                                        @endif
                                        <input name="filedk1" id="filedk1" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 3</label>
                                        @if(isset($model->filedk2))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk2)}}" target="_blank">{{$model->filedk2}}</a></p>
                                        @endif
                                        <input name="filedk2" id="filedk2" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 4</label>
                                        @if(isset($model->filedk3))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk3)}}" target="_blank">{{$model->filedk3}}</a></p>
                                        @endif
                                        <input name="filedk3" id="filedk3" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 5</label>
                                        @if(isset($model->filedk4))
                                            <p><a href="{{url('/data/uploads/attack/'.$model->filedk4)}}" target="_blank">{{$model->filedk4}}</a></p>
                                        @endif
                                        <input name="filedk4" id="filedk4" type="file">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{$model->mahs}}" name="mahs" id="mahs">
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <a href="{{url('hoso-congbobosung/nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
        <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tthscongbogia").validate({
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
    </div>
@stop