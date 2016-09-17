<?php

namespace App\Http\Controllers;

use App\DmHhTn55;
use App\NhomTn55;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmHhTn55Controller extends Controller
{
    public function nhom()
    {
        if (Session::has('admin')) {
            $model = NhomTn55::all();
            return view('system.tthanghoa.hhtt.nhomhh.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục hàng hóa thị trường');
        } else
            return view('errors.notlogin');
    }


    public function hanghoa($nhom)
    {
        if (Session::has('admin')) {

            $model = DmHhTn55::where('masopnhom',$nhom)
                ->get();
            $modelnhom = NhomTn55::where('manhom',$nhom)
                ->first();
            $tennhom = $modelnhom->tennhom;

            return view('system.tthanghoa.hhtt.index')
                ->with('model',$model)
                ->with('tennhom',$tennhom)
                ->with('nhom',$nhom)
                ->with('pageTitle','Danh mục hàng hóa thị trường');

        }else
            return view('errors.notlogin');
    }

    public function create($nhom)
    {
        if (Session::has('admin')) {
            return view('system.tthanghoa.hhtt.create')
                ->with('nhom',$nhom)
                ->with('pageTitle','Thông tin hàng hóa thị trường thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DmHhTn55();
            $model->masopnhom = $insert['nhom'].'.'.$insert['pnhom'];
            $model->mahh = $insert['mahh'];
            $model->tenhh = $insert['tenhh'];
            $model->dacdiemkt = $insert['dacdiemkt'];
            $model->dvt = $insert['dvt'];
            $model->nsx = $insert['nsx'];
            $model->gc = $insert['ghichu'];
            $model->theodoi = $insert['theodoi'];
            $model->save();

            return redirect('dmhanghoa-thitruong/nhom='.$insert['nhom']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmHhTn55::findOrFail($id);
            return view('system.tthanghoa.hhtt.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin hàng hóa thị trường chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = DmHhTn55::findOrFail($id);
            $model->tenhh = $update['tenhh'];
            $model->dacdiemkt = $update['dacdiemkt'];
            $model->dvt = $update['dvt'];
            $model->nsx = $update['nsx'];
            $model->gc = $update['gc'];
            $model->theodoi = $update['theodoi'];
            $model->save();
            $nhom = $model->masopnhom;
            return redirect('dmhanghoa-thitruong/nhom='.$nhom);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();

            $model = DmHhTn55::where('id',$input['iddelete'])
                ->first();

            $nhom =$model->masopnhom;
            $model->delete();

            return redirect('dmhanghoa-thitruong/nhom='.$nhom);

        }else
            return view('errors.notlogin');
    }

    public function checkmahhtt(Request $request)
    {
        $input = $request->all();
        $mahh = $input['mahh'];
        $model = DmHhTn55::where('mahh',$mahh)->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }
}
