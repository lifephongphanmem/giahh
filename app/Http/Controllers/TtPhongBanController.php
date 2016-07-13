<?php

namespace App\Http\Controllers;

use App\TtPhongBan;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TtPhongBanController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            $model = TtPhongBan::all();
            return view('system.ttphongban.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin phòng ban');

        }else
            return view('errors.notlogin');
    }

    public function create()
    {
        if(Session::has('admin')){

            return view('system.ttphongban.create')
                ->with('pageTitle','Thêm mới phòng ban');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $mapb = getdate()[0];
            $model = new TtPhongBan();
            $model->ma = $mapb;
            $model->ten = $insert['ten'];
            $model->diachi = $insert['diachi'];
            $model->dienthoai = $insert['dienthoai'];
            $model->fax = $insert['fax'];
            $model->email = $insert['email'];
            if($model->save()){
                $modeluser = new Users();
                $modeluser->name = $insert['ten'];
                $modeluser->username = $insert['username'];
                $modeluser->password = md5($insert['password']);
                $modeluser->level = 'H';
                $modeluser->mahuyen = $mapb;
                $modeluser->status = 'Kích hoạt';
                $modeluser->phone = $insert['dienthoai'];
                $modeluser->email = $insert['email'];
                $modeluser->save();
            }

            return redirect('phong-ban');

        }else
            return view('errors.notlogin');
    }

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
        if(Session::has('admin')){
            $model = TtPhongBan::findOrFail($id);
            return view('system.ttphongban.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa thông tin phòng ban');
        }else
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
        if(Session::has('admin')){
            $update = $request->all();

            $model = TtPhongBan::findOrFail($id);
            $model->ten = $update['ten'];
            $model->diachi = $update['diachi'];
            $model->dienthoai = $update['dienthoai'];
            $model->fax = $update['fax'];
            $model->email = $update['email'];
            $model->save();
            return redirect('phong-ban');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            $delete = $request->all();
            $model = TtPhongBan::where('id',$delete['iddelete'])
                ->first();
            $model->delete();
            return redirect('phong-ban');
        }else
            return view('errors.notlogin');
    }
}
