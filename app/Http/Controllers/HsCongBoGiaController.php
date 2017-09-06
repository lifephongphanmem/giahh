<?php

namespace App\Http\Controllers;

use App\CongBoGia;
use App\CongBoGiaDefault;
use App\HsCongBoGia;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class HsCongBoGiaController extends Controller
{

    public function index($nam)
    {
        if(Session::has('admin')){

            $model = HsCongBoGia::where('nam',$nam)
                ->where('mahuyen',session('admin')->mahuyen)
                ->where('plhs','Công bố giá')
                ->get();
            $modelpb = TtPhongBan::all();

            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }
            return view('manage.congbogia.index')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('nam',$nam)
                ->with('plhs','Công bố giá')
                ->with('pageTitle','Thông tin hồ sơ công bố giá');

        }else
            return view('errors.notlogin');
    }

    public function indexbs($nam)
    {
        if(Session::has('admin')){

            $model = HsCongBoGia::where('nam',$nam)
                ->where('mahuyen',session('admin')->mahuyen)
                ->where('plhs','Công bố giá bổ sung')
                ->get();
            $modelpb = TtPhongBan::all();

            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }
            return view('manage.congbogia.index')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('nam',$nam)
                ->with('plhs','Công bố giá bổ sung')
                ->with('pageTitle','Thông tin hồ sơ công bố giá bổ sung');

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
            CongBoGiaDefault::where('mahuyen',session('admin')->mahuyen)->delete();
            return view('manage.congbogia.create')
                ->with('pageTitle','Hồ sơ công bố giá thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function create_dk()
    {
        if(Session::has('admin')){
            return view('manage.congbogia.create_dk')
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
            $model->ngaynhap = getDateToDb($insert['ngaynhap']);
            $model->sovbdn = $insert['sovbdn'];
            $model->nguonvon = $insert['nguonvon'];
            $model->diadiemcongbo = $insert['diadiemcongbo'];
            $model->donvidn = $insert['donvidn'];
            $model->phanloai = 'CHITIET';
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

    public function store_dk(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create($insert['ngaynhap']);
            $thang = date_format($date,'m');
            $mahs = getdate()[0];

            $model = new HsCongBoGia();

            $file=$request->file('filedk');
            if(isset($file)){
                $filename = $mahs.'_1_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk = $filename;
            }

            $file1=$request->file('filedk1');
            if(isset($file1)){
                $filename = $mahs.'_2_'.chuanhoatruong($file1->getClientOriginalName());
                $file1->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk1 = $filename;
            }

            $file2=$request->file('filedk2');
            if(isset($file2)){
                $filename = $mahs.'_3_'.chuanhoatruong($file2->getClientOriginalName());
                $file2->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk2 = $filename;
            }

            $file3=$request->file('filedk3');
            if(isset($file3)){
                $filename = $mahs.'_4_'.chuanhoatruong($file3->getClientOriginalName());
                $file3->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk3 = $filename;
            }

            $file4=$request->file('filedk4');
            if(isset($file4)){
                $filename = $mahs.'_5_'.chuanhoatruong($file4->getClientOriginalName());
                $file4->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk4 = $filename;
            }

            $model->sohs = $insert['sohs'];
            $model->plhs = $insert['plhs'];
            $model->phanloai = 'DINHKEM';
            $model->sotbkl = $insert['sotbkl'];
            $model->ngaynhap = getDateToDb($insert['ngaynhap']);
            $model->sovbdn = $insert['sovbdn'];
            $model->nguonvon = $insert['nguonvon'];
            $model->diadiemcongbo = $insert['diadiemcongbo'];
            $model->donvidn = $insert['donvidn'];
            $model->quy = Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->mahs = $mahs;
            $model->trangthai = 'Đang làm';
            $model->save();

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

    public function edit_dk($id)
    {
        if(Session::has('admin')){
            $model = HsCongBoGia::findOrFail($id);
            return view('manage.congbogia.edit_dk')
                ->with('model',$model)
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
            $model->ngaynhap = getDateToDb($update['ngaynhap']);
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

    public function update_dk(Request $request, $id)
    {
        if(Session::has('admin')){
            $update = $request->all();
            $date = date_create($update['ngaynhap']);
            $thang = date_format($date,'m');

            $model = HsCongBoGia::findOrFail($id);
            if(isset($request->filedk)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk);
                }
                $file=$request->file('filedk');
                $filename = $update['mahs'].'_1_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk=$filename;
            }

            if(isset($request->filedk1)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk1)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk1);
                }
                $file=$request->file('filedk1');
                $filename = $update['mahs'].'_2_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk1=$filename;
            }

            if(isset($request->filedk2)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk2)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk2);
                }
                $file=$request->file('filedk2');
                $filename = $update['mahs'].'_3_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk2=$filename;
            }

            if(isset($request->filedk3)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk3)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk3);
                }
                $file=$request->file('filedk3');
                $filename = $update['mahs'].'_4_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk3=$filename;
            }

            if(isset($request->filedk4)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk4)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk4);
                }
                $file=$request->file('filedk4');
                $filename = $update['mahs'].'_5_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk4=$filename;
            }

            $model->sohs = $update['sohs'];
            $model->plhs = $update['plhs'];
            $model->sotbkl = $update['sotbkl'];
            $model->ngaynhap = getDateToDb($update['ngaynhap']);
            $model->sovbdn = $update['sovbdn'];
            $model->nguonvon = $update['nguonvon'];
            $model->diadiemcongbo = $update['diadiemcongbo'];
            $model->donvidn = $update['donvidn'];
            $model->quy = Thang2Quy($thang);
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
