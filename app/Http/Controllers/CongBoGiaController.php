<?php

namespace App\Http\Controllers;

use App\CongBoGia;
use App\CongBoGiaDefault;
use App\HsCongBoGia;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class CongBoGiaController extends Controller
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

        if(isset($inputs['tents']) || $inputs['tents'] != ''){
            $modelts = new CongBoGia();
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

            $model = CongBoGia::where('mahs',$inputs['mahs'])->get();
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

            $model = CongBoGia::where('id',$inputs['id'])
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

        if(isset($inputs['id'])) {

            $inputs['sl'] = str_replace(',', '', $inputs['sl']);
            $inputs['sl'] = str_replace('.', '', $inputs['sl']);
            $inputs['nguyengiadenghi'] = str_replace(',', '', $inputs['nguyengiadenghi']);
            $inputs['nguyengiadenghi'] = str_replace('.', '', $inputs['nguyengiadenghi']);
            $inputs['giadenghi'] = str_replace(',', '', $inputs['giadenghi']);
            $inputs['giadenghi'] = str_replace('.', '', $inputs['giadenghi']);
            $inputs['nguyengiathamdinh'] = str_replace(',', '', $inputs['nguyengiathamdinh']);
            $inputs['nguyengiathamdinh'] = str_replace('.', '', $inputs['nguyengiathamdinh']);
            $inputs['giatritstd'] = str_replace(',', '', $inputs['giatritstd']);
            $inputs['giatritstd'] = str_replace('.', '', $inputs['giatritstd']);

            $modelupdate = CongBoGia::where('id', $inputs['id'])
                ->first();
            $modelupdate->tents = $inputs['tents'];
            $modelupdate->dacdiempl = $inputs['dacdiempl'];
            $modelupdate->thongsokt = $inputs['thongsokt'];
            $modelupdate->nguongoc = $inputs['nguongoc'];
            $modelupdate->dvt = $inputs['dvt'];
            $modelupdate->sl = $inputs['sl'];
            $modelupdate->nguyengiadenghi = $inputs['nguyengiadenghi'];
            $modelupdate->giadenghi = $inputs['giadenghi'];
            $modelupdate->nguyengiathamdinh = $inputs['nguyengiathamdinh'];
            $modelupdate->giatritstd = $inputs['giatritstd'];
            if ($inputs['giatritstd'] == 0) {
                $modelupdate->giakththamdinh = $inputs['giadenghi'];
                $modelupdate->giaththamdinh = 0;
            } else {
                $modelupdate->giakththamdinh = 0;
                $modelupdate->giaththamdinh = $inputs['giadenghi'];
            }
            $modelupdate->gc = $inputs['gc'];
            $modelupdate->save();

            $model = CongBoGia::where('mahs', $inputs['mahs'])->get();
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
            $modeldel = CongBoGia::where('id',$inputs['id'])
                ->first();
            $mahs = $modeldel->mahs;
            $modeldel->delete();

            $model = CongBoGia::where('mahs',$mahs)->get();
            $result['message'] = $this->return_html($model);
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function search(){
        if(Session::has('admin')){
            $modeldv = TtPhongBan::all();
            return view('manage.congbogia.search.create')
                ->with('modeldv',$modeldv)
                ->with('pageTitle','Tìm kiếm thông tin công bố giá');

        }else
            return view('errors.notlogin');
    }

    public function viewsearch(Request $request){
        if(Session::has('admin')){
            $_sql="select hscongbogia.ngaynhap, hscongbogia.plhs,hscongbogia.nguonvon,hscongbogia.sotbkl,
                          congbogia.tents,congbogia.dvt,congbogia.sl,congbogia.giatritstd,congbogia.thongsokt,congbogia.nguongoc
                                        from hscongbogia, congbogia
                                        Where hscongbogia.mahs=congbogia.mahs";
            $input=$request->all();

            //Thời gian nhập
            //Từ
            if($input['ngaynhaptu']!=null){
                $_sql=$_sql." and hscongbogia.ngaynhap >='".date('Y-m-d',strtotime($input['ngaynhaptu']))."'";
            }
            //Đến
            if($input['ngaynhapden']!=null){
                $_sql=$_sql." and hscongbogia.ngaynhap <='".date('Y-m-d',strtotime($input['ngaynhapden']))."'";
            }

            $_sql = $input['donvi']!= 'all' ? $_sql. "and hscongbogia.mahuyen = '".$input['donvi']."'":$_sql;

            //Tên tài sản
            $_sql=$input['tents']!=null? $_sql." and congbogia.tents Like '".$input['tents']."%'":$_sql;

            //Từ
            if(getDouble($input['giatritu'])>0)
                $_sql=$_sql." and congbogia.giatritstd >= ".getDouble($input['giatritu']);
            //Đến
            if(getDouble($input['giatriden'])>0)
                $_sql=$_sql." and congbogia.giatritstd <= ".getDouble($input['giatriden']);

            $model =  DB::select(DB::raw($_sql));
            return view('manage.congbogia.search.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin công bố giá');

        }else
            return view('errors.notlogin');
    }

    public function import(){
        if(Session::has('admin')){
            return view('manage.congbogia.importexcel.create')
                ->with('pageTitle','Nhận thông tin công bố giá');

        }else
            return view('errors.notlogin');
    }

    public function showimport(Request $request)
    {
        if (Session::has('admin')) {
            $madv = session('admin')->mahuyen;
            CongBoGiaDefault::where('mahuyen', $madv)->delete();

            $inputs = $request->all();
            $sheet=isset($inputs['sheet'])?$inputs['sheet']-1:0;
            $sheet=$sheet<0?0:$sheet;
            $bd = $inputs['tudong'];
            $sd = $inputs['sodong'];
            $filename = $madv . date('YmdHis');
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';

            $data = [];
            Excel::load($path, function ($reader) use (&$data, $bd, $sd, $sheet) {
                //$reader->getSheet(0): là đối tượng -> dữ nguyên các cột
                //$sheet: là đã tự động lấy dòng đầu tiên làm cột để nhận dữ liệu
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet($sheet);
                $Row = $sheet->getHighestRow();
                $Row = $sd + $bd > $Row ? $Row : ($sd + $bd);
                $Col = $sheet->getHighestColumn();

                for ($r = $bd; $r <= $Row; $r++) {
                    $rowData = $sheet->rangeToArray('A' . $r . ':' . $Col . $r, NULL, TRUE, FALSE);
                    $data[] = $rowData[0];
                }
            });

            foreach ($inputs as $key => $val) {
                $ma = ord($val);
                if ($ma >= 65 && $ma <= 90) {
                    $inputs[$key] = $ma - 65;
                }
                if ($ma >= 97 && $ma <= 122) {
                    $inputs[$key] = $ma - 97;
                }
            }


            foreach ($data as $row) {
                if ($row[$inputs['tents']] == '') {
                    //Tên tài sản rỗng => thoát
                    break;
                }
                $model = new CongBoGiaDefault();
                $model->mahuyen = $madv;
                $model->tents = $row[$inputs['tents']];
                $model->thongsokt = isset($row[$inputs['thongsokt']]) ? $row[$inputs['thongsokt']] : '';
                $model->nguongoc = isset($row[$inputs['nguongoc']]) ? $row[$inputs['nguongoc']] : '';
                $model->dvt = isset($row[$inputs['dvt']]) ? $row[$inputs['dvt']] : '';
                $model->sl = 1;
                $model->giadenghi = isset($row[$inputs['giadenghi']]) ? round($row[$inputs['giadenghi']]) : 0;
                $model->giatritstd = isset($row[$inputs['giatritstd']]) ? round($row[$inputs['giatritstd']]) : 0;
                $model->nguyengiadenghi = isset($row[$inputs['nguyengiadenghi']]) ? round($row[$inputs['nguyengiadenghi']]) : 0;
                $model->nguyengiathamdinh = isset($row[$inputs['nguyengiathamdinh']]) ? round($row[$inputs['nguyengiathamdinh']]) : 0;
                $model->giakththamdinh = 0;
                $model->giaththamdinh = $model->giadenghi;
                $model->save();
            }

            File::Delete($path);
            $m_ts = CongBoGiaDefault::where('mahuyen', $madv)->get();
            //dd($m_ts);
            return view('manage.congbogia.importexcel.index')
                ->with('m_ts', $m_ts)
                ->with('pageTitle', 'Thông tin công bố giá');

        } else
            return view('errors.notlogin');
    }

    public function storeimport(Request $request)
    {
        if(Session::has('admin')) {
            $insert = $request->all();
            $date = date_create($insert['ngaynhap']);
            $thang = date_format($date,'m');
            $mahs = getdate()[0];

            $model = new HsCongBoGia();
            $model->sohs = $insert['sohs'];
            $model->plhs = $insert['plhs'];
            $model->sotbkl = $insert['sotbkl'];
            $model->ngaynhap = $insert['ngaynhap'];
            $model->sovbdn = $insert['sovbdn'];
            $model->nguonvon = $insert['nguonvon'];
            $model->trangthai ='Đang làm';
            if($thang == 1 || $thang == 2 || $thang == 3)
                $model->quy = 1;
            elseif($thang == 4 || $thang == 5 || $thang == 6)
                $model->quy = 2;
            elseif($thang == 7 || $thang == 8 || $thang == 9)
                $model->quy = 3;
            else
                $model->quy = 4;
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->mahs = $mahs;
            if($model->save()){
                $m_ts=CongBoGiaDefault::select('tents','dacdiempl','thongsokt','nguongoc','dvt','sl','giadenghi','giatritstd','giakththamdinh','giaththamdinh','nguyengiadenghi','nguyengiathamdinh',DB::raw($mahs.' as mahs'))->where('mahuyen',session('admin')->mahuyen)->get()->toarray();
                CongBoGia::insert($m_ts);
            }
            return redirect('hoso-congbogia/nam='.date_format($date,'Y').'&pb=all');
        }else
            return view('errors.notlogin');
    }

    //Tải file excel mẫu
    public function getDownload(){
        $file = public_path() . '/data/uploads/excels/CONGBOGIA.xls';
        $headers = array(
            'Content-Type: application/xls',
        );
        return Response::download($file, 'CONGBOGIA.xls', $headers);
    }

    public function create_import(Request $request){
        if(Session::has('admin')){
            if(session('admin') == 'T')
                return redirect('thongtin-congbogia/nam='.getGeneralConfigs()['namhethong'].'&pb=all');
            else
                return redirect('thongtin-congbogia/nam='.getGeneralConfigs()['namhethong'].'&pb='.session('admin')->mahuyen);

        }else
            return view('errors.notlogin');
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
        $message .= '<th style="text-align: center">Đơn giá<br>đề nghị</th>';
        $message .= '<th style="text-align: center">Giá trị<br>đề nghị</th>';
        $message .= '<th style="text-align: center">Đơn giá<br>công bố</th>';
        $message .= '<th style="text-align: center">Giá trị<br>công bố</th>';
        $message .= '<th style="text-align: center">Thao tác</th>';
        $message .= '</tr>';
        $message .= '</thead>';
        $message .= '<tbody id="ttts">';
        if(count($chitiet) > 0){
            foreach($chitiet as $key=>$tents){
                $message .= '<tr id="'.$tents->id.'">';
                $message .= '<td style="text-align: center">'.($key +1).'</td>';
                $message .= '<td class="active">'.$tents->tents.'</td>';
                $message .= '<td>'.$tents->thongsokt.'</td>';
                $message .= '<td>'.$tents->nguongoc.'</td>';
                $message .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                $message .= '<td style="text-align: center">'.number_format($tents->sl).'</td>';
                $message .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
                $message .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
                $message .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
                $message .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
                $message .= '<td>'.
                    '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                    '<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow('.$tents->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                    .'</td>';
                $message .= '</tr>';
            }
            $message .= '</tbody>';
            $message .= '</table>';
            $message .= '</div>';
            $message .= '</div>';
        }
        return $message;
    }

    public function get_attackfile(Request $request)
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
        $inputs = $request->all();

        $model = HsCongBoGia::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 1 </label >';
        if (isset($model->filedk)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->filedk).'">'.$model->filedk.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 2 </label >';
        if (isset($model->filedk1)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->filedk1).'">'.$model->filedk1.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 3 </label >';
        if (isset($model->filedk2)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->filedk2).'">'.$model->filedk2.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 4 </label >';
        if (isset($model->filedk3)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->filedk3).'">'.$model->filedk3.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 5 </label >';
        if (isset($model->filedk4)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->filedk4).'">'.$model->filedk4.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['status'] = 'success';

        die(json_encode($result));
    }
}
