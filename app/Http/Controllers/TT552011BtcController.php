<?php

namespace App\Http\Controllers;

use App\DmHhTn55;
use App\DmHhXnk;
use App\DmThiTruong;
use App\GiaHhTt;
use App\GiaHhXnk;
use App\HsGiaHhTt;
use App\HsGiaHhXnk;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TT552011BtcController extends Controller
{
    public function index()
    {
        if (Session::has('admin')) {
        $thitruong=DmThiTruong::all();
            return view('reports.TT55-2011-BTC.index')
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tư 55/2011-TT-BTC');

        }else
            return view('errors.notlogin');
    }

    public function PL1(Request $request){
        if (Session::has('admin')) {
            $inputs=$request->all();
            $dmhh=DmHhTn55::get()->toarray();
            $hoso=HsGiaHhTt::select('mahs')->where('thitruong',$inputs['thitruong'])->get();

            $model=GiaHhTt::join('HsGiaHhTt', 'HsGiaHhTt.mahs', '=', 'GiaHhTt.mahs')
                ->select('GiaHhTt.*')
                ->where('HsGiaHhTt.thitruong',$inputs['thitruong'])->get();
            //dd($model);
            $modeldm = DmHhTn55::all();

            foreach($model as $tthh){
                $this->gettenhh($modeldm,$tthh);
                $tthh->giahh = ($tthh->giatu + $tthh->giaden)/2;
            }

            $thongtin=array('thitruong'=>$inputs['thitruong'],
                'nam'=>$inputs['nam']);
            return view('reports.TT55-2011-BTC.PL1')
                ->with('thongtin',$thongtin)
                ->with('model',$model)
                ->with('pageTitle','Phụ lục 1');

        }else
            return view('errors.notlogin');
    }

    public function PL1Excel(Request $request){
        if (Session::has('admin')) {
            $inputs=$request->all();

            $model=GiaHhTt::join('HsGiaHhTt', 'HsGiaHhTt.mahs', '=', 'GiaHhTt.mahs')
                ->select('GiaHhTt.*')
                ->where('HsGiaHhTt.thitruong',$inputs['thitruong'])->get();

            $modeldm = DmHhTn55::all();

            foreach($model as $tthh){
                $this->gettenhh($modeldm,$tthh);
                $tthh->giahh = ($tthh->giatu + $tthh->giaden)/2;
            }

            $thongtin=array('thitruong'=>$inputs['thitruong'],
                'nam'=>$inputs['nam']);

            Excel::create('Phu luc 01 - TT55/2011', function($excel) use($model, $thongtin){
                $excel->sheet('Phu luc 01', function($sheet) use($model, $thongtin){
                    $sheet->loadView('reports.TT55-2011-BTC.PL1')
                        ->with('thongtin',$thongtin)
                        ->with('model',$model)
                        ->with('pageTitle','Phu luc 01');
                });
            })->download('xlsx');
        }else
            return view('errors.notlogin');
    }

    public function PL2(Request $request){
        if (Session::has('admin')) {
            $input =$request->all();

            $modelhs = HsGiaHhXnk::whereBetween('tgnhap',array($input['ngaytu'],$input['ngayden']))
                ->get();
            //dd($model);
            $arrayid='';
            foreach($modelhs as $hs){
                $arrayid = $arrayid.$hs->mahs.',';
            }
            $model = GiaHhXnk::wherein('mahs',explode(',',$arrayid))->get();

            $modeldm = DmHhXnk::all();

            foreach($model as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }

            return view('reports.TT55-2011-BTC.PL2')
                ->with('model',$model)
                ->with('ngaytu',$input['ngaytu'])
                ->with('ngayden',$input['ngayden'])
                ->with('pageTitle','Phụ lục 2');

        }else
            return view('errors.notlogin');
    }

    public function PL2Excel(Request $request){
        if (Session::has('admin')) {
            $input =$request->all();

            $ngaytu=$input['ngaytu'];
            $ngayden=$input['ngayden'];
            $modelhs = HsGiaHhXnk::whereBetween('tgnhap',array($ngaytu,$ngayden))
                ->get();
            //dd($model);
            $arrayid='';
            foreach($modelhs as $hs){
                $arrayid = $arrayid.$hs->mahs.',';
            }
            $model = GiaHhXnk::wherein('mahs',explode(',',$arrayid))->get();

            $modeldm = DmHhXnk::all();

            foreach($model as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }
            Excel::create('Phu luc 02 - TT55/2011', function($excel) use($model, $ngaytu, $ngayden){
                $excel->sheet('Phu luc 02', function($sheet) use($model, $ngaytu, $ngayden){
                    $sheet->loadView('reports.TT55-2011-BTC.PL2')
                        ->with('ngaytu',$ngaytu)
                        ->with('ngayden',$ngayden)
                        ->with('model',$model)
                        ->with('pageTitle','Phu luc 02');
                });
            })->download('xlsx');
        }else
            return view('errors.notlogin');
    }

    public function gettenhh($mahh,$array){
        foreach($mahh as $tt){
            if($tt->masopnhom == $array->masopnhom && $tt->mahh == $array->mahh){
                $array->tenhh = $tt->tenhh;
                $array->dvt = $tt->dvt;
                break;
            }
        }


    }
}
