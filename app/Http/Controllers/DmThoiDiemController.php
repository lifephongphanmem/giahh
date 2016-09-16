<?php

namespace App\Http\Controllers;

use App\DmThoiDiem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmThoiDiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {
            $model = DmThoiDiem::all();
            return view('system.tthanghoa.thoidiem.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục thời điểm báo cáo');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if (Session::has('admin')) {
            return view('system.tthanghoa.thoidiem.create')
                ->with('pageTitle','Thông tin thời điểm thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DmThoiDiem();
            $model->mathoidiem = getdate()[0];
            $model->tenthoidiem = $insert['tenthoidiem'];
            $model->tungay = $insert['tungay'];
            $model->denngay = $insert['denngay'];
            $model->nhom = $insert['nhom'];
            $model->plbc = $insert['plbc'];
            $model->save();

            return redirect('dmthoidiem');
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmThoiDiem::findOrFail($id);
            return view('system.tthanghoa.thoidiem.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin thời điểm thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = DmThoiDiem::findOrFail($id);
            $model->tenthoidiem = $update['tenthoidiem'];
            $model->tungay = $update['tungay'];
            $model->denngay = $update['denngay'];
            $model->nhom = $update['nhom'];
            $model->plbc = $update['plbc'];
            $model->save();

            return redirect('dmthoidiem');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = DmThoiDiem::where('id',$input['iddelete'])
                ->delete();
            return redirect('dmthoidiem');
        }else
            return view('errors.notlogin');
    }

    public function checkmathoidiem(Request $request)
    {
        $input = $request->all();
        $model = DmThoiDiem::where('mathoidiem',$input['mathoidiem'])
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }

}
