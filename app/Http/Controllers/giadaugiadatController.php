<?php

namespace App\Http\Controllers;

use App\dmvitridat;
use App\giadaugiadat;
use App\TtPhongBan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class giadaugiadatController extends Controller
{

    public function index(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = giadaugiadat::where('nam',$inputs['nam'])
                ->where('mahuyen',session('admin')->mahuyen)
                ->get();
            $model_danhmuc = dmvitridat::all();
            foreach($model as $ct){
                $vitri = $model_danhmuc->where('maso',$ct->maso)->first();
                $tenvitri = '';
                $a_vitri = explode('.',$vitri->magoc);

                for($i=0;$i<count($a_vitri);$i++){
                    $dm = $model_danhmuc->where('capdo',strval($i+1))->where('macapdo',$a_vitri[$i])->first();
                    if(isset($vitri)){
                        $tenvitri .= ($dm->vitri. ' - ');
                    }
                }
                $ct->vitri = $tenvitri . $vitri->vitri;
            }

            return view('manage.giadat.vitri.daugia.index')
                ->with('model',$model)
                ->with('nam',$inputs['nam'])
                ->with('url','/giadat/daugia/')
                ->with('pageTitle','Thông tin giá đất đấu giá');
        }else
            return view('errors.notlogin');
    }

    public function showindex(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = giadaugiadat::where('nam',$inputs['nam'])
                ->where('trangthai','Hoàn tất')
                ->get();

            if($inputs['donvi'] != 'ALL'){
                $model = $model->where('mahuyen',$inputs['donvi']);
            }

            $modelpb = TtPhongBan::all();
            $model_danhmuc = dmvitridat::all();

            foreach($model as $ct){
                $this->getTtPhongBan($modelpb,$ct);
                $vitri = $model_danhmuc->where('maso',$ct->maso)->first();
                $tenvitri = '';
                $a_vitri = explode('.',$vitri->magoc);

                for($i=0;$i<count($a_vitri);$i++){
                    $dm = $model_danhmuc->where('capdo',strval($i+1))->where('macapdo',$a_vitri[$i])->first();
                    if(isset($vitri)){
                        $tenvitri .= ($dm->vitri. ' - ');
                    }
                }
                $ct->vitri = $tenvitri . $vitri->vitri;
            }
            return view('manage.giadat.vitri.daugia.showindex')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('nam',$inputs['nam'])
                ->with('pb',$inputs['donvi'])
                ->with('url','/giadat/daugia/')
                ->with('pageTitle','Thông tin giá đất cho thuê');

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
            $model = dmvitridat::all();
            $model_diaban = $model->where('capdo','1');
            $madiaban = count($model_diaban)>0?$model_diaban->first()->maso:'';
            $model_phanloai = $model->where('magoc',$madiaban);
            $maphanloai = count($model_phanloai)>0?$model_phanloai->first()->maso:'';
            $model_vitri = $model->where('magoc',$maphanloai);
            $mavitri = count($model_vitri)>0?$model_vitri->first()->maso:'';

            $model_danhmuc = dmvitridat::where('magoc','like',$mavitri.'%')->get();

            $a_kq = new Collection();
            foreach($model_danhmuc as $ct){
                $kiemtra = $model_danhmuc->where('magoc',$ct->maso);
                if(count($kiemtra)==0){
                    $tenvitri = '';
                    $a_vitri = explode('.',$ct->magoc);
                    $maso = $a_vitri[0];
                    foreach($a_vitri as $key=>$val){
                        $vitri = $model->where('maso',$maso)->first();
                        if(isset($vitri) && $key>2){
                            $tenvitri .= ($vitri->vitri. ' - ');
                        }
                        $maso .= ('.'.$val);
                    }
                    $ct->vitri = $tenvitri  . $ct->vitri;
                    $a_kq->add($ct);
                }
            }

            return view('manage.giadat.vitri.daugia.create')
                ->with('model_diaban',$model_diaban)
                ->with('model_phanloai',$model_phanloai)
                ->with('model_vitri',$model_vitri)
                ->with('model_danhmuc',$a_kq)
                ->with('pageTitle','Thông tin giá đất đấu giá thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $date = date_create(getDateToDb($inputs['ngaynhap']));
            $inputs['giagoc'] = getDbl($inputs['giagoc']);
            $inputs['giadaugia'] = getDbl($inputs['giadaugia']);
            $inputs['mahs'] = getdate()[0];;
            $inputs['trangthai'] = 'Đang làm';
            $inputs['thang'] = date_format($date,'m');
            $inputs['nam'] = date_format($date,'Y');
            $inputs['mahuyen'] = session('admin')->mahuyen;
            giadaugiadat::create($inputs);
            return redirect('/giadat/daugia/danh_sach?nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function show($id)
    {
        if(Session::has('admin')){
            $model = giadaugiadat::findOrFail($id);
            $model_danhmuc = dmvitridat::all();

            $vitri = $model_danhmuc->where('maso',$model->maso)->first();
            $tenvitri = '';
            $a_vitri = explode('.',$vitri->magoc);

            for($i=0;$i<count($a_vitri);$i++){
                $dm = $model_danhmuc->where('capdo',strval($i+1))->where('macapdo',$a_vitri[$i])->first();
                if(isset($vitri)){
                    $tenvitri .= ($dm->vitri. ' - ');
                }
            }
            $model->vitri = $tenvitri . $vitri->vitri;


            return view('manage.giadat.vitri.daugia.show')
                ->with('model',$model)
                ->with('pageTitle','Thông tin giá đất đấu giá');
        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if(Session::has('admin')){
            $model = giadaugiadat::findOrFail($id);
            $model_danhmuc = dmvitridat::all();

            $vitri = $model_danhmuc->where('maso',$model->maso)->first();
            $tenvitri = '';
            $a_vitri = explode('.',$vitri->magoc);

            for($i=0;$i<count($a_vitri);$i++){
                $dm = $model_danhmuc->where('capdo',strval($i+1))->where('macapdo',$a_vitri[$i])->first();
                if(isset($vitri)){
                    $tenvitri .= ($dm->vitri. ' - ');
                }
            }
            $model->vitri = $tenvitri . $vitri->vitri;


            $model_diaban = $model_danhmuc->where('capdo','1');
            $madiaban = count($model_diaban)>0?$model_diaban->first()->maso:'';
            $model_phanloai = $model_danhmuc->where('magoc',$madiaban);
            $maphanloai = count($model_phanloai)>0?$model_phanloai->first()->maso:'';
            $model_vitri = $model_danhmuc->where('magoc',$maphanloai);
            $mavitri = count($model_vitri)>0?$model_vitri->first()->maso:'';

            $m_danhmuc = dmvitridat::where('magoc','like',$mavitri.'%')->get();

            $a_kq = new Collection();
            foreach($m_danhmuc as $ct){
                $kiemtra = $m_danhmuc->where('magoc',$ct->maso);
                if(count($kiemtra)==0){
                    $tenvitri = '';
                    $a_vitri = explode('.',$ct->magoc);
                    $maso = $a_vitri[0];
                    foreach($a_vitri as $key=>$val){
                        $vitri = $model->where('maso',$maso)->first();
                        if(isset($vitri) && $key>2){
                            $tenvitri .= ($vitri->vitri. ' - ');
                        }
                        $maso .= ('.'.$val);
                    }
                    $ct->vitri = $tenvitri  . $ct->vitri;
                    $a_kq->add($ct);
                }
            }

            return view('manage.giadat.vitri.daugia.edit')
                ->with('model',$model)
                ->with('model_diaban',$model_diaban)
                ->with('model_phanloai',$model_phanloai)
                ->with('model_vitri',$model_vitri)
                ->with('model_danhmuc',$a_kq)
                ->with('pageTitle','Thông tin giá đất đấu giá chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $date = date_create(getDateToDb($inputs['ngaynhap']));
            $inputs['giagoc'] = getDbl($inputs['giagoc']);
            $inputs['giadaugia'] = getDbl($inputs['giadaugia']);
            $inputs['thang'] = date_format($date,'m');
            $inputs['nam'] = date_format($date,'Y');

            giadaugiadat::findOrFail($id)->update($inputs);
            return redirect('giadat/daugia/danh_sach?nam='.date_format($date,'Y'));

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model=  giadaugiadat::findOrFail($inputs['iddelete']);
            $model->delete();
            return redirect('giadat/daugia/danh_sach?nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function approve(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model=  giadaugiadat::findOrFail($inputs['idhoantat']);
            $model->update(['trangthai'=>'Hoàn tất']);
            return redirect('giadat/daugia/danh_sach?nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function unapprove(Request $request)
    {

    }
}
