<?php

namespace App\Http\Controllers;

use App\GiaThueTb;
use App\GiaThueTbCt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BcGiaTTbController extends Controller
{
    public function BaGThueTB($mahs){
        if(Session::has('admin')){
            $model = GiaThueTb::where('mahs',$mahs)->first();
            $modelct = GiaThueTbCt::where('mahs',$mahs)->get();
            return view('reports.thuetb.BaGThueTB')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Bảng giá tối thiểu tính thuế trước bạ');
        }else
            return view('errors.notlogin');
    }
}
