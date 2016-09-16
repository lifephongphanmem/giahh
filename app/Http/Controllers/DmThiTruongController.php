<?php

namespace App\Http\Controllers;

use App\DmThiTruong;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmThiTruongController extends Controller
{
    public function index()
    {
        if (Session::has('admin')) {
            $model = DmThiTruong::orderby('id')->get();
            //dd($model);
            return view('system.tthanghoa.thitruong.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục thị trường hàng hóa');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if (Session::has('admin')) {
            return view('system.tthanghoa.thitruong.create')
                ->with('pageTitle','Thông tin thị trường hàng hóa thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DmThiTruong();
            $model->thitruong = $insert['thitruong'];
            $model->ghichu = $insert['ghichu'];
            $model->save();
            return redirect('dmthitruong');

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmThiTruong::findOrFail($id);
            return view('system.tthanghoa.thitruong.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin thị trường hàng hóa chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = DmThiTruong::findOrFail($id);
            $model->thitruong = $update['thitruong'];
            $model->ghichu = $update['ghichu'];
            $model->save();
            return redirect('dmthitruong');

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            DmThiTruong::where('id',$input['iddelete'])->delete();
            return redirect('dmthitruong');
        }else
            return view('errors.notlogin');
    }

    public function checkthitruong(Request $request)
    {
        $input = $request->all();
        $model = DmThiTruong::where('thitruong',$input['thitruong'])
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }
}
