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
            $model = PNhomHangHoa::where('manhom','02')
                ->get();
            return view('manage.giahhdv.hhdp_laocai.thoidiem.showindex')
                ->with('model',$model)
                ->with('pageTitle','Chọn thời điểm xem báo cáo giá hàng hóa do địa phương quy định');
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

    public function showindex($masopnhom,$nam,$pb)
    {
        if(Session::has('admin')){
            $model = HsGiaHangHoa::where('masopnhom',$masopnhom)
                ->where('nam',$nam)
                ->where('phanloai','DP')
                ->where('trangthai','Hoàn tất')
                ->get();
            if($pb != 'all') {
                $model = $model->where('mahuyen', $pb);
            }
            $modelpb = TtPhongBan::all();
            $this->getDetail($model);

            return view('manage.giahhdv.hhdp_laocai.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('masopnhom',$masopnhom)
                ->with('nam',$nam)
                ->with('pb',$pb)
                ->with('url','/thongtin-diaphuong/')
                ->with('pageTitle','Thông tin hồ sơ giá hàng hóa do địa phương quy định');
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
                ->with('$maloaigia',$maloaigia)
                ->with('pageTitle','Thông tin giá đất thêm mới');
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

            $model = new HsGiaDat();
            $model->tgnhap = $insert['tgnhap'];
            $model->tgapdung = $insert['tgapdung'];
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
            $date = date_create($insert['tgnhap']);
            $thang = date_format($date,'m');
            $mahs = getdate()[0];
            $mahuyen = session('admin')->mahuyen;

            $file=$request->file('filedk');
            $filename =$mahs.'_'.$file->getClientOriginalName();
            $file->move(public_path() . '/data/uploads/attack/', $filename);

            $model = new HsGiaHangHoa();
            $model->tgnhap = $insert['tgnhap'];
            $model->thitruong = $insert['thitruong'];
            $model->maloaihh = $insert['maloaihh'];
            $model->maloaigia = $insert['maloaigia'];
            $model->hoso = 'DINHKEM';
            $model->phanloai = 'DP';
            $model->filedk = $filename;
            $model->quy = Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->mahuyen = $mahuyen;
            $model->mahs = $mahs;
            $model->masopnhom = $insert['masopnhom'];
            $model->save();

            return redirect('giahhdv-diaphuong/maso='.$insert['masopnhom'].'/nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = HsGiaHangHoa::findOrFail($id);
            $modeltthh = GiaHangHoa::where('mahs',$model->mahs)->get();
            $loaigia = DmLoaiGia::where('pl','Hàng hóa, dịch vụ');
            $loaihh = DmLoaiHh::all();
            $thitruong= DmThiTruong::all();
            //dd($thitruong);
            $dmhanghoa = array_column(DmHangHoa::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($modeltthh as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            return view('manage.giahhdv.hhdp_laocai.show')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                ->with('loaigia',$loaigia)
                ->with('loaihh',$loaihh)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa, dịch vụ chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function view($id)
    {
        if(Session::has('admin')){
            $model = HsGiaHangHoa::findOrFail($id);
            $modeltthh = GiaHangHoa::where('mahs',$model->mahs)->get();
            $loaigia = DmLoaiGia::where('pl','Hàng hóa, dịch vụ')->get();
            $loaihh = DmLoaiHh::all();
            $thitruong= DmThiTruong::all();
            //dd($loaigia);
            $dmhanghoa = array_column(DmHangHoa::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            foreach($modeltthh as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
            }
            return view('manage.giahhdv.hhdp_laocai.view')
                ->with('model',$model)
                ->with('modeltthh',$modeltthh)
                ->with('loaigia',$loaigia)
                ->with('loaihh',$loaihh)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa, dịch vụ chi tiết');
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
            $model = HsGiaHangHoa::findOrFail($id);
            $loaigia = DmLoaiGia::where('pl','Hàng hóa, dịch vụ')->get();
            $loaihh = DmLoaiHh::all();
            $thitruong= DmThiTruong::all();

            return view('manage.giahhdv.hhdp_laocai.edit_dk')
                ->with('model',$model)
                ->with('loaigia',$loaigia)
                ->with('loaihh',$loaihh)
                ->with('thitruong',$thitruong)
                ->with('pageTitle','Thông tin giá hàng hóa, dịch vụ chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $date = date_create($insert['tgnhap']);
            $thang = date_format($date,'m');

            $model = HsGiaDat::findOrFail($id);
            $model->tgnhap = $insert['tgnhap'];
            $model->tgapdung = $insert['tgapdung'];
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
            $date = date_create($insert['tgnhap']);
            $thang = date_format($date,'m');

            $model = HsGiaHangHoa::findOrFail($id);
            if(isset($request->filedk)){
                if(file_exists(public_path() . '/data/uploads/attack/'.$model->filedk)){
                    File::Delete(public_path() . '/data/uploads/attack/'.$model->filedk);
                }
                $file=$request->file('filedk');

                $filename =$insert['mahs'].'_'.$file->getClientOriginalName();
                $file->move(public_path() . '/data/uploads/attack/', $filename);
                $model->filedk=$filename;
            }
            $model->tgnhap = $insert['tgnhap'];
            $model->thitruong = $insert['thitruong'];
            $model->maloaihh = $insert['maloaihh'];
            $model->maloaigia = $insert['maloaigia'];
            $model->quy=Thang2Quy($thang);
            $model->thang = date_format($date,'m');
            $model->nam = date_format($date,'Y');
            $model->save();

            return redirect('giahhdv-diaphuong/maso='.$model->masopnhom.'/nam='.date_format($date,'Y'));

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
            $modelmaloaigia = DmLoaiGia::where('pl','Hàng hóa, dịch vụ')->get();
            $modelmaloaihh = DmLoaiHh::all();
            $modelthitruong = DmThiTruong::all();

            $modelhh = DmHangHoa::where('theodoi','Có')->get();
            return view('manage.giahhdv.hhdp_laocai.search.create')
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

            $_sql="select hsgiahanghoa.*,
                          giahanghoa.mahh,giahanghoa.masopnhom,giahanghoa.giatu,giahanghoa.giaden,giahanghoa.soluong,giahanghoa.nguontin
                                        from hsgiahanghoa, giahanghoa
                                        Where hsgiahanghoa.mahs=giahanghoa.mahs";
            $input=$request->all();

            //Thời gian nhập
            //Từ
            if($input['tgnhaptu']!=null){
                $_sql=$_sql." and hsgiahanghoa.tgnhap >='".date('Y-m-d',strtotime($input['tgnhaptu']))."'";
            }
            //Đến
            if($input['tgnhapden']!=null){
                $_sql=$_sql." and hsgiahanghoa.tgnhap <='".date('Y-m-d',strtotime($input['tgnhapden']))."'";
            }
            //Loại giá(error Không biết vì sao)
            //$_sql=$input['maloaigia']!=null? $_sql." and hsgiahhtn.maloaigia = ".$input['maloaigia']:$_sql;
            //Loại hàng hóa(error Không biết vì sao)
            //$_sql=$input['maloaihh']!=null? $_sql." and hsgiahhtn.maloaihh = ".$input['maloaihh']:$_sql;
            //Tên hàng hóa
            $_sql=$input['mahh']!=null? $_sql." and giahanghoa.mahh = '".$input['mahh']."'":$_sql;

            //Thị trường nhập
            $_sql=$input['thitruong']!=null? $_sql." and hsgiahanghoa.thitruong = '".$input['thitruong']."'":$_sql;
            //Giá trị tài sản
            //Từ
            if(getDouble($input['giatritu'])>0)
                $_sql=$_sql." and giahanghoa.giatu >= ".getDouble($input['giatritu']);
            //Đến
            if(getDouble($input['giatriden'])>0)
                $_sql=$_sql." and giahanghoa.giaden <= ".getDouble($input['giatriden']);

            $model =  DB::select(DB::raw($_sql));
            //dd($model);

            $modelpb = TtPhongBan::all();

            $dmhanghoa = array_column(DmHangHoa::select('mahh','tenhh')->get()->toarray(),'tenhh','mahh');
            $dmpb = array_column(TtPhongBan::select('ma','ten')->get()->toarray(),'ten','ma');

            foreach($model as $ct){
                $ct->tenhh=$dmhanghoa[$ct->mahh];
                $ct->tenpb =$dmpb[$ct->mahuyen];
            }

            return view('manage.giahhdv.hhdp_laocai.search.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin giá hàng hóa, dịch vụ');
        }else
            return view('errors.notlogin');
    }
}