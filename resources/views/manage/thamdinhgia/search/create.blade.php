@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Tìm kiếm thông tin <small> thẩm định giá</small>
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
                    {!! Form::open(['url'=>'timkiem-thamdinhgia', 'id' => 'create_tkthamdinhgia', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thẩm định từ ngày</label>
                                        <input type="date" id="thoidiemtu" name="thoidiemtu" class="form-control" autofocus />
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thẩm định đến ngày</label>
                                        <input type="date" id="thoidiemden" name="thoidiemden" class="form-control" />
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn thẩm định từ ngày</label>
                                        <input type="date" id="thoihantu" name="thoihantu" class="form-control" />
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn thẩm định đến ngày</label>
                                        <input type="date" id="thoihanden" name="thoihanden" class="form-control" />
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
                                        <label class="control-label">Nguồn vốn</label>
                                        {!! Form::select(
                                        'nguonvon',
                                        array(
                                        '' => '-- Chọn nguồn vốn --',
                                        'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                                        'Thường xuyên' => 'Nguồn vốn thường xuyên',
                                        'Đầu tư' => 'Nguồn vốn đầu tư',
                                        ),null,
                                        array('id' => 'nguonvon', 'class' => 'form-control'))
                                        !!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">&nbsp;</label>
                                        {!! Form::select('toantu_dongiadenghi',getToanTuTimKiem(),2,array('id' => 'toantu_dongiadenghi', 'class' => 'form-control'))!!}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Đơn giá đề nghị</label>
                                        {!!Form::text('dongiadenghi', 0, array('id' => 'dongiadenghi','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">&nbsp;</label>
                                        {!! Form::select('toantu_giadenghi',getToanTuTimKiem(),2,array('id' => 'toantu_giadenghi', 'class' => 'form-control'))!!}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Giá trị đề nghị</label>
                                        {!!Form::text('giadenghi', 0, array('id' => 'giadenghi','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">&nbsp;</label>
                                        {!! Form::select('toantu_dongiathamdinh',getToanTuTimKiem(),2,array('id' => 'toantu_dongiathamdinh', 'class' => 'form-control'))!!}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Đơn giá thẩm định</label>
                                        {!!Form::text('dongiathamdinh', 0, array('id' => 'dongiathamdinh','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">&nbsp;</label>
                                        {!! Form::select('toantu_giathamdinh',getToanTuTimKiem(),2,array('id' => 'toantu_giathamdinh', 'class' => 'form-control'))!!}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Giá trị thẩm định</label>
                                        {!!Form::text('giathamdinh', 0, array('id' => 'giathamdinh','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số thông báo kết luận</label>
                                        {!!Form::text('sotbkl',null,array('id'=>'sotbkl','class'=>'form-control'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị</label>
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
                            <button type="submit" class="btn green"><i class="fa fa-search"></i> Tìm kiếm</button>
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