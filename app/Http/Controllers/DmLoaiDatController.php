<?php

namespace App\Http\Controllers;

use App\DmLoaiDat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmLoaiDatController extends Controller
{
    public function index()
    {
        if (Session::has('admin')) {
            $model = DmLoaiDat::all();
            return view('system.giadat.loaidat.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục phân loại đất');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if (Session::has('admin')) {
            return view('system.giadat.loaidat.create')
                ->with('pageTitle','Thông tin phân loại đất thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DmLoaiDat();
            $model->maloaigia= $insert['maloaigia'];
            $model->loaidat= $insert['loaidat'];
            $model->khuvuc= $insert['khuvuc'];
            $model->vitri= $insert['vitri'];
            $model->sapxep= $insert['sapxep'];
            $model->ghichu = $insert['ghichu'];
            $model->save();
            return redirect('dmloaidat');

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmLoaiDat::findOrFail($id);
            return view('system.giadat.loaidat.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin phân loại đất chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = DmLoaiDat::findOrFail($id);
            $model->loaidat= $update['loaidat'];
            $model->khuvuc= $update['khuvuc'];
            $model->vitri= $update['vitri'];
            $model->sapxep= $update['sapxep'];
            $model->ghichu = $update['ghichu'];
            $model->save();
            return redirect('dmloaihh');

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = DmLoaiDat::where('id',$input['iddelete'])
                ->delete();
            return redirect('dmloaihh');
        }else
            return view('errors.notlogin');
    }

    public function checkloaidat(Request $request)
    {
        $input = $request->all();
        $model = DmLoaiDat::where('maloaihh',$input['maloaihh'])
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }
}
