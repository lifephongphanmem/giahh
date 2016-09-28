<?php

namespace App\Http\Controllers;

use App\ThanhKiemTra;
use App\TtQd;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TtQdController extends Controller
{
    //TW
    public function tw($nam,$pl){
        if(Session::has('admin')){

            if($pl == 'all'){
                $model = TtQd::where('nambh',$nam)
                    ->where('level','TW')
                    ->get();
            }else{
                $model = TtQd::where('nambh',$nam)
                    ->where('level','TW')
                    ->where('plttqd',$pl)
                    ->get();
            }

            return view('manage.ttqd.tw.index')
                ->with('model',$model)
                ->with('nam',$nam)
                ->with('pl',$pl)
                ->with('pageTitle','Thông tư quyết định TW');

        }else
            return view('errors.notlogin');
    }

    public function twcreate(){
        if(Session::has('admin')){
            return view('manage.ttqd.tw.create')
                ->with('pageTitle','Thông tư quyết định thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function twstore(Request $request){
        if(Session::has('admin')){
            $insert = $request->all();
            $mattqd = getdate()[0];
            $nam = intval(date('Y'));

            $model = new TtQd();
            $model->khvb = $insert['khvb'];
            $model->dvbanhanh = $insert['dvbanhanh'];
            $model->plttqd = $insert['plttqd'];
            $model->ngaybh = $insert['ngaybh'];
            $model->ngayad = $insert['ngayad'];
            $model->tieude = $insert['tieude'];
            $model->ghichu = $insert['ghichu'];
            $model->mattqd = $mattqd;
            $model->nambh = $nam;
            $model->level = 'TW';
            if($request->hasFile('img')){
                $img = $request->file('img');
                $name = $img->getClientOriginalName();
                $newname = $mattqd .".".substr($name, strpos($name, '.') + 1);
                $img->move(public_path() . '/data/uploads/ttqd', $newname);
                $model->tailieu = $newname;
            }
            $model->save();

            return redirect('thongtu-quyetdinh-tw/nam='.$nam.'&pl=all');

        }else
            return view('errors.notlogin');
    }

    public function twdelete(Request $request){
        if(Session::has('admin')){
            $input = $request->all();

            $model = TtQd::where('id',$input['iddelete'])
                ->first();
            $nam = $model->nambh;
            $path = public_path() . '/data/uploads/ttqd/'.$model->tailieu;
            File::Delete($path);
            $model->delete();
            return redirect('thongtu-quyetdinh-tw/nam='.$nam.'&pl=all');

        }else
            return view('errors.notlogin');
    }

    public function twedit($id){
        if(Session::has('admin')){
            $model = TtQd::findOrFail($id);
            return view('manage.ttqd.tw.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tư quyết định chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function twupdate(Request $request,$id){
        if(Session::has('admin')){
            $update = $request->all();
            $model = TtQd::findOrFail($id);
            $nam = $model->nambh;
            $mattqd = $model->mattqd;

            $model->khvb = $update['khvb'];
            $model->dvbanhanh = $update['dvbanhanh'];
            $model->plttqd = $update['plttqd'];
            $model->ngaybh = $update['ngaybh'];
            $model->ngayad = $update['ngayad'];
            $model->tieude = $update['tieude'];
            $model->ghichu = $update['ghichu'];
            $model->mattqd = $mattqd;
            $model->nambh = $nam;
            $model->level = 'TW';
            if($request->hasFile('img')){
                $img = $request->file('img');
                $name = $img->getClientOriginalName();
                $newname = $mattqd .".".substr($name, strpos($name, '.') + 1);
                $img->move(public_path() . '/data/uploads/ttqd', $newname);
                $model->tailieu = $newname;
            }
            $model->save();

            return redirect('thongtu-quyetdinh-tw/nam='.$nam.'&pl=all');
        }else
            return view('errors.notlogin');
    }


    //Tỉnh
    public function tinh($nam,$pl){
        if(Session::has('admin')){

            if($pl == 'all'){
                $model = TtQd::where('nambh',$nam)
                    ->where('level','T')
                    ->get();
            }else{
                $model = TtQd::where('nambh',$nam)
                    ->where('level','T')
                    ->where('plttqd',$pl)
                    ->get();
            }

            return view('manage.ttqd.tinh.index')
                ->with('model',$model)
                ->with('nam',$nam)
                ->with('pl',$pl)
                ->with('pageTitle','Thông tư quyết định Tỉnh');

        }else
            return view('errors.notlogin');
    }

    public function tinhcreate(){
        if(Session::has('admin')){
            return view('manage.ttqd.tinh.create')
                ->with('pageTitle','Thông tư quyết định thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function tinhstore(Request $request){
        if(Session::has('admin')){
            $insert = $request->all();
            $mattqd = getdate()[0];
            $nam = intval(date('Y'));

            $model = new TtQd();
            $model->khvb = $insert['khvb'];
            $model->dvbanhanh = $insert['dvbanhanh'];
            $model->plttqd = $insert['plttqd'];
            $model->ngaybh = $insert['ngaybh'];
            $model->ngayad = $insert['ngayad'];
            $model->tieude = $insert['tieude'];
            $model->ghichu = $insert['ghichu'];
            $model->mattqd = $mattqd;
            $model->nambh = $nam;
            $model->level = 'T';
            if($request->hasFile('img')){
                $img = $request->file('img');
                $name = $img->getClientOriginalName();
                $newname = $mattqd .".".substr($name, strpos($name, '.') + 1);
                $img->move(public_path() . '/data/uploads/ttqd', $newname);
                $model->tailieu = $newname;
            }
            $model->save();

            return redirect('thongtu-quyetdinh-tinh/nam='.$nam.'&pl=all');

        }else
            return view('errors.notlogin');
    }

    public function tinhdelete(Request $request){
        if(Session::has('admin')){
            $input = $request->all();

            $model = TtQd::where('id',$input['iddelete'])
                ->first();
            $nam = $model->nambh;
            $path = public_path() . '/data/uploads/ttqd/'.$model->tailieu;
            File::Delete($path);
            $model->delete();
            return redirect('thongtu-quyetdinh-tinh/nam='.$nam.'&pl=all');

        }else
            return view('errors.notlogin');
    }

    public function tinhedit($id){
        if(Session::has('admin')){
            $model = TtQd::findOrFail($id);
            return view('manage.ttqd.tinh.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tư quyết định chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function tinhupdate(Request $request,$id){
        if(Session::has('admin')){
            $update = $request->all();
            $model = TtQd::findOrFail($id);
            $nam = $model->nambh;
            $mattqd = $model->mattqd;

            $model->khvb = $update['khvb'];
            $model->dvbanhanh = $update['dvbanhanh'];
            $model->plttqd = $update['plttqd'];
            $model->ngaybh = $update['ngaybh'];
            $model->ngayad = $update['ngayad'];
            $model->tieude = $update['tieude'];
            $model->ghichu = $update['ghichu'];
            $model->mattqd = $mattqd;
            $model->nambh = $nam;
            $model->level = 'T';
            if($request->hasFile('img')){
                $img = $request->file('img');
                $name = $img->getClientOriginalName();
                $newname = $mattqd .".".substr($name, strpos($name, '.') + 1);
                $img->move(public_path() . '/data/uploads/ttqd', $newname);
                $model->tailieu = $newname;
            }
            $model->save();

            return redirect('thongtu-quyetdinh-tinh/nam='.$nam.'&pl=all');
        }else
            return view('errors.notlogin');
    }

    public function checkkhvb(Request $request){
        $input = $request->all();
        $model = TtQd::where('khvb',$input['khvb'])
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }

    public function thanhkiemtra($nam){
        if(Session::has('admin')){
            $model = ThanhKiemTra::where('nam',$nam)
                ->get();
            return view('manage.ttqd.thanhkiemtra.index')
                ->with('model',$model)
                ->with('nam',$nam)
                ->with('pageTitle','Thanh kiểm tra về giá');

        }else
            return view('errors.notlogin');
    }

    public function thanhkiemtracreate(){
        if(Session::has('admin')){


            return view('manage.ttqd.thanhkiemtra.create')
                ->with('pageTitle','Thêm mới thông tin thanh kiểm tra về giá');

        }else
            return view('errors.notlogin');
    }

    public function checkkhvbtkt(Request $request){
        $input = $request->all();
        $model = ThanhKiemTra::where('khvb',$input['khvb'])
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }

    public function thanhkiemtrastore(Request $request){
        if(Session::has('admin')){
            $insert = $request->all();
            $matkt = getdate()[0];
            $nam = intval(date('Y'));

            $model = new ThanhKiemTra();
            $model->khvb = $insert['khvb'];
            $model->doankt = $insert['doankt'];
            $model->thoidiem = $insert['thoidiem'];
            $model->noidung = $insert['noidung'];
            $model->matkt = $matkt;
            $model->nam = $nam;
            if($request->hasFile('img')){
                $img = $request->file('img');
                $name = $img->getClientOriginalName();
                $newname = $matkt .".".substr($name, strpos($name, '.') + 1);
                $img->move(public_path() . '/data/uploads/thanhkiemtra', $newname);
                $model->tailieu = $newname;
            }
            $model->save();

            return redirect('thanhkiemtra-vegia/nam='.$nam);

        }else
            return view('errors.notlogin');
    }

    public function thanhkiemtradelete(Request $request){
        if(Session::has('admin')){
            $input = $request->all();

            $model = ThanhKiemTra::where('id',$input['iddelete'])
                ->first();
            $nam = $model->nam;
            $path = public_path() . '/data/uploads/thanhkiemtra/'.$model->tailieu;
            File::Delete($path);
            $model->delete();
            return redirect('thanhkiemtra-vegia/nam='.$nam);

        }else
            return view('errors.notlogin');
    }

    public function thanhkiemtraedit($id){
        if(Session::has('admin')){
            $model = ThanhKiemTra::findOrFail($id);
            return view('manage.ttqd.thanhkiemtra.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa thông tin thanh kiểm tra về giá');
        }else
            return view('errors.notlogin');
    }

    public function thanhkiemtraupdate(Request $request,$id){
        if(Session::has('admin')){
            $update = $request->all();
            $model = ThanhKiemTra::findOrFail($id);
            $nam = $model->nam;

            $model->khvb = $update['khvb'];
            $model->doankt = $update['doankt'];
            $model->thoidiem = $update['thoidiem'];
            $model->noidung = $update['noidung'];
            if($request->hasFile('img')){
                $img = $request->file('img');
                $name = $img->getClientOriginalName();
                $newname = $model->matkt.".".substr($name, strpos($name, '.') + 1);
                $img->move(public_path() . '/data/uploads/thanhkiemtra', $newname);
                $model->tailieu = $newname;
            }
            $model->save();

            return redirect('thanhkiemtra-vegia/nam='.$nam);
        }else
            return view('errors.notlogin');
    }
}
