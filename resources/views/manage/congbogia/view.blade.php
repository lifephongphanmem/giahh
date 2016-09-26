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
                                    <div class="form-group has-error">
                                        <label class="control-label">Phân loại hồ sơ<span class="require">*</span></label>
                                        <select class="form-control" id="plhs" name="plhs" readonly>
                                            <option value="Công bố giá" {{($model->plhs == 'Công bố giá' ? 'selected' : '')}}>Công bố giá</option>
                                            <option value="Công bố giá bổ xung" {{($model->plhs == 'Công bố giá bổ xung' ? 'selected' : '')}}>Công bố giá bổ xung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ công bố giá VLXD<span class="require">*</span></label>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số văn bản đề nghị<span class="require">*</span></label>
                                        <input type="text" id="sovbdn" name="sovbdn" class="form-control" value="{{$model->sovbdn}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Số thông báo kết luận công bố giá VLXD<span class="require">*</span></label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control" value="{{$model->sotbkl}}" readonly>
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
                                                <th style="text-align: center">Tên vật tư VLXD</th>
                                                <th style="text-align: center">Thông số kỹ thuật</th>
                                                <th style="text-align: center">Nguồn gốc xuất xứ</th>
                                                <th style="text-align: center">Đơn vị tính</th>
                                                <th style="text-align: center">Số lượng</th>
                                                <th style="text-align: center">Nguyên giá đề nghị</th>
                                                <th style="text-align: center">Giá trị đề nghị</th>
                                                <th style="text-align: center">Nguyên giá công bố</th>
                                                <th style="text-align: center">Giá trị công bố</th>
                                                <th style="text-align: center">Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ttts">
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
                                                    <td>{{$tt->ghichu}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <a href="{{url('thongtin-congbogia/nam='.$model->nam.'&pb=all')}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>

@stop