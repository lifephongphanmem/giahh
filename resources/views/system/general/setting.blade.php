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
        Cấu hình <small>&nbsp;chức năng của chương trình</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            {!! Form::open(['url' => 'setting'])!!}
            <div class="portlet box blue">

                <div class="portlet-body">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h4 style="text-align: center">Hàng hóa dịch vụ</h4>
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
                                            <td><input type="checkbox" {{ (isset($setting->hhdv->hhdvtn) && $setting->hhdv->hhdvtn == 1) ? 'checked' : '' }} value="1" name="roles[hhdv][hhdvtn]"/></td>
                                            <td>Hàng hóa dịch vụ trong nước</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($setting->hhdv->hhxnk) && $setting->hhdv->hhxnk == 1) ? 'checked' : '' }} value="1" name="roles[hhdv][hhxnk]"/></td>
                                            <td>Hàng hóa xuất nhập khẩu</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3">
                                <h4 style="text-align: center">Thẩm định giá</h4>
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
                                            <td><input type="checkbox" {{ (isset($setting->thamdinhgia->thamdinhgia) && $setting->thamdinhgia->thamdinhgia == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][thamdinhgia]"/></td>
                                            <td>Thẩm định giá</td>
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
                                        <td><input type="checkbox" {{ (isset($setting->congbogia->congbogia) && $setting->congbogia->congbogia == 1) ? 'checked' : '' }} value="1" name="roles[congbogia][congbogia]"/></td>
                                        <td>Công bố giá</td>
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
                                            <td><input type="checkbox" {{ (isset($setting->ttqd->ttqd) && $setting->ttqd->ttqd == 1) ? 'checked' : '' }} value="1" name="roles[ttqd][ttqd]"/></td>
                                            <td>Thông tư- Quyết định</td>
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
                {!! Form::close() !!}
            </div>
        </div>

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>



@stop