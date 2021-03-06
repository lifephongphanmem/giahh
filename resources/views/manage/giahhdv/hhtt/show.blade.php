@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });

    </script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin giá hàng hóa dịch vụ trong nước<small></small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời gian nhập<span class="require">*</span></label>
                                        <input type="date" id="tgnhap" name="tgnhap" class="form-control required" value="{{$model->tgnhap}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Thị trường<span class="require">*</span></label>
                                        <input type="text" id="thitruong" name="thitruong" class="form-control required" value="{{$model->thitruong}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->


                            <!--/row-->
                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                            <div class="row" id="dsts">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                                        <thead>
                                        <tr style="background: #F5F5F5">
                                            <th width="2%" style="text-align: center">STT</th>
                                            <th style="text-align: center">Mã hàng hóa</th>
                                            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                                            <th style="text-align: center">Giá từ</th>
                                            <th style="text-align: center" >Giá đến</th>
                                            <th style="text-align: center" >Số lượng</th>
                                            <th style="text-align: center">Nguồn tin</th>
                                            <th style="text-align: center">Ghi chú</th>
                                        </tr>
                                        </thead>
                                        <tbody id="ttts">
                                        @if(isset($modeltthh))
                                            @foreach($modeltthh as $key=>$tt)
                                                <tr>
                                                    <td style="text-align: center">{{$key +1}}</td>
                                                    <td>{{$tt->mahh}}</td>
                                                    <td class="active">{{$tt->tenhh}}</td>
                                                    <td style="text-align: right">{{number_format($tt->giatu)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->giaden)}}</td>
                                                    <td style="text-align: center">{{number_format($tt->soluong)}}</td>
                                                    <td>{{$tt->nguontin}}</td>
                                                    <td>{{$tt->gc}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <td colspan="9" style="text-align: center">Chưa có thông tin</td>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <a href="{{url('giahhdv-thitruong/index?thoidiem='.$model->mathoidiem.'&nam='.$model->nam)}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
                </div>
            </div>
            </form>
        </div>
    </div>
@stop