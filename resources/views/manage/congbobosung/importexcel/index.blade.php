@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
       Nhận dữ liệu <small> công bố giá bổ sung</small>
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
                    {!! Form::open(['url'=>'store-congbobosung', 'id' => 'import_conbogia', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Phân loại hồ sơ<span class="require">*</span></label>
                                        <select class="form-control" id="plhs" name="plhs" autofocus>
                                            <option value="Công bố giá bổ sung">Công bố giá bổ sung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hồ sơ công bố<span class="require">*</span></label>
                                        <input type="text" id="sohs" name="sohs" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày nhập<span class="require">*</span></label>
                                        <input type="date" id="ngaynhap" name="ngaynhap" class="form-control required">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Nguồn vốn</label>
                                        <select class="form-control" id="nguonvon" name="nguonvon">
                                            <option value="Cả hai">Cả hai</option>
                                            <option value="Thường xuyên">Thường xuyên</option>
                                            <option value="Đầu tư">Đầu tư</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số văn bản đề nghị<span class="require">*</span></label>
                                        <input type="text" id="sovbdn" name="sovbdn" class="form-control required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-error">
                                        <label class="control-label">Số công bố giá<span class="require">*</span></label>
                                        <input type="text" id="sotbkl" name="sotbkl" class="form-control required">
                                    </div>
                                </div>
                            </div-->

                            <h4 class="form-section" style="color: #0000ff">Thông tin dữ liệu import</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr style="background: #F5F5F5">
                                                <th width="2%" style="text-align: center">STT</th>
                                                <th style="text-align: center">Tên tài sản</th>
                                                <th style="text-align: center">Tiêu chuẩn - kỹ thuật</th>
                                                <th style="text-align: center">Nguồn gốc</th>
                                                <th style="text-align: center">Đơn vị tính</th>
                                                <th style="text-align: center">Số lượng</th>
                                                <th style="text-align: center">Giá trị đề nghị</th>
                                                <th style="text-align: center">Giá trị thẩm định</th>
                                                <th style="text-align: center" width="10%">Thao tác</th>
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
                                                        <td>{{$ct->giadenghi}}</td>
                                                        <td>{{$ct->giatritstd}}</td>
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

            var validator = $("#import_conbogia").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>

@stop