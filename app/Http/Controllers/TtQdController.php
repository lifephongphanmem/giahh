<?php

namespace App\Http\Controllers;

use App\TtQd;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
}
