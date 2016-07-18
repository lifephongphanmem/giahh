<?php

namespace App\Http\Controllers;

use App\DmLoaiHh;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmLoaiHhController extends Controller
{

    public function index()
    {
        if (Session::has('admin')) {
            $model = DmLoaiHh::all();
            return view('system.tthanghoa.loaihh.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục loại hàng hóa báo cáo');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if (Session::has('admin')) {
            return view('system.tthanghoa.loaihh.create')
                ->with('pageTitle','Thông tin loại hàng hóa thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DmLoaiHh();
            $model->maloaihh = $insert['maloaihh'];
            $model->tenloaihh = $insert['tenloaihh'];
            $model->gc = $insert['gc'];
            $model->save();
            return redirect('dmloaihh');

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmLoaiHh::findOrFail($id);
            return view('system.tthanghoa.loaihh.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin loại hàng hóa chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = DmLoaiHh::findOrFail($id);
            $model->maloaihh = $update['maloaihh'];
            $model->tenloaihh = $update['tenloaihh'];
            $model->gc = $update['gc'];
            $model->save();
            return redirect('dmloaihh');

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = DmLoaiHh::where('id',$input['iddelete'])
                ->delete();
            return redirect('dmloaihh');
        }else
            return view('errors.notlogin');
    }

    public function checkmaloaihh(Request $request)
    {
        $input = $request->all();
        $model = DmLoaiHh::where('maloaihh',$input['maloaihh'])
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }
}
