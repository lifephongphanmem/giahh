<?php

namespace App\Http\Controllers;

use App\DmHhTn;
use App\DmHhXnk;
use App\DmThiTruong;
use App\GiaHhTn;
use App\GiaHhXnk;
use App\HsGiaHhTn;
use App\HsGiaHhXnk;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
            $dmhh=DmHhTn::get()->toarray();
            $hoso=HsGiaHhTn::select('mahs')->where('thitruong',$inputs['thitruong'])->get();

            $model=GiaHhTn::join('HsGiaHhTn', 'HsGiaHhTn.mahs', '=', 'GiaHhTn.mahs')
                ->select('GiaHhTn.*')
                ->where('HsGiaHhTn.thitruong',$inputs['thitruong'])->get();
            dd($model);
            $thongtin=array('thitruong'=>$inputs['thitruong'],
                'nam'=>$inputs['nam']);
            return view('reports.TT55-2011-BTC.PL1')
                ->with('thongtin',$thongtin)
                ->with('pageTitle','Phụ lục 1');

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

    public function gettenhh($mahh,$array){
        foreach($mahh as $tt){
            if($tt->masopnhom == $array->masopnhom && $tt->mahh == $array->mahh){
                $array->tenhh = $tt->tenhh;
                $array->nsx = $tt->nsx;
                $array->dvt = $tt->dvt;
                break;
            }
        }


    }
}
