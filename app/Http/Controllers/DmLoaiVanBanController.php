<?php

namespace App\Http\Controllers;

use App\DmLoaiVanBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmLoaiVanBanController extends Controller
{
    public function index()
    {
        if (Session::has('admin')) {
            $model = DmLoaiVanBan::all();
            return view('system.ttqd.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục loại văn bản pháp luật');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if (Session::has('admin')) {
            return view('system.ttqd.create')
                ->with('pageTitle','Thông tin loại văn bản pháp luật');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();

            $model = new DmLoaiVanBan();
            $model->plttqd= $insert['plttqd'];
            $model->level= $insert['level'];
            $model->tenloaivanban= $insert['tenloaivanban'];
            $model->ghichu= $insert['ghichu'];
            $model->save();

            return redirect('dmloaivanban');

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmLoaiVanBan::findOrFail($id);
            return view('system.ttqd.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin loại văn bản pháp luật chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = DmLoaiVanBan::findOrFail($id);
            $model->plttqd= $update['plttqd'];
            $model->level= $update['level'];
            $model->tenloaivanban= $update['tenloaivanban'];
            $model->ghichu= $update['ghichu'];
            $model->save();

            return redirect('dmloaivanban');

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = DmLoaiVanBan::where('id',$input['iddelete'])
                ->delete();
            return redirect('dmloaivanban');
        }else
            return view('errors.notlogin');
    }

    public function checkmaloaivanban(Request $request)
    {
        //chưa làm
        $input = $request->all();
        $model = DmLoaiVanBan::where('maloaigia',$input['maloaigia'])
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }
}
