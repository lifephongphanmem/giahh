<?php

namespace App\Http\Controllers;

use App\DmHhTn55;
use App\DmLoaiGia;
use App\DmLoaiHh;
use App\DmThiTruong;
use App\DmThoiDiem;
use App\GiaHhTt;
use App\GiaHhTtDefault;
use App\HsGiaHhTt;
use App\NhomTn55;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class HsGiaHhTtController extends Controller
{
    public function thoidiem()
    {
        if(Session::has('admin')){
            $model = DmThoiDiem::where('plbc','Hàng hóa thị trường')
                ->get();

            return view('manage.giahhdv.hhtt.thoidiem.index')
                ->with('model',$model)
                ->with('pageTitle','Chọn thời điểm nhập báo cáo giá hàng hóa thị trường');
        }else
            return view('errors.notlogin');
    }
    public function showthoidiem()
    {
        if(Session::has('admin')){
            $model = DmThoiDiem::where('plbc','Hàng hóa thị trường')
                ->get();
            return view('manage.giahhdv.hhtt.thoidiem.showindex')
                ->with('model',$model)
                ->with('pageTitle','Chọn thời điểm xem báo cáo giá hàng hóa thị trường');
        }else
            return view('errors.notlogin');
    }

    public function index(Request $request)
    {
        if(Session::has('admin')){
            //dd($request);
            $inputs = $request->all();
            $model = HsGiaHhTt::where('mathoidiem',$inputs['thoidiem'])
                ->where('nam',$inputs['nam'])
                ->where('mahuyen',session('admin')->mahuyen)
                ->get();
            $modelpb = TtPhongBan::all();
            $nhomhh = NhomTn55::where('theodoi','Có')->get();
            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }

            return view('manage.giahhdv.hhtt.index')
                ->with('model',$model)
                ->with('model_nhomhh',$nhomhh)
                ->with('modelpb',$modelpb)
                ->with('modelpb',$modelpb)
                ->with('inputs',$inputs)
                //->with('nam',$nam)
                ->with('url','/giahhdv-thitruong/')
                ->with('pageTitle','Thông tin hồ sơ giá hàng hóa thị trường');
        }else
            return view('errors.notlogin');
    }
    public function showindex(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = HsGiaHhTt::where('mathoidiem',$inputs['thoidiem'])
                ->where('nam',$inputs['nam'])
                ->where('trangthai','Hoàn tất')
                ->get();
            if($inputs['pb'] != 'all'){
                $model = $model->where('mahuyen',$inputs['pb']);
            }

            $modelpb = TtPhongBan::all();

            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }

            return view('manage.giahhdv.hhtt.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('inputs',$inputs)
                //->with('nam',$nam)
                //->with('pb',$pb)
                ->with('url','/thongtin-giathitruong/')
                ->with('pageTitle','Thông tin hồ sơ giá hàng hóa thị trường');
        }else
            return view('errors.notlogin');
    }

    public function getTtPhongBan($pbs,$array){
        foreach($pbs as $pb){
            if($pb->ma == $array->mahuyen)
                $array->tenpb = $pb->ten;
        }
    }

    public function create(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            //Bước 1: tạo hồ sơ giá
            $date = getdate();
            $thang = $date['mon'];
            $mahs = $date[0];
            $model = new HsGiaHhTt();
            $model->tgnhap = date('Y-m-d');
            $model->thitruong = DmThiTruong::first()->thitruong;
            $model->phanloai = 'CHITIET';
            $model->trangthai = 'Đang làm';
            $model->quy = Thang2Quy($thang);
            $model->thang = $thang;
            $model->nam = $date['year'];
            $model->mahuyen = session('admin')->mahuyen;
            $model->mahs = $mahs;
            $model->mathoidiem = $inputs['thoidiem'];
            $model->save();
            //Bước 2: lưu chi tiết danh sách hàng hóa, dịch vụ
            $a_nhomhh = explode(',',$inputs['manhom']);
            $hanghoa = DmHhTn55::select('masopnhom','mahh', DB::raw($mahs.' as mahs'))
                ->wherein('masopnhom',$a_nhomhh)
                ->get()->toarray();
            GiaHhTt::insert($hanghoa);
            $request['mahs']=$mahs;
            return $this->edit($request);
        }else
            return view('errors.notlogin');
    }

    public function create_dk($thoidiem)
    {
        if(Session::has('admin')){
            $thitruong= DmThiTruong::all();

            return view('manage.giahhdv.hhtt.create_dk')
                ->with('mathoidiem',$thoidiem)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa thị trường thêm mới');
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

            $model = new HsGiaHhTt();
            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->thitruong = $insert['thitruong'];
            $model->phanloai = 'CHITIET';
            //$model->maloaihh = $insert['maloaihh'];
            //$model->maloaigia = $insert['maloaigia'];

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
            $model->mathoidiem = $insert['mathoidiem'];
            if($model->save()){
                $this->createts($mahs);
            }

            return redirect('giahhdv-thitruong/index?thoidiem='.$insert['mathoidiem'].'&nam='.date_format($date,'Y'));

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

            $model = new HsGiaHhTt();
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
            $model->thitruong = $insert['thitruong'];
            $model->phanloai = 'DINHKEM';
            $model->quy = Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->mahs = $mahs;
            $model->mathoidiem = $insert['mathoidiem'];
            $model->save();

            return redirect('giahhdv-thitruong/index?thoidiem='.$insert['mathoidiem'].'&nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function createts($mahs){
        $modelts = GiaHhTtDefault::where('mahuyen',session('admin')->mahuyen)->get();
        if(count($modelts) > 0) {
            foreach ($modelts as $ts) {
                $model = new GiaHhTt();
                $model->masopnhom = $ts->masopnhom;
                $model->mahh = $ts->mahh;
                $model->giatu  =$ts->giatu;
                $model->giaden = $ts->giaden;
                $model->soluong = $ts->soluong;
                $model->nguontin = $ts->nguontin;
                $model->gc = $ts->gc;
                $model->mahs = $mahs;
                $model->save();
            }
        }
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = HsGiaHhTt::findOrFail($id);
            $modeltthh = GiaHhTt::where('mahs',$model->mahs)->get();
            //$loaigia = DmLoaiGia::where('pl','Hàng hóa thị trường');
            //$loaihh = DmLoaiHh::all();
            $thitruong= DmThiTruong::all();
            //dd($thitruong);
            $modeldm = DmHhTn55::all();

            foreach($modeltthh as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }
            return view('manage.giahhdv.hhtt.show')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                //->with('loaigia',$loaigia)
                //->with('loaihh',$loaihh)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa thị trường chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function view($id)
    {
        if(Session::has('admin')){
            $model = HsGiaHhTt::findOrFail($id);
            $modeltthh = GiaHhTt::where('mahs',$model->mahs)->get();
            //$loaigia = DmLoaiGia::where('pl','Hàng hóa thị trường');
            //$loaihh = DmLoaiHh::all();
            $thitruong= DmThiTruong::all();
            //dd($thitruong);
            $modeldm = DmHhTn55::all();

            foreach($modeltthh as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }
            return view('manage.giahhdv.hhtt.view')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                //->with('loaigia',$loaigia)
                //->with('loaihh',$loaihh)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa thị trường chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function edit(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = HsGiaHhTt::where('mahs', $inputs['mahs'])->first();
            $modeltthh = GiaHhTt::where('mahs',$model->mahs)->get();
            $modeldm = DmHhTn55::all();

            foreach($modeltthh as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }

            $thitruong= DmThiTruong::all();
            $nhomhh = NhomTn55::where('theodoi','Có')->get();
            //dd($modeltthh);
            return view('manage.giahhdv.hhtt.edit')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                ->with('nhomhh',$nhomhh)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa thị trường chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function edit_dk($id)
    {
        if(Session::has('admin')){
            $model = HsGiaHhTt::findOrFail($id);
            $thitruong= DmThiTruong::all();
            //dd($modeltthh);
            return view('manage.giahhdv.hhtt.edit_dk')
                ->with('model',$model)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa thị trường chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function gettenhh($mahh,$array){
        foreach($mahh as $tt){
            if($tt->mahh == $array->mahh){
                $array->tenhh = $tt->tenhh;
                break;
            }
        }
    }

    public function update(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create(getDateToDb($insert['tgnhap']));
            $thang = date_format($date,'m');
            $model = HsGiaHhTt::where('mahs',$insert['mahs'])->first();
            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->thitruong = $insert['thitruong'];
            $model->noidung = $insert['noidung'];
            //$model->maloaihh = $insert['maloaihh'];
            //$model->maloaigia = $insert['maloaigia'];

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

            return redirect('giahhdv-thitruong/index?thoidiem='.$model->mathoidiem.'&nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function update_dk(Request $request, $id)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $model = HsGiaHhTt::findOrFail($id);
            $date = date_create(getDateToDb($insert['tgnhap']));
            $thang = date_format($date,'m');

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
            $model->thitruong = $insert['thitruong'];
            $model->noidung = $insert['noidung'];
            $model->quy=Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->save();

            return redirect('giahhdv-thitruong/index?thoidiem='.$model->mathoidiem.'&nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            $input = $request->all();
            $model = HsGiaHhTt::where('id',$input['iddelete'])
                ->first();
            //dd($model);
            if($model->delete())
                GiaHhTt::where('mahs',$model->mahs)->delete();

            return redirect('giahhdv-thitruong/index?thoidiem='.$model->mathoidiem.'&nam='.$model->nam);

        }else
            return view('errors.notlogin');
    }

    public function approve(Request $request){
        if(Session::has('admin')){
            $model = HsGiaHhTt::where('id',$request['idhoantat'])->first();
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
            return redirect('giahhdv-thitruong/index?thoidiem='.$model->mathoidiem.'&nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function unapprove(Request $request){
        if(Session::has('admin')){
            $model = HsGiaHhTt::where('id',$request['idhuy'])->first();
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
            return redirect('thongtin-giathitruong/index?thoidiem='.$model->mathoidiem.'&nam='.$model->nam.'&pb=all');
        }else
            return view('errors.notlogin');
    }

    public function search(){
        if(Session::has('admin')){
            $modelmaloaigia = DmLoaiGia::where('pl','Hàng hóa thị trường')->get();
            $modelmaloaihh = DmLoaiHh::all();
            $modelthitruong = DmThiTruong::all();

            $modelhh = DmHhTn55::where('theodoi','Có')->get();
            return view('manage.giahhdv.hhtt.search.create')
                ->with('modelmaloaigia',$modelmaloaigia)
                ->with('modelmaloaihh',$modelmaloaihh)
                ->with('modelthitruong',$modelthitruong)
                ->with('modelhh',$modelhh)
                ->with('pageTitle','Tìm kiếm thông tin giá hàng hóa thị trường');
        }else
            return view('errors.notlogin');
    }

    public function viewsearch(Request $request)
    {
        if (Session::has('admin')) {

            $_sql = "select hsgiahhtt.*,
                          giahhtt.mahh,giahhtt.masopnhom,giahhtt.giatu,giahhtt.giaden,giahhtt.soluong,giahhtt.nguontin
                                        from hsgiahhtt, giahhtt
                                        Where hsgiahhtt.mahs=giahhtt.mahs";
            $input = $request->all();

            //Thời gian nhập
            //Từ
            if ($input['tgnhaptu'] != null) {
                $_sql = $_sql . " and hsgiahhtt.tgnhap >='" . date('Y-m-d', strtotime($input['tgnhaptu'])) . "'";
            }
            //Đến
            if ($input['tgnhapden'] != null) {
                $_sql = $_sql . " and hsgiahhtt.tgnhap <='" . date('Y-m-d', strtotime($input['tgnhapden'])) . "'";
            }
            //Loại giá(error Không biết vì sao)
            //$_sql=$input['maloaigia']!=null? $_sql." and hsgiahhtn.maloaigia = ".$input['maloaigia']:$_sql;
            //Loại hàng hóa(error Không biết vì sao)
            //$_sql=$input['maloaihh']!=null? $_sql." and hsgiahhtn.maloaihh = ".$input['maloaihh']:$_sql;
            //Tên hàng hóa
            $_sql = $input['mahh'] != null ? $_sql . " and giahhtt.mahh = '" . $input['mahh'] . "'" : $_sql;

            //Thị trường nhập
            $_sql = $input['thitruong'] != null ? $_sql . " and hsgiahhtt.thitruong = '" . $input['thitruong'] . "'" : $_sql;
            //Giá trị tài sản
            //Từ
            if (getDouble($input['giatritu']) > 0)
                $_sql = $_sql . " and giahhtt.giatu >= " . getDouble($input['giatritu']);
            //Đến
            if (getDouble($input['giatriden']) > 0)
                $_sql = $_sql . " and giahhtt.giaden <= " . getDouble($input['giatriden']);

            $model = DB::select(DB::raw($_sql));
            //dd($model);

            $modeldm = DmHhTn55::all();
            $modelpb = TtPhongBan::all();

            foreach ($model as $tthh) {
                $this->gettenhh($modeldm, $tthh);
                $this->getTtPhongBan($modelpb, $tthh);
            }

            return view('manage.giahhdv.hhtt.search.index')
                ->with('model', $model)
                ->with('pageTitle', 'Thông tin giá hàng hóa thị trường');
        } else
            return view('errors.notlogin');
    }
}
