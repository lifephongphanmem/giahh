<?php

namespace App\Http\Controllers;

use App\DmHangHoa;
use App\NhomHangHoa;
use App\PNhomHangHoa;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmHangHoaController extends Controller
{
    public function nhom()
    {
        if (Session::has('admin')) {
            $model = NhomHangHoa::all();
            return view('system.tthanghoa.hhlc.nhomhh.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục hàng hóa trong nước');
        } else
            return view('errors.notlogin');
    }

    public function pnhom($nhom)
    {
        if (Session::has('admin')) {
            $modelnhom = NhomHangHoa::where('manhom',$nhom)
                ->first();
            $tennhom =$modelnhom->tennhom;
            $model = PNhomHangHoa::where('manhom',$nhom)
                ->get();
            return view('system.tthanghoa.hhlc.pnhomhh.index')
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

            $model = DmHangHoa::where('masopnhom',$masopnhom)
                ->get();
            $modelnhom = NhomHangHoa::where('manhom',$nhom)
                ->first();
            $tennhom = $modelnhom->tennhom;
            $modelpnhom = PNhomHangHoa::where('masopnhom',$masopnhom)
                ->first();
            $tenpnhom = $modelpnhom->tenpnhom;
            return view('system.tthanghoa.hhlc.index')
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

            return view('system.tthanghoa.hhlc.create')
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
            $model = new DmHangHoa();
            $model->masopnhom = $insert['nhom'].'.'.$insert['pnhom'];
            $model->mahh =session('admin')->mahuyen.'.'.getdate()[0];
            $model->tenhh = $insert['tenhh'];
            $model->dacdiemkt = $insert['dacdiemkt'];
            $model->dvt = $insert['dvt'];
            $model->nsx = $insert['nsx'];
            $model->gc = $insert['ghichu'];
            $model->theodoi = $insert['theodoi'];
            $model->save();

            return redirect('dmhanghoa-hanghoa/nhom='.$insert['nhom'].'/pnhom='.$insert['pnhom']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DmHangHoa::findOrFail($id);
            return view('system.tthanghoa.hhlc.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin hàng hóa trong nước chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id)
    {
        if (Session::has('admin')) {
            $update = $request->all();

            $model = DmHangHoa::findOrFail($id);
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

            return redirect('dmhanghoa-hanghoa/nhom='.$nhom.'/pnhom='.$pnhom);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();

            $model = DmHangHoa::where('id',$input['iddelete'])->first();

            $masopnhom =$model->masopnhom;
            $nhom = explode('.',$masopnhom)[0];
            $pnhom = explode('.',$masopnhom)[1];

            $model->delete();

            return redirect('dmhanghoa-hanghoa/nhom='.$nhom.'/pnhom='.$pnhom);

        }else
            return view('errors.notlogin');
    }
}
