<?php

namespace App\Http\Controllers;

use App\CongBoGia;
use App\CongBoGiaDefault;
use App\HsCongBoGia;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HsCongBoGiaController extends Controller
{

    public function index($nam)
    {
        if(Session::has('admin')){

            $model = HsCongBoGia::where('nam',$nam)
                ->where('mahuyen',session('admin')->mahuyen)
                ->get();
            $modelpb = TtPhongBan::all();

            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }
            return view('manage.congbogia.index')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('nam',$nam)
                ->with('pageTitle','Thông tin hồ sơ công bố giá');

        }else
            return view('errors.notlogin');
    }

    public function showindex($nam,$pb){
        if(Session::has('admin')){

            if($pb == 'all')
                $model = HsCongBoGia::where('nam',$nam)
                    ->where('trangthai','Hoàn tất')
                    ->get();

            else
                $model = HsCongBoGia::where('nam',$nam)
                    ->where('mahuyen',$pb)
                    ->where('trangthai','Hoàn tất')
                    ->get();
            $modelpb = TtPhongBan::all();

            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }
            return view('manage.congbogia.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('nam',$nam)
                ->with('pb',$pb)
                ->with('pageTitle','Thông tin hồ sơ công bố giá');

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
            $modeldelete = CongBoGiaDefault::where('mahuyen',session('admin')->mahuyen)
                ->delete();
            return view('manage.congbogia.create')
                ->with('pageTitle','Hồ sơ công bố giá thêm mới');

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

            $model = new HsCongBoGia();
            $model->sohs = $insert['sohs'];
            $model->plhs = $insert['plhs'];
            $model->sotbkl = $insert['sotbkl'];
            $model->ngaynhap = $insert['ngaynhap'];
            $model->sovbdn = $insert['sovbdn'];
            $model->nguonvon = $insert['nguonvon'];
            $model->diadiemcongbo = $insert['diadiemcongbo'];
            $model->donvidn = $insert['donvidn'];

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
            $model->trangthai = 'Đang làm';

            if($model->save()){
                $this->createts($mahs);
            }

            return redirect('hoso-congbogia/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function createts($mahs){
        $modelts = CongBoGiaDefault::where('mahuyen',session('admin')->mahuyen)
            ->get();
        if(count($modelts) > 0) {
            foreach ($modelts as $ts) {
                $model = new CongBoGia();
                $model->tents = $ts->tents;
                $model->dacdiempl = $ts->dacdiempl;
                $model->thongsokt = $ts->thongsokt;
                $model->nguongoc = $ts->nguongoc;
                $model->dvt = $ts->dvt;
                $model->sl = $ts->sl;
                $model->nguyengiadenghi = $ts->nguyengiadenghi;
                $model->giadenghi = $ts->giadenghi;
                $model->nguyengiathamdinh = $ts->nguyengiathamdinh;
                $model->giatritstd = $ts->giatritstd;
                $model->giakththamdinh = $ts->giakththamdinh;
                $model->giaththamdinh = $ts->giaththamdinh;
                $model->gc = $ts->gc;
                $model->mahs = $mahs;
                $model->save();
            }
        }
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = HsCongBoGia::findOrFail($id);

            $modelts = CongBoGia::where('mahs',$model->mahs)
                ->get();

            return view('manage.congbogia.show')
                ->with('model',$model)
                ->with('modelts',$modelts)
                ->with('pageTitle','Thông tin hồ sơ công bố');
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if(Session::has('admin')){
            $model = HsCongBoGia::findOrFail($id);
            $modelts = CongBoGia::where('mahs',$model->mahs)
                ->get();

            return view('manage.congbogia.edit')
                ->with('model',$model)
                ->with('modelts',$modelts)
                ->with('pageTitle','Hồ sơ công bố giá chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $update = $request->all();
            $date = date_create($update['ngaynhap']);
            $thang = date_format($date,'m');

            $model = HsCongBoGia::findOrFail($id);
            $model->sohs = $update['sohs'];
            $model->plhs = $update['plhs'];
            $model->sotbkl = $update['sotbkl'];
            $model->ngaynhap = $update['ngaynhap'];
            $model->sovbdn = $update['sovbdn'];
            $model->nguonvon = $update['nguonvon'];
            $model->diadiemcongbo = $update['diadiemcongbo'];
            $model->donvidn = $update['donvidn'];

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

            return redirect('hoso-congbogia/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            $input = $request->all();
            $model = HsCongBoGia::where('id',$request['iddelete'])
                ->first();
            $nam =$model->nam;
            if($model->delete()){
                $modelts = CongBoGia::where('mahs',$model->mahs)
                    ->delete();
            }
            return redirect('hoso-congbogia/nam='.$nam);
        }else
            return view('errors.notlogin');
    }

    public function hoantat(Request $request){
        if(Session::has('admin')){
            $model = HsCongBoGia::where('id',$request['idhoantat'])
                ->first();
            //dd($model);
            $nam =$model->nam;
            $model->trangthai = 'Hoàn tất';
            $model->save();
            return redirect('hoso-congbogia/nam='.$nam);
        }else
            return view('errors.notlogin');
    }

    public function huy(Request $request){
        if(Session::has('admin')){
            $model = HsCongBoGia::where('id',$request['idhuy'])
                ->first();
            //dd($model);
            $nam =$model->nam;
            $model->trangthai = 'Đang làm';
            $model->save();
            return redirect('thongtin-congbogia/nam='.$nam.'&pb=all');
        }else
            return view('errors.notlogin');
    }
    public function view($id)
    {
        if(Session::has('admin')){
            $model = HsCongBoGia::findOrFail($id);

            $modelts = CongBoGia::where('mahs',$model->mahs)
                ->get();

            return view('manage.congbogia.view')
                ->with('model',$model)
                ->with('modelts',$modelts)
                ->with('pageTitle','Thông tin hồ sơ công bố giá');
        }else
            return view('errors.notlogin');
    }

}
