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
        Thông tin hồ sơ<small>&nbsp;thẩm định giá</small>
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
                            <div class="form-group">
                                <label class="control-label">Số hồ sơ thẩm định</label>
                                <input type="text" class="form-control" value="{{$model->hosotdgia}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Thời điểm thẩm định</label>
                                <input type="date" class="form-control" value="{{$model->thoidiem}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Địa điểm thẩm định</label>
                                <input type="text" id="diadiem" name="diadiem" class="form-control" readonly value="{{$model->diadiem}}">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Phương pháp thẩm định thẩm định</label>
                                <input type="text" id="ppthamdinh" name="ppthamdinh" class="form-control" value="{{$model->ppthamdinh}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Mục đích thẩm định</label>
                                <input type="text" id="mucdich" name="mucdich" class="form-control" value="{{$model->mucdich}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Đơn vị yêu cầu thẩm định</label>
                                <input type="text" id="dvyeucau" name="dvyeucau" class="form-control" value="{{session('admin')->mahuyen == $model->mahuyen?$model->dvyeucau:'Nội dung thông tin bị ẩn'}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nguồn vốn</label>
                                {!! Form::select(
                                'nguonvon',
                                array(
                                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                                'Đầu tư' => 'Nguồn vốn đầu tư',
                                ),null,
                                array('id' => 'nguonvon', 'class' => 'form-control','readonly'))
                                !!}
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Số thông báo kết luận</label>
                                <input type="text" id="sotbkl" name="sotbkl" class="form-control" value="{{$model->sotbkl}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thời hạn sử dụng kết quả thẩm định</label>
                                <input type="date" id="thoihan" name="thoihan" class="form-control" value="{{$model->thoihan}}" readonly>
                            </div>
                        </div>

                    </div>

                    <!--/row-->
                    <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Tên tài sản</th>
                            <th style="text-align: center">Đơn vị tính</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Đơn giá đề nghị</th>
                            <th style="text-align: center">Giá trị đề nghị</th>
                            <th style="text-align: center">Đơn giá thẩm định</th>
                            <th style="text-align: center">Giá trị thẩm định</th>
                            <th style="text-align: center">Ghi chú</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modelts as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key +1}}</td>
                                <td class="active">{{$tt->tents}}</td>
                                <td style="text-align: center">{{$tt->dvt}}</td>
                                <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                <td style="text-align: right">{{number_format($tt->nguyengiadenghi)}}</td>
                                <td style="text-align: right">{{number_format($tt->giadenghi)}}</td>
                                <td style="text-align: right">{{number_format($tt->nguyengiathamdinh)}}</td>
                                <td style="text-align: right">{{number_format($tt->giatritstd)}}</td>
                                <td>{{$tt->ghichu}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('hoso-thamdinhgia/nam='.$model->nam)}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
            </div>
        </div>

    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <!--Modal Delete-->


@stop