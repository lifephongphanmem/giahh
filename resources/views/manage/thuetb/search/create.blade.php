@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Tìm kiếm thông tin <small> giá thuế trước bạ</small>
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
                    {!! Form::open(['url'=>'timkiem-thongtin-gia-thuetruocba', 'id' => 'create_tkgiathuetb', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày nhập từ ngày<span class="require">*</span></label>
                                        <input type="date" id="ngaynhaptu" name="ngaynhaptu" class="form-control" autofocus value="2017-01-01">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày nhập đến ngày<span class="require">*</span></label>
                                        <input type="date" id="ngaynhapden" name="ngaynhapden" class="form-control" value="2017-12-31">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại xe</label>
                                        <select id="maloai" name="maloai" class="form-control">
                                            @foreach($loais as $loai)
                                                <option value="{{$loai->maloai}}">{{$loai->tenloai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên hiệu</label>
                                        {!!Form::text('tenhieu',null,array('id'=>'tenhieu','class'=>'form-control'))!!}
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

                    <!-- END FORM-->
                </div>

            </div>
            <div class="col-md-12" style="text-align: center">
                <button type="submit" class="btn green"><i class="fa fa-search"></i> Tìm kiếm</button>
                <button type="reset" class="btn default"> Hủy</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    @include('includes.script.create-header-scripts')
@stop