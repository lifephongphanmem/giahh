<?php

namespace App\Http\Controllers;

use App\DmHhXnk;
use App\GiaHhXnk;
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

            return view('reports.TT55-2011-BTC.index')
                ->with('pageTitle','Thông tư 55/2011-TT-BTC');

        }else
            return view('errors.notlogin');
    }

    public function PL1(Request $request){
        if (Session::has('admin')) {

            return view('reports.TT55-2011-BTC.PL1')
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
