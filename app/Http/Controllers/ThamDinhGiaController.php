<?php

namespace App\Http\Controllers;

use App\ThamDinhGia;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ThamDinhGiaController extends Controller
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
        $inputs['giadenghi'] = str_replace(',','',$inputs['giadenghi']);
        $inputs['giadenghi'] = str_replace('.','',$inputs['giadenghi']);
        $inputs['giatritstd'] = str_replace(',','',$inputs['giatritstd']);
        $inputs['giatritstd'] = str_replace('.','',$inputs['giatritstd']);

        if(isset($inputs['tents'])){
            $modelts = new ThamDinhGia();
            $modelts->tents = $inputs['tents'];
            $modelts->dacdiempl = $inputs['dacdiempl'];
            $modelts->thongsokt  =$inputs['thongsokt'];
            $modelts->nguongoc = $inputs['nguongoc'];
            $modelts->dvt = $inputs['dvt'];
            $modelts->sl = $inputs['sl'];
            $modelts->giadenghi = $inputs['giadenghi'];
            $modelts->giatritstd = $inputs['giatritstd'];
            $modelts->gc = $inputs['gc'];
            $modelts->mahs = $inputs['mahs'];
            $modelts->save();

            $model = ThamDinhGia::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td>'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td>'.$tents->thongsokt.'</td>';
                    $result['message'] .= '<td>'.$tents->nguongoc.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td>'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td>'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td>'.number_format($tents->giatritstd).'</td>';
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

            $model = ThamDinhGia::where('id',$inputs['id'])
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
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị đề nghị<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giadenghiedit" id="giadenghiedit" class="form-control"  data-mask="fdecimal" value="'.$model->giadenghi.'"></div>';
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
            $result['message'] .= '<input type="hidden" id="mahsedit" name="mahsedit" value="'.$model->mahs.'">';


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
            $inputs['giadenghi'] = str_replace(',','',$inputs['giadenghi']);
            $inputs['giadenghi'] = str_replace('.','',$inputs['giadenghi']);
            $inputs['giatritstd'] = str_replace(',','',$inputs['giatritstd']);
            $inputs['giatritstd'] = str_replace('.','',$inputs['giatritstd']);

            $modelupdate = ThamDinhGia::where('id',$inputs['id'])
                ->first();
            $modelupdate->tents = $inputs['tents'];
            $modelupdate->dacdiempl = $inputs['dacdiempl'];
            $modelupdate->thongsokt  =$inputs['thongsokt'];
            $modelupdate->nguongoc = $inputs['nguongoc'];
            $modelupdate->dvt = $inputs['dvt'];
            $modelupdate->sl = $inputs['sl'];
            $modelupdate->giadenghi = $inputs['giadenghi'];
            $modelupdate->giatritstd = $inputs['giatritstd'];
            $modelupdate->gc = $inputs['gc'];
            $modelupdate->save();

            $model = ThamDinhGia::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td>'.($key+1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td>'.$tents->thongsokt.'</td>';
                    $result['message'] .= '<td>'.$tents->nguongoc.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td>'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td>'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td>'.number_format($tents->giatritstd).'</td>';
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
            $modeldel = ThamDinhGia::where('id',$inputs['id'])
                ->first();
            $mahs = $modeldel->mahs;
            $modeldel->delete();

            $model = ThamDinhGia::where('mahs',$mahs)
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td>'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    $result['message'] .= '<td>'.$tents->thongsokt.'</td>';
                    $result['message'] .= '<td>'.$tents->nguongoc.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td>'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td>'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td>'.number_format($tents->giatritstd).'</td>';
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

    public function search(){
        if(Session::has('admin')){
            return view('manage.thamdinhgia.search.create')
                ->with('pageTitle','Tìm kiếm thông tin thẩm định giá');

        }else
            return view('errors.notlogin');
    }

    public function viewsearch(Request $request){
        if (Session::has('admin')) {

            $_sql="select hsthamdinhgia.thoidiem, hsthamdinhgia.diadiem,thamdinhgia.tents,thamdinhgia.dvt,thamdinhgia.sl,thamdinhgia.giatritstd
                                        from hsthamdinhgia, thamdinhgia
                                        Where hsthamdinhgia.mahs=thamdinhgia.mahs";
            $input=$request->all();

            //Thời gian nhập
            //Từ
            if($input['thoidiemtu']!=null){
                $_sql=$_sql." and hsthamdinhgia.thoidiem >='".date('Y-m-d',strtotime($input['thoidiemtu']))."'";
            }
            //Đến
            if($input['thoidiemden']!=null){
                $_sql=$_sql." and hsthamdinhgia.thoidiem <='".date('Y-m-d',strtotime($input['thoidiemden']))."'";
            }

            //Tên tài sản
            $_sql=$input['tents']!=null? $_sql." and thamdinhgia.tents Like '".$input['tents']."%'":$_sql;
            //Phương pháp thẩm định
            $_sql=$input['ppthamdinh']!=null? $_sql." and hsthamdinhgia.ppthamdinh Like '".$input['ppthamdinh']."%'":$_sql;
            //Địa điểm thẩm định
            $_sql=$input['diadiem']!=null? $_sql." and hsthamdinhgia.diadiem Like '".$input['diadiem']."%'":$_sql;
            //Số thông báo
            $_sql=$input['sotbkl']!=null? $_sql." and hsthamdinhgia.sotbkl Like '".$input['sotbkl']."%'":$_sql;
            //Giá trị tài sản
            //Từ
            if(getDouble($input['giatritu'])>0)
                $_sql=$_sql." and thamdinhgia.giatritstd >= ".getDouble($input['giatritu']);
            //Đến
            if(getDouble($input['giatriden'])>0)
                $_sql=$_sql." and thamdinhgia.giatritstd <= ".getDouble($input['giatriden']);

            $model =  DB::select(DB::raw($_sql));
            //dd($model);
            return view('manage.thamdinhgia.search.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin tài sản thẩm định giá');
        }else
            return view('errors.notlogin');
    }
}
