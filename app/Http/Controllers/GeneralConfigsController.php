<?php

namespace App\Http\Controllers;

use App\GeneralConfigs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GeneralConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {
            $model = GeneralConfigs::first();
            return view('system.general.index')
                ->with('model',$model)
                ->with('pageTitle','Cấu hình hệ thống');

        }else
            return view('errors.notlogin');
    }


    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = GeneralConfigs::findOrFail($id);
            return view('system.general.edit')
                ->with('model',$model)
                ->with('pageTitle','Cấu hình hệ thống chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = GeneralConfigs::findOrFail($id);
            $model->donvi = $update['donvi'];
            $model->diachi = $update['diachi'];
            $model->thutruong = $update['thutruong'];
            $model->ketoan =$update['ketoan'];
            $model->nguoilapbieu = $update['nguoilapbieu'];
            $model->namhethong = $update['namhethong'];
            $model->save();
            return redirect('cau-hinh-he-thong');

        }else
            return view('errors.notlogin');
    }

}
