<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 10/20/2016
 * Time: 8:51 AM
 */?>
<div class="col-md-4">
    <div class="form-group has-error">
        <label class="control-label">Phân loại</label>
        @if(isset($model->phanloai))
            <select class="form-control required" name="phanloai" id="phanloai">
                <option value="TW" {{$model->phanloai=='TW'?'selected':''}}>Tài nguyên TW quy định</option>
                <option value="DP" {{$model->phanloai=='DP'?'selected':''}}>Tài nguyên địa phương quy định</option>
            </select>
        @else
            <select class="form-control required" name="phanloai" id="phanloai">
                <option value="TW">Tài nguyên TW quy định</option>
                <option value="DP">Tài nguyên địa phương quy định</option>
            </select>
        @endif
    </div>
</div>