<?php

namespace App\Http\Controllers;

use App\TtTsNhaDat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TtTsNhaDatController extends Controller
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
        $inputs['sotang'] = str_replace(',','',$inputs['sotang']);
        $inputs['sotang'] = str_replace('.','',$inputs['sotang']);
        $inputs['dientich'] = str_replace(',','',$inputs['dientich']);
        $inputs['dientich'] = str_replace('.','',$inputs['dientich']);
        $inputs['tyleclcl'] = str_replace(',','',$inputs['tyleclcl']);
        $inputs['tyleclcl'] = str_replace('.','',$inputs['tyleclcl']);
        $inputs['nguyengia'] = str_replace(',','',$inputs['nguyengia']);
        $inputs['nguyengia'] = str_replace('.','',$inputs['nguyengia']);
        $inputs['giatricl'] = str_replace(',','',$inputs['giatricl']);
        $inputs['giatricl'] = str_replace('.','',$inputs['giatricl']);

        if(isset($inputs['tents']) && $inputs['tents']!= ''){
            $modelts = new TtTsNhaDat();
            $modelts->tents = $inputs['tents'];
            $modelts->slts = $inputs['slts'];
            $modelts->sotang  =$inputs['sotang'];
            $modelts->dientich = $inputs['dientich'];
            $modelts->tyleclcl = $inputs['tyleclcl'];
            $modelts->nguyengia = $inputs['nguyengia'];
            $modelts->giatricl = $inputs['giatricl'];
            $modelts->mahs = $inputs['mahs'];
            $modelts->save();

            $model = TtTsNhaDat::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td>'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->slts).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->sotang).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->dientich).'</td>';
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

            $model = TtTsNhaDat::where('id',$inputs['id'])
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
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số tầng<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="sotangedit" id="sotangtedit" class="form-control" data-mask="fdecimal" value="'.$model->sotang.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Diện tích (m<sup>2</sup>)<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dientichedit" id="dientichedit" class="form-control" data-mask="fdecimal" value="'.$model->dientich.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Tỷ lệ chất lượng còn lại (%)<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tyleclcledit" id="tyleclcledit" class="form-control" data-mask="fdecimal" value="'.$model->tyleclcl.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguyên giá<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguyengiaedit" id="nguyengiaedit" class="form-control" data-mask="fdecimal" value="'.$model->nguyengia.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị còn lại<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giatricledit" id="giatricledit" class="form-control"  data-mask="fdecimal" value="'.$model->giatricl.'"></div>';
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
            $inputs['sotang'] = str_replace(',','',$inputs['sotang']);
            $inputs['sotang'] = str_replace('.','',$inputs['sotang']);
            $inputs['dientich'] = str_replace(',','',$inputs['dientich']);
            $inputs['dientich'] = str_replace('.','',$inputs['dientich']);
            $inputs['tyleclcl'] = str_replace(',','',$inputs['tyleclcl']);
            $inputs['tyleclcl'] = str_replace('.','',$inputs['tyleclcl']);
            $inputs['nguyengia'] = str_replace(',','',$inputs['nguyengia']);
            $inputs['nguyengia'] = str_replace('.','',$inputs['nguyengia']);
            $inputs['giatricl'] = str_replace(',','',$inputs['giatricl']);
            $inputs['giatricl'] = str_replace('.','',$inputs['giatricl']);

            $modelupdate = TtTsNhaDat::where('id',$inputs['id'])
                ->first();
            $modelupdate->tents = $inputs['tents'];
            $modelupdate->slts = $inputs['slts'];
            $modelupdate->sotang  =$inputs['sotang'];
            $modelupdate->dientich = $inputs['dientich'];
            $modelupdate->tyleclcl = $inputs['tyleclcl'];
            $modelupdate->nguyengia = $inputs['nguyengia'];
            $modelupdate->giatricl = $inputs['giatricl'];
            $modelupdate->save();

            $model = TtTsNhaDat::where('mahs',$modelupdate->mahs)
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->slts).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->sotang).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->dientich).'</td>';
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
            $modeltt = TtTsNhaDat::where('id',$inputs['id'])
                ->first();
            $modeldel = $modeltt->delete();

            $model = TtTsNhaDat::where('mahs',$modeltt->mahs)
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->slts).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->sotang).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->dientich).'</td>';
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
