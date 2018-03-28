<?php

namespace App\Http\Controllers;

use App\CongBoGia;
use App\HsCongBoGia;
use App\HsThamDinhGia;
use App\ThamDinhGia;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class BcTkKhacController extends Controller
{

    public function index()
    {
        if(Session::has('admin')){
            $modeldv = TtPhongBan::all();
            return view('reports.bctkkhac.index')
                ->with('modeldv',$modeldv)
                ->with('pageTitle','Báo cáo thống kê khác');
        }else
            return view('errors.notlogin');
    }

    public function BC1(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            //dd($input);
            if(isset($input['donvi'])){
                if($input['donvi'] == 'all'){
                    $model = HsThamDinhGia::whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                        //->where('nguonvon', $input['nguonvon'])
                        ->where('trangthai', 'Hoàn tất')
                        ->get();
                    $donvi = 'all';

                }else{
                    $model = HsThamDinhGia::whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                        ->where('mahuyen', $input['donvi'])
                        ->where('trangthai', 'Hoàn tất')
                        //->where('nguonvon', $input['nguonvon'])
                        ->get();
                    $donvi = TtPhongBan::where('ma',$input['donvi'])->first();
                }
            }else {
                $model = HsThamDinhGia::whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                    ->where('mahuyen', session('admin')->mahuyen)
                    ->where('trangthai', 'Hoàn tất')
                    //->where('nguonvon', $input['nguonvon'])
                    ->get();
                $donvi = TtPhongBan::where('ma',session('admin')->mahuyen)->first();
            }

            if($input['nguonvon'] != 'ALL'){
                $model = $model->where('nguonvon', $input['nguonvon']);
            }

            //dd($input['nguonvon'] );
            $arraythang='';
            foreach($model as $hs){
                $arraythang = $arraythang.$hs->thang.',';

                $gia = ThamDinhGia::where('mahs',$hs->mahs)->get();

                $hs->sumgiadenghi = $gia->sum('giadenghi');
                $hs->sumgiathamdinh = $gia->sum('giatritstd');

                $hs->sumkththamdinh = $gia->sum('giakththamdinh');
                $hs->sumththamdinh = $gia->sum('giaththamdinh');
                $hs->sumchenhlech =  $gia->sum('giatritstd') - $gia->sum('giaththamdinh');

                if($gia->sum('giadenghi')>0 && $gia->sum('giatritstd')>0)
                    $hs->phantram = $gia->sum('giatritstd') * 100/($gia->sum('giaththamdinh'));
            }
            //$modelthang = $model->groupBy('thang')->get();
            //dd(is_array($arraythang));

            $arraymodel = $model->toarray();
            $arraythang = array_column($arraymodel,'thang');
            $arraythang = array_unique($arraythang);
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);

            $a_nv = array(
                'ALL' => 'Tất cả các nguồn',
                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                'Đầu tư' => 'Nguồn vốn đầu tư',
            );
            $input['nguonvon'] = $a_nv[$input['nguonvon']];
            return view('reports.bctkkhac.laocai.thamdinhgia.BC1')
                ->with('model',$model)
                ->with('arraythang',$arraythang)
                ->with('arrayquy',$arrayquy)
                ->with('arraynam',$arraynam)
                ->with('donvi',$donvi)
                ->with('dk',$input)
                ->with('pageTitle','Kết quả thẩm đinh giá');

        }else
            return view('errors.notlogin');
    }

    public function BC2(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            if(isset($input['donvi'])){
                if($input['donvi'] == 'all'){
                    $model = HsThamDinhGia::whereBetween('thoidiem',array($input['ngaytu'],$input['ngayden']))
                        //->where('nguonvon',$input['nguonvon'])
                        ->where('trangthai', 'Hoàn tất')
                        ->groupBy('thang')
                        ->get();


                }else{
                    $model = HsThamDinhGia::whereBetween('thoidiem',array($input['ngaytu'],$input['ngayden']))
                        ->where('mahuyen',$input['donvi'])
                        ->where('trangthai', 'Hoàn tất')
                        //->where('nguonvon',$input['nguonvon'])
                        ->groupBy('thang')
                        ->get();

                    $donvi = TtPhongBan::where('ma',$input['donvi'])->first();
                }

            }else{
                $model = HsThamDinhGia::whereBetween('thoidiem',array($input['ngaytu'],$input['ngayden']))
                    ->where('mahuyen',session('admin')->mahuyen)
                    ->where('trangthai', 'Hoàn tất')
                   // ->where('nguonvon',$input['nguonvon'])
                    ->groupBy('thang')
                    ->get();

                $donvi = TtPhongBan::where('ma',session('admin')->mahuyen)->first();
            }
            if($input['nguonvon'] != 'ALL'){
                $model = $model->where('nguonvon', $input['nguonvon']);
            }



            foreach($model as $thangs){
                if(isset($input['donvi'])) {
                    if ($input['donvi'] == 'all') {
                        $idhss = HsThamDinhGia::where('thang', $thangs->thang)
                            //->where('nguonvon', $input['nguonvon'])
                            ->whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                            ->where('trangthai', 'Hoàn tất')
                            ->get();
                    } else {
                        $idhss = HsThamDinhGia::where('thang', $thangs->thang)
                            ->where('mahuyen', $input['donvi'])
                            //->where('nguonvon', $input['nguonvon'])
                            ->whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                            ->where('trangthai', 'Hoàn tất')
                            ->get();
                    }
                }else{
                    $idhss = HsThamDinhGia::where('thang', $thangs->thang)
                        ->where('mahuyen',session('admin')->mahuyen)
                        //->where('nguonvon', $input['nguonvon'])
                        ->whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                        ->where('trangthai', 'Hoàn tất')
                        ->get();
                }

                if($input['nguonvon'] != 'ALL'){
                    $idhss = $idhss->where('nguonvon', $input['nguonvon']);
                }

                $tshs = count($idhss);
                $arrayidhs = '';
                foreach($idhss as $idhs){
                    $arrayidhs = $arrayidhs. $idhs->mahs.',';
                }
                $modelgia = ThamDinhGia::wherein('mahs',explode(',',$arrayidhs))->get();

                $thangs->counthoso = $tshs;
                $giadenghi = $modelgia->sum('giadenghi');
                $giaththamdinh = $modelgia->sum('giaththamdinh');
                $giakththamdinh =$modelgia->sum('giakththamdinh');
                $giatritstd = $modelgia->sum('giatritstd');
                $chenhlech = $giatritstd - $giaththamdinh;
                if($giadenghi>0 && $giatritstd >0)
                    $phantram = $giatritstd * 100/$giaththamdinh;
                else
                    $phantram = 0;

                $thangs->giadenghi = $giadenghi;
                $thangs->giaththamdinh = $giaththamdinh;
                $thangs->giakththamdinh =$giakththamdinh;
                $thangs->giatritstd = $giatritstd;
                $thangs->chenhlech = $chenhlech;
                $thangs->phantram = $phantram;

            }
            $arraymodel = $model->toarray();
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);

            $a_nv = array(
                'ALL' => 'Tất cả các nguồn',
                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                'Đầu tư' => 'Nguồn vốn đầu tư',
            );
            $input['nguonvon'] = $a_nv[$input['nguonvon']];

            return view('reports.bctkkhac.laocai.thamdinhgia.BC2')
                ->with('model',$model)
                ->with('arrayquy',$arrayquy)
                ->with('arraynam',$arraynam)
                ->with('donvi',$donvi)
                ->with('dk',$input)
                ->with('pageTitle','Kết quả thẩm đinh giá');

        }else
            return view('errors.notlogin');
    }

    public function BC3(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            if(isset($input['donvi'])){
                if($input['donvi'] == 'all'){
                    $model = HsCongBoGia::whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                        ->where('trangthai', 'Hoàn tất')
                        ->get();
                    $donvi = 'all';
                }else{
                    $model = HsCongBoGia::where('mahuyen',$input['donvi'])
                        ->whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                        ->where('trangthai', 'Hoàn tất')
                        ->get();
                    $donvi = TtPhongBan::where('ma',$input['donvi'])->first();
                }

            }else{
                $model = HsCongBoGia::where('mahuyen',session('admin')->mahuyen)
                    ->where('trangthai', 'Hoàn tất')
                    ->whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                    ->get();
                $donvi = TtPhongBan::where('ma',session('admin')->mahuyen)->first();
            }

            if($input['nguonvon'] != 'ALL'){
                $model = $model->where('nguonvon', $input['nguonvon']);
            }

            foreach($model as $hs){

                $gia = CongBoGia::where('mahs',$hs->mahs)->get();

                $hs->sumgiadenghi = $gia->sum('giadenghi');
                $hs->sumgiathamdinh = $gia->sum('giatritstd');

                $hs->sumkththamdinh = $gia->sum('giakththamdinh');
                $hs->sumththamdinh = $gia->sum('giaththamdinh');
                $hs->sumchenhlech =  $gia->sum('giatritstd') - $gia->sum('giaththamdinh');

                if($gia->sum('giadenghi')>0 && $gia->sum('giatritstd')>0)
                    $hs->phantram = $gia->sum('giatritstd') * 100/($gia->sum('giaththamdinh'));
            }
            $arraymodel = $model->toarray();
            $arraythang = array_column($arraymodel,'thang');
            $arraythang = array_unique($arraythang);
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);

            $a_nv = array(
                'ALL' => 'Tất cả các nguồn',
                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                'Đầu tư' => 'Nguồn vốn đầu tư',
            );
            $input['nguonvon'] = $a_nv[$input['nguonvon']];

            return view('reports.bctkkhac.laocai.congbogia.BC3')
                ->with('model',$model)
                ->with('donvi',$donvi)
                ->with('arraythang',$arraythang)
                ->with('arrayquy',$arrayquy)
                ->with('arraynam',$arraynam)
                ->with('dk',$input)
                ->with('pageTitle','Báo cáo chi tiết');

        }else
            return view('errors.notlogin');
    }

    public function BC4(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            if(isset($input['donvi'])){
                if($input['donvi'] == 'all'){
                    $model = HsCongBoGia::whereBetween('ngaynhap',array($input['ngaytu'],$input['ngayden']))
                        ->where('trangthai', 'Hoàn tất')
                        ->groupBy('thang')
                        ->get();
                    $donvi = 'all';
                }else{

                    $model = HsCongBoGia::where('mahuyen',$input['donvi'])
                        ->whereBetween('ngaynhap',array($input['ngaytu'],$input['ngayden']))
                        ->where('trangthai', 'Hoàn tất')
                        ->groupBy('thang')
                        ->get();
                    $donvi = TtPhongBan::where('ma',$input['donvi'])->first();
                }

            }else{
                $model = HsCongBoGia::where('mahuyen',session('admin')->mahuyen)
                    ->whereBetween('ngaynhap',array($input['ngaytu'],$input['ngayden']))
                    ->where('trangthai', 'Hoàn tất')
                    ->groupBy('thang')
                    ->get();
                $donvi = TtPhongBan::where('ma',session('admin')->mahuyen)->first();
            }

            if($input['nguonvon'] != 'ALL'){
                $model = $model->where('nguonvon', $input['nguonvon']);
            }

            foreach($model as $thangs){
                if(isset($input['donvi'])) {
                    if ($input['donvi'] == 'all') {
                        $idhss = HsCongBoGia::where('thang', $thangs->thang)
                            //->where('nguonvon', $input['nguonvon'])
                            ->whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                            ->where('trangthai', 'Hoàn tất')
                            ->get();
                    } else {
                        $idhss = HsCongBoGia::where('thang', $thangs->thang)
                            ->where('mahuyen', $input['donvi'])
                            //->where('nguonvon', $input['nguonvon'])
                            ->whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                            ->where('trangthai', 'Hoàn tất')
                            ->get();
                    }
                }else{
                    $idhss = HsCongBoGia::where('thang', $thangs->thang)
                        ->where('mahuyen',session('admin')->mahuyen)
                        //->where('nguonvon', $input['nguonvon'])
                        ->whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                        ->where('trangthai', 'Hoàn tất')
                        ->get();
                }

                if($input['nguonvon'] != 'ALL'){
                    $idhss = $idhss->where('nguonvon', $input['nguonvon']);
                }

                $tshs = count($idhss);
                $arrayidhs = '';
                foreach($idhss as $idhs){
                    $arrayidhs = $arrayidhs. $idhs->mahs.',';
                }
                $gia = CongBoGia::wherein('mahs',explode(',',$arrayidhs))->get();
                $thangs->counthoso = $tshs;
                $giadenghi = $gia->sum('giadenghi');
                $giaththamdinh = $gia->sum('giaththamdinh');
                $giakththamdinh =$gia->sum('giakththamdinh');
                $giatritstd = $gia->sum('giatritstd');
                $chenhlech = $giatritstd - $giaththamdinh;
                if($giadenghi>0 && $giatritstd >0)
                    $phantram = $giatritstd * 100/$giaththamdinh;
                else
                    $phantram = 0;

                $thangs->giadenghi = $giadenghi;
                $thangs->giaththamdinh = $giaththamdinh;
                $thangs->giakththamdinh =$giakththamdinh;
                $thangs->giatritstd = $giatritstd;
                $thangs->chenhlech = $chenhlech;
                $thangs->phantram = $phantram;

            }
            $arraymodel = $model->toarray();
            $arraythang = array_column($arraymodel,'thang');
            $arraythang = array_unique($arraythang);
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);

            $a_nv = array(
                'ALL' => 'Tất cả các nguồn',
                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                'Đầu tư' => 'Nguồn vốn đầu tư',
            );
            $input['nguonvon'] = $a_nv[$input['nguonvon']];

            return view('reports.bctkkhac.laocai.congbogia.BC4')
                ->with('model',$model)
                ->with('donvi',$donvi)
                ->with('arraythang',$arraythang)
                ->with('arrayquy',$arrayquy)
                ->with('arraynam',$arraynam)
                ->with('dk',$input)
                ->with('pageTitle','Báo cáo tổng hợp');

        }else
            return view('errors.notlogin');
    }

    public function BC1Excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            //dd($input);
            if(isset($input['donvi'])){
                if($input['donvi'] == 'all'){
                    $model = HsThamDinhGia::whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                        //->where('nguonvon', $input['nguonvon'])
                        ->where('trangthai', 'Hoàn tất')
                        ->get();
                    $donvi = 'all';

                }else{
                    $model = HsThamDinhGia::whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                        ->where('mahuyen', $input['donvi'])
                        ->where('trangthai', 'Hoàn tất')
                        //->where('nguonvon', $input['nguonvon'])
                        ->get();
                    $donvi = TtPhongBan::where('ma',$input['donvi'])->first();
                }
            }else {
                $model = HsThamDinhGia::whereBetween('thoidiem', array($input['ngaytu'], $input['ngayden']))
                    ->where('mahuyen', session('admin')->mahuyen)
                    ->where('trangthai', 'Hoàn tất')
                    //->where('nguonvon', $input['nguonvon'])
                    ->get();
                $donvi = TtPhongBan::where('ma',session('admin')->mahuyen)->first();
            }

            if($input['nguonvon'] != 'ALL'){
                $model = $model->where('nguonvon', $input['nguonvon']);
            }

            //dd($model);
            $arraythang='';
            foreach($model as $hs){
                $arraythang = $arraythang.$hs->thang.',';

                $gia = ThamDinhGia::where('mahs',$hs->mahs)->get();

                $hs->sumgiadenghi = $gia->sum('giadenghi');
                $hs->sumgiathamdinh = $gia->sum('giatritstd');

                $hs->sumkththamdinh = $gia->sum('giakththamdinh');
                $hs->sumththamdinh = $gia->sum('giaththamdinh');
                $hs->sumchenhlech =  $gia->sum('giatritstd') - $gia->sum('giaththamdinh');

                if($gia->sum('giadenghi')>0 && $gia->sum('giatritstd')>0)
                    $hs->phantram = $gia->sum('giatritstd') * 100/($gia->sum('giaththamdinh'));
            }
            //$modelthang = $model->groupBy('thang')->get();
            //dd(is_array($arraythang));
            $a_nv = array(
                'ALL' => 'Tất cả các nguồn',
                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                'Đầu tư' => 'Nguồn vốn đầu tư',
            );
            $input['nguonvon'] = $a_nv[$input['nguonvon']];

            $arraymodel = $model->toarray();
            $arraythang = array_column($arraymodel,'thang');
            $arraythang = array_unique($arraythang);
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);

            Excel::create('Bao cao 01', function($excel) use($model, $arraythang,$arrayquy,$arraynam,$donvi,$input){
                $excel->sheet('Phu luc 01', function($sheet) use($model, $arraythang,$arrayquy,$arraynam,$donvi,$input){
                    $sheet->loadView('reports.bctkkhac.laocai.thamdinhgia.BC1')
                        ->with('arraythang',$arraythang)
                        ->with('arrayquy',$arrayquy)
                        ->with('arraynam',$arraynam)
                        ->with('donvi',$donvi)
                        ->with('dk',$input)
                        ->with('model',$model)
                        ->with('pageTitle','Ket qua tham dinh gia');
                });
            })->download('xlsx');

        }else
            return view('errors.notlogin');
    }

    public function BC2Excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            if(isset($input['donvi'])){
                if($input['donvi'] == 'all'){
                    $model = HsThamDinhGia::whereBetween('thoidiem',array($input['ngaytu'],$input['ngayden']))
                        //->where('nguonvon',$input['nguonvon'])
                        ->where('trangthai', 'Hoàn tất')
                        ->groupBy('thang')
                        ->get();
                    $donvi = 'all';
                }else{
                    $model = HsThamDinhGia::whereBetween('thoidiem',array($input['ngaytu'],$input['ngayden']))
                        ->where('mahuyen',$input['donvi'])
                        ->where('trangthai', 'Hoàn tất')
                        //->where('nguonvon',$input['nguonvon'])
                        ->groupBy('thang')
                        ->get();
                    $donvi = TtPhongBan::where('ma',$input['donvi'])->first();
                }

            }else{
                $model = HsThamDinhGia::whereBetween('thoidiem',array($input['ngaytu'],$input['ngayden']))
                    ->where('mahuyen',session('admin')->mahuyen)
                    ->where('trangthai', 'Hoàn tất')
                    //->where('nguonvon',$input['nguonvon'])
                    ->groupBy('thang')
                    ->get();
                $donvi = TtPhongBan::where('ma',session('admin')->mahuyen)->first();
            }

            if($input['nguonvon'] != 'ALL'){
                $model = $model->where('nguonvon', $input['nguonvon']);
            }

            foreach($model as $thangs){
                $idhss = HsThamDinhGia::where('thang',$thangs->thang)
                    ->where('trangthai', 'Hoàn tất')
                    ->get();
                $tshs = count($idhss);
                $arrayidhs = '';
                foreach($idhss as $idhs){
                    $arrayidhs = $arrayidhs. $idhs->mahs.',';
                }
                $modelgia = ThamDinhGia::wherein('mahs',explode(',',$arrayidhs))->get();

                $thangs->counthoso = $tshs;
                $giadenghi = $modelgia->sum('giadenghi');
                $giaththamdinh = $modelgia->sum('giaththamdinh');
                $giakththamdinh =$modelgia->sum('giakththamdinh');
                $giatritstd = $modelgia->sum('giatritstd');
                $chenhlech = $giatritstd - $giaththamdinh;
                if($giadenghi>0 && $giatritstd >0)
                    $phantram = $giatritstd * 100/$giaththamdinh;
                else
                    $phantram = 0;

                $thangs->giadenghi = $giadenghi;
                $thangs->giaththamdinh = $giaththamdinh;
                $thangs->giakththamdinh =$giakththamdinh;
                $thangs->giatritstd = $giatritstd;
                $thangs->chenhlech = $chenhlech;
                $thangs->phantram = $phantram;

            }
            $arraymodel = $model->toarray();
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);
            $a_nv = array(
                'ALL' => 'Tất cả các nguồn',
                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                'Đầu tư' => 'Nguồn vốn đầu tư',
            );
            $input['nguonvon'] = $a_nv[$input['nguonvon']];

            Excel::create('Bao cao 02', function($excel) use($model, $arrayquy,$arraynam,$donvi,$input){
                $excel->sheet('Ket qua tham dinh gia', function($sheet) use($model, $arrayquy,$arraynam,$donvi,$input){
                    $sheet->loadView('reports.bctkkhac.laocai.thamdinhgia.BC2')
                        ->with('arrayquy',$arrayquy)
                        ->with('arraynam',$arraynam)
                        ->with('donvi',$donvi)
                        ->with('dk',$input)
                        ->with('model',$model)
                        ->with('pageTitle','Ket qua tham dinh gia');
                });
            })->download('xlsx');
        }else
            return view('errors.notlogin');
    }

    public function BC3Excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            if(isset($input['donvi'])){
                if($input['donvi'] == 'all'){
                    $model = HsCongBoGia::whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                        ->where('trangthai', 'Hoàn tất')
                        ->get();
                    $donvi = 'all';
                }else{
                    $model = HsCongBoGia::where('mahuyen',$input['donvi'])
                        ->whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                        ->where('trangthai', 'Hoàn tất')
                        ->get();
                    $donvi = TtPhongBan::where('ma',$input['donvi'])->first();
                }

            }else{
                $model = HsCongBoGia::where('mahuyen',session('admin')->mahuyen)
                    ->whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                    ->where('trangthai', 'Hoàn tất')
                    ->get();
                $donvi = TtPhongBan::where('ma',session('admin')->mahuyen)->first();
            }

            if($input['nguonvon'] != 'ALL'){
                $model = $model->where('nguonvon', $input['nguonvon']);
            }

            foreach($model as $hs){

                $gia = CongBoGia::where('mahs',$hs->mahs)->get();

                $hs->sumgiadenghi = $gia->sum('giadenghi');
                $hs->sumgiathamdinh = $gia->sum('giatritstd');

                $hs->sumkththamdinh = $gia->sum('giakththamdinh');
                $hs->sumththamdinh = $gia->sum('giaththamdinh');
                $hs->sumchenhlech =  $gia->sum('giatritstd') - $gia->sum('giaththamdinh');

                if($gia->sum('giadenghi')>0 && $gia->sum('giatritstd')>0)
                    $hs->phantram = $gia->sum('giatritstd') * 100/($gia->sum('giaththamdinh'));
            }
            $arraymodel = $model->toarray();
            $arraythang = array_column($arraymodel,'thang');
            $arraythang = array_unique($arraythang);
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);
            $a_nv = array(
                'ALL' => 'Tất cả các nguồn',
                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                'Đầu tư' => 'Nguồn vốn đầu tư',
            );
            $input['nguonvon'] = $a_nv[$input['nguonvon']];

            Excel::create('Bao cao 03', function($excel) use($model,$arraythang,$arrayquy,$arraynam,$input,$donvi){
                $excel->sheet('Cong bo gia', function($sheet) use($model,$arraythang,$arrayquy,$arraynam,$input,$donvi){
                    $sheet->loadView('reports.bctkkhac.laocai.congbogia.BC3')
                        ->with('arrayquy',$arrayquy)
                        ->with('arraynam',$arraynam)
                        ->with('arraythang',$arraythang)
                        ->with('dk',$input)
                        ->with('donvi',$donvi)
                        ->with('model',$model)
                        ->with('pageTitle','Cong bo gia');
                });
            })->download('xlsx');
        }else
            return view('errors.notlogin');
    }

    public function BC4Excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            if(isset($input['donvi'])){
                if($input['donvi'] == 'all'){
                    $model = HsCongBoGia::where('trangthai', 'Hoàn tất')
                        ->whereBetween('ngaynhap',array($input['ngaytu'],$input['ngayden']))
                        ->groupBy('thang')
                        ->get();
                    $donvi = 'all';
                }else{

                    $model = HsCongBoGia::where('trangthai', 'Hoàn tất')
                        ->where('mahuyen',$input['donvi'])
                        ->whereBetween('ngaynhap',array($input['ngaytu'],$input['ngayden']))
                        ->groupBy('thang')
                        ->get();
                    $donvi = TtPhongBan::where('ma',$input['donvi'])->first();
                }

            }else{
                $model = HsCongBoGia::where('trangthai', 'Hoàn tất')
                    ->where('mahuyen',session('admin')->mahuyen)
                    ->whereBetween('ngaynhap',array($input['ngaytu'],$input['ngayden']))
                    ->groupBy('thang')
                    ->get();
                $donvi = TtPhongBan::where('ma',session('admin')->mahuyen)->first();
            }

            if($input['nguonvon'] != 'ALL'){
                $model = $model->where('nguonvon', $input['nguonvon']);
            }

            foreach($model as $thangs){
                $idhss = HsCongBoGia::where('thang',$thangs->thang)
                    ->where('trangthai', 'Hoàn tất')
                    ->get();
                $tshs = count($idhss);
                $arrayidhs = '';
                foreach($idhss as $idhs){
                    $arrayidhs = $arrayidhs. $idhs->mahs.',';
                }
                $gia = CongBoGia::wherein('mahs',explode(',',$arrayidhs))->get();
                $thangs->counthoso = $tshs;
                $giadenghi = $gia->sum('giadenghi');
                $giaththamdinh = $gia->sum('giaththamdinh');
                $giakththamdinh =$gia->sum('giakththamdinh');
                $giatritstd = $gia->sum('giatritstd');
                $chenhlech = $giatritstd - $giaththamdinh;
                if($giadenghi>0 && $giatritstd >0)
                    $phantram = $giatritstd * 100/$giaththamdinh;
                else
                    $phantram = 0;

                $thangs->giadenghi = $giadenghi;
                $thangs->giaththamdinh = $giaththamdinh;
                $thangs->giakththamdinh =$giakththamdinh;
                $thangs->giatritstd = $giatritstd;
                $thangs->chenhlech = $chenhlech;
                $thangs->phantram = $phantram;

            }
            $arraymodel = $model->toarray();
            $arraythang = array_column($arraymodel,'thang');
            $arraythang = array_unique($arraythang);
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);
            $a_nv = array(
                'ALL' => 'Tất cả các nguồn',
                'Cả hai' => 'Cả hai (Nguồn vốn thường xuyên và nguồn vốn đầu tư)',
                'Thường xuyên' => 'Nguồn vốn thường xuyên',
                'Đầu tư' => 'Nguồn vốn đầu tư',
            );
            $input['nguonvon'] = $a_nv[$input['nguonvon']];

            Excel::create('Bao cao 04', function($excel) use($model,$arraythang,$arrayquy,$arraynam,$input,$donvi){
                $excel->sheet('Bao cao tong hop', function($sheet) use($model,$arraythang,$arrayquy,$arraynam,$input,$donvi){
                    $sheet->loadView('reports.bctkkhac.laocai.congbogia.BC4')
                        ->with('arrayquy',$arrayquy)
                        ->with('arraynam',$arraynam)
                        ->with('arraythang',$arraythang)
                        ->with('dk',$input)
                        ->with('model',$model)
                        ->with('donvi',$donvi)
                        ->with('pageTitle','Bao cao tong hop');
                });
            })->download('xlsx');
        }else
            return view('errors.notlogin');
    }

}
