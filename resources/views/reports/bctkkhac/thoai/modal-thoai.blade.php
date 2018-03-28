<script>
    function ClickBC1(url){
        $('#frm_BC1').attr('action',url);
        $('#frm_BC1').submit();
    }
    function ClickBC2(url){
        $('#frm_BC2').attr('action',url);
        $('#frm_BC2').submit();
    }
    function ClickBC3(url){
        $('#frm_BC3').attr('action',url);
        $('#frm_BC3').submit();
    }
    function ClickBC4(url){
        $('#frm_BC4').attr('action',url);
        $('#frm_BC4').submit();
    }
    function ClickBC1Excel(url){
        $('#frm_BC1').attr('action',url);
        $('#frm_BC1').submit();
    }
    function ClickBC2Excel(url){
        $('#frm_BC2').attr('action',url);
        $('#frm_BC2').submit();
    }
    function ClickBC3Excel(url){
        $('#frm_BC3').attr('action',url);
        $('#frm_BC3').submit();
    }
    function ClickBC4Excel(url){
        $('#frm_BC4').attr('action',url);
        $('#frm_BC4').submit();
    }
</script>

<!--Modal Thoại BC1-->
<div id="BC1-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'/reports/bctkkhac/BC1','target'=>'_blank' , 'id' => 'frm_BC1', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo chi tiết kết quả thẩm định giá</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-9 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="2017-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-9">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="2017-12-31">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Nguồn vốn</b></label>
                        <div class="col-md-9">
                            {!! Form::select(
                            'nguonvon',
                            array(
                            'ALL' => '-- Tất cả các nguồn --',
                            'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                            'Thường xuyên' => 'Nguồn vốn thường xuyên',
                            'Đầu tư' => 'Nguồn vốn đầu tư',
                            ),null,
                            array('id' => 'nguonvon', 'class' => 'form-control'))
                            !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Kết xuất theo</b></label>
                        <div class="col-md-9">
                            {!! Form::select(
                            'dk',
                            array(
                            'Tháng' => 'Tháng',
                            'Quý' => 'Quý',
                            'Năm' => 'Năm',
                            ),null,
                            array('id' => 'dk', 'class' => 'form-control'))
                            !!}
                        </div>
                    </div>
                    @if(session('admin')->level == 'T')
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Đơn vị</b></label>
                            <div class="col-md-9">
                                <select class="form-control" name="donvi" id="donvi">
                                    <option value="all">--Tất cả các đơn vị--</option>
                                    @foreach($modeldv as $dv)
                                        <option value="{{$dv->ma}}">{{$dv->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC1('/reports/bctkkhac/BC1')" >Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBC1Excel('/reports/bctkkhac/BC1Excel')" >Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>
<!--Modal Thoại BC2-->
<div id="BC2-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'/reports/bctkkhac/BC2','target'=>'_blank' , 'id' => 'frm_BC2', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary" style="color: #060606">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo tổng hợp kết quả thẩm định giá</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-9 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="2017-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-9 ">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="2017-12-31">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Nguồn vốn</b></label>
                        <div class="col-md-9">
                            {!! Form::select(
                            'nguonvon',
                            array(
                            'ALL' => '-- Tất cả các nguồn --',
                            'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                            'Thường xuyên' => 'Nguồn vốn thường xuyên',
                            'Đầu tư' => 'Nguồn vốn đầu tư',
                            ),null,
                            array('id' => 'nguonvon', 'class' => 'form-control'))
                            !!}
                        </div>
                    </div>
                    @if(session('admin')->level == 'T')
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Đơn vị</b></label>
                            <div class="col-md-9">
                                <select class="form-control" name="donvi" id="donvi">
                                    <option value="all">--Tất cả các đơn vị--</option>
                                    @foreach($modeldv as $dv)
                                        <option value="{{$dv->ma}}">{{$dv->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC2('/reports/bctkkhac/BC2')" >Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBC2Excel('/reports/bctkkhac/BC2Excel')" >Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Modal Thoại BC3-->
<div id="BC3-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'reports/bctkkhac/BC3','target'=>'_blank' , 'id' => 'frm_BC3', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo chi tiết công bố giá, công bố giá bổ xung</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-9 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="2017-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-9">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="2017-12-31">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Nguồn vốn</b></label>
                        <div class="col-md-9 ">
                            {!! Form::select(
                            'nguonvon',
                            array(
                            'ALL' => '-- Tất cả các nguồn --',
                            'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                            'Thường xuyên' => 'Nguồn vốn thường xuyên',
                            'Đầu tư' => 'Nguồn vốn đầu tư',
                            ),null,
                            array('id' => 'nguonvon', 'class' => 'form-control'))
                            !!}
                        </div>
                    </div>
                    @if(session('admin')->level == 'T')
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Đơn vị</b></label>
                            <div class="col-md-9">
                                <select class="form-control" name="donvi" id="donvi">
                                    <option value="all">--Tất cả các đơn vị--</option>
                                    @foreach($modeldv as $dv)
                                        <option value="{{$dv->ma}}">{{$dv->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC3('/reports/bctkkhac/BC3')" >Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBC3Excel('/reports/bctkkhac/BC3Excel')" >Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Modal Thoại BC4-->
<div id="BC4-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'reports/bctkkhac/BC4','target'=>'_blank' , 'id' => 'frm_BC4', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo tổng hợp công bố giá, công bố giá bổ xung</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-9">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="2017-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-9">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="2017-12-31">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Nguồn vốn</b></label>
                        <div class="col-md-9 ">
                            {!! Form::select(
                            'nguonvon',
                            array(
                            'ALL' => '-- Tất cả các nguồn --',
                            'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                            'Thường xuyên' => 'Nguồn vốn thường xuyên',
                            'Đầu tư' => 'Nguồn vốn đầu tư',
                            ),null,
                            array('id' => 'nguonvon', 'class' => 'form-control'))
                            !!}
                        </div>
                    </div>
                    @if(session('admin')->level == 'T')
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Đơn vị</b></label>
                            <div class="col-md-9">
                                <select class="form-control" name="donvi" id="donvi">
                                    <option value="all">--Tất cả các đơn vị--</option>
                                    @foreach($modeldv as $dv)
                                        <option value="{{$dv->ma}}">{{$dv->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC4('/reports/bctkkhac/BC4')" >Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBC4Excel('/reports/bctkkhac/BC4Excel')" >Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>
