@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('vendors/jquery-validate/jquery.validate.min.js')}}"></script>
@stop

@section('content')


    <h3 class="page-title">
        Quản lý thông tin user<small> thay đổi mật khẩu</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box green">
                <div class="portlet-title">
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'/change-password', 'id' => 'form-changepass', 'class'=>'form-horizontal form-validate']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="current-password" class="col-sm-5 control-label">Mật khẩu cũ <span class="require">*</span></label>
                                <div class="col-sm-4">
                                    {!!Form::password('current-password', array('id' => 'current-password','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newpassword" class="col-sm-5 control-label">Mật khẩu mới <span class="require">*</span></label>
                                <div class="col-sm-4">
                                    {!!Form::password('newpassword', array('id' => 'newpassword','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newpassword2" class="col-sm-5 control-label">Nhập lại mật khẩu mới <span class="require">*</span></label>
                                <div class="col-sm-4">
                                    {!!Form::password('newpassword2', array('id' => 'newpassword2','class' => 'form-control required'))!!}
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="form-group text-center">
                                <button type="submit" onclick="validatePassword();" class="btn btn-primary">Cập nhật</button>
                                <button type="button" class="btn default"> Huỷ</button>
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
        function validatePassword(){

            var validator = $("#form-changepass").validate({
                rules: {
                    newpassword :"required",
                    newpassword2:{
                        equalTo: "#newpassword"
                    }
                },
                messages: {
                    newpassword :" Nhập mật khẩu mới",
                    newpassword2 :" Nhập lại mật khẩu mới không chính xác"
                }
            });
        }
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="current-password"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkpass',
                    data: {
                        _token: CSRF_TOKEN,
                        pass:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập lại mật khẩu", "Mật khẩu nhập vào không đúng");
                            $('input[name="current-password"]').val('');
                            $('input[name="current-password"]').focus();
                        }
                    }

                });
            })
        }(jQuery));
    </script>
@stop