@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>

@stop

@section('content')


    <h3 class="page-title">
        Thông tin hồ sơ<small> thẩm định</small>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr style="background: #F5F5F5">
                                                <th width="2%" style="text-align: center">STT</th>
                                                <th style="text-align: center">Tên tài sản</th>
                                                <th style="text-align: center">Đơn vị tính</th>
                                                <th style="text-align: center">Số lượng</th>
                                                <th style="text-align: center">Nguyên giá đề nghị</th>
                                                <th style="text-align: center">Giá trị đề nghị</th>
                                                <th style="text-align: center">Nguyên giá thẩm định</th>
                                                <th style="text-align: center">Giá trị thẩm định</th>
                                                <th style="text-align: center">Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ttts">
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
                            </div>
                        </div>

                        <div class="form-actions right">
                            <a href="{{url('thongtin-thamdinhgia/nam='.$model->nam.'&pb=all')}}" class="btn green"><i class="fa fa-mail-reply"></i>&nbsp;Quay lại</a>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>

@stop