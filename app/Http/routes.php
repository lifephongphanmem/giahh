<?php
// DEFAULT
Route::get('/', 'HomeController@index');

// <editor-fold defaultstate="collapsed" desc="--system--">
    //user
Route::get('/login','UsersController@login');
Route::post('/signin','UsersController@signin');
Route::get('/change-password','UsersController@cp');
Route::post('/change-password','UsersController@cpw');
Route::get('/checkpass','UsersController@checkpass');
Route::get('/checkuser','UsersController@checkuser');
Route::get('logout','UsersController@logout');
Route::get('users/pl={pl}','UsersController@index');
Route::get('users/pl=su-dung/dv={dvct}','UsersController@view');
Route::get('users/lock/{ids}','UsersController@lock');
Route::get('users/unlock/{ids}','UsersController@unlock');
Route::get('users/delete/{id}','UsersController@destroy');
Route::get('users/create','UsersController@create');
Route::post('users','UsersController@store');
Route::get('users/{id}/edit','UsersController@edit');
Route::patch('users/{id}','UsersController@update');
Route::get('users/phan-quyen/{id}','UsersController@permission');
Route::post('users/phan-quyen','UsersController@uppermission');

    //general
Route::resource('cau-hinh-he-thong','GeneralConfigsController');
    //Phòng-ban
Route::resource('phong-ban','TtPhongBanController');
Route::post('phong-ban/delete','TtPhongBanController@destroy');

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Manage--">
//TTQĐ
    //TW
Route::get('thongtu-quyetdinh-tw/nam={nam}&pl={pl}','TtQdController@tw');
Route::get('thongtu-quyetdinh-tw/create','TtQdController@twcreate');
Route::get('checkkhvb','TtQdController@checkkhvb');
Route::post('thongtu-quyetdinh-tw','TtQdController@twstore');
Route::get('thongtu-quyetdinh-tw/{id}/edit','TtQdController@twedit');
Route::patch('thongtu-quyetdinh-tw/{id}','TtQdController@twupdate');
Route::post('thongtu-quyetdinh-tw/delete','TtQdController@twdelete');
    //Tỉnh
Route::get('thongtu-quyetdinh-tinh/nam={nam}&pl={pl}','TtQdController@tinh');
Route::get('thongtu-quyetdinh-tinh/create','TtQdController@tinhcreate');
Route::post('thongtu-quyetdinh-tinh','TtQdController@tinhstore');
Route::get('thongtu-quyetdinh-tinh/{id}/edit','TtQdController@tinhedit');
Route::patch('thongtu-quyetdinh-tinh/{id}','TtQdController@tinhupdate');
Route::post('thongtu-quyetdinh-tinh/delete','TtQdController@tinhdelete');

//Thẩm định giá
Route::get('hoso-thamdinhgia/nam={nam}&pb={pb}','HsThamDinhGiaController@index');
Route::get('hoso-thamdinhgia/create','HsThamDinhGiaController@create');
Route::post('hoso-thamdinhgia','HsThamDinhGiaController@store');
Route::post('hoso-thamdinhgia/delete','HsThamDinhGiaController@destroy');
Route::get('hoso-thamdinhgia/{id}/show','HsThamDinhGiaController@show');
Route::get('hoso-thamdinhgia/{id}/edit','HsThamDinhGiaController@edit');
Route::patch('hoso-thamdinhgia/{id}','HsThamDinhGiaController@update');

Route::get('thamdinhgiadefault/store','ThamDinhgiaDefaultController@store');
Route::get('thamdinhgiadefault/edit','ThamDinhgiaDefaultController@edit');
Route::get('thamdinhgiadefault/update','ThamDinhgiaDefaultController@update');
Route::get('thamdinhgiadefault/delete','ThamDinhgiaDefaultController@destroy');

Route::get('thamdinhgia/store','ThamDinhGiaController@store');
Route::get('thamdinhgia/edit','ThamDinhGiaController@edit');
Route::get('thamdinhgia/update','ThamDinhGiaController@update');
Route::get('thamdinhgia/delete','ThamDinhGiaController@destroy');

//Công bố gia
Route::get('hoso-congbogia/nam={nam}','HsCongBoGiaController@index');
Route::get('hoso-congbogia/create','HsCongBoGiaController@create');

//Reports
Route::get('reports/bctkkhac','BcTkKhacController@index');


// </editor-fold>
?>