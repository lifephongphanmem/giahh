<?php

namespace App\Http\Controllers;

use App\HsThamDinhGia;
use App\ThamDinhGia;
use App\ThamDinhGiaDefault;
use App\ThamDinhGiaH;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HsThamDinhGiaController extends Controller
{
    public function index($nam)
    {
        if(Session::has('admin')){
            //dd(session('admin')->mahuyen);

            $model = HsThamDinhGia::where('nam',$nam)
                ->where('mahuyen',session('admin')->mahuyen)
                ->get();

            //dd($model);

            $modelpb = TtPhongBan::all();
            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }

            return view('manage.thamdinhgia.index')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('nam',$nam)
                ->with('pageTitle','Thông tin hồ sơ thẩm định giá');

        }else
            return view('errors.notlogin');
    }

    public function showindex($nam,$pb){
        if(Session::has('admin')){

            //dd(session('admin')->level);

            if($pb == 'all')
                $model = HsThamDinhGia::where('nam',$nam)
                    ->where('trangthai','Hoàn tất')
                    ->get();

            else
                $model = HsThamDinhGia::where('nam',$nam)
                    ->where('trangthai','Hoàn tất')
                    ->where('mahuyen',$pb)
                    ->get();
            $modelpb = TtPhongBan::all();

            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }
            return view('manage.thamdinhgia.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('nam',$nam)
                ->with('pb',$pb)
                ->with('pageTitle','Thông tin hồ sơ thẩm định giá');

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
            $modeldelete = ThamDinhGiaDefault::where('mahuyen',session('admin')->mahuyen)
                ->delete();
            return view('manage.thamdinhgia.create')
                ->with('pageTitle','Hồ sơ thẩm định giá thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function create_dk()
    {
        if(Session::has('admin')){
            return view('manage.thamdinhgia.create_dk')
                ->with('pageTitle','Hồ sơ thẩm định giá thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create($insert['thoidiem']);
            $thang = date_format($date,'m');
            $mahs = getdate()[0];

            $model = new HsThamDinhGia();
            $model->diadiem = $insert['diadiem'];
            $model->thoidiem = $insert['thoidiem'];
            $model->ppthamdinh = $insert['ppthamdinh'];
            $model->mucdich = $insert['mucdich'];
            $model->dvyeucau = $insert['dvyeucau'];
            $model->thoihan = $insert['thoihan'];
            $model->sotbkl = $insert['sotbkl'];
            $model->hosotdgia = $insert['hosotdgia'];
            $model->thang = date_format($date,'m');
            $model->phanloai = 'CHITIET';
            if($thang == 1 || $thang == 2 || $thang == 3)
                $model->quy = 1;
            elseif($thang == 4 || $thang == 5 || $thang == 6)
                $model->quy = 2;
            elseif($thang == 7 || $thang == 8 || $thang == 9)
                $model->quy = 3;
            else
                $model->quy = 4;
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->nguonvon = $insert['nguonvon'];
            $model->trangthai = 'Đang làm';
            $model->mahs = $mahs;
            if($model->save()){
                $this->createts($mahs);
                $modelh = new ThamDinhGiaH();
                $modelh->thaotac = 'Tạo mới hồ sơ thẩm định';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->mahs = $mahs;
                $model->datanew = json_encode($insert);
                $modelh->save();
            }

            return redirect('hoso-thamdinhgia/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function store_dk(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create($insert['thoidiem']);
            $thang = date_format($date,'m');
            $mahs = getdate()[0];

            $file=$request->file('filedk');
            $filename =$mahs.'_'.$file->getClientOriginalName();
            $file->move(public_path() . '/data/uploads/attack/', $filename);

            $model = new HsThamDinhGia();
            $model->diadiem = $insert['diadiem'];
            $model->thoidiem = $insert['thoidiem'];
            $model->ppthamdinh = $insert['ppthamdinh'];
            $model->mucdich = $insert['mucdich'];
            $model->dvyeucau = $insert['dvyeucau'];
            $model->thoihan = $insert['thoihan'];
            $model->sotbkl = $insert['sotbkl'];
            $model->hosotdgia = $insert['hosotdgia'];
            $model->thang = date_format($date,'m');
            $model->phanloai = 'DINHKEM';
            $model->filedk = $filename;
            $model->quy = Thang2Quy($thang);
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->nguonvon = $insert['nguonvon'];
            $model->trangthai = 'Đang làm';
            $model->mahs = $mahs;
            $model->save();

            return redirect('hoso-thamdinhgia/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function createts($mahs){
        $modelts = ThamDinhGiaDefault::where('mahuyen',session('admin')->mahuyen)
            ->get();
        if(count($modelts) > 0) {
            foreach ($modelts as $ts) {
                $model = new ThamDinhGia();
                $model->tents = $ts->tents;
                $model->dacdiempl = $ts->dacdiempl;
                $model->thongsokt = $ts->thongsokt;
                $model->nguongoc = $ts->nguongoc;
                $model->dvt = $ts->dvt;
                $model->sl = $ts->sl;
                $model->nguyengiadenghi = $ts->nguyengiadenghi;
                $model->giadenghi = $ts->giadenghi;
                $model->nguyengiathamdinh = $ts->nguyengiathamdinh;
                $model->giaththamdinh = $ts->giaththamdinh;
                $model->giakththamdinh = $ts->giakththamdinh;
                $model->giatritstd = $ts->giatritstd;
                $model->gc = $ts->gc;
                $model->mahs = $mahs;
                $model->save();
            }
        }
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = HsThamDinhGia::findOrFail($id);

            $modelts = ThamDinhGia::where('mahs',$model->mahs)
                ->get();

            return view('manage.thamdinhgia.show')
                ->with('model',$model)
                ->with('modelts',$modelts)
                ->with('pageTitle','Thông tin hồ sơ thẩm định');
        }else
            return view('errors.notlogin');
    }

    public function view($id)
    {
        if(Session::has('admin')){
            $model = HsThamDinhGia::findOrFail($id);

            $modelts = ThamDinhGia::where('mahs',$model->mahs)
                ->get();

            return view('manage.thamdinhgia.view')
                ->with('model',$model)
                ->with('modelts',$modelts)
                ->with('pageTitle','Thông tin hồ sơ thẩm định');
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if(Session::has('admin')){
            $model = HsThamDinhGia::findOrFail($id);
            $modelts = ThamDinhGia::where('mahs',$model->mahs)
                ->get();

            return view('manage.thamdinhgia.edit')
                ->with('model',$model)
                ->with('modelts',$modelts)
                ->with('pageTitle','Hồ sơ thẩm định giá chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function edit_dk($id)
    {
        if(Session::has('admin')){
            $model = HsThamDinhGia::findOrFail($id);
            return view('manage.thamdinhgia.edit_dk')
                ->with('model',$model)
                ->with('pageTitle','Hồ sơ thẩm định giá chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $update = $request->all();

            $date = date_create($update['thoidiem']);
            $thang = date_format($date,'m');

            $model = HsThamDinhGia::findOrFail($id);
            /* add history*/
            $arraymodel = $model->toarray();
            $arrayold = array_intersect_key($arraymodel,$update);
            $arraynew = array_intersect_key($update,$arrayold);


            $model->diadiem = $update['diadiem'];
            $model->thoidiem = $update['thoidiem'];
            $model->ppthamdinh = $update['ppthamdinh'];
            $model->mucdich = $update['mucdich'];
            $model->dvyeucau = $update['dvyeucau'];
            $model->thoihan = $update['thoihan'];
            $model->sotbkl = $update['sotbkl'];
            $model->hosotdgia = $update['hosotdgia'];
            $model->thang = date_format($date,'m');
            if($thang == 1 || $thang == 2 || $thang == 3)
                $model->quy = 1;
            elseif($thang == 4 || $thang == 5 || $thang == 6)
                $model->quy = 2;
            elseif($thang == 7 || $thang == 8 || $thang == 9)
                $model->quy = 3;
            else
                $model->quy = 4;
            $model->nguonvon = $update['nguonvon'];
            $model->nam = date_format($date,'Y');
            if($model->save()) {
                $this->updateh($arrayold, $arraynew, $model->mahs);
            }

            return redirect('hoso-thamdinhgia/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function update_dk(Request $request, $id)
    {
        if(Session::has('admin')){
            $update = $request->all();

            $date = date_create($update['thoidiem']);
            $thang = date_format($date,'m');

            $model = HsThamDinhGia::findOrFail($id);
            if(isset($request->filedk)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk);
                }
                $file=$request->file('filedk');

                $filename =$update['mahs'].'_'.$file->getClientOriginalName();
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk=$filename;
            }
            /* add history*/
            $arraymodel = $model->toarray();
            $arrayold = array_intersect_key($arraymodel,$update);
            $arraynew = array_intersect_key($update,$arrayold);

            $model->diadiem = $update['diadiem'];
            $model->thoidiem = $update['thoidiem'];
            $model->ppthamdinh = $update['ppthamdinh'];
            $model->mucdich = $update['mucdich'];
            $model->dvyeucau = $update['dvyeucau'];
            $model->thoihan = $update['thoihan'];
            $model->sotbkl = $update['sotbkl'];
            $model->hosotdgia = $update['hosotdgia'];
            $model->thang = date_format($date,'m');
            $model->quy = Thang2Quy($thang);
            $model->nguonvon = $update['nguonvon'];
            $model->nam = date_format($date,'Y');
            if($model->save()) {
                $this->updateh($arrayold, $arraynew, $model->mahs);
            }

            return redirect('hoso-thamdinhgia/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function updateh($dataold,$datanew,$mahs){
        $arrysosanh = array_diff_assoc($datanew,$dataold);
        //dd(empty($arrysosanh));
        if(!empty($arrysosanh)) {
            $thaydoi = '';
            foreach ($arrysosanh as $key => $value) {
                foreach ($dataold as $keyold => $valueold) {
                    if ($key == $keyold) {
                        $thaydoi = $thaydoi . $key . ':' . $valueold . '=>' . $value . '; ';
                    }
                }
            }

            $model = new ThamDinhGiaH();
            $model->thaotac = 'Cập nhật, Thay đổi chi tiết hồ sơ thẩm định';
            $model->dataold = json_encode($dataold);
            $model->datanew = json_encode($datanew);
            $model->thaydoi = $thaydoi;
            $model->name = session('admin')->name;
            $model->username = session('admin')->username;
            $model->mahs = $mahs;
            $model->save();
        }
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            //$input = $request->all();
            $model = HsThamDinhGia::where('id',$request['iddelete'])
                ->first();
            $nam =$model->nam;
            if($model->delete()){
                $modelts = ThamDinhGia::where('mahs',$model->mahs)
                    ->delete();
                $modelh = ThamDinhGiaH::where('mahs',$model->mahs)
                    ->delete();
            }
            return redirect('hoso-thamdinhgia/nam='.$nam);


        }else
            return view('errors.notlogin');
    }

    public function hoantat(Request $request){
        if(Session::has('admin')){
            $model = HsThamDinhGia::where('id',$request['idhoantat'])
                ->first();
            //dd($model);
            $nam =$model->nam;
            $model->trangthai = 'Hoàn tất';
            if($model->save()){
                $modelh = new ThamDinhGiaH();
                $modelh->mahs = $model->mahs;
                $modelh->thaotac = 'Hoàn tất hồ sơ';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }
            return redirect('hoso-thamdinhgia/nam='.$nam);
        }else
            return view('errors.notlogin');
    }

    public function huy(Request $request){
        if(Session::has('admin')){
            $model = HsThamDinhGia::where('id',$request['idhuy'])
                ->first();
            //dd($model);
            $nam =$model->nam;
            $model->trangthai = 'Đang làm';
            if($model->save()){
                $modelh = new ThamDinhGiaH();
                $modelh->mahs = $model->mahs;
                $modelh->thaotac = 'Hủy hoàn tất hồ sơ';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }
            return redirect('thongtin-thamdinhgia/nam='.$nam.'&pb=all');
        }else
            return view('errors.notlogin');
    }

    public function history($mahs){
        if(Session::has('admin')){
            $model = ThamDinhGiaH::where('mahs',$mahs)
                ->get();
            return view('manage.thamdinhgia.history.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin lịch sử hồ sơ thẩm định giá');
        }else
            return view('errors.notlogin');
    }

}
