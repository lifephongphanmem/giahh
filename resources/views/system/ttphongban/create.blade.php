@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Thông tin phòng ban<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'phong-ban', 'id' => 'create_ttphong_ban', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phòng ban<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="ten" id="ten" autofocus>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="diachi" id="diachi">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Điện thoại</label>
                                        <input type="text" class="form-control" name="dienthoai" id="dienthoai">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fax</label>
                                        <input type="text" class="form-control" name="fax" id="fax">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <!--/span-->
                                <!--div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fax<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="email" id="email">
                                    </div>
                                </div-->
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tài khoản truy cập<span class="require">*</span></label>
                                        <input type="text" class="form-control required"  name="username" id="username">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mật khẩu<span class="require">*</span></label>
                                        <input type="text" class="form-control required"  name="password" id="password">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h4><b>Phân quyền tài khoản</b></h4>
                            <div class="row">
                                @if(canGeneral('hhdv','hhdvtn'))
                                    <div class="col-md-3">
                                        <h4 style="text-align: center">Hàng hóa dịch vụ trong nước</h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="action">
                                            <tr>
                                                <th class="table-checkbox" width="5%">
                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                </th>
                                                <th>Chức năng</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->hhdvtn->index) && $permission->hhdvtn->index == 1) ? 'checked' : '' }} value="1" name="roles[hhdvtn][index]"/></td>
                                                <td>Xem</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->hhdvtn->create) && $permission->hhdvtn->create == 1) ? 'checked' : '' }} value="1" name="roles[hhdvtn][create]"/></td>
                                                <td>Thêm mới</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->hhdvtn->edit) && $permission->hhdvtn->edit == 1) ? 'checked' : '' }} value="1" name="roles[hhdvtn][edit]"/></td>
                                                <td>Chỉnh sửa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->hhdvtn->delete) && $permission->hhdvtn->delete == 1) ? 'checked' : '' }} value="1" name="roles[hhdvtn][delete]"/></td>
                                                <td>Xóa</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if(canGeneral('hhdv','hhxnk'))
                                    <div class="col-md-3">
                                        <h4 style="text-align: center">Hàng hóa xuất nhập khẩu</h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="action">
                                            <tr>
                                                <th class="table-checkbox" width="5%">
                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                </th>
                                                <th>Chức năng</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->hhxnk->index) && $permission->hhxnk->index == 1) ? 'checked' : '' }} value="1" name="roles[hhxnk][index]"/></td>
                                                <td>Xem</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->hhxnk->create) && $permission->hhxnk->create == 1) ? 'checked' : '' }} value="1" name="roles[hhxnk][create]"/></td>
                                                <td>Thêm mới</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->hhxnk->edit) && $permission->hhxnk->edit == 1) ? 'checked' : '' }} value="1" name="roles[hhxnk][edit]"/></td>
                                                <td>Chỉnh sửa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->hhxnk->delete) && $permission->hhxnk->delete == 1) ? 'checked' : '' }} value="1" name="roles[hhxnk][delete]"/></td>
                                                <td>Xóa</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if(canGeneral('thamdinhgia','thamdinhgia'))
                                    <div class="col-md-3">
                                        <h4 style="text-align: center">Thẩm định giá</h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="action">
                                            <tr>
                                                <th class="table-checkbox" width="5%">
                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                </th>
                                                <th>Chức năng</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thamdinhgia->index) && $permission->thamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][index]"/></td>
                                                <td>Xem</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thamdinhgia->create) && $permission->thamdinhgia->create == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][create]"/></td>
                                                <td>Thêm mới</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thamdinhgia->edit) && $permission->thamdinhgia->edit == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][edit]"/></td>
                                                <td>Chỉnh sửa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thamdinhgia->delete) && $permission->thamdinhgia->delete == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][delete]"/></td>
                                                <td>Xóa</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if(canGeneral('congbogia','congbogia'))
                                    <div class="col-md-3">
                                        <h4 style="text-align: center">Công bố giá</h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="table-checkbox" width="5%">
                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                </th>
                                                <th>Chức năng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->congbogia->index) && $permission->congbogia->index == 1) ? 'checked' : '' }} value="1" name="roles[congbogia][index]"/></td>
                                                <td>Xem</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->congbogia->create) && $permission->congbogia->create == 1) ? 'checked' : '' }} value="1" name="roles[congbogia][create]"/></td>
                                                <td>Thêm mới</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->congbogia->create) && $permission->congbogia->create == 1) ? 'checked' : '' }} value="1" name="roles[congbogia][edit]"/></td>
                                                <td>Chỉnh sửa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->congbogia->delete) && $permission->congbogia->delete == 1) ? 'checked' : '' }} value="1" name="roles[congbogia][delete]"/></td>
                                                <td>Xóa</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if(canGeneral('ttqd','ttqd'))
                                    <div class="col-md-3">
                                        <h4 style="text-align: center">Công bố giá</h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="table-checkbox" width="5%">
                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                </th>
                                                <th>Chức năng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->ttqd->index) && $permission->ttqd->index == 1) ? 'checked' : '' }} value="1" name="roles[ttqd][index]"/></td>
                                                <td>Xem</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->ttqd->create) && $permission->ttqd->create == 1) ? 'checked' : '' }} value="1" name="roles[ttqd][create]"/></td>
                                                <td>Thêm mới</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->ttqd->create) && $permission->ttqd->create == 1) ? 'checked' : '' }} value="1" name="roles[ttqd][edit]"/></td>
                                                <td>Chỉnh sửa</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->ttqd->delete) && $permission->ttqd->delete == 1) ? 'checked' : '' }} value="1" name="roles[ttqd][delete]"/></td>
                                                <td>Xóa</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Submit</button>
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

            var validator = $("#create_ttphong_ban").validate({
                rules: {
                    ten :"required",
                    diachi :"required",
                    username :"required",
                    password :"required"

                },
                messages: {
                    ten :"Chưa nhập dữ liệu",
                    diachi :"Chưa nhập dữ liệu",
                    username :"Chưa nhập dữ liệu",
                    password :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="username"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkuser',
                    data: {
                        _token: CSRF_TOKEN,
                        user:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập tài khoản khác", "Tài khoản nhập vào đã tồn tại!!!");
                            $('input[name="username"]').val('');
                            $('input[name="username"]').focus();
                        }
                    }

                });
            })
        }(jQuery));
    </script>
@stop