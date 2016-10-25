@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Thông tư quyết định<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtu-quyetdinh-tinh/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttttqd','files'=>true]) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ký hiệu văn bản<span class="require">*</span></label>
                                        {!!Form::text('khvb', null, array('id' => 'khvb','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                                <!--/span-->

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị ban hành<span class="require">*</span></label>
                                        {!!Form::text('dvbanhanh', null, array('id' => 'dvbanhanh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại văn bản<span class="require">*</span></label>
                                        {!! Form::select(
                                        'plttqd',
                                        array(
                                        'LUAT'=> 'Luật',
                                        'ND' => 'Nghị định',
                                        'TT' => 'Thông tư',
                                        'HD' => 'Hướng dẫn',
                                        ),null,
                                        array('id' => 'plttqd', 'class' => 'form-control'))
                                        !!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày ban hành</label>
                                        <input type="date" class="form-control required" name="ngaybh" id="ngaybh" value="{{$model->ngaybh}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày áp dụng</label>
                                        <input type="date" class="form-control required" name="ngayad" id="ngayad" value="{{$model->ngayad}}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tiêu đề</label>
                                        <textarea id="tieude" class="form-control" name="tieude" id="tieude" cols="30" rows="3">{{$model->tieude}}</textarea>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú<span class="require">*</span></label>
                                        <textarea id="tieude" class="form-control" name="ghichu" id="ghichu" cols="30" rows="3">{{$model->ghichu}}</textarea>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                @if($model->tailieu)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tài liệu hiện tại</label>
                                        <a href="{{url('/data/uploads/ttqd/'.$model->tailieu)}}">{{$model->tailieu}}</a>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tài liệu<span class="require">*</span></label>
                                        <input class="passvalid" type="file" name="img">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="col-md-12" style="text-align: center">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                            <button type="reset" class="btn default"> Hủy</button>
                            </div>
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

            var validator = $("#update_ttttqd").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="khvb"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkkhvb',
                    data: {
                        _token: CSRF_TOKEN,
                        khvb:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập lại ký hiệu văn bản", "Ký hiệu văn bản nhập vào đã tồn tại!!!");
                            $('input[name="khvb"]').val('');
                            $('input[name="khvb"]').focus();
                        }
                    }

                });
            })
        }(jQuery));
    </script>
@stop