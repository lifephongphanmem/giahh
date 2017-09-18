<?php

namespace App\Http\Controllers;

use App\TtPhongBan;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function index($pl)
    {
        if (Session::has('admin')) {
            if($pl == 'quan-ly')
                $model =  Users::where('level','H')
                    ->get();
            elseif($pl == 'su-dung')
                $model = Users::where('level','X')
                    ->get();

            $modelpb = TtPhongBan::all();

            return view('system.users.index')
                ->with('model',$model)
                ->with('pl',$pl)
                ->with('modelpb',$modelpb)
                ->with('dvct','all')
                ->with('pageTitle','Quản lý tài khoản');

        }else
            return view('errors.notlogin');

    }

    public function view($dvct)
    {
        if (Session::has('admin')) {

            $model = Users::where('level','X')
                ->where('mahuyen',$dvct)
                ->get();
            $modelpb = TtPhongBan::all();

            return view('system.users.index')
                ->with('model',$model)
                ->with('pl','su-dung')
                ->with('modelpb',$modelpb)
                ->with('dvct',$dvct)
                ->with('pageTitle','Quản lý tài khoản');

        }else
            return view('errors.notlogin');

    }

    public function create()
    {
        if (Session::has('admin')) {
            $modelpb = TtPhongBan::all();
                return view('system.users.create')
                    ->with('modelpb',$modelpb)
                    ->with('pageTitle','Thêm mới tài khoản');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request)
    {
        if (Session::has('admin')) {

            $insert = $request->all();
            $model = new Users();
            $model->name = $insert['name'];
            $model->phone = $insert['phone'];
            $model->email = $insert['email'];
            $model->username = $insert['username'];
            $model->password = md5($insert['password']);
            $model->status = $insert['status'];
            $model->level = 'X';
            $model->mahuyen = $insert['mahuyen'];
            $model->save();

            return redirect('users/pl=su-dung');

        }else
            return view('errors.notlogin');
    }

    public function edit($id)
    {
        if (Session::has('admin')) {

            $model = Users::findOrFail($id);
            //dd($model);
            $modelpb = TtPhongBan::all();
            return view('system.users.edit')
                ->with('model',$model)
                ->with('modelpb',$modelpb)
                ->with('pageTitle','Chỉnh sửa thông tin tài khoản');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request, $id)
    {
        if (Session::has('admin')) {
            $update = $request->all();
            $model = Users::findOrFail($id);
            $model->name = $update['name'];
            $model->phone = $update['phone'];
            $model->email = $update['email'];
            $model->status = $update['status'];
            $model->mahuyen = $update['mahuyen'];
            //$model->level = $update['level'];
            if ($update['newpass'] != '')
                $model->password = md5($update['newpass']);
            $model->save();

            if($model->level == 'T'|| $model->level== 'H')
                $pl = 'quan-ly';

            else
                $pl='su-dung';

            return redirect('users/pl='.$pl);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $input=$request->all();
            $model = Users::where('id',$input['iddelete'])->first();
            $model->delete();

            if($model->level == 'T' || $model->level== 'H')
                $pl = 'quan-ly';
            else
                $pl='su-dung';

            return redirect('users/pl='.$pl);

        }else
            return view('errors.notlogin');
    }

    public function login()
    {
        return view('system.users.login')
            ->with('pageTitle','Đăng nhập hệ thống');
    }

    public function signin(Request $request)
    {
        $check = Users::where('username','=',$request->all()['username'])->count();
        if($check == 0)
            return view('errors.invalid-user');
        else
            $ttuser = Users::where('username', '=', $request->all()['username'])->first();


        if(md5($request->all()['password'])== $ttuser->password){
            if($ttuser->status == "Kích hoạt"){
                Session::put('admin', $ttuser);
                return redirect('')
                    -> with('pageTitle', 'Tổng quan');
            }else
                return view('errors.lockuser');

        }else
            return view('errors.invalid-pass');
    }

    public function lock($ids){
        $arrayid = explode('-', $ids);
        foreach ($arrayid as $id) {
            $model = Users::findOrFail($id);
            $model->status = "Vô hiệu";
            $model->save();
        }
        return redirect('users/pl=quan-ly');
    }

    public function unlock($ids){
        $arrayid = explode('-', $ids);
        foreach ($arrayid as $id) {
            $model = Users::findOrFail($id);
            $model->status = "Kích hoạt";
            $model->save();
        }
        return redirect('users/pl=quan-ly');
    }

    public function logout() {

        if (Session::has('admin'))
        {
            Session::flush();
            return redirect('/login');

        }else {
            return redirect('');
        }
    }

    public function cp(){

        if(Session::has('admin')){

            return view('system.users.change-pass')
                ->with('pageTitle','Thay đổi mật khẩu');

        }else
            return view('errors.notlogin');

    }

    public function cpw(Request $request){

        $update = $request->all();

        $username = session('admin')->username;

        $password = session('admin')->password;

        $newpass2 = $update['newpassword2'];

        $currentPassword = $update['current-password'];

        if(md5($currentPassword) == $password){
            $ttuser = Users::where('username',$username)->first();
            $ttuser->password = md5($newpass2);
            if($ttuser->save()){
                Session::flush();
                return view('errors.changepassword-success');
            }
        }else{
            dd('Mật khẩu cũ không đúng???');
        }
    }

    public function permission($id){
        if (Session::has('admin')) {

            $model = Users::where('id','=',$id)->first();

            //$permission = $model->permission;
            $permission = !empty($model->permission)  ? $model->permission : getPermissionDefault($model->level);
            //dd($model->permission);
            return view('system.users.perms')
                ->with('permission',json_decode($permission))
                ->with('model',$model)
                ->with('pageTitle','Phân quyền cho tài khoản');

        }else
            return view('errors.notlogin');
    }

    public function uppermission(Request $request){
        if (Session::has('admin')) {
            $update = $request->all();
            $id = $request['id'];

            $model = Users::findOrFail($id);
            //dd($model);
            if(isset($model)){

                $update['roles'] = isset($update['roles']) ? $update['roles'] : null;
                $model->permission = json_encode($update['roles']);
                $model->save();
                if($model->level == 'H')
                    $pl = 'quan-ly';
                elseif($model->level == 'X')
                    $pl = 'su-dung';
                return redirect('users/pl='.$pl);

            }else
                dd('Tài khoản không tồn tại');

        }else
            return view('errors.notlogin');

    }

    public function checkpass(Request $request){
        $input = $request->all();
        $passmd5 = md5($input['pass']);

        if(session('admin')->password == $passmd5){
            echo 'ok';
        }else {
            echo 'cancel';
        }
    }

    public function checkuser(Request $request){
        $input = $request->all();
        $newusser = $input['user'];
        $model = Users::where('username',$newusser)
            ->first();
        if(isset($model)){
            echo 'cancel';
        }else {
            echo 'ok';
        }
    }

}
