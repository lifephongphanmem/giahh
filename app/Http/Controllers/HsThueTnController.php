<?php

namespace App\Http\Controllers;

use App\DmLoaiGia;
use App\DmLoaiHh;
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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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

    public function index($thoidiem,$nam)
    {
        if(Session::has('admin')){
            $model = HsThueTn::where('mathoidiem',$thoidiem)
                ->where('nam',$nam)
                ->where('mahuyen',session('admin')->mahuyen)
                ->get();

            $modelpb = TtPhongBan::all();
            $m_nhomthuetn = NhomThueTN::get();

            $this->getDetail($model);

            return view('manage.thuetn.index')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('thoidiem',$thoidiem)
                ->with('m_nhomthuetn',$m_nhomthuetn)
                ->with('nam',$nam)
                ->with('pageTitle','Thông tin hồ sơ giá tính thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function showindex($thoidiem,$nam,$pb)
    {
        if(Session::has('admin')){
            $model = HsThueTn::where('mathoidiem',$thoidiem)->where('nam',$nam)->get();
            if($pb != 'all') {
                $model = $model->where('mahuyen', $pb);
            }
            $modelpb = TtPhongBan::all();
            $this->getDetail($model);
            return view('manage.thuetn.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('thoidiem',$thoidiem)
                ->with('nam',$nam)
                ->with('pb',$pb)
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
            $thoidiem=$inputs['thoidiem'];
            $manhom=$inputs['manhom'];
            $mahuyen=session('admin')->mahuyen;
            ThueTnDefault::where('mahuyen',$mahuyen)->delete();

            //$loaigia = DmLoaiGia::where('pl','Thuế tài nguyên')->get();
            //$loaihh = DmLoaiHh::all();

            //$thitruong= DmThiTruong::all();
            $nhomhh = PNhomThueTN::select('masopnhom','tenpnhom')->where('theodoi','Có')->where('manhom',$manhom)->get();
            $nhom = PNhomThueTN::select('masopnhom')->where('theodoi','Có')->where('manhom',$manhom)->get()->toarray();
            //$nhom=array_values($nhom);
            $hanghoa = DMThueTN::select('masopnhom','mahh',DB::raw($mahuyen." as 'mahuyen'"),DB::raw("1 as 'soluong'"),DB::raw("0 as 'giatu'"),DB::raw("0 as 'giaden'"))->wherein('masopnhom',$nhom)->where('theodoi','Có')->get()->toarray();
            //dd($hanghoa);
            ThueTnDefault::insert($hanghoa);

            $dmhanghoa = array_column(DMThueTN::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            $model=ThueTnDefault::where('mahuyen',$mahuyen)->get();
            foreach($model as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            //dd($dmhanghoa);
            return view('manage.thuetn.create')
                ->with('model',$model)
                ->with('mathoidiem',$thoidiem)
                //->with('loaigia',$loaigia)
                //->with('loaihh',$loaihh)
                ->with('nhomhh',$nhomhh)
                //->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên thêm mới');
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
            $mahuyen = session('admin')->mahuyen;

            $model = new HsThueTn();
            $model->tgnhap = $insert['tgnhap'];
            //$model->thitruong = $insert['thitruong'];
            //$model->maloaihh = $insert['maloaihh'];
            //$model->maloaigia = $insert['maloaigia'];
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
            $model->mathoidiem = $insert['mathoidiem'];
            if($model->save()){
                $hanghoa = ThueTnDefault::select('masopnhom','mahh','giatu','giaden','soluong','nguontin',DB::raw($mahs." as mahs"))->where('mahuyen',$mahuyen)->get()->toarray();
                ThueTn::insert($hanghoa);
            }

            return redirect('giathuetn/thoidiem='.$insert['mathoidiem'].'/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = HsThueTn::findOrFail($id);
            $modeltthh = ThueTn::where('mahs',$model->mahs)->get();
            //$loaigia = DmLoaiGia::where('pl','Thuế tài nguyên');
            //$loaihh = DmLoaiHh::all();
            //$thitruong= DmThiTruong::all();
            //dd($thitruong);
            $dmhanghoa = array_column(DMThueTN::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($modeltthh as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            return view('manage.thuetn.show')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                //->with('loaigia',$loaigia)
                //->with('loaihh',$loaihh)
                //->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function view($id)
    {
        if(Session::has('admin')){
            $model = HsThueTn::findOrFail($id);
            $modeltthh = ThueTn::where('mahs',$model->mahs)->get();
            //$loaigia = DmLoaiGia::where('pl','Thuế tài nguyên')->get();
            //$loaihh = DmLoaiHh::all();
            //$thitruong= DmThiTruong::all();
            //dd($loaigia);
            $dmhanghoa = array_column(DMThueTN::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($modeltthh as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            return view('manage.thuetn.view')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                //->with('loaigia',$loaigia)
                //->with('loaihh',$loaihh)
                //->with('thitruong',$thitruong)
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
                //->with('loaigia',$loaigia)
                //->with('loaihh',$loaihh)
                ->with('nhomhh',$nhomhh)
                //->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá tính thuế tài nguyên chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create($insert['tgnhap']);
            $thang = date_format($date,'m');

            $model = HsThueTn::findOrFail($id);
            $model->tgnhap = $insert['tgnhap'];
            //$model->thitruong = $insert['thitruong'];
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

            return redirect('giathuetn/thoidiem='.$model->mathoidiem.'/nam='.date_format($date,'Y'));

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
                GiaHangHoa::where('mahs', $model->mahs)->delete();
            }
            return redirect('giathuetn/thoidiem='.$model->mathoidiem.'/nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function search(){
        if(Session::has('admin')){
            //$modelmaloaigia = DmLoaiGia::where('pl','Thuế tài nguyên')->get();
            //$modelmaloaihh = DmLoaiHh::all();
            //$modelthitruong = DmThiTruong::all();

            $modelhh = DMThueTN::where('theodoi','Có')->get();
            return view('manage.thuetn.search.create')
                //->with('modelmaloaigia',$modelmaloaigia)
                //->with('modelmaloaihh',$modelmaloaihh)
                //->with('modelthitruong',$modelthitruong)
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
