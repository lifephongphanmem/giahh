<?php

namespace App\Http\Controllers;

use App\HsThamDinhGia;
use App\ThamDinhGia;
use App\ThamDinhGiaDefault;
use App\ThamDinhGiaH;
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
            if($modelts->save()){
                $modelh = new ThamDinhGiaH();
                $modelh->thaotac = 'Thêm mới thông tin tài sản thẩm định';
                $modelh->datanew = json_encode($inputs);
                //$modelh->thaydoi = json_encode($inputs);
                $modelh->mahs = $inputs['mahs'];
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }

            $model = ThamDinhGia::where('mahs',$inputs['mahs'])->get();

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

            $arraymodel = $modelupdate->toarray();
            $arrayold = array_intersect_key($arraymodel,$inputs);
            $arraynew = array_intersect_key($inputs,$arrayold);

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

            if($modelupdate->save()) {
                //add history
                $this->updatehis($arrayold,$arraynew,$inputs['mahs']);
            }

            $model = ThamDinhGia::where('mahs',$inputs['mahs'])->get();
            $result['message'] = $this->return_html($model);
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }

    public function updatehis($dataold,$datanew,$mahs){
        $arrysosanh = array_diff_assoc($datanew,$dataold);

        //dd($dataold);
        if(!empty($arrysosanh)) {
            $thaydoi = '' ;
            foreach ($arrysosanh as $key => $value) {
                foreach ($dataold as $keyold => $valueold) {
                    if ($key == $keyold) {
                        $thaydoi = $thaydoi . $key . ':' . $valueold . '=>' . $value . '; ';
                    }
                }
            }
            $model = new ThamDinhGiaH();
            $model->thaotac = 'Cập nhật, Thay đổi chi tiết hồ sơ thẩm định - Tên tài sản: '.$dataold['tents'].'- '.$dataold['thongsokt'];
            $model->dataold = json_encode($dataold);
            $model->datanew = json_encode($datanew);
            $model->thaydoi = $thaydoi;
            $model->name = session('admin')->name;
            $model->username = session('admin')->username;
            $model->mahs = $mahs;
            $model->save();
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
            $modeldel = ThamDinhGia::where('id',$inputs['id'])
                ->first();
            $mahs = $modeldel->mahs;
            $arraymodeldel = $modeldel->toarray();
            if($modeldel->delete()){
                $modelh = new ThamDinhGiaH();
                $modelh->thaotac = 'Xoá thông tin tài sản thẩm định';
                //$modelh->thaydoi = json_encode($arraymodeldel);
                $modelh->mahs = $mahs;
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }

            $model = ThamDinhGia::where('mahs',$mahs)->get();

            $result['message'] = $this->return_html($model);
            $result['status'] = 'success';
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
            $inputs=$request->all();

            $bd=$inputs['tudong'];
            $sd=$inputs['sodong'];
            $sheet=isset($inputs['sheet'])?$inputs['sheet']-1:0;
            $sheet=$sheet<0?0:$sheet;
            $filename = $madv . date('YmdHis');
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';

            $data = [];
            Excel::load($path, function($reader) use (&$data,$bd,$sd,$sheet) {
                //$reader->getSheet(0): là đối tượng -> dữ nguyên các cột
                //$sheet: là đã tự động lấy dòng đầu tiên làm cột để nhận dữ liệu
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet($sheet);
                //$sheet = $obj->getSheet(0);
                $Row = $sheet->getHighestRow();
                $Row = $sd+$bd > $Row ? $Row : ($sd+$bd);
                $Col = $sheet->getHighestColumn();

                for ($r = $bd; $r <= $Row; $r++)
                {
                    $rowData = $sheet->rangeToArray('A' . $r . ':' . $Col . $r, NULL, TRUE, FALSE);
                    $data[] = $rowData[0];
                }
            });

            foreach($inputs as $key=>$val) {
                $ma=ord($val);
                if($ma>=65 && $ma<=90){
                    $inputs[$key]=$ma-65;
                }
                if($ma>=97 && $ma<=122){
                    $inputs[$key]=$ma-97;
                }
            }

            //dd($data);
            foreach ($data as $row) {
                if($row[$inputs['tents']]=='' || $row[0]==''){
                    //Tên tài sản rỗng => thoát
                    continue;
                }
                $model = new ThamDinhGiaDefault();
                $model->mahuyen = $madv;
                $model->tents = $row[$inputs['tents']];
                $model->thongsokt = isset($row[$inputs['thongsokt']]) ? $row[$inputs['thongsokt']] : '';
                $model->nguongoc = isset($row[$inputs['nguongoc']]) ? $row[$inputs['nguongoc']] : '';
                $model->dvt = isset($row[$inputs['dvt']]) ? $row[$inputs['dvt']] : '';
                $model->sl = isset($row[$inputs['sl']]) ? $row[$inputs['sl']] : 1;
                $model->dacdiempl = isset($row[$inputs['dacdiempl']]) ? $row[$inputs['dacdiempl']] : '';
                $model->giadenghi = isset($row[$inputs['giadenghi']]) ? round($row[$inputs['giadenghi']]) : 0;
                $model->giatritstd = isset($row[$inputs['giatritstd']]) ? round($row[$inputs['giatritstd']]) : 0;
                $model->nguyengiadenghi = isset($row[$inputs['nguyengiadenghi']]) ? round($row[$inputs['nguyengiadenghi']]) : 0;
                $model->nguyengiathamdinh = isset($row[$inputs['nguyengiathamdinh']]) ? round($row[$inputs['nguyengiathamdinh']]) : 0;

                if($model->giatritstd==0){
                    $model->giakththamdinh=$model->giadenghi;
                    $model->giaththamdinh=0;
                }else{
                    $model->giakththamdinh=0;
                    $model->giaththamdinh=$model->giadenghi;
                }
                $model->save();
            }

            $inputs=$request->all();//do sau khi chạy insert chi tiết thì  $inputs bị set lại dữ liệu

            File::Delete($path);
            $m_ts=ThamDinhGiaDefault::where('mahuyen', $madv)->get();
            //dd($m_ts);
            $model=new HsThamDinhGia();
            $model->hosotdgia = $inputs['hosotdgia'];
            $model->diadiem = $inputs['diadiem'];
            $model->thoidiem = $inputs['thoidiem'];
            $model->ppthamdinh = $inputs['ppthamdinh'];
            $model->mucdich = $inputs['mucdich'];
            $model->dvyeucau = $inputs['dvyeucau'];
            $model->thoihan = $inputs['thoihan'];
            $model->sotbkl = $inputs['sotbkl'];
            $model->hosotdgia = $inputs['hosotdgia'];
            $model->nguonvon = $inputs['nguonvon'];
            $model->thuevat = $inputs['thuevat'];
            $model->songaykq = $inputs['songaykq'];

            return view('manage.thamdinhgia.importexcel.index')
                ->with('m_ts',$m_ts)
                ->with('model',$model)
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
            $model->trangthai ='Đang làm';
            $model->quy = Thang2Quy($thang);
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->thuevat = $insert['thuevat'];
            $model->songaykq = $insert['songaykq'];
            $model->nguonvon = $insert['nguonvon'];
            $model->thuevat = $insert['thuevat'];
            $model->mahs = $mahs;
            if($model->save()){
                $m_ts=ThamDinhGiaDefault::select('tents','dacdiempl','thongsokt','nguongoc','dvt','sl','giadenghi','giatritstd','giakththamdinh','giaththamdinh','nguyengiadenghi','nguyengiathamdinh',DB::raw($mahs.' as mahs'))->where('mahuyen',session('admin')->mahuyen)->get()->toarray();
                ThamDinhGia::insert($m_ts);

                $modelh = new ThamDinhGiaH();
                $modelh->thaotac = 'Import hồ sơ thẩm định';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->mahs = $mahs;
                $model->datanew = json_encode($insert);
                $modelh->save();
            }
            return redirect('hoso-thamdinhgia/nam='.getGeneralConfigs()['namhethong']);
        }else{return view('errors.notlogin');}
    }
    //Tải file excel mẫu
    public function getDownload(){
        $file = public_path() . '/data/uploads/excels/THAMDINHGIA.xls';
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
        DB::statement("Update thamdinhgia set gc='".$inputs['thuevat']."' WHERE mahs='".$inputs['mahs']."'");

        $model = ThamDinhGia::where('mahs',$inputs['mahs'])->get();

        $result['message'] = $this->return_html($model);
        $result['status'] = 'success';

        die(json_encode($result));
    }
    
    function return_html($chitiet){
        $message = '<div class="row" id="dsts">';
        $message .= '<div class="col-md-12">';
        $message .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
        $message .= '<thead>';
        $message .= '<tr>';
        $message .= '<th width="2%" style="text-align: center">STT</th>';
        $message .= '<th style="text-align: center">Tên tài sản</th>';
        $message .= '<th style="text-align: center">Thông số</br>kỹ thuật</th>';
        $message .= '<th style="text-align: center">Đơn vị</br>tính</th>';
        $message .= '<th style="text-align: center">Số lượng</th>';
        $message .= '<th style="text-align: center">Đơn giá</br>đề nghị</th>';
        $message .= '<th style="text-align: center">Giá trị</br>đề nghị</th>';
        $message .= '<th style="text-align: center">Đơn giá</br>thẩm định</th>';
        $message .= '<th style="text-align: center">Giá trị</br>thẩm định</th>';
        $message .= '<th style="text-align: center">Ghi chú</th>';
        $message .= '<th style="text-align: center">Thao tác</th>';
        $message .= '</tr>';
        $message .= '</thead>';

        $message .= '<tbody>';
        
        foreach($chitiet as $key=>$tents){
            $message .= '<tr id="'.$tents->id.'">';
            $message .= '<td style="text-align: center">'.($key +1).'</td>';
            $message .= '<td class="active">'.$tents->tents.'</td>';
            $message .= '<td>'.$tents->thongsokt.'</td>';
            //$message .= '<td>'.$tents->nguongoc.'</td>';
            $message .= '<td>'.$tents->dvt.'</td>';
            $message .= '<td>'.number_format($tents->sl).'</td>';
            $message .= '<td style="text-align: right">'.number_format($tents->nguyengiadenghi).'</td>';
            $message .= '<td style="text-align: right">'.number_format($tents->giadenghi).'</td>';
            $message .= '<td style="text-align: right">'.number_format($tents->nguyengiathamdinh).'</td>';
            $message .= '<td style="text-align: right">'.number_format($tents->giatritstd).'</td>';
            $message .= '<td>'.$tents->gc.'</td>';
            $message .= '<td>'.
                '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                '<button type="button" data-target="#modal-delete-ts" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tents->id.');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                .'</td>';
            $message .= '</tr>';
        }
        
        $message .= '</tbody>';
        $message .= '</table>';
        $message .= '</div>';
        $message .= '</div>';
            
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

        $model = HsThamDinhGia::find($inputs['id']);

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