
<script>
    function ClickPL2(){
        $('#frm_pl2').submit();
    }
    function ClickPL3(){
        $('#frm_pl3').submit();
    }
    function ClickPL4(){
        $('#frm_pl4').submit();
    }
    function ClickPL5(){
        $('#frm_pl5').submit();
    }
    function ClickPL6(){
        $('#frm_pl6').submit();
    }
</script>

<!--Modal Thoại PL2-->
<div id="pl2-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'reports/tt142-2015-BTC/PL2','target'=>'_blank' , 'id' => 'frm_pl2', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin về giá hàng hóa, dịch vụ</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Thời điểm: </b></label>
                        <div class="col-md-6 ">
                            <select name="mathoidiem" id="mathoidiem" class="form-control">
                                @foreach($modelthoidiemtn as $thoidiem)
                                    <option value="{{$thoidiem->mathoidiem}}">{{$thoidiem->tenthoidiem}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL2()" >Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Modal Thoại PL3-->
<div id="pl3-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'reports/tt142-2015-BTC/PL3','target'=>'_blank' , 'id' => 'frm_pl3', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin về trị giá hàng hóa xuất khẩu</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Thời điểm: </b></label>
                        <div class="col-md-6 ">
                            <select name="mathoidiem" id="mathoidiem" class="form-control">
                                @foreach($modelthoidiemxnk as $thoidiem)
                                    <option value="{{$thoidiem->mathoidiem}}">{{$thoidiem->tenthoidiem}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL3()" >Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Modal Thoại PL4-->
<div id="pl4-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'reports/tt142-2015-BTC/PL4','target'=>'_blank' , 'id' => 'frm_pl4', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin về trị giá hàng hóa nhập khẩu</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Thời điểm: </b></label>
                        <div class="col-md-6 ">
                            <select name="mathoidiem" id="mathoidiem" class="form-control">
                                @foreach($modelthoidiemxnk as $thoidiem)
                                    <option value="{{$thoidiem->mathoidiem}}">{{$thoidiem->tenthoidiem}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL4()" >Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Modal Thoại PL5-->
<div id="pl5-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'reports/tt142-2015-BTC/PL5','target'=>'_blank' , 'id' => 'frm_pl5', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin về tài sản thẩm định giá</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="2016-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="2016-12-31">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL5()" >Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Modal Thoại PL6-->
<div id="pl6-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'reports/tt142-2015-BTC/PL6','target'=>'_blank' , 'id' => 'frm_pl6', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin về giá tài sản thuộc sở hữu nhà nước (Tài sản là nhà, đất)</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Năm </b></label>
                        <div class="col-md-6 ">
                            <select name="nam" id="nam" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 5 ) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == getGeneralConfigs()['namhethong'] ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL6()" >Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

