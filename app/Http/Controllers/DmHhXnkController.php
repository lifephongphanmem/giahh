<?php

namespace App\Http\Controllers;

use App\DmHhXnk;
use App\Loaixnk;
use App\Nhomxnk;
use App\PNhomxnk;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmHhXnkController extends Controller
{
    public function nhom(){
        if (Session::has('admin')) {
            $model = Nhomxnk::all();
            return view('system.tthanghoa.hhxnk.nhomhh.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục hàng hóa xuất nhập khẩu');
        } else
            return view('errors.notlogin');
    }

    public function pnhom($nhom)
    {
        if (Session::has('admin')) {
            $modelnhom = Nhomxnk::where('manhom',$nhom)->first();

            $model = PNhomxnk::where('manhom',$nhom)
                ->get();
            return view('system.tthanghoa.hhxnk.pnhomhh.index')
                ->with('model',$model)
                ->with('tennhom',$modelnhom->tennhom)
                ->with('pageTitle','Danh mục hàng hóa xuất nhập khẩu');
        } else
            return view('errors.notlogin');
    }

    public function loai($nhom,$pnhom)
    {
        if (Session::has('admin')) {
            $modelnhom = Nhomxnk::where('manhom',$nhom)->first();
            $modelpnhom = PNhomxnk::where('manhom',$nhom)
                ->where('mapnhom',$pnhom)
                ->first();

            $model = Loaixnk::where('manhom',$nhom)
                ->where('mapnhom',$pnhom)
                ->get();
            return view('system.tthanghoa.hhxnk.loaihh.index')
                ->with('model',$model)
                ->with('tennhom',$modelnhom->tennhom)
                ->with('tenpnhom',$modelpnhom->tenpnhom)
                ->with('pageTitle','Danh mục hàng hóa xuất nhập khẩu');
        } else
            return view('errors.notlogin');
    }

    public function hanghoa($nhom,$pnhom,$loai)
    {
        if (Session::has('admin')) {
            $modelnhom = Nhomxnk::where('manhom',$nhom)->first();
            $modelpnhom = PNhomxnk::where('manhom',$nhom)
                ->where('mapnhom',$pnhom)
                ->first();
            $modelloai = Loaixnk::where('manhom',$nhom)
                ->where('mapnhom',$pnhom)
                ->where('maloai',$loai)
                ->first();
            $masoloai = $nhom.$pnhom.'.'.$loai;

            $model = DmHhXnk::where('masoloai',$masoloai)
                ->get();
            return view('system.tthanghoa.hhxnk.index')
                ->with('model',$model)
                ->with('tennhom',$modelnhom->tennhom)
                ->with('tenpnhom',$modelpnhom->tenpnhom)
                ->with('tenloai',$modelloai->tenloai)
                ->with('nhom',$nhom)
                ->with('pnhom',$pnhom)
                ->with('loai',$loai)
                ->with('pageTitle','Danh mục hàng hóa xuất nhập khẩu');
        } else
            return view('errors.notlogin');
    }

    public function create($nhom,$pnhom,$loai)
    {
        if (Session::has('admin')) {

            return view('system.tthanghoa.hhxnk.create')
                ->with('nhom',$nhom)
                ->with('pnhom',$pnhom)
                ->with('loai',$loai)
                ->with('pageTitle','Danh mục hàng hóa xuất nhập khẩu thêm mới');
        } else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DmHhXnk();
            $model->masoloai = $insert['nhom'].$insert['pnhom'].'.'.$insert['loai'];
            $model->mahh = $insert['mahh'];
            $model->tenhh = $insert['tenhh'];
            $model->dacdiemkt = $insert['dacdiemkt'];
            $model->dvt = $insert['dvt'];
            $model->nsx = $insert['nsx'];
            $model->gc = $insert['ghichu'];
            $model->theodoi = $insert['theodoi'];
            $model->save();

            return redirect('dmhanghoa-xuatnhapkhau/nhom='.$insert['nhom'].'/pnhom='.$insert['pnhom'].'/loai='.$insert['loai']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmHhXnk::findOrFail($id);

            return view('system.tthanghoa.hhxnk.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin hàng hóa xuất nhập khẩu chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = DmHhXnk::findOrFail($id);
            $model->mahh = $update['mahh'];
            $model->tenhh = $update['tenhh'];
            $model->dacdiemkt = $update['dacdiemkt'];
            $model->dvt = $update['dvt'];
            $model->nsx = $update['nsx'];
            $model->gc = $update['gc'];
            $model->theodoi = $update['theodoi'];
            $model->save();
            $modelloai = Loaixnk::where('masoloai',$model->masoloai)
                ->first();

            return redirect('dmhanghoa-xuatnhapkhau/nhom='.$modelloai->manhom.'/pnhom='.$modelloai->mapnhom.'/loai='.$modelloai->maloai);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            $model = DmHhXnk::where('id',$input['iddelete'])
                ->first();
            $modelloai = Loaixnk::where('masoloai',$model->masoloai)
                ->first();
            $model->delete();

            return redirect('dmhanghoa-xuatnhapkhau/nhom='.$modelloai->manhom.'/pnhom='.$modelloai->mapnhom.'/loai='.$modelloai->maloai);

        }else
            return view('errors.notlogin');
    }

    public function checkmahhxnk(Request $request)
    {
        $input = $request->all();
        $mahh = $input['mahh'];
        $masoloai = $input['nhom'].$input['pnhom'].'.'.$input['loai'];
        $model = DmHhXnk::where('mahh',$mahh)
            ->where('masoloai',$masoloai)
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }
}
