<?php

namespace App\Http\Controllers;

use App\DmLoaiGia;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmLoaiGiaController extends Controller
{

    public function index()
    {
        if (Session::has('admin')) {
            $model = DmLoaiGia::all();
            return view('system.tthanghoa.loaigia.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục loại giá báo cáo');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if (Session::has('admin')) {
            return view('system.tthanghoa.loaigia.create')
                ->with('pageTitle','Thông tin loại giá thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DmLoaiGia();
            $model->maloaigia = $insert['maloaigia'];
            $model->tenloaigia = $insert['tenloaigia'];
            $model->gc = $insert['gc'];
            $model->save();

            return redirect('dmloaigia');

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmLoaiGia::findOrFail($id);
            return view('system.tthanghoa.loaigia.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin loại giá thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = DmLoaiGia::findOrFail($id);
            $model->maloaigia = $update['maloaigia'];
            $model->tenloaigia = $update['tenloaigia'];
            $model->gc = $update['gc'];
            $model->save();

            return redirect('dmloaigia');

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = DmLoaiGia::where('id',$input['iddelete'])
                ->delete();
            return redirect('dmloaigia');
        }else
            return view('errors.notlogin');
    }

    public function checkmaloaigia(Request $request)
    {
        $input = $request->all();
        $model = DmLoaiGia::where('maloaigia',$input['maloaigia'])
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }
}
