<?php

namespace App\Http\Controllers;

use App\DMThueTN;
use App\NhomThueTN;
use App\PNhomThueTN;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmThueTnController extends Controller
{
    public function nhom()
    {
        if (Session::has('admin')) {
            $model = NhomThueTN::all();
            return view('system.thuetn.nhomhh.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục tài nguyên tính thuế tài nguyên');
        } else
            return view('errors.notlogin');
    }

    public function pnhom($nhom)
    {
        if (Session::has('admin')) {
            $modelnhom = NhomThueTN::where('manhom',$nhom)->first();
            $tennhom =$modelnhom->tennhom;
            $model = PNhomThueTN::where('manhom',$nhom)->get();
            return view('system.thuetn.pnhomhh.index')
                ->with('tennhom',$tennhom)
                ->with('model',$model)
                ->with('pageTitle','Danh mục tài nguyên tính thuế tài nguyên');
        } else
            return view('errors.notlogin');
    }

    public function hanghoa($nhom,$pnhom)
    {
        if (Session::has('admin')) {
            $masopnhom = $nhom.'.'.$pnhom;
            $model = DMThueTN::where('masopnhom',$masopnhom)->get();
            $modelnhom = NhomThueTN::where('manhom',$nhom)->first();
            $tennhom = $modelnhom->tennhom;
            $modelpnhom = PNhomThueTN::where('masopnhom',$masopnhom)->first();
            $tenpnhom = $modelpnhom->tenpnhom;
            return view('system.thuetn.index')
                ->with('model',$model)
                ->with('tennhom',$tennhom)
                ->with('tenpnhom',$tenpnhom)
                ->with('nhom',$nhom)
                ->with('pnhom',$pnhom)
                ->with('pageTitle','Danh mục tài nguyên tính thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function create($nhom,$pnhom)
    {
        if (Session::has('admin')) {
            $thuoctn =array_column(DMThueTN::select('mahh','tenhh')->where('masopnhom',$nhom.'.'.$pnhom)->get()->toarray(),'tenhh','mahh');
            $thuoctn = array_merge(array(''=>'--Chọn tài nguyên gốc--'),$thuoctn);
            return view('system.thuetn.create')
                ->with('nhom',$nhom)
                ->with('pnhom',$pnhom)
                ->with('thuoctn',$thuoctn)
                ->with('pageTitle','Thông tin tài nguyên tính thuế tài nguyên thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            $model = new DMThueTN();
            $model->masopnhom = $insert['nhom'].'.'.$insert['pnhom'];
            $model->mahh =session('admin')->mahuyen.'.'.getdate()[0];
            $model->tenhh = $insert['tenhh'];
            $model->dacdiemkt = $insert['dacdiemkt'];
            $model->dvt = $insert['dvt'];
            $model->gc = $insert['ghichu'];
            $model->theodoi = $insert['theodoi'];
            $model->thuoctn = $insert['thuoctn'];
            $model->sapxep = $insert['sapxep'];
            $model->save();

            return redirect('dmthuetn/nhom='.$insert['nhom'].'/pnhom='.$insert['pnhom']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = DMThueTN::findOrFail($id);
            $thuoctn =DMThueTN::select('mahh','tenhh')->where('masopnhom',$model->masopnhom)->where('mahh','<>',$model->mahh)->get();
            //$thuoctn = array_merge(array(''=>'--Chọn tài nguyên gốc--'),$thuoctn);
            //dd($thuoctn);
            return view('system.thuetn.edit')
                ->with('model',$model)
                ->with('thuoctn',$thuoctn)
                ->with('pageTitle','Thông tin tài nguyên tính thuế tài nguyên chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id)
    {
        if (Session::has('admin')) {
            $update = $request->all();

            $model = DMThueTN::findOrFail($id);
            $model->tenhh = $update['tenhh'];
            $model->dacdiemkt = $update['dacdiemkt'];
            $model->dvt = $update['dvt'];
            $model->gc = $update['gc'];
            $model->theodoi = $update['theodoi'];
            $model->thuoctn = $update['thuoctn'];
            $model->sapxep = $update['sapxep'];
            $model->save();

            $masopnhom =$model->masopnhom;
            $nhom = explode('.',$masopnhom)[0];
            $pnhom = explode('.',$masopnhom)[1];

            return redirect('dmthuetn/nhom='.$nhom.'/pnhom='.$pnhom);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();

            $model = DMThueTN::where('id',$input['iddelete'])->first();

            $masopnhom =$model->masopnhom;
            $nhom = explode('.',$masopnhom)[0];
            $pnhom = explode('.',$masopnhom)[1];

            $model->delete();

            return redirect('dmthuetn/nhom='.$nhom.'/pnhom='.$pnhom);
        }else
            return view('errors.notlogin');
    }
}
