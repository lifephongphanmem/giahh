
<script>
    function ClickBC(url){
        $('#frm_pl1').attr('action',url);
        $('#frm_pl1').submit();
    }
    function ClickBCExcel(url){
        $('#frm_pl1').attr('action',url);
        $('#frm_pl1').submit();
    }
</script>

<!--Modal Thoại PL1-->
<div id="pl1-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'','target'=>'_blank' , 'id' => 'frm_pl1', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo giá thuế tài nguyên</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Năm</b></label>
                        <div class="col-md-6 ">
                            <select name="nam" id="nam" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 5 ) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == date('Y') ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Thời điểm báo cáo</b></label>
                        <div class="col-md-6 ">
                            <select name="mathoidiem" id="mathoidiem" class="form-control">
                                @foreach($thoidiem as $ct)
                                    <option value="{{$ct->mathoidiem}}">{{$ct->tenthoidiem}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Phân loại báo cáo</b></label>
                        <div class="col-md-6 ">
                            <select name="phanloai" id="phanloai" class="form-control">
                                <option value="TW">Tài nguyên TW quy định</option>
                                <option value="DP">Tài nguyên địa phương quy định</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC('/reports/thuetn/bcgiathuetn')">Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBCExcel('/reports/thuetn/bcgiathuetnexcel')">Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

