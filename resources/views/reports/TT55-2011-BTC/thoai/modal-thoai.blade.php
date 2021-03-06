
<script>
    function ClickPL1(url){
        $('#frm_pl1').attr('action',url);
        $('#frm_pl1').submit();
    }
    function ClickPL2(url){
        $('#frm_pl2').attr('action',url);
        $('#frm_pl2').submit();
    }
    function ClickPL1Excel(url){
        $('#frm_pl1').attr('action',url);
        $('#frm_pl1').submit();
    }
    function ClickPL2Excel(url){
        $('#frm_pl2').attr('action',url);
        $('#frm_pl2').submit();
    }
</script>

<!--Modal Thoại PL1-->
<div id="pl1-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'/reports/tt55-2011-BTC/PL1','target'=>'_blank' , 'id' => 'frm_pl1', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Bảng giá thị trường</h4>
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
                        <label class="col-md-4 control-label"><b>Thị trường hàng hóa</b></label>
                        <div class="col-md-6 ">
                            <select name="thitruong" id="thitruong" class="form-control">
                                @foreach($thitruong as $ct)
                                    <option value="{{$ct->thitruong}}">{{$ct->thitruong}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Thời điểm báo cáo</b></label>
                        <div class="col-md-6 ">
                            <select name="kynay" id="kynay" class="form-control">
                                @foreach($thoidiem as $ct)
                                    <option value="{{$ct->mathoidiem}}">{{$ct->tenthoidiem}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Thời điểm kỳ trước</b></label>
                        <div class="col-md-6 ">
                            <select name="kytruoc" id="kytruoc" class="form-control">
                                @foreach($thoidiem as $ct)
                                    <option value="{{$ct->mathoidiem}}">{{$ct->tenthoidiem}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickPL1('/reports/tt55-2011-BTC/PL1')">Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL1Excel('/reports/tt55-2011-BTC/PL1Excel')">Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>
<!--Phụ lục 2-->
<div id="pl2-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'/reports/tt55-2011-BTC/PL2','target'=>'_blank' , 'id' => 'frm_pl2', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Bảng giá hàng hóa xuất nhập khẩu</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="2017-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="2017-12-31">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickPL2('/reports/tt55-2011-BTC/PL2')">Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL2Excel('/reports/tt55-2011-BTC/PL2Excel')">Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

