@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>

@stop

@section('content')


    <h3 class="page-title">
        Tìm kiếm thông tin giá tính thuế<small> tài nguyên</small>
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
                    {!! Form::open(['url'=>'timkiem-giathuetn', 'id' => 'create_tkcongbogia', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài nguyên<span class="require">*</span></label>
                                        <select class="form-control select2me" name="mahh" id="mahh">
                                            <option value="">--Chọn tài nguyên--</option>
                                            @foreach($modelhh as $tt)
                                                <option value="{{$tt->mahh}}">{{$tt->tenhh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Phân loại</label>
                                        <select class="form-control" name="phanloai" id="phanloai">
                                            <option value="TW">Tài nguyên TW quy định</option>
                                            <option value="DP">Tài nguyên địa phương quy định</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập từ<span class="require">*</span></label>
                                        <input type="date" id="tgnhaptu" name="tgnhaptu" class="form-control" autofocus value="2016-01-01">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập đến<span class="require">*</span></label>
                                        <input type="date" id="tgnhapden" name="tgnhapden" class="form-control" value="2016-12-31">
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