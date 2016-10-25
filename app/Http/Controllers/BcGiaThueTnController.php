<?php

namespace App\Http\Controllers;

use App\DmThoiDiem;
use App\DMThueTN;
use App\HsThueTn;
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
            $thoidiem = DmThoiDiem::where('plbc','Thuế tài nguyên')->get();
            return view('reports.thuetn.index')
                ->with('thoidiem',$thoidiem)
                ->with('pageTitle','Báo cáo giá tính thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function bcgiathuetn(Request $request){
        $inputs=$request->all();
        $thongtin=array('thoidiem'=>$inputs['mathoidiem'],
            'nam'=>$inputs['nam']);
        list($data_p1,$data_p2)=$this->getdata($inputs);
        //dd($data_p1);
        switch($inputs['phanloai']){
            case 'TW':{
                $nhomtn=PNhomThueTN::where('manhom','01')->orderby('sapxep')->get();
                return view('reports.thuetn.GiaThueTnTW')
                    ->with('data_p1',$data_p1)
                    ->with('data_p2',$data_p2)
                    ->with('nhomtn',$nhomtn)
                    ->with('thongtin',$thongtin)
                    ->with('pageTitle','Báo cáo giá thuế tài nguyên do TW quy định');
                break;
            }
            case 'DP':{
                $nhomtn=PNhomThueTN::where('manhom','02')->orderby('sapxep')->get();
                return view('reports.thuetn.GiaThueTnTW')
                    ->with('data_p1',$data_p1->sortBy('masopnhom')->sortBy('sapxep'))
                    ->with('data_p2',$data_p2)
                    ->with('nhomtn',$nhomtn)
                    ->with('thongtin',$thongtin)
                    ->with('pageTitle','Báo cáo giá thuế tài nguyên do địa phương quy định');
                break;
            }
            case 'TH':{
                break;
            }
            default:{
                break;
            }
        }
    }

    function getdata($inputs){
        $model = HsThueTn::where('mathoidiem',$inputs['mathoidiem'])
            ->where('phanloai',$inputs['phanloai'])
            ->first();
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
