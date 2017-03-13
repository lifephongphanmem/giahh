<?php

namespace App\Http\Controllers;

use App\ThamDinhGiaDefault;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ThamDinhGiaDefaultController extends Controller
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

        $inputs['sl'] = str_replace(',','',$inputs['sl']);
        $inputs['sl'] = str_replace('.','',$inputs['sl']);
        $inputs['nguyengiadenghi'] = str_replace(',','',$inputs['nguyengiadenghi']);
        $inputs['nguyengiadenghi'] = str_replace('.','',$inputs['nguyengiadenghi']);
        $inputs['giadenghi'] = str_replace(',','',$inputs['giadenghi']);
        $inputs['giadenghi'] = str_replace('.','',$inputs['giadenghi']);
        $inputs['nguyengiathamdinh'] = str_replace(',','',$inputs['nguyengiathamdinh']);
        $inputs['nguyengiathamdinh'] = str_replace('.','',$inputs['nguyengiathamdinh']);
        $inputs['giatritstd'] = str_replace(',','',$inputs['giatritstd']);
        $inputs['giatritstd'] = str_replace('.','',$inputs['giatritstd']);

        if(isset($inputs['tents']) &&  $inputs['tents']!=''){
            $modelts = new ThamDinhGiaDefault();
            $modelts->tents = $inputs['tents'];
            $modelts->dacdiempl = $inputs['dacdiempl'];
            $modelts->thongsokt  =$inputs['thongsokt'];
            $modelts->nguongoc = $inputs['nguongoc'];
            $modelts->dvt = $inputs['dvt'];
            $modelts->sl = $inputs['sl'];
            $modelts->nguyengiadenghi = $inputs['nguyengiadenghi'];
            $modelts->giadenghi = $inputs['giadenghi'];
            $modelts->nguyengiathamdinh = $inputs['nguyengiathamdinh'];
            $modelts->giatritstd = $inputs['giatritstd'];
            if($inputs['giatritstd'] == 0) {
                $modelts->giakththamdinh = $inputs['giadenghi'];
                $modelts->giaththamdinh = 0;
            }else {
                $modelts->giakththamdinh = 0;
                $modelts->giaththamdinh = $inputs['giadenghi'];
            }
            $modelts->gc = $inputs['gc'];
            $modelts->mahuyen = session('admin')->mahuyen;
            $modelts->save();

            $model = ThamDinhGiaDefault::where('mahuyen',session('admin')->mahuyen)
                ->get();


            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản</th>';
            //$result['message'] .= '<!--th style="text-align: center">Nguồn gốc</th-->';
            $result['message'] .= '<th style="text-align: center">Đơn vị</br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    //$result['message'] .= '<td>'.$tents->thongsokt.'</td>';
                    //$result['message'] .= '<td>'.$tents->nguongoc.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
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
                $result['message'] .= '</div>';
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

            $model = ThamDinhGiaDefault::where('id',$inputs['id'])
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
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá đề nghị<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguyengiadenghiedit" id="nguyengiadenghiedit" class="form-control"  data-mask="fdecimal" value="'.$model->nguyengiadenghi.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị đề nghị<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giadenghiedit" id="giadenghiedit" class="form-control"  data-mask="fdecimal" value="'.$model->giadenghi.'"></div>';
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

            $inputs['sl'] = str_replace(',','',$inputs['sl']);
            $inputs['sl'] = str_replace('.','',$inputs['sl']);
            $inputs['nguyengiadenghi'] = str_replace(',','',$inputs['nguyengiadenghi']);
            $inputs['nguyengiadenghi'] = str_replace('.','',$inputs['nguyengiadenghi']);
            $inputs['giadenghi'] = str_replace(',','',$inputs['giadenghi']);
            $inputs['giadenghi'] = str_replace('.','',$inputs['giadenghi']);
            $inputs['nguyengiathamdinh'] = str_replace(',','',$inputs['nguyengiathamdinh']);
            $inputs['nguyengiathamdinh'] = str_replace('.','',$inputs['nguyengiathamdinh']);
            $inputs['giatritstd'] = str_replace(',','',$inputs['giatritstd']);
            $inputs['giatritstd'] = str_replace('.','',$inputs['giatritstd']);

            $modelupdate = ThamDinhGiaDefault::where('id',$inputs['id'])
                ->first();
            $modelupdate->tents = $inputs['tents'];
            $modelupdate->dacdiempl = $inputs['dacdiempl'];
            $modelupdate->thongsokt  =$inputs['thongsokt'];
            $modelupdate->nguongoc = $inputs['nguongoc'];
            $modelupdate->dvt = $inputs['dvt'];
            $modelupdate->sl = $inputs['sl'];
            $modelupdate->nguyengiadenghi = $inputs['nguyengiadenghi'];
            $modelupdate->giadenghi = $inputs['giadenghi'];
            $modelupdate->nguyengiathamdinh = $inputs['nguyengiathamdinh'];
            $modelupdate->giatritstd = $inputs['giatritstd'];
            if($inputs['giatritstd'] == 0) {
                $modelupdate->giakththamdinh = $inputs['giadenghi'];
                $modelupdate->giaththamdinh = 0;
            }else {
                $modelupdate->giakththamdinh = 0;
                $modelupdate->giaththamdinh = $inputs['giadenghi'];
            }
            $modelupdate->gc = $inputs['gc'];
            $modelupdate->save();

            $model = ThamDinhGiaDefault::where('mahuyen',session('admin')->mahuyen)
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản</th>';
            //$result['message'] .= '<!--th style="text-align: center">Nguồn gốc</th-->';
            $result['message'] .= '<th style="text-align: center">Đơn vị</br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key+1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    //$result['message'] .= '<td>'.$tents->thongsokt.'</td>';
                    //$result['message'] .= '<td>'.$tents->nguongoc.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
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
                $result['message'] .= '</div>';
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
            ThamDinhGiaDefault::where('id',$inputs['id'])->delete();
            $model = ThamDinhGiaDefault::where('mahuyen',session('admin')->mahuyen)->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị</br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
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
                $result['message'] .= '</div>';

                $result['status'] = 'success';
            }

        }
        die(json_encode($result));
    }

    public function importExcel(Request $request)
    {
        if ( !Input::hasFile('file')) {
            echo 'cancel';
        }else
            echo 'ok';
    }

    public function thuevat(Request $request){
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
        DB::statement("Update thamdinhgia_default set gc='".$inputs['thuevat']."' WHERE mahuyen='".session('admin')->mahuyen."'");


        $model = ThamDinhGiaDefault::where('mahuyen',session('admin')->mahuyen)->get();

        $result['message'] = '<div class="row" id="dsts">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
        $result['message'] .= '<thead>';
        $result['message'] .= '<tr>';
        $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
        $result['message'] .= '<th style="text-align: center">Tên tài sản</th>';
        $result['message'] .= '<th style="text-align: center">Đơn vị</br>tính</th>';
        $result['message'] .= '<th style="text-align: center">Số lượng</th>';
        $result['message'] .= '<th style="text-align: center">Đơn giá</br>đề nghị</th>';
        $result['message'] .= '<th style="text-align: center">Giá trị</br>đề nghị</th>';
        $result['message'] .= '<th style="text-align: center">Đơn giá</br>thẩm định</th>';
        $result['message'] .= '<th style="text-align: center">Giá trị</br>thẩm định</th>';
        $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
        $result['message'] .= '<th style="text-align: center">Thao tác</th>';
        $result['message'] .= '</tr>';
        $result['message'] .= '</thead>';

        $result['message'] .= '<tbody id="ttts">';
        if(count($model) > 0){
            foreach($model as $key=>$tents){
                $result['message'] .= '<tr id="'.$tents->id.'">';
                $result['message'] .= '<td style="text-align: center">'.($key+1).'</td>';
                $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                $result['message'] .= '<td>'.$tents->dvt.'</td>';
                $result['message'] .= '<td>'.number_format($tents->sl).'</td>';
                $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
                $result['message'] .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
                $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
                $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
                $result['message'] .= '<td>'.$tents->gc.'</td>';
                $result['message'] .= '<td>'.
                    '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                    '<button type="button" data-target="#modal-delete-ts" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tents->id.');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                    .'</td>';
                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }
}
