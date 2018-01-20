<?php

namespace App\Http\Controllers;

use App\dmqd_giadat;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class dmqd_giadatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('admin')) {
            $model = dmqd_giadat::all();
            return view('system.giadat.quyetdinh.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục quyết định quy định giá đất');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if (Session::has('admin')) {
            return view('system.giadat.quyetdinh.create')
                ->with('pageTitle','Thông tin quyết định quy định giá đất');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $insert = $request->all();
            dmqd_giadat::create($insert);
            return redirect('dmqdgiadat');

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {
            $model = dmqd_giadat::findOrFail($id);
            return view('system.giadat.quyetdinh.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin quyết định quy định giá đất');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            dmqd_giadat::findOrFail($id)->update($update);
            return redirect('dmqdgiadat');

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input = $request->all();
            dmqd_giadat::where('id',$input['iddelete'])->delete();
            return redirect('dmqdgiadat');
        }else
            return view('errors.notlogin');
    }

}
