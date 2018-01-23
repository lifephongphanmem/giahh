<?php

namespace App\Http\Controllers;

use App\DmThoiDiem;
use App\DMThueTN;
use App\HsThueTn;
use App\NhomThueTN;
use App\PNhomThueTN;
use App\ThueTn;
use App\ThueTnDefault;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class HsThueTnController extends Controller
{
    public function thoidiem()
    {
        if(Session::has('admin')){
            $model = DmThoiDiem::where('plbc','Thuế tài nguyên')
                ->get();
            return view('manage.thuetn.thoidiem.index')
                ->with('model',$model)
                ->with('pageTitle','Chọn thời điểm nhập báo giá tính thuế tài nguyên');
        }else{
            return view('errors.notlogin');
        }
    }

    public function showthoidiem()
    {
        if(Session::has('admin')){
            $model = DmThoiDiem::where('plbc','Thuế tài nguyên')
                ->get();
            return view('manage.thuetn.thoidiem.showindex')
                ->with('model',$model)
                ->with('pageTitle','Chọn thời điểm xem báo cáo giá tính thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function index($nam)
    {
        if(Session::has('admin')){
            $model = HsThueTn::where('nam',$nam)
                ->where('mahuyen',session('admin')->mahuyen)
                ->get();

            $modelpb = TtPhongBan::all();
            $m_nhomthuetn = NhomThueTN::get();

            $this->getDetail($model);

            return view('manage.thuetn.index')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('m_nhomthuetn',$m_nhomthuetn)
                ->with('nam',$nam)
                ->with('url','/giathuetn/')
                ->with('pageTitle','Thông tin hồ sơ giá tính thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function showindex($nam,$pb)
    {
        if(Session::has('admin')){
            $model = HsThueTn::where('nam',$nam)
                ->where('trangthai','Hoàn tất')
                ->get();
            if($pb != 'all') {
                $model = $model->where('mahuyen', $pb);
            }
            $modelpb = TtPhongBan::all();
            $this->getDetail($model);
            return view('manage.thuetn.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('nam',$nam)
                ->with('pb',$pb)
                ->with('url','/thongtin-giathuetn/')
                ->with('pageTitle','Thông tin hồ sơ giá thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    function getDetail($model)
    {
        $dmpb = array_column(TtPhongBan::select('ma', 'ten')->get()->toarray(), 'ten', 'ma');
        //$dmloaigia = array_column(DmLoaiGia::select('maloaigia', 'tenloaigia')->get()->toarray(), 'tenloaigia', 'maloaigia');
        //$dmloaihanghoa = array_column(DmLoaiHh::select('maloaihh', 'tenloaihh')->get()->toarray(), 'tenloaihh', 'maloaihh');
        foreach ($model as $ct) {
            $ct->tenpb = array_key_exists($ct->mahuyen, $dmpb) ? $dmpb[$ct->mahuyen] : '';
            $ct->phanloai = $ct->phanloai=='TW' ? 'Tài nguyên TW quy định' : 'Tài nguyên địa phương quy định';
            //$ct->tenloaigia = array_key_exists($ct->maloaigia, $dmloaigia) ? $dmloaigia[$ct->maloaigia] : '';
            //$ct->tenloaihh = array_key_exists($ct->maloaihh, $dmloaihanghoa) ? $dmloaihanghoa[$ct->maloaihh] : '';
        }
    }

    public function create(Request $request)
    {
        if(Session::has('admin')){
            $inputs=$request->all();
            ThueTnDefault::where('mahuyen',session('admin')->mahuyen)->delete();
            $model_danhmuc = DMThueTN::where('manhom',$inputs['manhom'])->get();
            foreach($model_danhmuc as $ct){
                $kiemtra = $model_danhmuc->where('magoc',$ct->mahh);
                if(count($kiemtra)==0){
                    $ct->mahuyen = session('admin')->mahuyen;
                    $ct->soluong = 1;
                    ThueTnDefault::create($ct->toarray());
                }
            }
            $model=ThueTnDefault::where('mahuyen',session('admin')->mahuyen)->get();
            $dmhanghoa = array_column(DMThueTN::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($model as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            $m_nhomthuetn = NhomThueTN::get();
            return view('manage.thuetn.create')
                ->with('model',$model)
                ->with('m_nhomthuetn',$m_nhomthuetn)
                ->with('manhom',$inputs['manhom'])
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function create_dk()
    {
        if(Session::has('admin')){
            return view('manage.thuetn.create_dk')
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên thêm mới');
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

            $model = new HsThueTn();
            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->phanloai = $insert['phanloai'];
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
            $model->mahuyen = $mahuyen;
            $model->mahs = $mahs;
            if($model->save()){
                $hanghoa = ThueTnDefault::select('masopnhom','mahh','giatu','giaden','soluong','nguontin',DB::raw($mahs." as mahs"))->where('mahuyen',$mahuyen)->get()->toarray();
                ThueTn::insert($hanghoa);
            }

            return redirect('giathuetn/nam='.date_format($date,'Y'));

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

            $model = new HsThueTn();
            $file=$request->file('filedk');
            if(isset($file)){
                $filename = $mahs.'_1_'.str_replace('.','',$file->getClientOriginalName());
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk = $filename;
            }

            $file1=$request->file('filedk1');
            if(isset($file1)){
                $filename = $mahs.'_2_'.str_replace('.','',$file1->getClientOriginalName());
                $file1->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk1 = $filename;
            }

            $file2=$request->file('filedk2');
            if(isset($file2)){
                $filename = $mahs.'_3_'.str_replace('.','',$file2->getClientOriginalName());
                $file2->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk2 = $filename;
            }

            $file3=$request->file('filedk3');
            if(isset($file3)){
                $filename = $mahs.'_4_'.str_replace('.','',$file3->getClientOriginalName());
                $file3->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk3 = $filename;
            }

            $file4=$request->file('filedk4');
            if(isset($file4)){
                $filename = $mahs.'_5_'.str_replace('.','',$file4->getClientOriginalName());
                $file4->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk4 = $filename;
            }

            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->hoso = 'DINHKEM';
            $model->thang = date_format($date,'m');
            $model->quy = Thang2Quy($thang);
            $model->nam = date_format($date,'Y');
            $model->mahuyen = session('admin')->mahuyen;
            $model->trangthai = 'Đang làm';
            $model->mahs = $mahs;
            $model->save();

            return redirect('giathuetn/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = HsThueTn::findOrFail($id);
            $modeltthh = ThueTn::where('mahs',$model->mahs)->get();
            $dmhanghoa = array_column(DMThueTN::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($modeltthh as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            return view('manage.thuetn.show')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function view($id)
    {
        if(Session::has('admin')){
            $model = HsThueTn::findOrFail($id);
            $modeltthh = ThueTn::where('mahs',$model->mahs)->get();
            $dmhanghoa = array_column(DMThueTN::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($modeltthh as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            return view('manage.thuetn.view')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if(Session::has('admin')){
            $model = HsThueTn::findOrFail($id);
            $modeltthh = ThueTn::where('mahs',$model->mahs)->get();

            $dmhanghoa = array_column(DMThueTN::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($modeltthh as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }

            //dd($modeltthh);
            //$loaigia = DmLoaiGia::where('pl','Thuế tài nguyên')->get();
            //$loaihh = DmLoaiHh::all();
            //$thitruong= DmThiTruong::all();
            $nhomhh = PNhomThueTN::where('theodoi','Có')->get();
            //dd($modeltthh);
            return view('manage.thuetn.edit')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                ->with('nhomhh',$nhomhh)
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function edit_dk($id)
    {
        if(Session::has('admin')){
            $model = HsThueTn::findOrFail($id);

            return view('manage.thuetn.edit_dk')
                ->with('model',$model)
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create(getDateToDb($insert['tgnhap']));
            $thang = date_format($date,'m');

            $model = HsThueTn::findOrFail($id);
            $model->tgnhap = getDateToDb($insert['tgnhap']);
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

            return redirect('giathuetn/nam='.$model->nam);

        }else
            return view('errors.notlogin');
    }

    public function update_dk(Request $request, $id)
    {
        if(Session::has('admin')){
            $update = $request->all();
            $date = date_create(getDateToDb($update['tgnhap']));
            $thang = date_format($date,'m');

            $model = HsThueTn::findOrFail($id);
            $model->tgnhap = getDateToDb($update['tgnhap']);
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

            $model->thang = date_format($date,'m');
            $model->quy = Thang2Quy($thang);
            $model->nam = date_format($date,'Y');
            $model->save();
            return redirect('giathuetn/nam='.$model->nam);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            $input = $request->all();
            $model = HsThueTn::where('id',$input['iddelete'])->first();
            //dd($model);
            if($model->delete()) {
                ThueTn::where('mahs', $model->mahs)->delete();
            }
            return redirect('giathuetn/nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function approve(Request $request){
        if(Session::has('admin')){
            $model = HsThueTn::where('id',$request['idhoantat'])->first();
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
            return redirect('giathuetn/nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function unapprove(Request $request){
        if(Session::has('admin')){
            $model = HsThueTn::where('id',$request['idhuy'])->first();
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
            return redirect('thongtin-giathuetn/nam='.$model->nam.'&pb=all');
        }else
            return view('errors.notlogin');
    }

    public function search(){
        if(Session::has('admin')){
            $modelhh = DMThueTN::where('theodoi','Có')->get();
            return view('manage.thuetn.search.create')
                ->with('modelhh',$modelhh)
                ->with('pageTitle','Tìm kiếm thông tin giá thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function viewsearch(Request $request){
        if(Session::has('admin')){

            $_sql="select hsthuetn.*,thuetn.mahh,thuetn.masopnhom,thuetn.giatu,thuetn.giaden,thuetn.soluong,thuetn.nguontin
                    from hsthuetn, thuetn
                    Where hsthuetn.mahs=thuetn.mahs";
            $input=$request->all();

            //Thời gian nhập
            //Từ
            if($input['tgnhaptu']!=null){
                $_sql=$_sql." and hsthuetn.tgnhap >='".date('Y-m-d',strtotime($input['tgnhaptu']))."'";
            }
            //Đến
            if($input['tgnhapden']!=null){
                $_sql=$_sql." and hsthuetn.tgnhap <='".date('Y-m-d',strtotime($input['tgnhapden']))."'";
            }
            //Loại giá(error Không biết vì sao)
            //$_sql=$input['maloaigia']!=null? $_sql." and hsgiahhtn.maloaigia = ".$input['maloaigia']:$_sql;
            //Loại hàng hóa(error Không biết vì sao)
            //$_sql=$input['maloaihh']!=null? $_sql." and hsgiahhtn.maloaihh = ".$input['maloaihh']:$_sql;
            //Tên hàng hóa
            $_sql=$input['mahh']!=null? $_sql." and thuetn.mahh = '".$input['mahh']."'":$_sql;

            //Thị trường nhập
            $_sql=$input['phanloai']!=null? $_sql." and hsthuetn.phanloai = '".$input['phanloai']."'":$_sql;
            //Giá trị tài sản
            //Từ
            if(getDouble($input['giatritu'])>0)
                $_sql=$_sql." and thuetn.giatu >= ".getDouble($input['giatritu']);
            //Đến
            if(getDouble($input['giatriden'])>0)
                $_sql=$_sql." and thuetn.giaden <= ".getDouble($input['giatriden']);

            $model =  DB::select(DB::raw($_sql));
            //dd($model);

            $modelpb = TtPhongBan::all();

            $dmhanghoa = array_column(DMThueTN::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            $dmpb = array_column(TtPhongBan::select('ma','ten')->get()->toarray(),'ten','ma');

            foreach($model as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
                $ct->tenpb =$dmpb[$ct->mahuyen];
            }

            return view('manage.thuetn.search.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }
}
