<?php

namespace App\Http\Controllers;

use App\DmThoiDiem;
use App\DMThueTN;
use App\HsThueTn;
use App\NhomThueTN;
use App\PNhomThueTN;
use App\ThueTn;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BcGiaThueTnController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $m_nhomthuetn = NhomThueTN::get();
            //$thoidiem = DmThoiDiem::where('plbc','Thuế tài nguyên')->get();
            return view('reports.thuetn.index')
                ->with('m_nhomthuetn',$m_nhomthuetn)
                ->with('pageTitle','Báo cáo giá tính thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function bcgiathuetn(Request $request){
        $inputs=$request->all();
        //$thongtin=array('thoidiem'=>$inputs['mathoidiem'],
        //    'nam'=>$inputs['nam']);
        $manhom = $inputs['manhom'];
        $mahuyen = session('admin')->mahuyen;
        $thongtin=array('nam'=>$inputs['nam'],'manhom'=>$inputs['manhom']);
        $model_hs = HsThueTn::where('phanloai',$manhom)->where('mahuyen',$mahuyen)->where('nam',$inputs['nam'])->first();
        $model = ThueTn::where('mahs',$model_hs->mahs)->get();
        $nhomtn = NhomThueTN::where('manhom',$manhom)->get();
        $model_dm = DMThueTN::get();
        foreach($model as $ct){
            $ct->manhom = '';
            $ct->tenhh = '';
            $danhmuc = $model_dm->where('mahh',$ct->mahh);
            //dd($danhmuc);
            if(count($danhmuc)>0){
                $ct->manhom = $danhmuc->first()->manhom;
                $ct->tenhh = $danhmuc->first()->tenhh;
            }
        }
        //$nhomtn = PNhomThueTN::get();
        //dd($model);
        return view('reports.thuetn.GiaThueTnTW')
            ->with('model',$model)
            ->with('nhomtn',$nhomtn)
            ->with('thongtin',$thongtin)
            ->with('pageTitle','Báo cáo giá thuế tài nguyên do TW quy định');
    }

    function getdata($inputs){
        $manhom = $inputs['manhom'];
        $mahuyen = session('admin')->mahuyen;
        $model = HsThueTn::where('phanloai',$manhom)->where('mahuyen',$mahuyen)->first();
        dd($model);
        $data_p1=array();
        $data_p2=array();
        if(count($model)>0){
            $mahs = $model->mahs;
            $data_p1 = ThueTn::join('dmthuetn', 'dmthuetn.mahh', '=', 'thuetn.mahh')
                ->join('pnhomthuetn','pnhomthuetn.masopnhom','=','dmthuetn.masopnhom')
                ->select('thuetn.*','pnhomthuetn.tenpnhom','dmthuetn.tenhh','dmthuetn.sapxep')
                ->where('thuetn.mahs',$mahs)
                ->where('dmthuetn.thuoctn','')
                ->orderby('dmthuetn.masopnhom')->orderby('dmthuetn.sapxep')
                ->get();
            $data_p2 = ThueTn::join('dmthuetn', 'dmthuetn.mahh', '=', 'thuetn.mahh')
                ->join('pnhomthuetn','pnhomthuetn.masopnhom','=','dmthuetn.masopnhom')
                ->select('thuetn.*','pnhomthuetn.tenpnhom','dmthuetn.tenhh','dmthuetn.thuoctn')
                ->where('thuetn.mahs',$mahs)
                ->where('dmthuetn.thuoctn','<>','')
                ->orderby('dmthuetn.masopnhom')->orderby('dmthuetn.sapxep')
                ->get();
            $data=array_column($data_p2->toarray(),'thuoctn');
            //Mảng chỉ chứa tài nguyên phụ thuộc
            //$data_p3=array();
            $data_p3=$this->getThuocTn($data);

            foreach($data_p3 as $ct){
                if($ct->thuoctn==''){
                    $data_p1[]=$ct;
                }else{
                    $data_p2[]=$ct;
                }
            }
        }
        return array($data_p1,$data_p2);
    }

    /**
     * @param $data
     * @return array
     */
    function getThuocTn($data){
        $model=DMThueTN::wherein('mahh',$data)->get();
        //$data=array_column($model->toarray(),'thuoctn');
        $m_thuoctn=DMThueTN::wherein('mahh',array_column($model->toarray(),'thuoctn'))->get();

        //dd($m_thuoctn);
        foreach( $m_thuoctn as $ct){
            $model[]=$ct;
        }
        return $model;
    }
}
