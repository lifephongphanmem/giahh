<?php

namespace App\Http\Controllers;

use App\DmHhTn;
use App\NhomTn;
use App\PNhomTn;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmHhTnController extends Controller
{
    public function nhom()
    {
        if (Session::has('admin')) {
            $model = NhomTn::all();
            return view('system.tthanghoa.hhtn.nhomhh.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục hàng hóa trong nước');
        } else
            return view('errors.notlogin');
    }

    public function pnhom($nhom)
    {
        if (Session::has('admin')) {
            $modelnhom = NhomTn::where('manhom',$nhom)
                ->first();
            $tennhom =$modelnhom->tennhom;
            $model = PNhomTn::where('manhom',$nhom)
                ->get();
            return view('system.tthanghoa.hhtn.pnhomhh.index')
                ->with('tennhom',$tennhom)
                ->with('model',$model)
                ->with('pageTitle','Danh mục hàng hóa trong nước');
        } else
            return view('errors.notlogin');
    }

    public function hanghoa($nhom,$pnhom)
    {
        if (Session::has('admin')) {
            $masopnhom = $nhom.'.'.$pnhom;

            $model = DmHhTn::where('masopnhom',$masopnhom)
                ->get();
            $modelnhom = NhomTn::where('manhom',$nhom)
                ->first();
            $tennhom = $modelnhom->tennhom;
            $modelpnhom = PNhomTn::where('masopnhom',$masopnhom)
                ->first();
            $tenpnhom = $modelpnhom->tenpnhom;
            return view('system.tthanghoa.hhtn.index')
                ->with('model',$model)
                ->with('tennhom',$tennhom)
                ->with('tenpnhom',$tenpnhom)
                ->with('nhom',$nhom)
                ->with('pnhom',$pnhom)
                ->with('pageTitle','Danh mục hàng hóa trong nước');

        }else
            return view('errors.notlogin');
    }

    public function create($nhom,$pnhom)
    {
        if (Session::has('admin')) {

            return view('system.tthanghoa.hhtn.create')
                ->with('nhom',$nhom)
                ->with('pnhom',$pnhom)
                ->with('pageTitle','Thông tin hàng hóa trong nước thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DmHhTn();
            $model->masopnhom = $insert['nhom'].'.'.$insert['pnhom'];
            $model->mahh = $insert['mahh'];
            $model->tenhh = $insert['tenhh'];
            $model->dacdiemkt = $insert['dacdiemkt'];
            $model->dvt = $insert['dvt'];
            $model->nsx = $insert['nsx'];
            $model->gc = $insert['ghichu'];
            $model->theodoi = $insert['theodoi'];
            $model->save();

            return redirect('dmhanghoa-trongnuoc/nhom='.$insert['nhom'].'/pnhom='.$insert['pnhom']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmHhTn::findOrFail($id);
            return view('system.tthanghoa.hhtn.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin hàng hóa trong nước chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id)
    {
        if (Session::has('admin')) {
            $update = $request->all();

            $model = DmHhTn::findOrFail($id);
            $model->tenhh = $update['tenhh'];
            $model->dacdiemkt = $update['dacdiemkt'];
            $model->dvt = $update['dvt'];
            $model->nsx = $update['nsx'];
            $model->gc = $update['gc'];
            $model->theodoi = $update['theodoi'];
            $model->save();

            $masopnhom =$model->masopnhom;
            $nhom = explode('.',$masopnhom)[0];
            $pnhom = explode('.',$masopnhom)[1];

            return redirect('dmhanghoa-trongnuoc/nhom='.$nhom.'/pnhom='.$pnhom);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();

            $model = DmHhTn::where('id',$input['iddelete'])
                ->first();

            $masopnhom =$model->masopnhom;
            $nhom = explode('.',$masopnhom)[0];
            $pnhom = explode('.',$masopnhom)[1];

            $model->delete();

            return redirect('dmhanghoa-trongnuoc/nhom='.$nhom.'/pnhom='.$pnhom);

        }else
            return view('errors.notlogin');
    }

    public function checkmahhtn(Request $request)
    {
        $input = $request->all();
        $mahh = $input['mahh'];
        $masopnhom = $input['nhom'].'.'.$input['pnhom'];
        $model = DmHhTn::where('mahh',$mahh)
            ->where('masopnhom',$masopnhom)
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }
}
