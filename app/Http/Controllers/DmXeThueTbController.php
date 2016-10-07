<?php

namespace App\Http\Controllers;

use App\DmLoaiXeThueTb;
use App\XeThueTb;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmXeThueTbController extends Controller
{
    public function dmloaixe(){
        if (Session::has('admin')) {
            $model = DmLoaiXeThueTb::all();
            return view('system.thuetb.loaixe.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục loại xe thuế trước bạ');
        } else
            return view('errors.notlogin');
    }

    public function index($maloai)
    {
        if (Session::has('admin')) {
            $model = XeThueTb::where('maloai',$maloai)
                ->get();
            $modelloai = DmLoaiXeThueTb::where('maloai',$maloai)->first();
            return view('system.thuetb.index')
                ->with('model',$model)
                ->with('modelloai',$modelloai)
                ->with('pageTitle','Danh mục xe thuế trước bạ');
        } else
            return view('errors.notlogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($maloai)
    {
        if (Session::has('admin')) {
            return view('system.thuetb.create')
                ->with('maloai',$maloai)
                ->with('pageTitle','Thêm mới thông tin giá thuế trước bạ');
        } else
            return view('errors.notlogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['gia'] = str_replace(',','',$inputs['gia']);
            $inputs['gia'] = str_replace('.','',$inputs['gia']);
            $maso =  getdate()[0];
            $model = new XeThueTb();
            $model->maloai = $inputs['maloai'];
            $model->maso = $maso;
            $model->tenhieu = $inputs['tenhieu'];
            $model->thongsokt = $inputs['thongsokt'];
            $model->dungtich = $inputs['dungtich'];
            $model->nuocsx = $inputs['nuocsx'];
            $model->gia = $inputs['gia'];
            $model->ghichu = $inputs['ghichu'];
            $model->save();

            return redirect('dmloaixe-thuetruocba/maloai='.$inputs['maloai']);
        } else
            return view('errors.notlogin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = XeThueTb::findOrFail($id);
            return view('system.thuetb.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin thuế trước bạ chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['gia'] = str_replace(',','',$inputs['gia']);
            $inputs['gia'] = str_replace('.','',$inputs['gia']);
            $model = XeThueTb::findOrFail($id);
            $model->tenhieu = $inputs['tenhieu'];
            $model->thongsokt = $inputs['thongsokt'];
            $model->dungtich = $inputs['dungtich'];
            $model->nuocsx = $inputs['nuocsx'];
            $model->gia = $inputs['gia'];
            $model->ghichu = $inputs['ghichu'];
            $model->save();

            return redirect('dmloaixe-thuetruocba/maloai='.$inputs['maloai']);
        } else
            return view('errors.notlogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = XeThueTb::where('id',$inputs['iddelete'])->first();
            $maloai = $model->maloai;
            $model->delete();

            return redirect('dmloaixe-thuetruocba/maloai='.$maloai);
        } else
            return view('errors.notlogin');
    }
}
