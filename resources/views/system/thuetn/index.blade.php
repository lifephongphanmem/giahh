@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.treetable.theme.default.css')}}" />
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{ url('js/jquery.treetable.js') }}" type="text/javascript"></script>

    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
            $("#giadat").treetable();
            $("#example-advanced").treetable({ expandable: true });
            $("#example-advanced").treetable('expandAll');
        });

        $(function(){
            $('#diaban').change(function() {
                var url ='{{$url}}' + 'danh_muc/ma_so='+$('#diaban').val();
                window.location.href = url;
            });
        })
    </script>

    @include('includes.crumbs.script_inputdate')

    <script>
        // <editor-fold defaultstate="collapsed" desc="--InPutMask--">
        function InputMask() {
            //$(function(){
            // Input Mask
            if ($.isFunction($.fn.inputmask)) {
                $("[data-mask]").each(function (i, el) {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if (placeholder.length) {
                        opts[placeholder] = placeholder;
                    }

                    switch (mask.toLowerCase()) {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');
                            ;

                            mask = "999,999,999.99";

                            if ($this.data('mask').toLowerCase() == 'rcurrency') {
                                mask += ' ' + sign;
                            }
                            else {
                                mask = sign + ' ' + mask;
                            }

                            opts.numericInput = true;
                            opts.rightAlignNumerics = false;
                            opts.radixPoint = '.';
                            break;

                        case "email":
                            mask = 'Regex';
                            opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                            break;

                        case "fdecimal":
                            mask = 'decimal';
                            $.extend(opts, {
                                autoGroup: true,
                                groupSize: 3,
                                radixPoint: attrDefault($this, 'rad', '.'),
                                groupSeparator: attrDefault($this, 'dec', ',')
                            });
                    }

                    if (is_regex) {
                        opts.regex = mask;
                        mask = 'Regex';
                    }

                    $this.inputmask(mask, opts);
                });
            }
            //});
        }
        // </editor-fold>
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin đất <small> theo vị trí</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption"></div>
                </div>
                <div class="portlet-body">
                    <!--form id="reveal">
                        <input type="text" name="nodeId" placeholder="nodeId" id="revealNodeId">
                        <input type="submit" value="Reveal"><br>
                    </form-->
                    <input type="hidden" name="manhom" id="manhom" value="{{$nhom}}" />
                    <table id="example-advanced" class="treetable">
                        <thead>
                        <tr>
                            <th style="text-align: center">Mã số</th>
                            <th style="text-align: center">Tên tài nguyên</th>
                            <th style="text-align: center" width="10%">Giá tối</br>thiểu</th>
                            <th style="text-align: center" width="10%">Giá tối</br>đa</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Viết hàm đệ quy để tính toán -->

                        <?php $model_cap2 = $model->where('magoc',$nhom); ?>
                        @foreach($model_cap2 as $cap2)
                            <tr data-tt-id="{{$cap2->mahh}}" data-tt-parent-id="{{$cap2->magoc}}">
                                <td>{{$cap2->mahh}}</td>
                                <td>{{$cap2->tenhh}}</td>
                                <td>{{dinhdangso($cap2->giatu)}}</td>
                                <td>{{dinhdangso($cap2->giaden)}}</td>
                                <td>
                                    <button type="button" onclick="confirmNode('{{$cap2->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                    <button type="button" onclick="getNode('{{$cap2->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                    @if($cap2->b_xoa)
                                        <button type="button" onclick="confirmDelete('{{$cap2->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                    @endif
                                </td>
                            </tr>
                            <?php $model_cap3 = $model->where('magoc',$cap2->mahh); ?>
                            @foreach($model_cap3 as $cap3)
                                <tr data-tt-id="{{$cap3->mahh}}" data-tt-parent-id="{{$cap3->magoc}}">
                                    <td>{{$cap3->mahh}}</td>
                                    <td>{{$cap3->tenhh}}</td>

                                    <td>{{dinhdangso($cap3->giatu)}}</td>
                                    <td>{{dinhdangso($cap3->giaden)}}</td>
                                    <td>
                                        <button type="button" onclick="confirmNode('{{$cap3->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                        <button type="button" onclick="getNode('{{$cap3->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                        @if($cap3->b_xoa)
                                            <button type="button" onclick="confirmDelete('{{$cap3->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                        @endif
                                    </td>
                                </tr>
                                <?php $model_cap4 = $model->where('magoc',$cap3->mahh); ?>
                                @foreach($model_cap4 as $cap4)
                                    <tr data-tt-id="{{$cap4->mahh}}" data-tt-parent-id="{{$cap4->magoc}}">
                                        <td style="text-align: right">{{$cap4->mahh}}</td>
                                        <td>{{$cap4->tenhh}}</td>

                                        <td>{{dinhdangso($cap4->giatu)}}</td>
                                        <td>{{dinhdangso($cap4->giaden)}}</td>
                                        <td>
                                            <button type="button" onclick="confirmNode('{{$cap4->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                            <button type="button" onclick="getNode('{{$cap4->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                            @if($cap4->b_xoa)
                                                <button type="button" onclick="confirmDelete('{{$cap4->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $model_cap5 = $model->where('magoc',$cap4->mahh); ?>
                                    @foreach($model_cap5 as $cap5)
                                        <tr data-tt-id="{{$cap5->mahh}}" data-tt-parent-id="{{$cap5->magoc}}">
                                            <td style="text-align: right">{{$cap5->mahh}}</td>
                                            <td>{{$cap5->tenhh}}</td>

                                            <td>{{dinhdangso($cap5->giatu)}}</td>
                                            <td>{{dinhdangso($cap5->giaden)}}</td>
                                            <td>
                                                <button type="button" onclick="confirmNode('{{$cap5->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                <button type="button" onclick="getNode('{{$cap5->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                @if($cap5->b_xoa)
                                                    <button type="button" onclick="confirmDelete('{{$cap5->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                @endif
                                            </td>
                                        </tr>
                                        <?php $model_cap6 = $model->where('magoc',$cap5->mahh); ?>
                                        @foreach($model_cap6 as $cap6)
                                            <tr data-tt-id="{{$cap6->mahh}}" data-tt-parent-id="{{$cap6->magoc}}">
                                                <td style="text-align: right">{{$cap6->mahh}}</td>
                                                <td>{{$cap6->tenhh}}</td>

                                                <td>{{dinhdangso($cap6->giatu)}}</td>
                                                <td>{{dinhdangso($cap6->giaden)}}</td>
                                                <td>
                                                    <button type="button" onclick="confirmNode('{{$cap6->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                    <button type="button" onclick="getNode('{{$cap6->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                    @if($cap6->b_xoa)
                                                        <button type="button" onclick="confirmDelete('{{$cap6->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <?php $model_cap7 = $model->where('magoc',$cap6->mahh); ?>
                                            @foreach($model_cap7 as $cap7)
                                                <tr data-tt-id="{{$cap7->mahh}}" data-tt-parent-id="{{$cap7->magoc}}">
                                                    <td style="text-align: right">{{$cap7->mahh}}</td>
                                                    <td>{{$cap7->tenhh}}</td>

                                                    <td>{{dinhdangso($cap7->giatu)}}</td>
                                                    <td>{{dinhdangso($cap7->giaden)}}</td>
                                                    <td>
                                                        <button type="button" onclick="confirmNode('{{$cap7->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                        <button type="button" onclick="getNode('{{$cap7->mahh}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                        @if($cap7->b_xoa)
                                                            <button type="button" onclick="confirmDelete('{{$cap7->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!--div class="col-md-offset-5 col-md-2">
                    <a class="btn blue" href="{{url('/giathuetn')}}"><i class="fa fa-mail-reply"></i> Quay lại</a>
                </div-->
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>


    <!--Modal node thêm-->
    <div id="modal-node-them" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thêm mới tài nguyên</h4>
                </div>
                <div class="modal-body">
                    <label class="form-control-label">Mã tài nguyên<span class="require">*</span></label>
                    <input type="text" id="node_mahh" class="form-control" name="node_mahh" rows="3" required="required">
                    <label class="form-control-label">Tên tài nguyên<span class="require">*</span></label>
                    <textarea id="node_tenhh" class="form-control" name="node_tenhh" rows="3" required="required"></textarea>
                    <input type="hidden" name="node_magoc" id="node_magoc" />
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="cfnode()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal node thêm-->
    <div id="modal-edit-node" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin vị trí</h4>
                </div>
                <div class="modal-body" id="edit_node">
                    <label class="form-control-label">Tên khu vực / vị trí<span class="require">*</span></label>
                    <textarea id="edit_vitri" class="form-control" name="edit_vitri" rows="3" required="required"></textarea>
                    <input type="hidden" name="edit_maso" id="edit_maso" />
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="cfedit_node()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cfvitri(){
            var valid=true;
            var message='';
            var vitri=$('#vitri').val();


            if(vitri==''){
                valid=false;
                message +='Địa bàn quản lý không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{$url}}' + 'add_diaban',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        vitri: vitri
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    },
                    error: function(message){
                        toastr.error(message);
                    }
                });
                $('#modal-diaban-them').modal('hide');
            }else{
                toastr.error(message,'Lỗi!.');
            }
        }

        function confirmNode(maso) {
            document.getElementById("node_magoc").value=maso;
        }
        function getNode(maso) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{$url}}' + 'get_node',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    mahh: maso
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#edit_node').replaceWith(data.message);
                        InputMask();

                    }
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }

        function cfnode(){
            var valid=true;
            var message='';
            var tenhh=$('#node_tenhh').val();
            var mahh=$('#node_mahh').val();


            if(tenhh=='' || mahh == ''){
                valid=false;
                message +='Mã số và tên tài nguyên không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{$url}}' + 'add_node',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        tenhh: tenhh,
                        mahh: mahh,
                        manhom: $('#manhom').val(),
                        magoc: $('#node_magoc').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    },
                    error: function(message){
                        toastr.error(message);
                    }
                });
                $('#modal-node-them').modal('hide');
            }else{
                toastr.error(message,'Lỗi!.');
            }
        }

        function cfedit_node(){
            var valid=true;
            var message='';
            var tenhh=$('#edit_tenhh').val();


            if(tenhh==''){
                valid=false;
                message +='Tên tài nguyên không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{$url}}' + 'update_node',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        tenhh: tenhh,
                        mahh: $('#edit_mahh').val(),
                        giatu: $('#edit_giatu').val(),
                        giaden: $('#edit_giaden').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            location.reload();
                        }
                    },
                    error: function(message){
                        toastr.error(message);
                    }
                });
                $('#modal-edit-node').modal('hide');
            }else{
                toastr.error(message,'Lỗi!.');
            }
        }

    </script>
    @include('includes.e.modal-delete')
    @include('includes.script.create-header-scripts')
@stop