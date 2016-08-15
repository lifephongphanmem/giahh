<?php

namespace App\Http\Controllers;

use App\TsOtoKhac;
use App\TtPhongBan;
use App\TtTsOtoKhac;
use App\TtTsOtoKhacDefault;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TsOtoKhacController extends Controller
{

    public function index($nam,$pb)
    {
        if (Session::has('admin')) {
            if ($pb == 'all') {
                $model = TsOtoKhac::where('nam', $nam)
                    ->get();
            } else {
                $model = TsOtoKhac::where('nam', $nam)
                    ->where('mahuyen', $pb)
                    ->get();
            }
            $modelpb = TtPhongBan::all();
            return view('manage.taisannn.otokhac.index')
                ->with('model', $model)
                ->with('nam', $nam)
                ->with('pb', $pb)
                ->with('modelpb', $modelpb)
                ->with('pageTitle', 'Thông tin tài sản ôtô, tài sản khác');

        } else
            return view('errors.notlogin');
    }

    public function create()
    {
        if(Session::has('admin')){
            $model = TtTsOtoKhacDefault::where('mahuyen',session('admin')->mahuyen)
                ->delete();
            return view('manage.taisannn.otokhac.create')
                ->with('pageTitle','Thêm mới thông tin tài sản là ôtô, tài sản khác');
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

            $model = new TsOtoKhac();
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

            return redirect('taisan-otokhac/nam='.date_format($date,'Y').'&pb='.session('admin')->mahuyen);

        }else
            return view('errors.notlogin');
    }

    public function createts($mahs){
        $modelts = TtTsOtoKhacDefault::where('mahuyen',session('admin')->mahuyen)
            ->get();
        if(count($modelts) > 0) {
            foreach ($modelts as $ts) {
                $model = new TtTsOtoKhac();
                $model->tents = $ts->tents;
                $model->slts = $ts->slts;
                $model->tskt = $ts->tskt;
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
            $model = TsOtoKhac::findOrFail($id);
            $modeltt = TtTsOtoKhac::where('mahs',$model->mahs)
                ->get();

            return view('manage.taisannn.otokhac.show')
                ->with('model',$model)
                ->with('modeltt',$modeltt)
                ->with('pageTitle','Thông tin tài sản là ôtô, tài sản khác');
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if(Session::has('admin')){
            $model = TsOtoKhac::findOrFail($id);
            $modeltt = TtTsOtoKhac::where('mahs',$model->mahs)
                ->get();

            return view('manage.taisannn.otokhac.edit')
                ->with('model',$model)
                ->with('modeltt',$modeltt)
                ->with('pageTitle','Chỉnh sửa thông tin tài sản là ôtô, tài sản khác');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $update = $request->all();
            $model = TsOtoKhac::findOrFail($id);

            $date = date_create($update['ngaynhap']);
            $thang = date_format($date,'m');

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

            return redirect('taisan-otokhac/nam='.date_format($date,'Y').'&pb='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {if(Session::has('admin')){
        $delete = $request->all();
        $model = TsOtoKhac::where('id',$delete['iddelete'])
            ->first();
        if($model->delete()){
            $modeltt = TtTsOtoKhac::where('mahs',$model->mahs)
                ->delete();
        }

        return redirect('taisan-otokhac/nam='.$model->nam.'&pb=all');
    }else
        return view('errors.notlogin');//
    }
}
