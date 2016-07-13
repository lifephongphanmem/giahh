<?php

namespace App\Http\Controllers;

use App\HsCongBoGia;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HsCongBoGiaController extends Controller
{

    public function index($nam)
    {
        if(Session::has('admin')){
            $model = HsCongBoGia::where('nam',$nam)
                ->get();
            return view('manage.congbogia.index')
                ->with('model',$model)
                ->with('nam',$nam)
                ->with('pageTitle','Thông tin hồ sơ công bố giá');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if(Session::has('admin')){
            return view('manage.congbogia.create')
                ->with('pageTitle','Hồ sơ công bố giá thêm mới');

        }else
            return view('errors.notlogin');
    }


    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
