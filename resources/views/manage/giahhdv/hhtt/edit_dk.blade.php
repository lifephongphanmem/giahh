@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    @include('includes.crumbs.script_inputdate')
@stop

@section('content')
    <h3 class="page-title">
        Thông tin giá hàng hóa dịch vụ trong nước<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'giahhdv-thitruong-dk/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttgiahhdvtn','enctype'=>'multipart/form-data']) !!}
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập<span class="require">*</span></label>
                                        {!!Form::text('tgnhap',date('d/m/Y',  strtotime($model->tgnhap)), array('id' => 'tgnhap','class' => 'form-control','readonly'=>'true'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thị trường<span class="require">*</span></label>
                                        <select class="form-control required" name="thitruong" id="thitruong">
                                            @foreach($thitruong as $ct)
                                                <option value="{{$ct->thitruong}}" {{$ct->thitruong==$model->thitruong?'selected':''}}>{{$ct->thitruong}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> Nội dung</label>
                                        {!! Form::textarea('noidung',null,array('id' => 'noidung', 'class' => 'form-control','rows'=>'3'))!!}
                                    </div>
                                </div>
                            </div>

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

                            <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}" />
                        </div>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_ttgiahhdvtn").validate({
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