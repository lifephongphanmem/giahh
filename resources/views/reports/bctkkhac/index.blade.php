@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Báo cáo thống kê<small> khác</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol>
                                <li><a data-target="#BC1-thoai-confirm" data-toggle="modal" data-href="{{url('reports/bctkkhac/BC1')}}">Báo cáo chi tiết kết quả thẩm định giá</a></li>
                                <li><a data-target="#BC2-thoai-confirm" data-toggle="modal" data-href="{{url('reports/bctkkhac/BC2')}}">Báo cáo tổng hợp kết quả thẩm định giá</a></li>
                                <li><a data-target="#BC3-thoai-confirm" data-toggle="modal" data-href="{{url('reports/bctkkhac/BC3')}}">Báo cáo chi tiết công bố giá và công bố giá bổ xung</a></li>
                                <li><a data-target="#BC4-thoai-confirm" data-toggle="modal" data-href="{{url('reports/bctkkhac/BC4')}}">Báo cáo tổng hợp công bố giá và công bố giá bổ xung</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop