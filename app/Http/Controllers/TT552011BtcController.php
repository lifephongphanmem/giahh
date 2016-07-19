<?php

namespace App\Http\Controllers;

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

            return view('reports.TT55-2011-BTC.PL2')
                ->with('pageTitle','Phụ lục 2');

        }else
            return view('errors.notlogin');
    }

}
