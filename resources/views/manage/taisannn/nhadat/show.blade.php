@extends('main')

@section('custom-style')

@stop


@section('custom-script')
@stop

@section('content')
    <h3 class="page-title">
        Thông tin hồ sơ<small> công bố</small>
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
                                        <label class="control-label">Ngày nhập<span class="require">*</span></label>
                                        <input type="date" id="ngaynhap" name="ngaynhap" class="form-control required" value="{{$model->ngaynhap}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <h4 class="form-section" style="color: #0000ff">Thông tin chi tiết hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr style="background: #F5F5F5">
                                                <th width="2%" style="text-align: center">STT</th>
                                                <th style="text-align: center">Tên tài sản</th>
                                                <th style="text-align: center">Số lượng tài sản</th>
                                                <th style="text-align: center">Số tầng</th>
                                                <th style="text-align: center">Diện tích (m<sup>2</sup>)</th>
                                                <th style="text-align: center">Tỷ lệ chất lượng còn lại(%)</th>
                                                <th style="text-align: center">Nguyên giá</th>
                                                <th style="text-align: center">Giá trị còn lại</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ttts">
                                        @if(count($modeltt)>0)
                                            @foreach($modeltt as $key=>$tt)
                                                <tr>
                                                    <td style="text-align: center">{{$key +1}}</td>
                                                    <td class="active">{{$tt->tents}}</td>
                                                    <td style="text-align: right" >{{number_format($tt->slts)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->sotang)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->dientich)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->tyleclcl)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->nguyengia)}}</td>
                                                    <td style="text-align: right">{{number_format($tt->giatricl)}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8" style="text-align: center">(Không có thông tin về tài sản)</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <a href="{{url('taisan-nhadat/nam='.$model->nam.'&pb=all')}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>

@stop