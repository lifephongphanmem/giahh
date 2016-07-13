@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>

@stop

@section('content')

    <h3 class="page-title">
        Quản lý <small>&nbsp;tài khoản</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['url' => '/users/phan-quyen'])!!}
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption" style="color: #000000">
                        Tên tài khoản: {{$model->name .' ( Tài khoản truy cập: '. $model->username. ')' }}
                    </div>
                    <div class="actions">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                        </div>
                        <div class="row">
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
                                            <td><input type="checkbox" {{ (isset($permission->tdgia->index) && $permission->tdgia->index == 1) ? 'checked' : '' }} value="1" name="roles[tdgia][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tdgia->create) && $permission->tdgia->create == 1) ? 'checked' : '' }} value="1" name="roles[tdgia][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tdgia->edit) && $permission->tdgia->edit == 1) ? 'checked' : '' }} value="1" name="roles[tdgia][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tdgia->delete) && $permission->tdgia->delete == 1) ? 'checked' : '' }} value="1" name="roles[tdgia][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
                            <div class="col-md-3">
                                <h4 style="text-align: center">Thông tư- Quyết định</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->vbpl->index) && $permission->vbpl->index == 1) ? 'checked' : '' }} value="1" name="roles[vbpl][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->vbpl->create) && $permission->vbpl->create == 1) ? 'checked' : '' }} value="1" name="roles[vbpl][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->vbpl->create) && $permission->vbpl->create == 1) ? 'checked' : '' }} value="1" name="roles[vbpl][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->vbpl->delete) && $permission->vbpl->delete == 1) ? 'checked' : '' }} value="1" name="roles[vbpl][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-actions" style="text-align: center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Cập nhật</button>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                {!! Form::hidden('id', $model->id)!!}
                {!! Form::close() !!}
            </div>
        </div>

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>



@stop