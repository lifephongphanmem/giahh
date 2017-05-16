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
                        <div class="row">
                            @if(canGeneral('hhdv','hhthitruong'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Hàng hóa thị trường</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->hhthitruong->index) && $permission->hhthitruong->index == 1) ? 'checked' : '' }} value="1" name="roles[hhthitruong][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->hhthitruong->create) && $permission->hhthitruong->create == 1) ? 'checked' : '' }} value="1" name="roles[hhthitruong][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->hhthitruong->edit) && $permission->hhthitruong->edit == 1) ? 'checked' : '' }} value="1" name="roles[hhthitruong][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->hhthitruong->delete) && $permission->hhthitruong->delete == 1) ? 'checked' : '' }} value="1" name="roles[hhthitruong][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->hhthitruong->approve) && $permission->hhthitruong->approve == 1) ? 'checked' : '' }} value="1" name="roles[hhthitruong][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            @if(canGeneral('hhdv','hhdvtn'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Hàng hóa dịch vụ trong nước</h4>
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
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hhdvtn->approve) && $permission->hhdvtn->approve == 1) ? 'checked' : '' }} value="1" name="roles[hhdvtn][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('hhdv','hhxnk'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Hàng hóa xuất nhập khẩu</h4>
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
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hhxnk->approve) && $permission->hhxnk->approve == 1) ? 'checked' : '' }} value="1" name="roles[hhxnk][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('hhdv','kkgtw')||canGeneral('hhdv','kkgtwlc'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Kê khai giá trung ương</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->kkgtw->index) && $permission->kkgtw->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgtw][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgtw->create) && $permission->kkgtw->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgtw][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgtw->edit) && $permission->kkgtw->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgtw][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgtw->delete) && $permission->kkgtw->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgtw][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgtw->approve) && $permission->kkgtw->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgtw][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            @if(canGeneral('hhdv','kkgdp')||canGeneral('hhdv','kkgdplc'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Kê khai giá địa phương</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->kkgdp->index) && $permission->kkgdp->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgdp][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgdp->create) && $permission->kkgdp->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgdp][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgdp->edit) && $permission->kkgdp->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgdp][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgdp->delete) && $permission->kkgdp->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgdp][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgdp->approve) && $permission->kkgdp->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgdp][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                                <!--Chưa làm-->
                            @if(canGeneral('tsnn','tsnnnhadat'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Tài sản nhà nước (nhà và đất)</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->tsnnnhadat->index) && $permission->tsnnnhadat->index == 1) ? 'checked' : '' }} value="1" name="roles[tsnnnhadat][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tsnnnhadat->create) && $permission->tsnnnhadat->create == 1) ? 'checked' : '' }} value="1" name="roles[tsnnnhadat][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tsnnnhadat->edit) && $permission->tsnnnhadat->edit == 1) ? 'checked' : '' }} value="1" name="roles[tsnnnhadat][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tsnnnhadat->delete) && $permission->tsnnnhadat->delete == 1) ? 'checked' : '' }} value="1" name="roles[tsnnnhadat][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tsnnnhadat->approve) && $permission->tsnnnhadat->approve == 1) ? 'checked' : '' }} value="1" name="roles[tsnnnhadat][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            @if(canGeneral('tsnn','tsnnotokhac'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Tài sản nhà nước ( ôtô - tài sản khác)</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->tsnnotokhac->index) && $permission->tsnnotokhac->index == 1) ? 'checked' : '' }} value="1" name="roles[tsnnotokhac][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tsnnotokhac->create) && $permission->tsnnotokhac->create == 1) ? 'checked' : '' }} value="1" name="roles[tsnnotokhac][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tsnnotokhac->edit) && $permission->tsnnotokhac->edit == 1) ? 'checked' : '' }} value="1" name="roles[tsnnotokhac][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tsnnotokhac->delete) && $permission->tsnnotokhac->delete == 1) ? 'checked' : '' }} value="1" name="roles[tsnnotokhac][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tsnnotokhac->approve) && $permission->tsnnotokhac->approve == 1) ? 'checked' : '' }} value="1" name="roles[tsnnotokhac][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            @if(canGeneral('gttruocba','gttruocba'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Giá thuế trước bạ</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->gttruocba->index) && $permission->gttruocba->index == 1) ? 'checked' : '' }} value="1" name="roles[gttruocba][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->gttruocba->create) && $permission->gttruocba->create == 1) ? 'checked' : '' }} value="1" name="roles[gttruocba][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->gttruocba->edit) && $permission->gttruocba->edit == 1) ? 'checked' : '' }} value="1" name="roles[gttruocba][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->gttruocba->delete) && $permission->gttruocba->delete == 1) ? 'checked' : '' }} value="1" name="roles[gttruocba][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->gttruocba->approve) && $permission->gttruocba->approve == 1) ? 'checked' : '' }} value="1" name="roles[gttruocba][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                                <!--Chưa làm-->
                            @if(canGeneral('gthuetn','gthuetn'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Thuế tài nguyên</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->gthuetn->index) && $permission->gthuetn->index == 1) ? 'checked' : '' }} value="1" name="roles[gthuetn][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->gthuetn->create) && $permission->gthuetn->create == 1) ? 'checked' : '' }} value="1" name="roles[gthuetn][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->gthuetn->create) && $permission->gthuetn->create == 1) ? 'checked' : '' }} value="1" name="roles[gthuetn][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->gthuetn->delete) && $permission->gthuetn->delete == 1) ? 'checked' : '' }} value="1" name="roles[gthuetn][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->gthuetn->approve) && $permission->gthuetn->approve == 1) ? 'checked' : '' }} value="1" name="roles[gthuetn][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            @if(canGeneral('thamdinhgia','thamdinhgia'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Thẩm định giá</h4>
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
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->tdgia->approve) && $permission->tdgia->approve == 1) ? 'checked' : '' }} value="1" name="roles[tdgia][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('congbogia','congbogia'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Công bố giá</h4>
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
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->congbogia->approve) && $permission->congbogia->approve == 1) ? 'checked' : '' }} value="1" name="roles[congbogia][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('ttqd','ttqd'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Thông tư quyết định</h4>
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

                            <!--Giá đất đang xây dựng-->
                            @if(canGeneral('giadat','loaidat'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Giá đất-Phân loại đất</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->loaidat->index) && $permission->loaidat->index == 1) ? 'checked' : '' }} value="1" name="roles[loaidat][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->loaidat->create) && $permission->loaidat->create == 1) ? 'checked' : '' }} value="1" name="roles[loaidat][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->loaidat->create) && $permission->loaidat->create == 1) ? 'checked' : '' }} value="1" name="roles[loaidat][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->loaidat->delete) && $permission->loaidat->delete == 1) ? 'checked' : '' }} value="1" name="roles[loaidat][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->loaidat->approve) && $permission->loaidat->approve == 1) ? 'checked' : '' }} value="1" name="roles[loaidat][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            @if(canGeneral('giadat','vitri'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Giá đất-Vị trí</h4>
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
                                            <td><input type="checkbox" {{ (isset($permission->vitri->index) && $permission->vitri->index == 1) ? 'checked' : '' }} value="1" name="roles[vitri][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->vitri->create) && $permission->vitri->create == 1) ? 'checked' : '' }} value="1" name="roles[vitri][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->vitri->create) && $permission->vitri->create == 1) ? 'checked' : '' }} value="1" name="roles[vitri][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->vitri->delete) && $permission->vitri->delete == 1) ? 'checked' : '' }} value="1" name="roles[vitri][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->vitri->approve) && $permission->vitri->approve == 1) ? 'checked' : '' }} value="1" name="roles[vitri][approve]"/></td>
                                            <td>Xét duyệt</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Cập nhật</button>
                        <a href="{{url('users/pl='.($model->level=='H'?'quan-ly':'su-dung'))}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
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


</div>
@stop