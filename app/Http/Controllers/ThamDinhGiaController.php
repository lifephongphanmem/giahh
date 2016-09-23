<?php

namespace App\Http\Controllers;

use App\ThamDinhGia;
use App\ThamDinhGiaDefault;
use App\TtPhongBan;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

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
        $inputs['nguyengiadenghi'] = str_replace(',','',$inputs['nguyengiadenghi']);
        $inputs['nguyengiadenghi'] = str_replace('.','',$inputs['nguyengiadenghi']);
        $inputs['giadenghi'] = str_replace(',','',$inputs['giadenghi']);
        $inputs['giadenghi'] = str_replace('.','',$inputs['giadenghi']);
        $inputs['nguyengiathamdinh'] = str_replace(',','',$inputs['nguyengiathamdinh']);
        $inputs['nguyengiathamdinh'] = str_replace('.','',$inputs['nguyengiathamdinh']);
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
            $modelts->mahs = $inputs['mahs'];
            $modelts->save();

            $model = ThamDinhGia::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    //$result['message'] .= '<td>'.$tents->thongsokt.'</td>';
                    //$result['message'] .= '<td>'.$tents->nguongoc.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td>'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
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
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguyên giá đề nghị<span class="require">*</span></label>';
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
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguyên giá thẩm định<span class="require">*</span></label>';
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
            $inputs['nguyengiadenghi'] = str_replace(',','',$inputs['nguyengiadenghi']);
            $inputs['nguyengiadenghi'] = str_replace('.','',$inputs['nguyengiadenghi']);
            $inputs['giadenghi'] = str_replace(',','',$inputs['giadenghi']);
            $inputs['giadenghi'] = str_replace('.','',$inputs['giadenghi']);
            $inputs['nguyengiathamdinh'] = str_replace(',','',$inputs['nguyengiathamdinh']);
            $inputs['nguyengiathamdinh'] = str_replace('.','',$inputs['nguyengiathamdinh']);
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

            $model = ThamDinhGia::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key+1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    //$result['message'] .= '<td>'.$tents->thongsokt.'</td>';
                    //$result['message'] .= '<td>'.$tents->nguongoc.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td>'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
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
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'</td>';
                    //$result['message'] .= '<td>'.$tents->thongsokt.'</td>';
                    //$result['message'] .= '<td>'.$tents->nguongoc.'</td>';
                    $result['message'] .= '<td>'.$tents->dvt.'</td>';
                    $result['message'] .= '<td>'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
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
            $modeldv = TtPhongBan::all();
            return view('manage.thamdinhgia.search.create')
                ->with('modeldv',$modeldv)
                ->with('pageTitle','Tìm kiếm thông tin thẩm định giá');

        }else
            return view('errors.notlogin');
    }

    public function viewsearch(Request $request){
        if (Session::has('admin')) {

            $_sql="select hsthamdinhgia.thoidiem, hsthamdinhgia.diadiem,hsthamdinhgia.sotbkl,hsthamdinhgia.dvyeucau,thamdinhgia.tents,
                          thamdinhgia.dvt,thamdinhgia.sl,thamdinhgia.giatritstd,thamdinhgia.thongsokt,thamdinhgia.nguongoc
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

            $_sql = $input['donvi']!= 'all' ? $_sql. "and hsthamdinhgia.mahuyen = '".$input['donvi']."'":$_sql;
            //Nguồn vốn
            $_sql=$input['nguonvon']!=null? $_sql." and hsthamdinhgia.nguonvon = '".$input['nguonvon']."'":$_sql;

            //Tên tài sản
            $_sql=$input['tents']!=null? $_sql." and thamdinhgia.tents Like '".$input['tents']."%'":$_sql;

            //Phương pháp thẩm định
            //$_sql=$input['ppthamdinh']!=null? $_sql." and hsthamdinhgia.ppthamdinh Like '".$input['ppthamdinh']."%'":$_sql;
            //Địa điểm thẩm định
            //$_sql=$input['diadiem']!=null? $_sql." and hsthamdinhgia.diadiem Like '".$input['diadiem']."%'":$_sql;
            //Số thông báo
            $_sql=$input['sotbkl']!=null? $_sql." and hsthamdinhgia.sotbkl Like '".$input['sotbkl']."%'":$_sql;
            //Giá trị tài sản
            //Từ
            //if(getDouble($input['giatritu'])>0)
                //$_sql=$_sql." and thamdinhgia.giatritstd >= ".getDouble($input['giatritu']);
            //Đến
            //if(getDouble($input['giatriden'])>0)
                //$_sql=$_sql." and thamdinhgia.giatritstd <= ".getDouble($input['giatriden']);

            $model =  DB::select(DB::raw($_sql));
            //dd($model);
            return view('manage.thamdinhgia.search.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin tài sản thẩm định giá');
        }else
            return view('errors.notlogin');
    }

    public function import(){
        if(Session::has('admin')){
            return view('manage.thamdinhgia.importexcel.create')
                ->with('pageTitle','Nhận thông tin thẩm định giá');

        }else
            return view('errors.notlogin');
    }

    public function showimport(Request $request){
        if(Session::has('admin')){
            $madv=session('admin')->mahuyen;
            ThamDinhGiaDefault::where('mahuyen', $madv)->delete();

            $tents = chuanhoatruong($request->tents);
            $dacdiempl = chuanhoatruong($request->dacdiempl);
            $thongsokt = chuanhoatruong($request->thongsokt);
            $nguongoc = chuanhoatruong($request->nguongoc);
            $dvt = chuanhoatruong($request->dvt);
            $sl = chuanhoatruong($request->sl);
            $giadenghi = chuanhoatruong($request->giadenghi);
            if (isset($request->giatritstd) && $request->giatritstd != '') {
                $giatritstd = chuanhoatruong($request->giatritstd);
                $filename = $madv . date('YmdHis');
                $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
                $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
                $data = Excel::selectSheetsByIndex(0)->load($path, function ($sheet) {
                    $sheet->get();
                })->get()->toarray();

                //Kiểm tra tên tài sản rỗng => bỏ qua ko chạy
                foreach ($data as $row) {
                    if ($row[$tents] == '') {
                        continue;
                    }
                    $model = new ThamDinhGiaDefault();
                    $model->mahuyen = $madv;
                    $model->tents = $row[$tents];
                    $model->thongsokt = isset($row[$thongsokt]) ? $row[$thongsokt] : '';
                    $model->nguongoc = isset($row[$nguongoc]) ? $row[$nguongoc] : '';
                    $model->dvt = isset($row[$dvt]) ? $row[$dvt] : '';
                    $model->sl = isset($row[$sl]) ? $row[$sl] : 1;
                    $model->giadenghi = isset($row[$giadenghi]) ? $row[$giadenghi] : 0;
                    $model->giatritstd = isset($row[$giatritstd]) ? $row[$giatritstd] : 0;
                    $model->dacdiempl = isset($row[$dacdiempl]) ? $row[$dacdiempl] : '';
                    $model->save();
                }
            }
            File::Delete($path);
            $m_ts=ThamDinhGiaDefault::where('mahuyen', $madv)->get();
            //dd($m_ts);
            return view('manage.thamdinhgia.importexcel.index')
                ->with('m_ts',$m_ts)
                ->with('pageTitle','Thông tin thẩm định giá');

        }else
            return view('errors.notlogin');
    }

    public function storeimport(Request $request)
    {
        if(Session::has('admin')) {
            $insert = $request->all();
            $date = date_create($insert['thoidiem']);
            $thang = date_format($date,'m');
            $mahs = getdate()[0];

            $model = new HsThamDinhGia();
            $model->diadiem = $insert['diadiem'];
            $model->thoidiem = $insert['thoidiem'];
            $model->ppthamdinh = $insert['ppthamdinh'];
            $model->mucdich = $insert['mucdich'];
            $model->dvyeucau = $insert['dvyeucau'];
            $model->thoihan = $insert['thoihan'];
            $model->sotbkl = $insert['sotbkl'];
            $model->hosotdgia = $insert['hosotdgia'];
            $model->thang = date_format($date,'m');
            if($thang == 1 || $thang == 2 || $thang == 3)
                $model->quy = 1;
            elseif($thang == 4 || $thang == 5 || $thang == 6)
                $model->quy = 2;
            elseif($thang == 7 || $thang == 8 || $thang == 9)
                $model->quy = 3;
            else
                $model->quy = 4;
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->mahs = $mahs;
            if($model->save()){
                $m_ts=ThamDinhGiaDefault::select('tents','dacdiempl','thongsokt','nguongoc','dvt','sl','giadenghi','giatritstd',DB::raw($mahs.' as mahs'))->where('mahuyen',session('admin')->mahuyen)->get()->toarray();
                ThamDinhGia::insert($m_ts);
            }
            return redirect('thongtin-thamdinhgia/nam='.getGeneralConfigs()['namhethong'].'&pb=all');
        }else{return view('errors.notlogin');}
    }
    //Tải file excel mẫu
    public function getDownload(){
        $file = public_path() . '/data/uploads/excels/FILEMAU.xls';
        $headers = array(
            'Content-Type: application/xls',
        );
        return Response::download($file, 'THAMDINHGIA.xls', $headers);
    }

    public function create_import(Request $request){
        if(Session::has('admin')){
            if(session('admin') == 'T')
                return redirect('hoso-thamdinhgia/nam='.getGeneralConfigs()['namhethong'].'&pb=all');
            else
                return redirect('hoso-thamdinhgia/nam='.getGeneralConfigs()['namhethong'].'&pb='.session('admin')->mahuyen);

        }else
            return view('errors.notlogin');
    }
}