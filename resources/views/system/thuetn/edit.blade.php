@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Danh mục tài nguyên tính thuế tài nguyên<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmthuetn/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tthhtn']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã tài nguyên<span class="require">*</span></label>
                                        {!!Form::text('mahh', null, array('id' => 'mahh','class' => 'form-control', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài nguyên<span class="require">*</span></label>
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
                                        {!!Form::text('dvt', null, array('id' => 'dvt','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thuộc tài nguyên</label>
                                        <select name="thuoctn" class="form-control" id="thuoctn">
                                            <option value="">--Chọn tài nguyên gốc--</option>
                                            @foreach($thuoctn as $ct)
                                                <option value="{{$ct->mahh}}" {{$ct->mahh===$model->thuoctn?'selected':''}}>{{$ct->tenhh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Sắp xếp<span class="require">*</span></label>
                                        {!!Form::text('sapxep', null, array('id' => 'sapxep','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Theo dõi</label>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú<span class="require">*</span></label>
                                        {!!Form::text('gc', null, array('id' => 'gc','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
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