<div id="hoantat-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>$url.'approve','id' => 'frm_hoantat'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hoàn tất hồ sơ?</h4>

                <input type="hidden" name="idhoantat" id="idhoantat">

            </div>
            <div class="modal-body">
                <h5><i style="color: #0000FF">Hồ sơ đã hoàn tất sẽ không được phép chỉnh sửa và hủy hoàn tất hồ sơ nữa!Bạn cần liên hệ cơ quan chủ quản để chỉnh sửa hồ sơ nếu cần!</i></h5>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhoantat()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<script>
    function confirmHoantat(id) {
        document.getElementById("idhoantat").value=id;
    }
    function clickhoantat(){
        $('#frm_hoantat').submit();
    }
</script>