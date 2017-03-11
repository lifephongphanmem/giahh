@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin giá hàng hóa, dịch vụ<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        {!! Form::model($model, ['method' => 'PATCH', 'url'=>'giahhdv-diaphuong-dk/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttgiahhdvtn','enctype'=>'multipart/form-data']) !!}
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập<span class="require">*</span></label>
                                        <input type="date" id="tgnhap" name="tgnhap" class="form-control required" autofocus value="{{$model->tgnhap}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại hàng hóa<span class="require">*</span></label>
                                        <select class="form-control" id="maloaihh" name="maloaihh">
                                            @foreach($loaihh as $hh)
                                                <option value="{{$hh->maloaihh}}" {{$hh->maloaihh==$model->maloaihh?'selected':''}}>{{$hh->tenloaihh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Loại giá</label>
                                        <select class="form-control" id="maloaigia" name="maloaigia">
                                            @foreach($loaigia as $gia)
                                                <option value="{{$gia->maloaigia}}" {{$gia->maloaigia==$model->maloaigia?'selected':''}}>{{$gia->tenloaigia}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm</label>
                                        <p><a href="{{url('/data/uploads/attack/'.$model->filedk)}}" target="_blank">{{$model->filedk}}</a></p>
                                        <input name="filedk" id="filedk" type="file">
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
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <a href="{{url('giahhdv-diaphuong/maso='.$model->masopnhom.'/nam='.date('Y'))}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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
    <script>
        jQuery(document).ready(function($) {
            $('button[name="capnhatts"]').click(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/giahanghoa/store',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        masopnhom: $('#mapnhom').val(),
                        mahh: $('#mahh').val(),
                        giatu: $('#giatu').val(),
                        giaden: $('#giaden').val(),
                        soluong: $('#soluong').val(),
                        nguontin: $('#nguontin').val(),
                        gc: $('textarea[name="gc"]').val(),
                        mahs: $('#mahs').val()

                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Cập nhật thông tin giá hàng hóa dịch vụ thành công", "Thành công!");
                            $('#dsts').replaceWith(data.message);
                            jQuery(document).ready(function() {
                                TableManaged.init();
                            });
                            $('#mapnhom').val('');
                            $('#mahh').val('');
                            $('#mahh').children().remove().end().append('<option selected value="">--Chọn hàng hóa- dịch vụ--</option>') ;
                            $('#mahh').select2({placeholder: '--Chọn hàng hóa- dịch vụ--'});
                            $('#giatu').val('0');
                            $('#giaden').val('0');
                            $('#soluong').val('1');
                            $('#nguontin').val('');
                            $('#gc').val('');

                            $('#mapnhom').focus();
                        }
                        else {
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                            $('#mapnhom').focus();
                        }
                    }
                })
            });

        }(jQuery));
    </script>
    <script><!--change select2-->
        jQuery(document).ready(function($) {
            $('#mapnhom').change(function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/giahanghoadefault/gettthh',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mapnhom: $('#mapnhom').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Chọn nhóm hàng hóa dịch vụ thành công - Bạn cần chọn tên hàng hóa thị trường", "Thành công!");
                            $('#tthh').replaceWith(data.message);
                            $('#mahh').select2();
                        }
                        else
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                    }
                })
            });
        }(jQuery));
    </script>


    <!--Modal Wide Width-->
    <div class="modal fade bs-modal-lg" id="modal-wide-width" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin hàng hóa dịch vụ</h4>
                </div>
                <div class="modal-body" id="tttsedit">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatets()">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')
@stop