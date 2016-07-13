<?php

namespace App\Http\Controllers;

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

}
