@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Tìm kiếm thông tin <small> giá hàng hóa dịch vụ trong nước</small>
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
                    {!! Form::open(['url'=>'timkiem-giahhdv-trongnuoc', 'id' => 'create_tkcongbogia', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời điểm nhập<span class="require">*</span></label>
                                        <input type="date" id="thoidiemnhap" name="thoidiemnhap" class="form-control" autofocus value="2016-01-01">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thị trường<span class="require">*</span></label>
                                        <input type="date" id="thitruong" name="thitruong" class="form-control" value="2016-12-31">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại giá</label>
                                        {!!Form::text('tents',null,array('id'=>'tents','class'=>'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại hàng hóa</label>
                                        {!!Form::text('sohs', null, array('id' => 'sohs','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá trị từ<span class="require">*</span></label>
                                        {!!Form::text('giatritu', null, array('id' => 'giatritu','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá trị đến<span class="require">*</span></label>
                                        {!!Form::text('giatriden', null, array('id' => 'giatriden','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên hàng hóa dịch vụ<span class="require">*</span></label>
                                        {!!Form::text('giatritu', null, array('id' => 'giatritu','class' => 'form-control'))!!}
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-search"></i> Tìm kiếm</button>
                            <button type="reset" class="btn default">Hủy</button>
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