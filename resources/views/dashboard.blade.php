@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')

    <!-- BEGIN CONTENT -->
    <h3 class="page-title">
        Màn hình<small> điều khiển và thống kê</small>
    </h3>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->

    <div class="row">
        @if(canGeneral('hhdv','hhthitruong'))
            @if(can('hhthitruong','index'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-intense">
                        <div class="visual">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Hàng hóa thị trường
                            </div>
                        </div>
                        <a class="more" href="{{url('thongtin-giathitruong')}}">
                            Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            @endif
        @endif
        @if(canGeneral('hhdv','hhdvtn'))
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="details">
                        <div class="number"></div>
                        <div class="desc">
                            Hàng hóa trong nước
                        </div>
                    </div>
                    <a class="more" href="{{url('giahhdv-trongnuoc')}}">
                        Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        @endif
        @if(canGeneral('hhdv','hhxnk'))
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fa fa-plane"></i>
                    </div>
                    <div class="details">
                        <div class="number"></div>
                        <div class="desc">
                            Hàng hóa xuất nhập khẩu
                        </div>
                    </div>
                    <a class="more" href="{{url('giahh-xuatnhapkhau')}}">
                        Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        @endif
        @if(canGeneral('tsnn','tsnnnhadat'))
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="details">
                        <div class="number"></div>
                        <div class="desc">
                            Tài sản là nhà, đất
                        </div>
                    </div>
                    <a class="more" href="{{url('taisan-nhadat/nam='.getGeneralConfigs()['namhethong'].'&pb=all')}}">
                        Xem chi tiết<i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        @endif
        @if(canGeneral('tsnn','tsnnotokhac'))
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fa fa-car"></i>
                    </div>
                    <div class="details">
                        <div class="number"></div>
                        <div class="desc">
                            Tài sản là ôtô, tài sản khác
                        </div>
                    </div>
                    <a class="more" href="{{url('taisan-otokhac/nam='.getGeneralConfigs()['namhethong'].'&pb=all')}}">
                        Xem chi tiết<i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        @endif
        @if(canGeneral('hhdv','kkgtw'))
            @if(can('kkgtw','index'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-file-word-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Kê khai giá TW
                            </div>
                        </div>
                        <a class="more" href="{{url('giahhdv-tw')}}">
                            Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            @endif
        @endif
        @if(canGeneral('hhdv','kkgdp'))
            @if(can('kkgdp','index'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-file-word-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Kê khai giá địa phương
                            </div>
                        </div>
                        <a class="more" href="{{url('giahhdv-dp')}}">
                            Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            @endif
        @endif

        @if(canGeneral('gttruocba','gttruocba'))
            @if(can('gttruocba','index'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green-haze">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Giá thuế trước bạ
                            </div>
                        </div>
                        <a class="more" href="{{url('thongtin-gia-thuetruocba/nam='.getGeneralConfigs()['namhethong'].'&pb=all')}}">
                            Xem chi tiết<i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            @endif
        @endif
        @if(canGeneral('gthuetn','gthuetn'))
            @if(can('gthuetn','index'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-adjust"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Giá thuế tài nguyên
                            </div>
                        </div>
                        <a class="more" href="{{url('giathuetn')}}">
                            Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            @endif
        @endif

        @if(canGeneral('thamdinhgia','thamdinhgia'))
            @if(can('tdgia','index'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green-haze">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Thẩm định giá
                            </div>
                        </div>
                        <a class="more" href="{{url('thongtin-thamdinhgia/nam='.getGeneralConfigs()['namhethong'].'&pb=all')}}">
                            Xem chi tiết<i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            @endif
        @endif
        @if(canGeneral('congbogia','congbogia'))
            @if(can('congbogia','index'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Công bố giá
                            </div>
                        </div>
                        <a class="more" href="{{url('thongtin-congbogia/nam='.getGeneralConfigs()['namhethong'].'&pb=all')}}">
                            Xem chi tiết<i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            @endif
        @endif
        @if(canGeneral('ttqd','ttqd'))
            @if(can('ttqd','index'))
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-intense">
                        <div class="visual">
                            <i class="fa fa-file-word-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Văn bản QLNN về giá TW
                            </div>
                        </div>
                        <a class="more" href="{{url('thongtu-quyetdinh-tw/nam='.getGeneralConfigs()['namhethong'].'&pl=all')}}">
                            Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-file-word-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Văn bản QLNN về giá</br>địa phương
                            </div>
                        </div>
                        <a class="more" href="{{url('thongtu-quyetdinh-tinh/nam='.getGeneralConfigs()['namhethong'].'&pl=all')}}">
                            Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-file-word-o"></i>
                        </div>
                        <div class="details">
                            <div class="number"></div>
                            <div class="desc">
                                Thanh kiểm tra về giá
                            </div>
                        </div>
                        <a class="more" href="{{url('thanhkiemtra-vegia/nam='.getGeneralConfigs()['namhethong'])}}">
                            Xem chi tiết <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            @endif
        @endif
    </div>
    <div class="clearfix">
    </div>
    </div>
    </div>

@stop 