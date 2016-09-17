<?php

namespace App\Http\Controllers;

use App\DmHhTn55;
use App\GiaHhTt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaHhTtController extends Controller
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

        $inputs['soluong'] = str_replace(',','',$inputs['soluong']);
        $inputs['soluong'] = str_replace('.','',$inputs['soluong']);
        $inputs['giatu'] = str_replace(',','',$inputs['giatu']);
        $inputs['giatu'] = str_replace('.','',$inputs['giatu']);
        $inputs['giaden'] = str_replace(',','',$inputs['giaden']);
        $inputs['giaden'] = str_replace('.','',$inputs['giaden']);

        if($inputs['mahh']!=''){
            $modelts = new GiaHhTt();
            $modelts->masopnhom = $inputs['masopnhom'];
            $modelts->mahh = $inputs['mahh'];
            $modelts->giatu  =$inputs['giatu'];
            $modelts->giaden = $inputs['giaden'];
            $modelts->soluong = $inputs['soluong'];
            $modelts->nguontin = $inputs['nguontin'];
            $modelts->gc = $inputs['gc'];
            $modelts->mahs = $inputs['mahs'];
            $modelts->save();

            $model = GiaHhTt::where('mahs',$inputs['mahs'])
                ->get();
            $modeldm = DmHhTn55::all();

            foreach($model as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }

            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
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
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
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

            $model = GiaHhTt::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Mã số phân nhóm<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="masopnhomedit" id="masopnhomedit" class="form-control" value="'.$model->masopnhom.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Mã hàng hóa<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="mahhedit" id="mahhedit" class="form-control" value="'.$model->mahh.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá từ<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giatuedit" id="giatuedit" class="form-control"  data-mask="fdecimal" value="'.$model->giatu.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá đến<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giadenedit" id="giadenedit" class="form-control" data-mask="fdecimal" value="'.$model->giaden.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số lượng<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="soluongedit" id="soluongedit" class="form-control"  data-mask="fdecimal" value="'.$model->soluong.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguồn tin<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguontinedit" id="nguontinedit" class="form-control" value="'.$model->nguontin.'"></div>';
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

            $inputs['soluong'] = str_replace(',','',$inputs['soluong']);
            $inputs['soluong'] = str_replace('.','',$inputs['soluong']);
            $inputs['giatu'] = str_replace(',','',$inputs['giatu']);
            $inputs['giatu'] = str_replace('.','',$inputs['giatu']);
            $inputs['giaden'] = str_replace(',','',$inputs['giaden']);
            $inputs['giaden'] = str_replace('.','',$inputs['giaden']);

            $modelupdate = GiaHhTt::where('id',$inputs['id'])
                ->first();
            $modelupdate->masopnhom = $inputs['masopnhom'];
            $modelupdate->mahh = $inputs['mahh'];
            $modelupdate->giatu  =$inputs['giatu'];
            $modelupdate->giaden = $inputs['giaden'];
            $modelupdate->soluong = $inputs['soluong'];
            $modelupdate->nguontin = $inputs['nguontin'];
            $modelupdate->gc = $inputs['gc'];
            $modelupdate->save();

            $model = GiaHhTt::where('mahs',$inputs['mahs'])
                ->get();
            $modeldm = DmHhTn55::all();

            foreach($model as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key+1).'</td>';
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
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }

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
            $modeldel = GiaHhTt::where('id',$inputs['id'])
                ->delete();

            $model = GiaHhTt::where('mahs',$inputs['mahs'])
                ->get();
            $modeldm = DmHhTn55::all();

            foreach($model as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td>'.($key+1).'</td>';
                    $result['message'] .= '<td>'.$tents->tenhh.'</td>';
                    $result['message'] .= '<td>'.number_format($tents->giatu).'</td>';
                    $result['message'] .= '<td>'.number_format($tents->giaden).'</td>';
                    $result['message'] .= '<td>'.number_format($tents->soluong).'</td>';
                    $result['message'] .= '<td>'.$tents->nguontin.'</td>';
                    $result['message'] .= '<td>'.$tents->gc.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$tents->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
            else{
                $result['message'] .= '<tr>';
                $result['message'] .= '<td colspan="8" style="text-align: center">Chưa có thông tin</td>';
                $result['message'] .= '</tr>';
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }

    public function gettenhh($mahh,$array){
        foreach($mahh as $tt){
            if($tt->mahh == $array->mahh){
                $array->tenhh = $tt->tenhh;
                break;
            }
        }


    }
}
