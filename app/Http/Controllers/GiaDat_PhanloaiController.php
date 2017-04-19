<?php

namespace App\Http\Controllers;

use App\GiaDat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaDat_PhanloaiController extends Controller
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
        //dd($request);
        $inputs = $request->all();

        if($inputs['mahh']!=''){
            $modelts = new GiaDat();
            $modelts->khuvuc = $inputs['khuvuc'];
            $modelts->vitri1 = getDbl($inputs['vitri1']);
            $modelts->vitri2 = getDbl($inputs['vitri2']);
            $modelts->vitri3 = getDbl($inputs['vitri3']);
            $modelts->vitri4 = getDbl($inputs['vitri4']);
            $modelts->save();

            $result['status']= 'success';
            $result['message'] = $this->return_html(GiaHangHoa::where('mahs',$inputs['mahs'])->get());
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

            $model = GiaDat::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Khu vực<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="khuvucedit" id="khuvucedit" class="form-control require" value="'.$model->khuvuc.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<div class="form-group"><label class="control-label">Vị trí 1</label>';
            $result['message'] .= '<div><input type="text" name="vitri1edit" id="vitri1edit" class="form-control"  data-mask="fdecimal" value="'.$model->vitri1.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<div class="form-group"><label class="control-label">Vị trí 2</label>';
            $result['message'] .= '<div><input type="text" name="vitri2edit" id="vitri2edit" class="form-control" data-mask="fdecimal" value="'.$model->vitri2.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<div class="form-group"><label class="control-label">Vị trí 3</label>';
            $result['message'] .= '<div><input type="text" name="vitri3edit" id="vitri3edit" class="form-control"  data-mask="fdecimal" value="'.$model->vitri3.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<div class="form-group"><label class="control-label">Vị trí 4</label>';
            $result['message'] .= '<div><input type="text" name="vitri4edit" id="vitri4edit" class="form-control" data-mask="fdecimal" value="'.$model->vitri4.'"></div>';
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
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if (isset($inputs['id'])) {

            $inputs['soluong'] = str_replace(',', '', $inputs['soluong']);
            $inputs['soluong'] = str_replace('.', '', $inputs['soluong']);
            $inputs['giatu'] = str_replace(',', '', $inputs['giatu']);
            $inputs['giatu'] = str_replace('.', '', $inputs['giatu']);
            $inputs['giaden'] = str_replace(',', '', $inputs['giaden']);
            $inputs['giaden'] = str_replace('.', '', $inputs['giaden']);

            $modelupdate = GiaHangHoa::where('id', $inputs['id'])
                ->first();
            //$modelupdate->masopnhom = $inputs['masopnhom'];
            //$modelupdate->mahh = $inputs['mahh'];
            $modelupdate->giatu = $inputs['giatu'];
            $modelupdate->giaden = $inputs['giaden'];
            $modelupdate->soluong = $inputs['soluong'];
            $modelupdate->nguontin = $inputs['nguontin'];
            $modelupdate->gc = $inputs['gc'];
            $modelupdate->save();

            $model = GiaHangHoa::where('mahs', $inputs['mahs'])->get();
            $dmhanghoa = array_column(DmHangHoa::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($model as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            //$result['message'] .= '<div class="table-responsive">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr style="background: #F5F5F5">';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Mã hàng hóa</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hóa dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá từ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá đến</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center">Nguồn tin</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="12%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody id="ttts">';
            if (count($model) > 0) {
                foreach ($model as $key => $tents) {
                    $result['message'] .= '<tr id="' . $tents->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $tents->mahh . '</td>';
                    $result['message'] .= '<td class="active">' . $tents->tenhh . '</td>';
                    $result['message'] .= '<td style="text-align: right">' . number_format($tents->giatu) . '</td>';
                    $result['message'] .= '<td style="text-align: right">' . number_format($tents->giaden) . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . number_format($tents->soluong) . '</td>';
                    $result['message'] .= '<td>' . $tents->nguontin . '</td>';
                    $result['message'] .= '<td>' . $tents->gc . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow(' . $tents->id . ')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        . '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                //$result['message'] .= '</div>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';

            }

            die(json_encode($result));
        }
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
            $modeldel = GiaHangHoa::where('id',$inputs['id'])->delete();

            $model = GiaHangHoa::where('mahs',$inputs['mahs'])->get();
            $dmhanghoa = array_column(DmHangHoa::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($model as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            //$result['message'] .= '<div class="table-responsive">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr style="background: #F5F5F5">';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Mã hàng hóa</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hóa dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá từ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá đến</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center">Nguồn tin</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="12%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key+1).'</td>';
                    $result['message'] .= '<td>'.$tents->mahh.'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatu).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giaden).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.number_format($tents->soluong).'</td>';
                    $result['message'] .= '<td>'.$tents->nguontin.'</td>';
                    $result['message'] .= '<td>'.$tents->gc.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$tents->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        .'</td>';
                    $result['message'] .= '</tr>';
                }

            }else{
                $result['message'] .= '<td colspan="9" style="text-align: center">Chưa có thông tin</td>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            //$result['message'] .= '</div>';
            $result['message'] .= '</div>';
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
        $message .= '<th style="text-align: center">Khu vực</th>';
        $message .= '<th style="text-align: center">Vị trí 1</th>';
        $message .= '<th style="text-align: center">Vị trí 2</th>';
        $message .= '<th style="text-align: center">Vị trí 3</th>';
        $message .= '<th style="text-align: center">Vị trí 4</th>';
        $message .= '<th style="text-align: center" width="15%">Thao tác</th>';
        $message .= '</tr>';
        $message .= '</thead>';
        $message .= '<tbody id="ttts">';
        if(count($chitiet) > 0) {
            foreach ($chitiet as $key => $ct) {
                $message .= '<tr id="' . $ct->id . '">';
                $message .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                $message .= '<td class="active">' . $ct->khuvuc . '</td>';
                $message .= '<td style="text-align: right">' . number_format($ct->vitri1) . '</td>';
                $message .= '<td style="text-align: right">' . number_format($ct->vitri2) . '</td>';
                $message .= '<td style="text-align: right">' . number_format($ct->vitri3) . '</td>';
                $message .= '<td style="text-align: right">' . number_format($ct->vitri4) . '</td>';
                $message .= '<td>' .
                    '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem(' . $ct->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                    '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow(' . $ct->id . ')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                    . '</td>';
                $message .= '</tr>';
            }
            $message .= '</tbody>';
            $message .= '</table>';
            $message .= '</div>';
            $message .= '</div>';
        }
        else{
            $message .= '<tr>';
            $message .= '<td colspan="8" style="text-align: center">Chưa có thông tin</td>';
            $message .= '</tr>';
            $message .= '</tbody>';
        }
        return $message;
    }

}
