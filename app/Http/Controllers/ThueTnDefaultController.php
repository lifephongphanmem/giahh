<?php

namespace App\Http\Controllers;

use App\DMThueTN;
use App\ThueTnDefault;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThueTnDefaultController extends Controller
{
    public function gettthh(Request $request)
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
        //dd($inputs);
        if(isset($inputs['mapnhom'])){
            $model = DMThueTN::where('masopnhom',$inputs['mapnhom'])->get();

            $result['message'] = '<div id="tthh">';
            $result['message'] .= '<select class="form-control select2me" name="mahh" id="mahh">';
            $result['message'] .= '<option value="">--Chọn tài nguyên--</option>';
            foreach($model as $tt){
                $result['message'] .= '<option value="'.$tt->mahh.'">'.$tt->tenhh.'</option>';
            }
            $result['message'] .= '</select>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

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

        $mahh =$inputs['mahh'];
        $mahuyen = session('admin')->mahuyen;
        $m_kt=ThueTnDefault::where('mahh',$mahh)->where('mahuyen',$mahuyen)->get();
        if(count($m_kt)>0){
            $result = array(
                'status' => 'fail',
                'message' => 'Tài nguyên này đã kê khai chi tiết.',
            );
            die(json_encode($result));
        }

        $inputs['soluong'] = str_replace(',','',$inputs['soluong']);
        $inputs['soluong'] = str_replace('.','',$inputs['soluong']);
        $inputs['giatu'] = str_replace(',','',$inputs['giatu']);
        $inputs['giatu'] = str_replace('.','',$inputs['giatu']);
        $inputs['giaden'] = str_replace(',','',$inputs['giaden']);
        $inputs['giaden'] = str_replace('.','',$inputs['giaden']);

        if($inputs['mahh']!=''){
            $modelts = new ThueTnDefault();
            $modelts->masopnhom = $inputs['masopnhom'];
            $modelts->mahh = $inputs['mahh'];
            $modelts->giatu  =$inputs['giatu'];
            $modelts->giaden = $inputs['giaden'];
            $modelts->soluong = $inputs['soluong'];
            $modelts->nguontin = $inputs['nguontin'];
            $modelts->gc = $inputs['gc'];
            $modelts->mahuyen = session('admin')->mahuyen;
            $modelts->save();

            $model = ThueTnDefault::where('mahuyen',session('admin')->mahuyen)->get();
            $dmhanghoa = array_column(DMThueTN::get()->toarray(),'tenhh','mahh');
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
            $result['message'] .= '</div>';
            //$result['message'] .= '</div>';
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

            $model = ThueTnDefault::where('id',$inputs['id'])->first();
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

            $modelupdate = ThueTnDefault::where('id',$inputs['id'])
                ->first();
            $modelupdate->masopnhom = $inputs['masopnhom'];
            $modelupdate->mahh = $inputs['mahh'];
            $modelupdate->giatu  =$inputs['giatu'];
            $modelupdate->giaden = $inputs['giaden'];
            $modelupdate->soluong = $inputs['soluong'];
            $modelupdate->nguontin = $inputs['nguontin'];
            $modelupdate->gc = $inputs['gc'];
            $modelupdate->save();

            $model = ThueTnDefault::where('mahuyen',session('admin')->mahuyen)->get();
            $dmhanghoa = array_column(DMThueTN::get()->toarray(),'tenhh','mahh');
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
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                //$result['message'] .= '</div>';
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
            $modeldel = ThueTnDefault::where('id',$inputs['id'])->delete();

            $model = ThueTnDefault::where('mahuyen',session('admin')->mahuyen)->get();
            $dmhanghoa = array_column(DMThueTN::get()->toarray(),'tenhh','mahh');
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
            $result['message'] .= '</div>';
            //$result['message'] .= '</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }
}
