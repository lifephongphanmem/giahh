@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ<small>&nbsp;thẩm định giá</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'hoso-thamdinhgia-dk/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tthsthamdinhgia','enctype'=>'multipart/form-data']) !!}
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số hồ sơ thẩm định<span class="require">*</span></label>
                                {!!Form::text('hosotdgia', null, array('id' => 'hosotdgia','class' => 'form-control required','autofocus'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                <input type="date" id="thoidiem" name="thoidiem" class="form-control required" value="{{$model->thoidiem}}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Địa điểm thẩm định<span class="require">*</span></label>
                                {!!Form::text('diadiem', null, array('id' => 'diadiem','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Phương pháp thẩm định thẩm định</label>
                                {!!Form::text('ppthamdinh', null, array('id' => 'ppthamdinh','class' => 'form-control'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mục đích thẩm định<span class="require">*</span></label>
                                {!!Form::text('mucdich', null, array('id' => 'mucdich','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                {!!Form::text('dvyeucau', null, array('id' => 'dvyeucau','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nguồn vốn<span class="require">*</span></label>
                                {!! Form::select(
                                'nguonvon',
                                array(
                                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                                'Đầu tư' => 'Nguồn vốn đầu tư',
                                ),null,
                                array('id' => 'nguonvon', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thuế VAT</label>
                                {!! Form::select(
                                'thuevat',
                                array(
                                'Giá bao gồm thuế VAT' => 'Giá bao gồm thuế VAT',
                                'Giá chưa bao gồm thuế VAT' => 'Giá chưa bao gồm thuế VAT',
                                ),null,
                                array('id' => 'thuevat', 'class' => 'form-control'))
                                !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                {!!Form::text('sotbkl', null, array('id' => 'sotbkl','class' => 'form-control required'))!!}
                            </div>
                        </div>
                        <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                <input data-mask="fdecimal" id="songaykq" name="songaykq" class="form-control" value="{{$model->songaykq}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thời hạn sử dụng kết quả thẩm định<span class="require">*</span></label>
                                <input type="date" id="thoihan" name="thoihan" class="form-control required" value="{{$model->thoihan}}">
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
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <a href="{{url('hoso-thamdinhgia/nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            </div>
        </div>
    </div>
    <div class="clearfix">
    </div>
    <!--Validate Form-->
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tthsthamdinhgia").validate({
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