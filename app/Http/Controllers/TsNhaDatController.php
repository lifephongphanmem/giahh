<?php

namespace App\Http\Controllers;

use App\TsNhaDat;
use App\TtPhongBan;
use App\TtTsNhaDat;
use App\TtTsNhaDatDefault;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TsNhaDatController extends Controller
{
    public function index($nam,$pb)
    {
        if(Session::has('admin')){

            if($pb == 'all'){
                $model = TsNhaDat::where('nam',$nam)
                    ->get();
            }else{
                $model = TsNhaDat::where('nam',$nam)
                    ->where('mahuyen',$pb)
                    ->get();
            }
            $modelpb = TtPhongBan::all();
            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }
            return view('manage.taisannn.nhadat.index')
                ->with('model',$model)
                ->with('nam',$nam)
                ->with('pb',$pb)
                ->with('modelpb',$modelpb)
                ->with('pageTitle','Thông tin tài sản nhà và đất');

        }else
            return view('errors.notlogin');
    }

    public function getTtPhongBan($pbs,$array){
        foreach($pbs as $pb){
            if($pb->ma == $array->mahuyen)
                $array->tenpb = $pb->ten;
        }
    }

    public function create()
    {
        if(Session::has('admin')){
            $model = TtTsNhaDatDefault::where('mahuyen',session('admin')->mahuyen)
                ->delete();
            return view('manage.taisannn.nhadat.create')
                ->with('pageTitle','Thêm mới thông tin tài sản là nhà, đất');
        }else
            return view('errors.notlogin');
    }


    public function store(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create($insert['ngaynhap']);
            $thang = date_format($date,'m');
            $mahs = getdate()[0];

            $model = new TsNhaDat();
            $model->ngaynhap = $insert['ngaynhap'];
            if($thang == 1 || $thang == 2 || $thang == 3)
                $model->quy = 1;
            elseif($thang == 4 || $thang == 5 || $thang == 6)
                $model->quy = 2;
            elseif($thang == 7 || $thang == 8 || $thang == 9)
                $model->quy = 3;
            else
                $model->quy = 4;
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->mahs = $mahs;
            if($model->save()){
                $this->createts($mahs);
            }

            return redirect('taisan-nhadat/nam='.date_format($date,'Y').'&pb='.session('admin')->mahuyen);

        }else
            return view('errors.notlogin');
    }

    public function createts($mahs){
        $modelts = TtTsNhaDatDefault::where('mahuyen',session('admin')->mahuyen)
            ->get();
        if(count($modelts) > 0) {
            foreach ($modelts as $ts) {
                $model = new TtTsNhaDat();
                $model->tents = $ts->tents;
                $model->slts = $ts->slts;
                $model->sotang  = $ts->sotang;
                $model->dientich = $ts->dientich;
                $model->tyleclcl = $ts->tyleclcl;
                $model->nguyengia = $ts->nguyengia;
                $model->giatricl = $ts->giatricl;
                $model->mahs = $mahs;
                $model->save();
            }
        }
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = TsNhaDat::findOrFail($id);
            $modeltt = TtTsNhaDat::where('mahs',$model->mahs)
                ->get();

            return view('manage.taisannn.nhadat.show')
                ->with('model',$model)
                ->with('modeltt',$modeltt)
                ->with('pageTitle','Thông tin tài sản là nhà đất');
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if(Session::has('admin')){
            $model = TsNhaDat::findOrFail($id);
            $modeltt = TtTsNhaDat::where('mahs',$model->mahs)
                ->get();

            return view('manage.taisannn.nhadat.edit')
                ->with('model',$model)
                ->with('modeltt',$modeltt)
                ->with('pageTitle','Chỉnh sửa thông tin tài sản là nhà đất');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $update = $request->all();
            $date = date_create($update['ngaynhap']);
            $thang = date_format($date,'m');

            $model = TsNhaDat::findOrFail($id);
            $model->ngaynhap = $update['ngaynhap'];
            if($thang == 1 || $thang == 2 || $thang == 3)
                $model->quy = 1;
            elseif($thang == 4 || $thang == 5 || $thang == 6)
                $model->quy = 2;
            elseif($thang == 7 || $thang == 8 || $thang == 9)
                $model->quy = 3;
            else
                $model->quy = 4;
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->save();


            return redirect('taisan-nhadat/nam='.date_format($date,'Y').'&pb=all');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            $delete = $request->all();
            $model = TsNhaDat::where('id',$delete['iddelete'])
                ->first();
            if($model->delete()){
                $modeltt = TtTsNhaDat::where('mahs',$model->mahs)
                    ->delete();
            }

            return redirect('taisan-nhadat/nam='.$model->nam.'&pb=all');
        }else
            return view('errors.notlogin');
    }
}
