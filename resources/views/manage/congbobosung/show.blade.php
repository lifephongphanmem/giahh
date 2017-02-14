@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>


@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ<small>&nbsp;công bố giá bổ sung</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">

                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Phân loại hồ sơ<span class="require">*</span></label>
                                <select class="form-control" id="plhs" name="plhs" readonly>
                                    <!--option value="Công bố giá" {{($model->plhs == 'Công bố giá' ? 'selected' : '')}}>Công bố giá</option-->
                                    <option value="Công bố giá bổ sung" {{($model->plhs == 'Công bố giá bổ sung' ? 'selected' : '')}}>Công bố giá bổ sung</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số hồ sơ công bố giá bổ sung<span class="require">*</span></label>
                                <input type="text" id="sohs" name="sohs" class="form-control" value="{{$model->sohs}}" readonly>
                            </div>
                        </div>
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thời điểm công bố<span class="require">*</span></label>
                                <input type="date" id="ngaynhap" name="ngaynhap" class="form-control" value="{{$model->ngaynhap}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Nguồn vốn</label>
                                <select class="form-control" id="nguonvon" name="nguonvon" readonly>
                                    <option value="Cả hai" {{($model->nguonvon == 'Cả hai' ? 'selected' : '')}}>Cả hai</option>
                                    <option value="Thường xuyên" {{($model->nguonvon == 'Thường xuyên' ? 'selected' : '')}}>Thường xuyên</option>
                                    <option value="Đầu tư" {{($model->nguonvon == 'Đầu tư' ? 'selected' : '')}}>Đầu tư</option>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Địa điểm công bố giá<span class="require">*</span></label>
                                <input type="text" id="diadiemcongbo" name="diadiemcongbo" class="form-control" value="{{$model->diadiemcongbo}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Đơn vị đề nghị công bố giá<span class="require">*</span></label>
                                <input type="text" id="donvidn" name="donvidn" class="form-control" value="{{$model->donvidn}}" readonly>
                            </div>
                        </div>
                    </div>
                    <!--div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số văn bản đề nghị<span class="require">*</span></label>
                                <input type="text" id="sovbdn" name="sovbdn" class="form-control" value="{{$model->sovbdn}}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Số thông báo kết luận công bố giá bổ sung<span class="require">*</span></label>
                                <input type="text" id="sotbkl" name="sotbkl" class="form-control" value="{{$model->sotbkl}}" readonly>
                            </div>
                        </div>
                    </div-->

                    <!--/row-->
                    <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Tên vật tư VLXD</th>
                            <th style="text-align: center">Thông số kỹ thuật</th>
                            <th style="text-align: center">Nguồn gốc xuất xứ</th>
                            <th style="text-align: center">Đơn vị tính</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Đơn giá đề nghị</th>
                            <th style="text-align: center">Giá trị đề nghị</th>
                            <th style="text-align: center">Đơn giá công bố</th>
                            <th style="text-align: center">Giá trị công bố</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modelts as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key +1}}</td>
                                <td class="active">{{$tt->tents}}</td>
                                <td>{{$tt->thongsokt}}</td>
                                <td>{{$tt->nguongoc}}</td>
                                <td style="text-align: center">{{$tt->dvt}}</td>
                                <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                <td style="text-align: right">{{number_format($tt->nguyengiadenghi)}}</td>
                                <td style="text-align: right">{{number_format($tt->giadenghi)}}</td>
                                <td style="text-align: right">{{number_format($tt->nguyengiathamdinh)}}</td>
                                <td style="text-align: right">{{number_format($tt->giatritstd)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('hoso-congbobosung/nam='.$model->nam)}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
            </div>
        </div>

    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <!--Modal Delete-->


@stop