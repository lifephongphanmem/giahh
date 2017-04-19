@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>

@stop

@section('content')


    <h3 class="page-title">
        Tìm kiếm thông tin giá đất<small> theo phân loại đất</small>
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
                    {!! Form::open(['url'=>'timkiem_giadat_phanloai', 'id' => 'create_tkcongbogia', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập từ<span class="require">*</span></label>
                                        <input type="date" id="tgnhaptu" name="tgnhaptu" class="form-control" autofocus value="2017-01-01">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập đến<span class="require">*</span></label>
                                        <input type="date" id="tgnhapden" name="tgnhapden" class="form-control" value="2017-12-31">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian áp dụng từ<span class="require">*</span></label>
                                        <input type="date" id="tgnhaptu" name="tgapdungtu" class="form-control" autofocus value="2017-01-01">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian áp dụng đến<span class="require">*</span></label>
                                        <input type="date" id="tgnhapden" name="tgapdungden" class="form-control" value="2017-12-31">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại đất</label>
                                        <input type="text" id="loaidat" name="loaidat" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Khu vực áp dụng</label>
                                        <input type="text" id="khuvuc" name="khuvuc" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Vị trí/Tính chất đất</label>
                                        <input type="text" id="loaidat" name="loaidat" class="form-control">
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-search"></i> Tìm kiếm</button>
                            <button type="reset" class="btn default"> Hủy</button>
                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    @include('includes.script.create-header-scripts')
@stop