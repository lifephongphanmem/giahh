<?php

namespace App\Http\Controllers;

use App\DmHhTn55;
use App\DmHhXnk;
use App\DmThiTruong;
use App\DmThoiDiem;
use App\GiaHhTt;
use App\GiaHhXnk;
use App\HsGiaHhTt;
use App\HsGiaHhXnk;
use App\TtPhongBan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TT552011BtcController extends Controller
{
    public function index()
    {
        if (Session::has('admin')) {
            $thitruong=DmThiTruong::all();
            $thoidiem=DmThoiDiem::where('plbc','Hàng hóa thị trường')->get();
            return view('reports.TT55-2011-BTC.index')
                ->with('thitruong',$thitruong)
                ->with('thoidiem',$thoidiem)
                ->with('pageTitle','Thông tư 55/2011-TT-BTC');
        }else
            return view('errors.notlogin');
    }

    public function PL1(Request $request){
        if (Session::has('admin')) {
            $inputs=$request->all();
            $model_pb = TtPhongBan::all();
            $model=$this->getDataPL1($inputs);
            //dd($model->toarray());
            $thongtin=array('thitruong'=>$inputs['thitruong'],
                'nam'=>$inputs['nam']);
            return view('reports.TT55-2011-BTC.PL1')
                ->with('thongtin',$thongtin)
                ->with('model',$model)
                ->with('model_pb',$model_pb)
                ->with('pageTitle','Phụ lục 1');
        }else
            return view('errors.notlogin');
    }

    public function PL1Excel(Request $request){
        if (Session::has('admin')) {
            $inputs=$request->all();
            $model=$this->getDataPL1($inputs);
            $thongtin=array('thitruong'=>$inputs['thitruong'],
                'nam'=>$inputs['nam']);
            Excel::create('Phu luc 01 - TT55/2011', function($excel) use($model, $thongtin){
                $excel->sheet('Phu luc 01', function($sheet) use($model, $thongtin){
                    $sheet->loadView('reports.TT55-2011-BTC.PL1')
                        ->with('thongtin',$thongtin)
                        ->with('model',$model)
                        ->with('pageTitle','Phu luc 01');
                });
            })->download('xlsx');
        }else
            return view('errors.notlogin');
    }

    function getDataPL1($inputs){
        //Danh sách hàng hóa kỳ trước báo cáo
        $modelkytrc=GiaHhTt::join('HsGiaHhTt', 'HsGiaHhTt.mahs', '=', 'GiaHhTt.mahs')
            ->select('GiaHhTt.mahh','GiaHhTt.giatu','GiaHhTt.giaden','GiaHhTt.gc')
            ->where('HsGiaHhTt.thitruong',$inputs['thitruong'])
            ->where('HsGiaHhTt.mathoidiem',$inputs['kytruoc'])
            ->get();

        foreach($modelkytrc as $ct){
            $ct->giahhkytrc = ($ct->giatu + $ct->giaden)/2;
        }
        //Danh sách hàng hóa trong kỳ báo cáo
        $model=GiaHhTt::join('HsGiaHhTt', 'HsGiaHhTt.mahs', '=', 'GiaHhTt.mahs')
            ->select('HsGiaHhTt.mahuyen','GiaHhTt.mahh','GiaHhTt.giatu','GiaHhTt.giaden','GiaHhTt.gc','GiaHhTt.masopnhom')
            ->where('HsGiaHhTt.thitruong',$inputs['thitruong'])
            ->where('HsGiaHhTt.mathoidiem',$inputs['kynay'])
            ->get();
        $modeldm = DmHhTn55::all();

        foreach($model as $ct) {
            $this->gettenhh($modeldm, $ct);
            $ct->giahh = ($ct->giatu + $ct->giaden) / 2;

            //lấy hàng hóa trong báo cáo kỳ trước
            $hh = $modelkytrc->where('mahh', $ct->mahh)->toarray();
            $gia = 0;
            foreach ($hh as $g) {
                $gia = $g['giahhkytrc'];
            }
            $ct->giahhkytrc = $gia;

            $ct->tanggiam = $ct->giahh-$gia;
            $ct->phantram = getPhanTram2($gia,$ct->giahh);
        }
        return $model;
    }

    public function PL2(Request $request){
        if (Session::has('admin')) {
            list($input, $model) = $this->getDataPL2($request);
            return view('reports.TT55-2011-BTC.PL2')
                ->with('model',$model)
                ->with('ngaytu',$input['ngaytu'])
                ->with('ngayden',$input['ngayden'])
                ->with('pageTitle','Phụ lục 2');

        }else
            return view('errors.notlogin');
    }

    public function PL2Excel(Request $request)
    {
        if (Session::has('admin')) {
            list($input, $model) = $this->getDataPL2($request);
            $ngaytu = $input['ngaytu'];
            $ngayden = $input['ngayden'];
            Excel::create('Phu luc 02 - TT55/2011', function ($excel) use ($model, $ngaytu, $ngayden) {
                $excel->sheet('Phu luc 02', function ($sheet) use ($model, $ngaytu, $ngayden) {
                    $sheet->loadView('reports.TT55-2011-BTC.PL2')
                        ->with('ngaytu', $ngaytu)
                        ->with('ngayden', $ngayden)
                        ->with('model', $model)
                        ->with('pageTitle', 'Phu luc 02');
                });
            })->download('xlsx');
        } else
            return view('errors.notlogin');
    }

    public function gettenhh($mahh,$array){
        foreach($mahh as $tt){
            if($tt->masopnhom == $array->masopnhom && $tt->mahh == $array->mahh){
                $array->tenhh = $tt->tenhh;
                $array->dvt = $tt->dvt;
                break;
            }
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    function getDataPL2(Request $request)
    {
        $input = $request->all();

        $modelhs = HsGiaHhXnk::whereBetween('tgnhap', array($input['ngaytu'], $input['ngayden']))
            ->get();
        //dd($model);
        $arrayid = '';
        foreach ($modelhs as $hs) {
            $arrayid = $arrayid . $hs->mahs . ',';
        }
        $model = GiaHhXnk::wherein('mahs', explode(',', $arrayid))->get();
        $modeldm = DmHhXnk::all();

        foreach ($model as $tthh) {
            $this->gettenhh($modeldm, $tthh);
        }
        return array($input, $model);
    }
}
