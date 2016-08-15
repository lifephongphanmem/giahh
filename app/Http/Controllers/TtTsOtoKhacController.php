<?php

namespace App\Http\Controllers;

use App\TtTsOtoKhac;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TtTsOtoKhacController extends Controller
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

        $inputs['slts'] = str_replace(',','',$inputs['slts']);
        $inputs['slts'] = str_replace('.','',$inputs['slts']);
        $inputs['tyleclcl'] = str_replace(',','',$inputs['tyleclcl']);
        $inputs['tyleclcl'] = str_replace('.','',$inputs['tyleclcl']);
        $inputs['nguyengia'] = str_replace(',','',$inputs['nguyengia']);
        $inputs['nguyengia'] = str_replace('.','',$inputs['nguyengia']);
        $inputs['giatricl'] = str_replace(',','',$inputs['giatricl']);
        $inputs['giatricl'] = str_replace('.','',$inputs['giatricl']);

        if(isset($inputs['tents']) && $inputs['tents']!= ''){
            $modelts = new TtTsOtoKhac();
            $modelts->tents = $inputs['tents'];
            $modelts->slts = $inputs['slts'];
            $modelts->tskt  =$inputs['tskt'];
            $modelts->tyleclcl = $inputs['tyleclcl'];
            $modelts->nguyengia = $inputs['nguyengia'];
            $modelts->giatricl = $inputs['giatricl'];
            $modelts->mahs = $inputs['mahs'];
            $modelts->save();

            $model = TtTsOtoKhac::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->slts).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.$tents->tskt.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->tyleclcl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengia).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatricl).'</td>';
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

            $model = TtTsOtoKhac::where('id',$inputs['id'])
                ->first();
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Tên tài sản<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tentsedit" id="tentsedit" class="form-control" value="'.$model->tents.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số lượng tài sản<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="sltsedit" id="sltsedit" class="form-control" data-mask="fdecimal" value="'.$model->slts.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thông số kỹ thuật<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tsktedit" id="tsktedit" class="form-control" value="'.$model->tskt.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Tỷ lệ chất lượng còn lại (%)<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tyleclcledit" id="tyleclcledit" class="form-control" data-mask="fdecimal" value="'.$model->tyleclcl.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguyên giá<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguyengiaedit" id="nguyengiaedit" class="form-control" data-mask="fdecimal" value="'.$model->nguyengia.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị còn lại<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giatricledit" id="giatricledit" class="form-control"  data-mask="fdecimal" value="'.$model->giatricl.'"></div>';
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

            $inputs['slts'] = str_replace(',','',$inputs['slts']);
            $inputs['slts'] = str_replace('.','',$inputs['slts']);
            $inputs['tyleclcl'] = str_replace(',','',$inputs['tyleclcl']);
            $inputs['tyleclcl'] = str_replace('.','',$inputs['tyleclcl']);
            $inputs['nguyengia'] = str_replace(',','',$inputs['nguyengia']);
            $inputs['nguyengia'] = str_replace('.','',$inputs['nguyengia']);
            $inputs['giatricl'] = str_replace(',','',$inputs['giatricl']);
            $inputs['giatricl'] = str_replace('.','',$inputs['giatricl']);

            $modelupdate = TtTsOtoKhac::where('id',$inputs['id'])
                ->first();
            $modelupdate->tents = $inputs['tents'];
            $modelupdate->slts = $inputs['slts'];
            $modelupdate->tskt = $inputs['tskt'];
            $modelupdate->tyleclcl = $inputs['tyleclcl'];
            $modelupdate->nguyengia = $inputs['nguyengia'];
            $modelupdate->giatricl = $inputs['giatricl'];
            $modelupdate->save();

            $model = TtTsOtoKhac::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->slts).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.$tents->tskt.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->tyleclcl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengia).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatricl).'</td>';
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


    public function destroy($id)
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
            $modeldel = TtTsOtoKhac::where('id',$inputs['id'])
                ->delete();

            $model = TtTsOtoKhac::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->slts).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.$tents->tskt.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->tyleclcl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengia).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatricl).'</td>';
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
                $result['message'] .= '<td colspan="9" style="text-align: center">Chưa có thông tin</td>';
                $result['message'] .= '</tr>';
                $result['message'] .= '</tbody>';
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }
}
