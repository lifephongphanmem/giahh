@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.theme.default.css')}}" />
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{ url('js/jquery.treetable.js') }}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
            $("#giadat").treetable();
            $("#example-advanced").treetable({ expandable: true });
        });

    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin đất <small> theo vị trí</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption"></div>
                    <div class="actions">
                        @if(can('vitri','create'))
                            <a href="{{url('')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i>  Thêm mới hồ sơ chi tiết</a>

                            <a href="{{url('')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Thêm mới hồ sơ đính kèm</a>
                        @endif
                    </div>
                </div>
                <div class="portlet-body">

                    <table class="treetable" id="giadat">
                        <thead>
                            <tr>
                                <th style="text-align: center">Vị trí</th>
                                <th style="text-align: center">Căn cứ quyết định</th>
                                <th style="text-align: center">Giá đất</th>

                            </tr>
                        </thead>
                        <tbody>
                        <!-- Viết hàm đệ quy để tính toán -->
                        <?php $model_cap1 = $model->where('capdo','1'); ?>
                        @foreach($model_cap1 as $cap1)
                            <tr data-tt-id="{{$cap1->maso}}">
                                <td>{{$cap1->vitri}}</td>
                                <td>{{getDayVn($cap1->ngaynhap)}}</td>
                                <td>{{number_format($cap1->giadat)}}</td>

                            </tr>
                            <?php $model_cap2 = $model->where('magoc',$cap1->maso); ?>
                            @foreach($model_cap2 as $cap2)
                                <tr data-tt-id="{{$cap2->maso}}" data-tt-parent-id="{{$cap2->magoc}}">
                                    <td>{{$cap2->vitri}}</td>
                                    <td>{{getDayVn($cap2->ngaynhap)}}</td>
                                    <td>{{number_format($cap2->giadat)}}</td>
                                </tr>
                                <?php $model_cap3 = $model->where('magoc',$cap2->maso); ?>
                                @foreach($model_cap3 as $cap3)
                                    <tr data-tt-id="{{$cap3->maso}}" data-tt-parent-id="{{$cap3->magoc}}">
                                        <td>{{$cap3->vitri}}</td>
                                        <td>{{getDayVn($cap3->ngaynhap)}}</td>
                                        <td>{{number_format($cap3->giadat)}}</td>
                                    </tr>
                                    <?php $model_cap4 = $model->where('magoc',$cap3->maso); ?>
                                    @foreach($model_cap4 as $cap4)
                                        <tr data-tt-id="{{$cap4->maso}}" data-tt-parent-id="{{$cap4->magoc}}">
                                            <td>{{$cap4->vitri}}</td>
                                            <td>{{getDayVn($cap4->ngaynhap)}}</td>
                                            <td>{{number_format($cap4->giadat)}}</td>
                                        </tr>
                                        <?php $model_cap5 = $model->where('magoc',$cap4->maso); ?>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--div class="col-md-offset-5 col-md-2">
                    <a class="btn blue" href="{{url('/giathuetn')}}"><i class="fa fa-mail-reply"></i> Quay lại</a>
                </div-->
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <script>

    </script>
    @include('includes.e.modal-delete')
    @include('includes.e.modal-approve')
    @include('includes.e.modal-attackfile')

@stop