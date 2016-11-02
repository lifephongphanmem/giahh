<!--Modal Hủy-->
<div id="huy-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>$url.'unapprove','id' => 'frm_huy'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy hoàn thành?</h4>
                <input type="hidden" name="idhuy" id="idhuy">

            </div>
            <div class="modal-body">
                <h5><i style="color: #0000FF">Hồ sơ bị hủy hoàn thành sẽ chuyển lại cho phòng chuyên môn để chỉnh sửa lại thông tin! Hồ sơ sẽ không hiển thị trên màn hình thông tin nữa</i></h5>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhuy()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<script>
    function clickhuy(){
        $('#frm_huy').submit();
    }
    function confirmHuy(id) {
        document.getElementById("idhuy").value=id;
    }
</script>