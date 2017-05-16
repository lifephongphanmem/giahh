<?php

namespace App\Http\Controllers;

use App\DmLoaiVanBan;
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
            $model_loaivb=DmLoaiVanBan::where('level','TW')->get();
            $array_lvb=array_column($model_loaivb->toarray(),'tenloaivanban','plttqd');

            foreach($model as $vb){
                $vb->tenloaivanban=$array_lvb[$vb->plttqd];
            }

            return view('manage.ttqd.tw.index')
                ->with('model',$model)
                ->with('model_loaivb',$model_loaivb)
                ->with('nam',$nam)
                ->with('pl',$pl)
                ->with('pageTitle','Thông tư quyết định TW');

        }else
            return view('errors.notlogin');
    }

    public function twcreate(){
        if(Session::has('admin')){
            $model_loaivb=DmLoaiVanBan::where('level','TW')->get();
            return view('manage.ttqd.tw.create')
                ->with('model_loaivb',$model_loaivb)
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
            
            $file=$request->file('tailieu');
            if(isset($file)){
                $filename = $mattqd.'_1_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu = $filename;
            }

            $file1=$request->file('tailieu1');
            if(isset($file1)){
                $filename = $mattqd.'_2_'.str_replace('.','',$file1->getClientOriginalName());
                $file1->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu1 = $filename;
            }

            $file2=$request->file('tailieu2');
            if(isset($file2)){
                $filename = $mattqd.'_3_'.str_replace('.','',$file2->getClientOriginalName());
                $file2->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu2 = $filename;
            }

            $file3=$request->file('tailieu3');
            if(isset($file3)){
                $filename = $mattqd.'_4_'.str_replace('.','',$file3->getClientOriginalName());
                $file3->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu3 = $filename;
            }

            $file4=$request->file('tailieu4');
            if(isset($file4)){
                $filename = $mattqd.'_5_'.str_replace('.','',$file4->getClientOriginalName());
                $file4->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu4 = $filename;
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
            $model_loaivb=array_column(DmLoaiVanBan::select('plttqd','tenloaivanban')->where('level','TW')->get()->toarray(),'tenloaivanban','plttqd');
            return view('manage.ttqd.tw.edit')
                ->with('model',$model)
                ->with('model_loaivb',$model_loaivb)
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
            //$model->mattqd = $mattqd;
            $model->nambh = $nam;
            $model->level = 'TW';

            if(isset($request->tailieu)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu);
                }
                $file=$request->file('tailieu');
                $filename = $mattqd.'_1_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu=$filename;
            }

            if(isset($request->tailieu1)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu1)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu1);
                }
                $file=$request->file('tailieu1');
                $filename = $mattqd.'_2_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu1=$filename;
            }

            if(isset($request->tailieu2)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu2)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu2);
                }
                $file=$request->file('tailieu2');
                $filename = $mattqd.'_3_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu2=$filename;
            }

            if(isset($request->tailieu3)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu3)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu3);
                }
                $file=$request->file('tailieu3');
                $filename = $mattqd.'_4_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu3=$filename;
            }

            if(isset($request->tailieu4)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu4)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu4);
                }
                $file=$request->file('tailieu4');
                $filename = $mattqd.'_5_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu4=$filename;
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
            $model_loaivb=DmLoaiVanBan::where('level','T')->get();
            $array_lvb=array_column($model_loaivb->toarray(),'tenloaivanban','plttqd');
            foreach($model as $vb){
                $vb->tenloaivanban=$array_lvb[$vb->plttqd];
            }
            return view('manage.ttqd.tinh.index')
                ->with('model',$model)
                ->with('model_loaivb',$model_loaivb)
                ->with('nam',$nam)
                ->with('pl',$pl)
                ->with('pageTitle','Thông tư quyết định Tỉnh');

        }else
            return view('errors.notlogin');
    }

    public function tinhcreate(){
        if(Session::has('admin')){
            $model_loaivb=DmLoaiVanBan::where('level','T')->get();
            return view('manage.ttqd.tinh.create')
                ->with('model_loaivb',$model_loaivb)
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
            
            $file=$request->file('tailieu');
            if(isset($file)){
                $filename = $mattqd.'_1_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu = $filename;
            }

            $file1=$request->file('tailieu1');
            if(isset($file1)){
                $filename = $mattqd.'_2_'.str_replace('.','',$file1->getClientOriginalName());
                $file1->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu1 = $filename;
            }

            $file2=$request->file('tailieu2');
            if(isset($file2)){
                $filename = $mattqd.'_3_'.str_replace('.','',$file2->getClientOriginalName());
                $file2->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu2 = $filename;
            }

            $file3=$request->file('tailieu3');
            if(isset($file3)){
                $filename = $mattqd.'_4_'.str_replace('.','',$file3->getClientOriginalName());
                $file3->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu3 = $filename;
            }

            $file4=$request->file('tailieu4');
            if(isset($file4)){
                $filename = $mattqd.'_5_'.str_replace('.','',$file4->getClientOriginalName());
                $file4->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu4 = $filename;
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
            $model_loaivb=array_column(DmLoaiVanBan::select('plttqd','tenloaivanban')->where('level','T')->get()->toarray(),'tenloaivanban','plttqd');
            return view('manage.ttqd.tinh.edit')
                ->with('model',$model)
                ->with('model_loaivb',$model_loaivb)
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
            //$model->mattqd = $mattqd;
            $model->nambh = $nam;
            $model->level = 'T';

            if(isset($request->tailieu)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu);
                }
                $file=$request->file('tailieu');
                $filename = $mattqd.'_1_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu=$filename;
            }

            if(isset($request->tailieu1)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu1)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu1);
                }
                $file=$request->file('tailieu1');
                $filename = $mattqd.'_2_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu1=$filename;
            }

            if(isset($request->tailieu2)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu2)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu2);
                }
                $file=$request->file('tailieu2');
                $filename = $mattqd.'_3_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu2=$filename;
            }

            if(isset($request->tailieu3)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu3)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu3);
                }
                $file=$request->file('tailieu3');
                $filename = $mattqd.'_4_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu3=$filename;
            }

            if(isset($request->tailieu4)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu4)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu4);
                }
                $file=$request->file('tailieu4');
                $filename = $mattqd.'_5_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu4=$filename;
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
            $file=$request->file('tailieu');
            if(isset($file)){
                $filename = $matkt.'_1_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu = $filename;
            }

            $file1=$request->file('tailieu1');
            if(isset($file1)){
                $filename = $matkt.'_2_'.str_replace('.','',$file1->getClientOriginalName());
                $file1->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu1 = $filename;
            }

            $file2=$request->file('tailieu2');
            if(isset($file2)){
                $filename = $matkt.'_3_'.str_replace('.','',$file2->getClientOriginalName());
                $file2->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu2 = $filename;
            }

            $file3=$request->file('tailieu3');
            if(isset($file3)){
                $filename = $matkt.'_4_'.str_replace('.','',$file3->getClientOriginalName());
                $file3->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu3 = $filename;
            }

            $file4=$request->file('tailieu4');
            if(isset($file4)){
                $filename = $matkt.'_5_'.str_replace('.','',$file4->getClientOriginalName());
                $file4->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu4 = $filename;
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

            if(isset($request->tailieu)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu);
                }
                $file=$request->file('tailieu');
                $filename = $model->matkt.'_1_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu=$filename;
            }

            if(isset($request->tailieu1)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu1)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu1);
                }
                $file=$request->file('tailieu1');
                $filename = $model->matkt.'_2_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu1=$filename;
            }

            if(isset($request->tailieu2)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu2)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu2);
                }
                $file=$request->file('tailieu2');
                $filename = $model->matkt.'_3_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu2=$filename;
            }

            if(isset($request->tailieu3)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu3)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu3);
                }
                $file=$request->file('tailieu3');
                $filename = $model->matkt.'_4_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu3=$filename;
            }

            if(isset($request->tailieu4)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->tailieu4)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->tailieu4);
                }
                $file=$request->file('tailieu4');
                $filename = $model->matkt.'_5_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->tailieu4=$filename;
            }

            $model->save();

            return redirect('thanhkiemtra-vegia/nam='.$nam);
        }else
            return view('errors.notlogin');
    }
    public function get_attackfile(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();

        $model = TtQd::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 1 </label >';
        if (isset($model->tailieu)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu).'">'.$model->tailieu.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 2 </label >';
        if (isset($model->tailieu1)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu1).'">'.$model->tailieu1.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 3 </label >';
        if (isset($model->tailieu2)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu2).'">'.$model->tailieu2.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 4 </label >';
        if (isset($model->tailieu3)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu3).'">'.$model->tailieu3.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 5 </label >';
        if (isset($model->tailieu4)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu4).'">'.$model->tailieu4.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['status'] = 'success';

        die(json_encode($result));
    }

    public function get_attackfile_thanhtra(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();

        $model = ThanhKiemTra::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 1 </label >';
        if (isset($model->tailieu)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu).'">'.$model->tailieu.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 2 </label >';
        if (isset($model->tailieu1)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu1).'">'.$model->tailieu1.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 3 </label >';
        if (isset($model->tailieu2)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu2).'">'.$model->tailieu2.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 4 </label >';
        if (isset($model->tailieu3)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu3).'">'.$model->tailieu3.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['message'] .='<div class="row" ><div class="col-md-6" ><div class="form-group" >';
        $result['message'] .='<label class="control-label" > File đính kèm 5 </label >';
        if (isset($model->tailieu4)) {
            $result['message'] .='<p ><a target = "_blank" href = "'.url('/data/uploads/attack/'.$model->tailieu4).'">'.$model->tailieu4.'</a ></p >';
        }
        $result['message'] .='</div ></div ></div >';

        $result['status'] = 'success';

        die(json_encode($result));
    }
}
