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
        Thông tin giá <small>&nbsp;thuế trước bạ</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">


                <div class="portlet-body">
                    <h4 class="form-section" style="color: #0000ff">Thông tin bảng giá</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số quyết định</label>
                                <input type="text" class="form-control" value="{{$model->soqd}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-error">
                                <label class="control-label">Ngày nhập</label>
                                <input type="date" class="form-control" value="{{$model->ngaynhap}}" readonly>
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Loại xe</label>
                                <select class="form-control" id="maloai" name="maloai" readonly>
                                    @foreach($loais as $loai)
                                        <option value="{{$loai->maloai}}" {{$loai->maloai == $model->maloai ? 'selected': ''}}>{{$loai->tenloai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>


                    <!--/row-->
                    <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết</h4>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Tên hiệu</th>
                            <th style="text-align: center">Thông số kỹ thuật</th>
                            <th style="text-align: center">Dung tích</th>
                            <th style="text-align: center">Nước sản xuất</th>
                            <th style="text-align: center">Giá tối thiểu <br>tính lệ phí trước bạ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modelct as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key +1}}</td>
                                <td class="active">{{$tt->tenhieu}}</td>
                                <td style="text-align: center">{{$tt->thongsokt}}</td>
                                <td style="text-align: center">{{$tt->dungtich}}</td>
                                <td style="text-align: center">{{$tt->nuocsx}}</td>
                                <td style="text-align: right">{{number_format($tt->giamoi != '' ? $tt->giamoi : 0)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

            <!-- END EXAMPLE TABLE PORTLET-->
            <div style="text-align: center">
                <a href="{{url('gia-thuetruocba/nam='.$model->nam)}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
                <a href="{{url('banggiatinh-thuetruocba/'.$model->mahs)}}" class="btn red" target="_blank">
                    <i class="fa fa-print"></i> In </a>
            </div>
        </div>

    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
    <!--Modal Delete-->


@stop