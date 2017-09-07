<?php

namespace App\Http\Controllers;

use App\DmLoaiDat;
use App\GiaDat;
use App\GiaDatDefault;
use App\HsGiaDat;
use App\TtPhongBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class HsGiaDat_LoaiDatController extends Controller
{
    public function thoidiem()
    {
        if(Session::has('admin')){
            $model = DmLoaiDat::all();
            return view('manage.giadat.loaidat.thoidiem.index')
                ->with('model',$model)
                ->with('pageTitle','Chọn phân loại đất nhập báo cáo giá đất');
        }else{
            return view('errors.notlogin');
        }
    }

    public function showthoidiem()
    {
        if(Session::has('admin')){
            $model = DmLoaiDat::all();
            return view('manage.giadat.loaidat.thoidiem.showindex')
                ->with('model',$model)
                ->with('pageTitle','Chọn phân loại đất nhập báo cáo giá đất');
        }else
            return view('errors.notlogin');
    }

    public function index($maloaigia,$nam)
    {
        if(Session::has('admin')){

            $model = HsGiaDat::where('maloaigia',$maloaigia)
                ->where('nam',$nam)
                ->where('mahuyen',session('admin')->mahuyen)
                ->get();

            $modelpb = TtPhongBan::all();
            $this->getDetail($model);

            return view('manage.giadat.loaidat.index')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('maloaigia',$maloaigia)
                ->with('nam',$nam)
                ->with('url','/giadat_phanloai/')
                ->with('pageTitle','Thông tin hồ sơ giá đất theo phân loại đất');
        }else
            return view('errors.notlogin');
    }

    public function showindex($maloaigia,$nam,$pb)
    {
        if(Session::has('admin')){
            $model = HsGiaDat::where('maloaigia',$maloaigia)
                ->where('nam',$nam)
                ->where('trangthai','Hoàn tất')
                ->get();
            if($pb != 'all') {
                $model = $model->where('mahuyen', $pb);
            }
            $modelpb = TtPhongBan::all();
            $this->getDetail($model);

            return view('manage.giadat.loaidat.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('maloaigia',$maloaigia)
                ->with('nam',$nam)
                ->with('pb',$pb)
                ->with('url','/thongtin_giadat_phanloai/')
                ->with('pageTitle','Thông tin hồ sơ giá đất theo phân loại đất');
        }else
            return view('errors.notlogin');
    }

    function getDetail($model)
    {
        $dmpb = array_column(TtPhongBan::select('ma', 'ten')->get()->toarray(), 'ten', 'ma');
        //$dmloaidat = array_column(DmLoaiDat::select('maloaigia', 'loaidat')->get()->toarray(), 'loaidat', 'maloaigia');

        foreach ($model as $ct) {
            $ct->tenpb = array_key_exists($ct->mahuyen, $dmpb) ? $dmpb[$ct->mahuyen] : '';
            //$ct->tenloaigia = array_key_exists($ct->maloaigia, $dmloaidat) ? $dmloaidat[$ct->maloaigia] : '';
            //$ct->tenloaihh = array_key_exists($ct->maloaihh, $dmloaihanghoa) ? $dmloaihanghoa[$ct->maloaihh] : '';
        }
    }

    public function create($maloaigia)
    {
        if(Session::has('admin')){
            GiaDatDefault::where('mahuyen',session('admin')->mahuyen)->delete();
            return view('manage.giadat.loaidat.create')
                ->with('maloaigia',$maloaigia)
                ->with('pageTitle','Thông tin giá đất thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function create_dk($maloaigia)
    {
        if(Session::has('admin')){
            return view('manage.giadat.loaidat.create_dk')
                ->with('maloaigia',$maloaigia)
                ->with('pageTitle','Thông tin giá đất thêm mới');
          }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create(getDateToDb($insert['tgnhap']));
            $thang = date_format($date,'m');
            $mahs = getdate()[0];
            $mahuyen = session('admin')->mahuyen;

            $model = new HsGiaDat();
            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->tgapdung = getDateToDb($insert['tgapdung']);
            $model->phanloai = 'CHITIET';
            $model->quy = Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->mahuyen = $mahuyen;
            $model->mahs = $mahs;
            $model->maloaigia = $insert['maloaigia'];
            if($model->save()){
                $hanghoa = GiaDatDefault::select('maloaigia','khuvuc','vitri1','vitri2','vitri3','vitri4',DB::raw($mahs." as mahs"))->where('mahuyen',$mahuyen)->get()->toarray();
                GiaDat::insert($hanghoa);
            }

            return redirect('giadat_phanloai/loaidat='.$insert['maloaigia'].'/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function store_dk(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create(getDateToDb($insert['tgnhap']));
            $thang = date_format($date,'m');
            $mahs = getdate()[0];
            $mahuyen = session('admin')->mahuyen;

            $model = new HsGiaDat();

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

            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->tgapdung = getDateToDb($insert['tgapdung']);
            $model->maloaigia = $insert['maloaigia'];
            $model->phanloai = 'DINHKEM';
            $model->quy = Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->mahuyen = $mahuyen;
            $model->mahs = $mahs;
            $model->save();

            return redirect('giadat_phanloai/loaidat='.$insert['maloaigia'].'/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = HsGiaDat::findOrFail($id);
            $modeltthh = GiaDat::where('mahs',$model->mahs)->get();

            return view('manage.giadat.loaidat.show')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                ->with('pageTitle','Thông tin giá đất chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function view($id)
    {
        if(Session::has('admin')){
            $model = HsGiaDat::findOrFail($id);
            $modeltthh = GiaDat::where('mahs',$model->mahs)->get();

            return view('manage.giadat.loaidat.view')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                ->with('pageTitle','Thông tin giá đất chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if(Session::has('admin')){
            $model = HsGiaDat::findOrFail($id);
            $maloaigia = $model->maloaigia;
            $modeltthh = GiaDat::where('mahs',$model->mahs)->get();

            return view('manage.giadat.loaidat.edit')
                ->with('model',$model)
                ->with('maloaigia',$maloaigia)
                ->with('modeltthh',$modeltthh)
                ->with('pageTitle','Thông tin giá đất theo phân loại');
        }else
            return view('errors.notlogin');
    }

    public function edit_dk($id)
    {
        if(Session::has('admin')){
            $model = HsGiaDat::findOrFail($id);


            return view('manage.giadat.loaidat.edit_dk')
                ->with('model',$model)
                ->with('pageTitle','Thông tin giá đất theo phân loại');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create(getDateToDb($insert['tgnhap']));
            $thang = date_format($date,'m');

            $model = HsGiaDat::findOrFail($id);
            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->tgapdung = getDateToDb($insert['tgapdung']);
            $model->quy=Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->save();

            return redirect('giadat_phanloai/loaidat='.$model->maloaigia.'/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function update_dk(Request $request, $id)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create(getDateToDb($insert['tgnhap']));
            $thang = date_format($date,'m');

            $model = HsGiaDat::findOrFail($id);
            if(isset($request->filedk)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk);
                }
                $file=$request->file('filedk');
                $filename = $insert['mahs'].'_1_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk=$filename;
            }

            if(isset($request->filedk1)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk1)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk1);
                }
                $file=$request->file('filedk1');
                $filename = $insert['mahs'].'_2_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk1=$filename;
            }

            if(isset($request->filedk2)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk2)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk2);
                }
                $file=$request->file('filedk2');
                $filename = $insert['mahs'].'_3_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk2=$filename;
            }

            if(isset($request->filedk3)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk3)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk3);
                }
                $file=$request->file('filedk3');
                $filename = $insert['mahs'].'_4_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk3=$filename;
            }

            if(isset($request->filedk4)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk4)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk4);
                }
                $file=$request->file('filedk4');
                $filename = $insert['mahs'].'_5_'.chuanhoatruong($file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk4=$filename;
            }

            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->tgapdung = getDateToDb($insert['tgapdung']);
            $model->quy=Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->save();
            return redirect('giadat_phanloai/loaidat='.$model->maloaigia.'/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            $input = $request->all();
            $model = HsGiaDat::where('id',$input['iddelete'])->first();
            //dd($model);
            if($model->delete()) {
                GiaDat::where('mahs', $model->mahs)->delete();
            }
            return redirect('giadat_phanloai/loaidat='.$model->maloaigia.'/nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function approve(Request $request){
        if(Session::has('admin')){
            $model = HsGiaDat::where('id',$request['idhoantat'])->first();
            //dd($model);
            $model->trangthai = 'Hoàn tất';
            $model->save();
            /*Lịch sử
            if($model->save()){
                $modelh = new ThamDinhGiaH();
                $modelh->mahs = $model->mahs;
                $modelh->thaotac = 'Hoàn tất hồ sơ';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }
            */
            return redirect('giadat_phanloai/loaidat='.$model->maloaigia.'/nam='.$model->nam);

        }else
            return view('errors.notlogin');
    }

    public function unapprove(Request $request){
        if(Session::has('admin')){
            $model = HsGiaDat::where('id',$request['idhuy'])->first();
            //dd($model);
            $model->trangthai = 'Chưa hoàn tất';
            $model->save();
            /*Lịch sử
            if($model->save()){
                $modelh = new ThamDinhGiaH();
                $modelh->mahs = $model->mahs;
                $modelh->thaotac = 'Hoàn tất hồ sơ';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }
            */
            return redirect('giadat_phanloai/loaidat='.$model->maloaigia.'/nam='.$model->nam.'&pb=all');
        }else
            return view('errors.notlogin');
    }

    public function search(){
        if(Session::has('admin')){
            $model_loaidat = DmLoaiDat::all();
            $model_pl = DmLoaiDat::select('loaidat')->distinct()->get();
            $model_kv = DmLoaiDat::select('khuvuc')->distinct()->get();
            $model_vt = DmLoaiDat::select('vitri')->distinct()->get();

            return view('manage.giadat.loaidat.search.create')
                ->with('model_loaidat',$model_loaidat)
                ->with('model_pl',$model_pl)
                ->with('model_kv',$model_kv)
                ->with('model_vt',$model_vt)
                ->with('pageTitle','Tìm kiếm thông tin giá đất');
        }else
            return view('errors.notlogin');
    }

    public function viewsearch(Request $request){
        if(Session::has('admin')){

            $_sql="select hsgiadat.*,
                          giadat.khuvuc,giadat.vitri1,giadat.vitri2,giadat.vitri3,giadat.vitri4
                                        from hsgiadat, giadat
                                        Where hsgiadat.mahs=giadat.mahs";
            $input=$request->all();
            //chưa làm đầy đủ điều kiện
            //Thời gian nhập
            //Từ
            if($input['tgnhaptu']!=null){
                $_sql=$_sql." and hsgiadat.tgnhap >='".date('Y-m-d',strtotime($input['tgnhaptu']))."'";
            }
            //Đến
            if($input['tgnhapden']!=null){
                $_sql=$_sql." and hsgiadat.tgnhap <='".date('Y-m-d',strtotime($input['tgnhapden']))."'";
            }


            $model =  DB::select(DB::raw($_sql));
            //dd($model);

            $this->getDetail($model);

            return view('manage.giadat.loaidat.search.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin giá đất');
        }else
            return view('errors.notlogin');
    }
}
