
<script>
    function userlock(){
        $('#frmLockUser').submit();
    }
    function userunlock(){
        $('#frmUnLockUser').submit();
    }
    function clickdelete(){
        $('#frmDelete').submit();
    }
</script>


<!--Modal Delete-->
<div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdelete()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal Lockuser-->

<div id="lockuser-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmLockUser" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý khóa?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="userlock()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal UnLockuser-->

<div id="unlockuser-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmUnLockUser" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý mở khóa?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="userunlock()">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--Modal NotID-->

<div id="notid-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmNotId" method="GET" action="#" accept-charset="UTF-8">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Bạn chưa chọn thông tin nào!</h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" data-dismiss="modal" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </form>
</div>