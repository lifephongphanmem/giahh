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

    public function index($thoidiem,$nam)
    {
        if(Session::has('admin')){

            $model = HsGiaHhTt::where('mathoidiem',$thoidiem)
                ->where('nam',$nam)
                ->where('mahuyen',session('admin')->mahuyen)
                ->get();


            $modelpb = TtPhongBan::all();

            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }

            return view('manage.giahhdv.hhtt.index')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('thoidiem',$thoidiem)
                ->with('nam',$nam)
                ->with('pageTitle','Thông tin hồ sơ giá hàng hóa thị trường');
        }else
            return view('errors.notlogin');
    }
    public function showindex($thoidiem,$nam,$pb)
    {
        if(Session::has('admin')){
            if($pb == 'all')
                $model = HsGiaHhTt::where('mathoidiem',$thoidiem)
                    ->where('nam',$nam)
                    //->where('trangthai','Công bố')
                    ->get();
            else
                if($pb == session('admin')->mahuyen)
                    $model = HsGiaHhTt::where('mathoidiem',$thoidiem)
                        ->where('nam',$nam)
                        ->where('mahuyen',$pb)
                        ->get();
                else
                    $model = HsGiaHhTt::where('mathoidiem',$thoidiem)
                        ->where('nam',$nam)
                        ->where('mahuyen',$pb)
                        //->where('trangthai','Công bố')
                        ->get();

            $modelpb = TtPhongBan::all();

            foreach($model as $tt){
                $this->getTtPhongBan($modelpb,$tt);
            }

            return view('manage.giahhdv.hhtt.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('thoidiem',$thoidiem)
                ->with('nam',$nam)
                ->with('pb',$pb)
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

    public function create($thoidiem)
    {
        if(Session::has('admin')){
            $mahuyen=session('admin')->mahuyen;
            GiaHhTtDefault::where('mahuyen',$mahuyen)->delete();

            $loaigia = DmLoaiGia::where('pl','Hàng hóa thị trường')->get();
            $loaihh = DmLoaiHh::all();

            $thitruong= DmThiTruong::all();
            $nhomhh = NhomTn55::where('theodoi','Có')->get();
            $hanghoa = DmHhTn55::select('masopnhom','mahh',DB::raw($mahuyen." as 'mahuyen'"),DB::raw("1 as 'soluong'"),DB::raw("0 as 'giatu'"),DB::raw("0 as 'giaden'"))->wherein('masopnhom',['01','02'])->get()->toarray();
            GiaHhTtDefault::insert($hanghoa);

            $dmhanghoa = DmHhTn55::all();
            $model=GiaHhTtDefault::where('mahuyen',$mahuyen)->get();
            foreach($model as $ct){
                $this->gettenhh($dmhanghoa,$ct);
            }

            return view('manage.giahhdv.hhtt.create')
                ->with('model',$model)
                ->with('mathoidiem',$thoidiem)
                ->with('loaigia',$loaigia)
                ->with('loaihh',$loaihh)
                ->with('nhomhh',$nhomhh)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa thị trường thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create($insert['tgnhap']);
            $thang = date_format($date,'m');
            $mahs = getdate()[0];

            $model = new HsGiaHhTt();
            $model->tgnhap = $insert['tgnhap'];
            $model->thitruong = $insert['thitruong'];
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

            return redirect('giahhdv-thitruong/thoidiem='.$insert['mathoidiem'].'/nam='.date_format($date,'Y'));

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

    public function edit($id)
    {
        if(Session::has('admin')){
            $model = HsGiaHhTt::findOrFail($id);
            $modeltthh = GiaHhTt::where('mahs',$model->mahs)
                ->get();

            $modeldm = DmHhTn55::all();

            foreach($modeltthh as $tthh){
                $this->gettenhh($modeldm,$tthh);
            }

            //dd($modeltthh);
            //$loaigia = DmLoaiGia::where('pl','Hàng hóa thị trường')->get();
            //$loaihh = DmLoaiHh::all();
            $thitruong= DmThiTruong::all();
            $nhomhh = NhomTn55::where('theodoi','Có')->get();
            //dd($modeltthh);
            return view('manage.giahhdv.hhtt.edit')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                //->with('loaigia',$loaigia)
                //->with('loaihh',$loaihh)
                ->with('nhomhh',$nhomhh)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa thị trường chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function gettenhh($mahh,$array){

        //dd($array);
        foreach($mahh as $tt){
            if($tt->mahh == $array->mahh){
                $array->tenhh = $tt->tenhh;
                break;
            }
        }
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create($insert['tgnhap']);
            $thang = date_format($date,'m');

            $model = HsGiaHhTt::findOrFail($id);
            $model->tgnhap = $insert['tgnhap'];
            $model->thitruong = $insert['thitruong'];
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

            return redirect('giahhdv-thitruong/thoidiem='.$model->mathoidiem.'/nam='.date_format($date,'Y'));

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

            return redirect('giahhdv-thitruong/thoidiem='.$model->mathoidiem.'/nam='.$model->nam);

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

    public function viewsearch(Request $request){
        if(Session::has('admin')){

            $_sql="select hsgiahhtt.*,
                          giahhtt.mahh,giahhtt.masopnhom,giahhtt.giatu,giahhtt.giaden,giahhtt.soluong,giahhtt.nguontin
                                        from hsgiahhtt, giahhtt
                                        Where hsgiahhtt.mahs=giahhtt.mahs";
            $input=$request->all();

            //Thời gian nhập
            //Từ
            if($input['tgnhaptu']!=null){
                $_sql=$_sql." and hsgiahhtt.tgnhap >='".date('Y-m-d',strtotime($input['tgnhaptu']))."'";
            }
            //Đến
            if($input['tgnhapden']!=null){
                $_sql=$_sql." and hsgiahhtt.tgnhap <='".date('Y-m-d',strtotime($input['tgnhapden']))."'";
            }
            //Loại giá(error Không biết vì sao)
            //$_sql=$input['maloaigia']!=null? $_sql." and hsgiahhtn.maloaigia = ".$input['maloaigia']:$_sql;
            //Loại hàng hóa(error Không biết vì sao)
            //$_sql=$input['maloaihh']!=null? $_sql." and hsgiahhtn.maloaihh = ".$input['maloaihh']:$_sql;
            //Tên hàng hóa
            $_sql=$input['mahh']!=null? $_sql." and giahhtt.mahh = '".$input['mahh']."'":$_sql;

            //Thị trường nhập
            $_sql=$input['thitruong']!=null? $_sql." and hsgiahhtt.thitruong = '".$input['thitruong']."'":$_sql;
            //Giá trị tài sản
            //Từ
            if(getDouble($input['giatritu'])>0)
                $_sql=$_sql." and giahhtt.giatu >= ".getDouble($input['giatritu']);
            //Đến
            if(getDouble($input['giatriden'])>0)
                $_sql=$_sql." and giahhtt.giaden <= ".getDouble($input['giatriden']);

            $model =  DB::select(DB::raw($_sql));
            //dd($model);

            $modeldm = DmHhTn55::all();
            $modelpb = TtPhongBan::all();

            foreach($model as $tthh){
                $this->gettenhh($modeldm,$tthh);
                $this->getTtPhongBan($modelpb,$tthh);
            }

            return view('manage.giahhdv.hhtt.search.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin giá hàng hóa thị trường');
        }else
            return view('errors.notlogin');
    }
}
