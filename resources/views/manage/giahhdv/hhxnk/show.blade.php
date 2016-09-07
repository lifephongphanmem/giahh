@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>

@stop

@section('content')
    <h3 class="page-title">
        Thông tin giá hàng hóa xuất nhập khẩu<small> chi tiết</small>
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
                                        <input type="date" id="tgnhap" name="tgnhap" class="form-control required" value="{{$model->tgnhap}}" readonly >
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại giá<span class="require">*</span></label>
                                        <select class="form-control" id="maloaigia" name="maloaigia" readonly>
                                            @foreach($loaigia as $hh)
                                                <option value="{{$hh->maloaigia}}" {{($hh->maloaigia == $model->maloaigia) ? 'selected' : ''}}>{{$hh->tenloaigia}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->
                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr style="background: #F5F5F5">
                                                <th width="2%" style="text-align: center">STT</th>
                                                <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                                                <th style="text-align: center" width="10%">Giá từ</th>
                                                <th style="text-align: center" width="10%">Giá đến</th>
                                                <th style="text-align: center" width="5%">Số lượng</th>
                                                <th style="text-align: center">Nguồn tin</th>
                                                <th style="text-align: center">Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ttts">
                                        @if($modeltthh)
                                            @foreach($modeltthh as $key=>$tt)
                                            <tr>
                                                <td style="text-align: center">{{$key+1}}</td>
                                                <td class="active">{{$tt->tenhh}}</td>
                                                <td style="text-align: right">{{number_format($tt->giatu)}}</td>
                                                <td style="text-align: right">{{number_format($tt->giaden)}}</td>
                                                <td style="text-align: right">{{number_format($tt->soluong)}}</td>
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
                        </div>

                        <div class="form-actions right">
                            <a href="{{url('giahh-xuatnhapkhau/thoidiem='.$model->mathoidiem.'/nam='.$model->nam.'&pb=all')}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>

@stop