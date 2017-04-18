<?php

namespace App\Http\Controllers;

use App\CongBoGiaDefault;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CongBoGiaBoSungDefaultController extends Controller
{
    public function store(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs = $request->all();

        $inputs['sl'] = getDbl($inputs['sl']);
        $inputs['nguyengiathamdinh'] = getDbl($inputs['nguyengiathamdinh']);
        $inputs['giatritstd'] = getDbl($inputs['giatritstd']);

        if(isset($inputs['tents']) && $inputs['tents']!= ''){
            $modelts = new CongBoGiaDefault();
            $modelts->tents = $inputs['tents'];
            $modelts->dacdiempl = $inputs['dacdiempl'];
            $modelts->thongsokt  =$inputs['thongsokt'];
            $modelts->nguongoc = $inputs['nguongoc'];
            $modelts->dvt = $inputs['dvt'];
            $modelts->sl = $inputs['sl'];

            $modelts->nguyengiathamdinh = $inputs['nguyengiathamdinh'];
            $modelts->giatritstd = $inputs['giatritstd'];
            $modelts->giaththamdinh = 0;
            $modelts->gc = $inputs['gc'];
            $modelts->mahuyen = session('admin')->mahuyen;
            $modelts->save();

            $model = CongBoGiaDefault::where('mahuyen',session('admin')->mahuyen)->get();
            $result['message'] = $this->return_html($model);
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function edit(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){

            $model = CongBoGiaDefault::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Tên tài sản<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tentsedit" id="tentsedit" class="form-control" value="'.$model->tents.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đặc điểm pháp lý<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dacdiempledit" id="dacdiempledit" class="form-control" value="'.$model->dacdiempl.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thông số kỹ thuật<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="thongsoktedit" id="thongsoktedit" class="form-control" value="'.$model->thongsokt.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguồn gốc<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguongocedit" id="nguongocedit" class="form-control" value="'.$model->nguongoc.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn vị tính<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dvtedit" id="dvtedit" class="form-control" value="'.$model->dvt.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số lượng<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="sledit" id="sledit" class="form-control" data-mask="fdecimal" value="'.$model->sl.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá thẩm định<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguyengiathamdinhedit" id="nguyengiathamdinhedit" class="form-control"  data-mask="fdecimal" value="'.$model->nguyengiathamdinh.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị tài sản thẩm định<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giatritstdedit" id="giatritstdedit" class="form-control" data-mask="fdecimal" value="'.$model->giatritstd.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ghi chú<span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="gcedit" class="form-control" name="gcedit" cols="30" rows="3">'.$model->gc.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<input type="hidden" id="idedit" name="idedit" value="'.$model->id.'">';


            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function update(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){

            $inputs['sl'] = getDbl($inputs['sl']);
            $inputs['nguyengiathamdinh'] = getDbl($inputs['nguyengiathamdinh']);
            $inputs['giatritstd'] = getDbl($inputs['giatritstd']);

            $modelupdate = CongBoGiaDefault::where('id',$inputs['id'])
                ->first();
            $modelupdate->tents = $inputs['tents'];
            $modelupdate->dacdiempl = $inputs['dacdiempl'];
            $modelupdate->thongsokt  =$inputs['thongsokt'];
            $modelupdate->nguongoc = $inputs['nguongoc'];
            $modelupdate->dvt = $inputs['dvt'];
            $modelupdate->sl = $inputs['sl'];
            $modelupdate->nguyengiathamdinh = $inputs['nguyengiathamdinh'];
            $modelupdate->giatritstd = $inputs['giatritstd'];
            $modelupdate->giaththamdinh = 0;
            $modelupdate->gc = $inputs['gc'];
            $modelupdate->save();

            $model = CongBoGiaDefault::where('mahuyen',session('admin')->mahuyen)->get();

            $result['message'] = $this->return_html($model);
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }

    public function destroy(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            CongBoGiaDefault::where('id',$inputs['id'])->delete();
            $model = CongBoGiaDefault::where('mahuyen',session('admin')->mahuyen)->get();
            $result['message'] = $this->return_html($model);
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    function return_html($chitiet){
        $message = '<div class="row" id="dsts">';
        $message .= '<div class="col-md-12">';
        $message .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
        $message .= '<thead>';
        $message .= '<tr>';
        $message .= '<th width="2%" style="text-align: center">STT</th>';
        $message .= '<th style="text-align: center">Tên vật<br>tư VLXD</th>';
        $message .= '<th style="text-align: center">Thông số<br>kỹ thuật</th>';
        $message .= '<th style="text-align: center">Nguồn gốc<br>xuất xứ</th>';
        $message .= '<th style="text-align: center">Đơn vị<br>tính</th>';
        $message .= '<th style="text-align: center">Số lượng</th>';
        $message .= '<th style="text-align: center">Đơn giá<br>công bố</th>';
        $message .= '<th style="text-align: center">Giá trị<br>công bố</th>';
        $message .= '<th style="text-align: center">Thao tác</th>';
        $message .= '</tr>';
        $message .= '</thead>';
        $message .= '<tbody id="ttts">';
        if(count($chitiet) > 0) {
            foreach ($chitiet as $key => $tents) {
                $message .= '<tr id="' . $tents->id . '">';
                $message .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                $message .= '<td class="active">' . $tents->tents . '</td>';
                $message .= '<td>' . $tents->thongsokt . '</td>';
                $message .= '<td>' . $tents->nguongoc . '</td>';
                $message .= '<td>' . $tents->dvt . '</td>';
                $message .= '<td style="text-align: center">' . number_format($tents->sl) . '</td>';
                $message .= '<td style="text-align: right">' . number_format($tents->nguyengiathamdinh) . '</td>';
                $message .= '<td style="text-align: right">' . number_format($tents->giatritstd) . '</td>';
                $message .= '<td>' .
                    '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                    '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow(' . $tents->id . ')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                    . '</td>';
                $message .= '</tr>';
            }
            $message .= '</tbody>';
            $message .= '</table>';
            $message .= '</div>';
            $message .= '</div>';
        }
        return $message;
    }
}
