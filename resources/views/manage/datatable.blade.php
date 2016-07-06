@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/-->
    <!-- BEGIN THEME STYLES -->
    <!--link href="{{url('assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{url('assets/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/-->
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!--script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script-->
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
        Datable<small>&nbsp;dữ liệu</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        <a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> Add </a>
                        <a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>--Nhập tên đơn vị--</option>
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                        <option>Option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                        <option>Option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                        <option>Option 5</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                shuxer
                            </td>
                            <td>
                                <a href="mailto:shuxer@gmail.com">
                                    shuxer@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                looper
                            </td>
                            <td>
                                <a href="mailto:looper90@gmail.com">
                                    looper90@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-warning">
                                Suspended </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                userwow
                            </td>
                            <td>
                                <a href="mailto:userwow@yahoo.com">
                                    userwow@yahoo.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                user1wow
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    userwow@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-default">
                                Blocked </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                restest
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    test@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                foopl
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    good@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                weep
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    good@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                coop
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    good@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                pppol
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    good@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                test
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    good@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                userwow
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    userwow@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-default">
                                Blocked </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1"/>
                            </td>
                            <td>
                                test
                            </td>
                            <td>
                                <a href="mailto:userwow@gmail.com">
                                    test@gmail.com </a>
                            </td>
                            <td>
                                <span class="label label-sm label-success">
                                Approved </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>

@stop