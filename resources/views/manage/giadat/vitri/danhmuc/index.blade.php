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
                    <div class="actions">
                        @if(can('vitri','create'))
                            <button type="button" onclick="confirmHoantat('')" class="btn btn-default btn-xs mbs" data-target="#modal-diaban-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm địa bàn</button>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-2">
                            <div class="form-group">
                                <label style="margin-top: 5px;color: #000000" class="control-label text-right"> Địa bàn quản lý:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="diaban" id="diaban" class="form-control">
                                    <option value="ALL">--Chọn địa bàn quản lý--</option>
                                    @foreach($model_diaban as $diaban)
                                        <option value="{{$diaban->macapdo}}" {{$macapdo==$diaban->macapdo?'selected':''}}>{{$diaban->vitri}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="portlet-body">
                    <!--form id="reveal">
                        <input type="text" name="nodeId" placeholder="nodeId" id="revealNodeId">
                        <input type="submit" value="Reveal"><br>
                    </form-->

                    <table id="example-advanced" class="treetable">
                        <thead>
                        <tr>
                            <th style="text-align: center">Vị trí đất</th>
                            <th style="text-align: center" width="10%">Căn cứ quyết định</th>
                            <th style="text-align: center" width="10%">Giá đất</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Viết hàm đệ quy để tính toán -->
                        <?php $model_cap1 = $model->where('capdo','1'); ?>
                        @foreach($model_cap1 as $cap1)
                            <tr data-tt-id="{{$cap1->maso}}">
                                <td>{{$cap1->vitri}}</td>
                                <td>{{$cap1->soquyetdinh}}</td>
                                <td>{{dinhdangso($cap1->giadat)}}</td>
                                <td>
                                    <button type="button" onclick="confirmNode('{{$cap1->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                    <button type="button" onclick="getNode('{{$cap1->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                    @if($cap1->b_xoa)
                                        <button type="button" onclick="confirmDelete('{{$cap1->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                    @endif
                                </td>
                            </tr>
                            <?php $model_cap2 = $model->where('magoc',$cap1->maso); ?>
                            @foreach($model_cap2 as $cap2)
                                <tr data-tt-id="{{$cap2->maso}}" data-tt-parent-id="{{$cap2->magoc}}">
                                    <td>{{$cap2->vitri}}</td>
                                    <td>{{$cap2->soquyetdinh}}</td>
                                    <td>{{dinhdangso($cap2->giadat)}}</td>
                                    <td>
                                        <button type="button" onclick="confirmNode('{{$cap2->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                        <button type="button" onclick="getNode('{{$cap2->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                        @if($cap2->b_xoa)
                                            <button type="button" onclick="confirmDelete('{{$cap2->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                        @endif
                                    </td>
                                </tr>
                                <?php $model_cap3 = $model->where('magoc',$cap2->maso); ?>
                                @foreach($model_cap3 as $cap3)
                                    <tr data-tt-id="{{$cap3->maso}}" data-tt-parent-id="{{$cap3->magoc}}">
                                        <td>{{$cap3->vitri}}</td>
                                        <td>{{$cap3->soquyetdinh}}</td>
                                        <td>{{dinhdangso($cap3->giadat)}}</td>
                                        <td>
                                            <button type="button" onclick="confirmNode('{{$cap3->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                            <button type="button" onclick="getNode('{{$cap3->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                            @if($cap3->b_xoa)
                                                <button type="button" onclick="confirmDelete('{{$cap3->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $model_cap4 = $model->where('magoc',$cap3->maso); ?>
                                    @foreach($model_cap4 as $cap4)
                                        <tr data-tt-id="{{$cap4->maso}}" data-tt-parent-id="{{$cap4->magoc}}">
                                            <td>{{$cap4->vitri}}</td>
                                            <td>{{$cap4->soquyetdinh}}</td>
                                            <td>{{dinhdangso($cap4->giadat)}}</td>
                                            <td>
                                                <button type="button" onclick="confirmNode('{{$cap4->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                <button type="button" onclick="getNode('{{$cap4->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                @if($cap4->b_xoa)
                                                    <button type="button" onclick="confirmDelete('{{$cap4->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                @endif
                                            </td>
                                        </tr>
                                        <?php $model_cap5 = $model->where('magoc',$cap4->maso); ?>
                                        @foreach($model_cap5 as $cap5)
                                            <tr data-tt-id="{{$cap5->maso}}" data-tt-parent-id="{{$cap5->magoc}}">
                                                <td>{{$cap5->vitri}}</td>
                                                <td>{{$cap5->soquyetdinh}}</td>
                                                <td>{{dinhdangso($cap5->giadat)}}</td>
                                                <td>
                                                    <button type="button" onclick="confirmNode('{{$cap5->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                    <button type="button" onclick="getNode('{{$cap5->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                    @if($cap5->b_xoa)
                                                        <button type="button" onclick="confirmDelete('{{$cap5->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <?php $model_cap6 = $model->where('magoc',$cap5->maso); ?>
                                            @foreach($model_cap6 as $cap6)
                                                <tr data-tt-id="{{$cap6->maso}}" data-tt-parent-id="{{$cap6->magoc}}">
                                                    <td>{{$cap6->vitri}}</td>
                                                    <td>{{$cap6->soquyetdinh}}</td>
                                                    <td>{{dinhdangso($cap6->giadat)}}</td>
                                                    <td>
                                                        <button type="button" onclick="confirmNode('{{$cap6->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                        <button type="button" onclick="getNode('{{$cap6->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                                        @if($cap6->b_xoa)
                                                            <button type="button" onclick="confirmDelete('{{$cap6->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <?php $model_cap7 = $model->where('magoc',$cap6->maso); ?>
                                                @foreach($model_cap7 as $cap7)
                                                    <tr data-tt-id="{{$cap7->maso}}" data-tt-parent-id="{{$cap7->magoc}}">
                                                        <td>{{$cap7->vitri}}</td>
                                                        <td>{{$cap7->soquyetdinh}}</td>
                                                        <td>{{dinhdangso($cap7->giadat)}}</td>
                                                        <td>
                                                            <button type="button" onclick="confirmNode('{{$cap7->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-node-them" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm</button>
                                                            <button type="button" onclick="getNode('{{$cap7->maso}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit-node" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
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
    <!--Modal thông tin chức vụ -->
    <div id="modal-diaban-them" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thông tin địa bàn quản lý</h4>
                </div>
                <div class="modal-body">
                    <label class="form-control-label">Tên địa bàn<span class="require">*</span></label>
                    {!!Form::text('vitri', null, array('id' => 'vitri','class' => 'form-control','required'=>'required'))!!}
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="cfvitri()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal node thêm-->
    <div id="modal-node-them" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thêm mới thông tin vị trí</h4>
                </div>
                <div class="modal-body">
                    <label class="form-control-label">Tên khu vực / vị trí<span class="require">*</span></label>
                    <textarea id="node_vitri" class="form-control" name="node_vitri" rows="3" required="required"></textarea>
                    <input type="hidden" name="node_maso" id="node_maso" />
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
            document.getElementById("node_maso").value=maso;
        }
        function getNode(maso) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{$url}}' + 'get_node',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    maso: maso
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#edit_node').replaceWith(data.message);
                        //InputMask();

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
            var vitri=$('#node_vitri').val();


            if(vitri==''){
                valid=false;
                message +='Địa bàn quản lý không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{$url}}' + 'add_node',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        vitri: vitri,
                        maso: $('#node_maso').val()
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
            var vitri=$('#edit_vitri').val();


            if(vitri==''){
                valid=false;
                message +='Vị trí không được bỏ trống \n';
            }
            if(valid){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{$url}}' + 'update_node',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        vitri: vitri,
                        maso: $('#edit_maso').val(),
                        giadat: $('#edit_giadat').val(),
                        soquyetdinh: $('#edit_soquyetdinh').val()
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



@stop