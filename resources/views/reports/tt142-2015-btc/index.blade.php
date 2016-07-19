@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Thông tư<small> 142/2015/BTC</small>
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
                                <li><a data-target="#pl2-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL2')}}">Phụ lục 2- Thông tin về giá hàng hóa, dịch vụ</a> </li>
                                <li><a data-target="#pl3-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL3')}}">Phụ lục 3- Thông tin về trị giá hàng hóa xuất khẩu</a> </li>
                                <li><a data-target="#pl4-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL4')}}">Phụ lục 4- Thông tin về trị giá hàng hóa nhập khẩu</a> </li>
                                <li><a data-target="#pl5-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL5')}}">Phụ lục 5- Thông tin về tài sản thẩm định giá</a> </li>
                                <li><a target="_blank" href="{{url('reports/tt142-2015-BTC/PL6')}}">Phụ lục 6- Thông tin về giá tài sản thuộc sở hữu nhà nước (Tài sản là nhà, đất)</a> </li>
                                <li><a target="_blank" href="{{url('reports/tt142-2015-BTC/PL7')}}">Phụ lục 7- Thông tin về giá tài sản thuộc sở hữu nhà nước (Tài sản là ôtô, tài sản khác)</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('reports.tt142-2015-btc.thoai.modal-thoai')
@stop