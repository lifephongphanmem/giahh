<?php

namespace App\Http\Controllers;

use App\CongBoGia;
use App\HsCongBoGia;
use App\HsGiaHhXnk;
use App\HsThamDinhGia;
use App\ThamDinhGia;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BcTkKhacController extends Controller
{

    public function index()
    {
        if(Session::has('admin')){
            return view('reports.bctkkhac.index')
                ->with('pageTitle','Báo cáo thống kê khác');
        }else
            return view('errors.notlogin');
    }

    public function BC1(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $model = HsThamDinhGia::whereBetween('thoidiem',array($input['ngaytu'],$input['ngayden']))
                ->get();
            //dd($model);
            $arraythang='';
            foreach($model as $hs){
                $arraythang = $arraythang.$hs->thang.',';
                $giadenghi = ThamDinhGia::where('mahs',$hs->mahs)->get();
                $giathamdinh = ThamDinhGia::where('mahs',$hs->mahs)->get();

                $hs->sumgiadenghi = $giadenghi->sum('giadenghi');
                $hs->sumgiathamdinh = $giathamdinh->sum('giatritstd');
                $hs->sumkthamdinh = $giadenghi->sum('giadenghi')-$giathamdinh->sum('giatritstd');
                if($giadenghi->sum('giadenghi')>0 && $giathamdinh->sum('giatritstd')>0)
                    $hs->phantram = $giathamdinh->sum('giatritstd') * 100/($giadenghi->sum('giadenghi'));
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


            return view('reports.bctkkhac.laocai.thamdinhgia.BC1')
                ->with('model',$model)
                ->with('arraythang',$arraythang)
                ->with('arrayquy',$arrayquy)
                ->with('arraynam',$arraynam)
                ->with('dk',$input)
                ->with('pageTitle','Kết quả thẩm đinh giá');

        }else
            return view('errors.notlogin');
    }

    public function BC2(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            $model = HsThamDinhGia::whereBetween('thoidiem',array($input['ngaytu'],$input['ngayden']))
                ->groupBy('thang')
                ->get();
            foreach($model as $thangs){
                $idhss = HsThamDinhGia::where('thang',$thangs->thang)
                    ->get();
                $tshs = count($idhss);
                $arrayidhs = '';
                foreach($idhss as $idhs){
                    $arrayidhs = $arrayidhs. $idhs->mahs.',';
                }
                $giadenghi = ThamDinhGia::wherein('mahs',explode(',',$arrayidhs))->sum('giadenghi');
                $giathamdinh = ThamDinhGia::wherein('mahs',explode(',',$arrayidhs))->sum('giatritstd');
                $thangs->counthoso = $tshs;
                $thangs->sumgiadenghi = $giadenghi;
                $thangs->sumgiathamdinh = $giathamdinh;
                $thangs->sumkthamdinh = $giadenghi-$giathamdinh;
                if($giadenghi>0 && $giathamdinh >0)
                    $thangs->phantram = round($giathamdinh * 100/($giadenghi),1);
            }
            $arraymodel = $model->toarray();
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);

            return view('reports.bctkkhac.laocai.thamdinhgia.BC2')
                ->with('model',$model)
                ->with('arrayquy',$arrayquy)
                ->with('arraynam',$arraynam)
                ->with('dk',$input)
                ->with('pageTitle','Kết quả thẩm đinh giá');

        }else
            return view('errors.notlogin');
    }

    public function BC3(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            $model = HsCongBoGia::where('nguonvon',$input['nguonvon'])
                ->whereBetween('ngaynhap', array($input['ngaytu'], $input['ngayden']))
                ->get();
            foreach($model as $hs){
                $giadenghi = CongBoGia::where('mahs',$hs->mahs)->sum('giadenghi');
                $giathamdinh = CongBoGia::where('mahs',$hs->mahs)->sum('giatritstd');
                $hs->sumgiadenghi = $giadenghi;
                $hs->sumgiathamdinh = $giathamdinh;
                $hs->sumkthamdinh = $giadenghi-$giathamdinh;
                if($giadenghi>0 && $giathamdinh >0)
                    $hs->phantram = round($giathamdinh * 100/($giadenghi),1);
            }
            $arraymodel = $model->toarray();
            $arraythang = array_column($arraymodel,'thang');
            $arraythang = array_unique($arraythang);
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);

            return view('reports.bctkkhac.laocai.congbogia.BC3')
                ->with('model',$model)
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

            $model = HsCongBoGia::where('nguonvon',$input['nguonvon'])
                ->whereBetween('ngaynhap',array($input['ngaytu'],$input['ngayden']))
                ->groupBy('thang')
                ->get();
            foreach($model as $thangs){
                $idhss = HsCongBoGia::where('thang',$thangs->thang)
                    ->get();
                $tshs = count($idhss);
                $arrayidhs = '';
                foreach($idhss as $idhs){
                    $arrayidhs = $arrayidhs. $idhs->mahs.',';
                }
                $giadenghi = CongBoGia::wherein('mahs',explode(',',$arrayidhs))->sum('giadenghi');
                $giathamdinh = CongBoGia::wherein('mahs',explode(',',$arrayidhs))->sum('giatritstd');
                $thangs->counths = $tshs;
                $thangs->sumgiadenghi = $giadenghi;
                $thangs->sumgiathamdinh =$giathamdinh;
                $thangs->sumkthamdinh = $giadenghi-$giathamdinh;
                if($giadenghi>0 && $giathamdinh >0)
                    $thangs->phantram = round($giathamdinh * 100/($giadenghi),1);
            }
            $arraymodel = $model->toarray();
            $arraythang = array_column($arraymodel,'thang');
            $arraythang = array_unique($arraythang);
            $arrayquy = array_column($arraymodel,'quy');
            $arrayquy = array_unique($arrayquy);
            $arraynam = array_column($arraymodel,'nam');
            $arraynam = array_unique($arraynam);

            return view('reports.bctkkhac.laocai.congbogia.BC4')
                ->with('model',$model)
                ->with('arraythang',$arraythang)
                ->with('arrayquy',$arrayquy)
                ->with('arraynam',$arraynam)
                ->with('dk',$input)
                ->with('pageTitle','Báo cáo tổng hợp');

        }else
            return view('errors.notlogin');
    }

}
