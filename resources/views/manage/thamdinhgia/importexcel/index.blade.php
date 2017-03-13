@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
       Nhận dữ liệu <small> thẩm định giá</small>
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
                    {!! Form::open(['url'=>'store-thamdinhgia', 'id' => 'import_thamdinhgia', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ thẩm định<span class="require">*</span></label>
                                        <input type="text" id="hosotdgia" name="hosotdgia" class="form-control required" value="{{$model->hosotdgia}}" autofocus>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                        <input type="date" id="thoidiem" name="thoidiem" class="form-control required" value="{{$model->thoidiem}}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa điểm thẩm định<span class="require">*</span></label>
                                        <input type="text" id="diadiem" name="diadiem" class="form-control required" value="{{$model->diadiem}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phương pháp thẩm định thẩm định</label>
                                        <input type="text" id="ppthamdinh" name="ppthamdinh" class="form-control" value="{{$model->ppthamdinh}}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mục đích thẩm định<span class="require">*</span></label>
                                        <input type="text" id="mucdich" name="mucdich" class="form-control required" value="{{$model->mucdich}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                        <input type="text" id="dvyeucau" name="dvyeucau" class="form-control required" value="{{$model->dvyeucau}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguồn vốn<span class="require">*</span></label>
                                        <select class="form-control" name="nguonvon" id="nguonvon">
                                            <option {{$model->nguonvon=='Cả hai'?'selected':''}} value="Cả hai">Cả hai (Nguồn vốn thường xuyên và Nguồn vốn đầu tư)</option>
                                            <option {{$model->nguonvon=='Thường xuyên'?'selected':''}} value="Thường xuyên">Nguồn vốn thường xuyên</option>
                                            <option {{$model->nguonvon=='Đầu tư'?'selected':''}} value="Đầu tư">Nguồn vốn đầu tư</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thuế VAT</label>
                                        <select class="form-control" name="thuevat" id="thuevat">
                                            <option {{$model->thuevat=='Giá bao gồm thuế VAT'?'selected':''}} value="Giá bao gồm thuế VAT">Giá bao gồm thuế VAT</option>
                                            <option {{$model->thuevat=='Giá chưa bao gồm thuế VAT'?'selected':''}} value="Giá chưa bao gồm thuế VAT">Giá chưa bao gồm thuế VAT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                        <input data-mask="fdecimal" id="songaykq" name="songaykq" class="form-control" value="{{$model->songaykq}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn sử dụng kết quả thẩm định<span class="require">*</span></label>
                                        <input type="date" id="thoihan" name="thoihan" class="form-control required" value="{{$model->thoihan}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control required" value="{{$model->sotbkl}}">
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-section" style="color: #0000ff">Thông tin dữ liệu import</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr style="background: #F5F5F5">
                                                    <th width="2%" style="text-align: center">STT</th>
                                                    <th style="text-align: center">Tên tài sản</th>
                                                    <th style="text-align: center">Thông số</br>kỹ thuật</th>
                                                    <th style="text-align: center">Nguồn gốc</th>
                                                    <th style="text-align: center">Đơn vị</br>tính</th>
                                                    <th style="text-align: center">Số lượng</th>
                                                    <th style="text-align: center">Đơn giá</br>đề nghị</th>
                                                    <th style="text-align: center">Giá trị</br>đề nghị</th>
                                                    <th style="text-align: center">Đơn giá</br>thẩm định</th>
                                                    <th style="text-align: center">Giá trị</br>thẩm định</th>
                                                    <th style="text-align: center">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ttts">
                                            @if(!isset($m_ts))
                                                <td colspan="9" style="text-align: center">Chưa có thông tin</td>
                                            @else
                                                @foreach($m_ts as $key=>$ct)
                                                    <tr>
                                                        <td style="text-align: center">{{$key+1}}</td>
                                                        <td class="active">{{$ct->tents}}</td>
                                                        <td>{{$ct->thongsokt}}</td>
                                                        <td>{{$ct->nguongoc}}</td>
                                                        <td>{{$ct->dvt}}</td>
                                                        <td>{{$ct->sl}}</td>
                                                        <td style="text-align: right">{{number_format($ct->nguyengiadenghi)}}</td>
                                                        <td style="text-align: right">{{number_format($ct->giadenghi)}}</td>
                                                        <td style="text-align: right">{{number_format($ct->nguyengiathamdinh)}}</td>
                                                        <td style="text-align: right">{{number_format($ct->giatritstd)}}</td>
                                                        <td><button type="button" onclick="confirmDelete('{{$ct->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                                Xóa</button></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-plus"></i> Hoàn thành</button>
                            <button type="reset" class="btn default">Hủy</button>

                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#import_thamdinhgia").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
        $('#songaykq').change(function(){
            addngay();
        });
        $('#thoidiem').change(function(){
            addngay();
        });
        function addngay(){
            var thoidiem = $('#thoidiem').val();
            var songay = $('#songaykq').val();
            if(thoidiem!='' && songay!=''){
                var date = new Date(thoidiem);
                date.setDate(date.getDate()+parseInt(songay));
                var dd = date.getDate();
                var mm = date.getMonth() + 1;
                var y = date.getFullYear();
                if(dd<10) {
                    dd='0'+dd
                }
                if(mm<10) {
                    mm='0'+mm
                }
                $('#thoihan').val(y+ '-'+mm + '-' + dd  );
            }
        }
    </script>

@stop