<?php

namespace App\Http\Controllers;

use App\DmHhTn;
use App\DmHhXnK;
use App\KkDvVtKhac;
use App\KkDvVtXb;
use App\KkDvVtXk;
use App\KkDvVtXtx;
use App\KkGDvLt;
use App\KkGDvLtCt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\GeneralConfigs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        if (Session::has('admin')) {
            return view('dashboard')
                ->with('pageTitle','Tổng quan');
        }else
            return view('welcome');
    }

}
