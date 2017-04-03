@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Tìm kiếm thông tin <small> công bố giá bổ sung</small>
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
                    {!! Form::open(['url'=>'timkiem-congbobosung', 'id' => 'create_tkcongbogia', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày nhập từ<span class="require">*</span></label>
                                        <input type="date" id="ngaynhaptu" name="ngaynhaptu" class="form-control" autofocus value="2017-01-01">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày nhập đến <span class="require">*</span></label>
                                        <input type="date" id="ngaynhapden" name="ngaynhapden" class="form-control" value="2017-12-31">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phân loại hồ sơ<span class="require">*</span></label>
                                        {!! Form::select(
                                        'plhs',
                                        array(
                                        'Công bố giá bổ sung' => 'Công bố giá bổ sung',
                                        ),null,
                                        array('id' => 'plhs', 'class' => 'form-control'))
                                        !!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguồn vốn <span class="require">*</span></label>
                                        {!! Form::select(
                                        'nguonvon',
                                        array(
                                        'Cả hai' => 'Vốn thường xuyên và vốn đầu tư',
                                        'Thường xuyên' => 'Thường xuyên',
                                        'Đầu tư' => 'Đầu tư',
                                        ),null,
                                        array('id' => 'nguonvon', 'class' => 'form-control'))
                                        !!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài sản</label>
                                        {!!Form::text('tents',null,array('id'=>'tents','class'=>'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ đề nghị</label>
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
                                        <label class="control-label">Đơn vị<span class="require">*</span></label>
                                        <select class="form-control" name="donvi" id="donvi">
                                            <option value="all">--Tất cả các đơn vị</option>
                                            @foreach($modeldv as $dv)
                                                <option value="{{$dv->ma}}" {{($dv->ma == session('admin')->mahuyen)? "selected" : ""}}>{{$dv->ten}}</option>
                                            @endforeach
                                        </select>
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