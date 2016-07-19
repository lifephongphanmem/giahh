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
//End User

//general
Route::resource('cau-hinh-he-thong','GeneralConfigsController');
//End General

// TT Phòng-ban
Route::resource('phong-ban','TtPhongBanController');
Route::post('phong-ban/delete','TtPhongBanController@destroy');
//End TT PHòng ban

//Thông tin hàng hóa
    //Danh mục thời điểm báo cáo
Route::resource('dmthoidiem','DmThoiDiemController');
Route::get('/checkmathoidiem','DmThoiDiemController@checkmathoidiem');
Route::post('dmthoidiem/delete','DmThoiDiemController@destroy');
    //End danh mục thời điểm báo cáo

    //Danh mục loại giá
Route::resource('dmloaigia','DmLoaiGiaController');
Route::get('/checkmaloaigia','DmLoaiGiaController@checkmaloaigia');
Route::post('dmloaigia/delete','DmLoaiGiaController@destroy');
    //End danh mục loại giá

    //Danh mục loại mặt hàng
Route::resource('dmloaihh','DmLoaiHhController');
Route::get('/checkmaloaihh','DmLoaiHhController@checkmaloaihh');
Route::post('dmloaihh/delete','DmLoaiHhController@destroy');
    //End dnah mục loại mặt hàng

    //Hàng hóa trong nước
Route::get('dmhanghoa-trongnuoc','DmHhTnController@nhom');
Route::get('dmhanghoa-trongnuoc/nhom={nhom}','DmHhTnController@pnhom');
Route::get('dmhanghoa-trongnuoc/nhom={nhom}/pnhom={pnhom}','DmHhTnController@hanghoa');
Route::get('dmhanghoa-trongnuoc/nhom={nhom}/pnhom={pnhom}/create','DmHhTnController@create');
Route::get('/checkmahhtn','DmHhTnController@checkmahhtn');
Route::post('dmhanghoa-trongnuoc','DmHhTnController@store');
Route::get('dmhanghoa-trongnuoc/{id}/edit','DmHhTnController@edit');
Route::patch('dmhanghoa-trongnuoc/{id}','DmHhTnController@update');
Route::post('dmhanghoa-trongnuoc/delete','DmHhTnController@destroy');
    //End hàng hóa trong nước

    //Hàng hóa xuất nhập khẩu
Route::get('dmhanghoa-xuatnhapkhau','DmHhXnkController@nhom');
Route::get('dmhanghoa-xuatnhapkhau/nhom={nhom}','DmHhXnkController@pnhom');
Route::get('dmhanghoa-xuatnhapkhau/nhom={nhom}/pnhom={pnhom}','DmHhXnkController@loai');
Route::get('dmhanghoa-xuatnhapkhau/nhom={nhom}/pnhom={pnhom}/loai={loai}','DmHhXnkController@hanghoa');
Route::get('dmhanghoa-xuatnhapkhau/nhom={nhom}/pnhom={pnhom}/loai={loai}/create','DmHhXnkController@create');
Route::get('/checkmahhxnk','DmHhXnkController@checkmahhxnk');
Route::post('dmhanghoa-xuatnhapkhau','DmHhXnkController@store');
Route::get('dmhanghoa-xuatnhapkhau/{id}/edit','DmHhXnkController@edit');
Route::patch('dmhanghoa-xuatnhapkhau/{id}','DmHhXnkController@update');
Route::post('dmhanghoa-xuatnhapkhau/delete','DmHhXnkController@destroy');
    //End hàng hóa xuất nhập khẩu

//End Thông tin hàng hóa



// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Manage--">
    //Giá hàng hóa dv
//Giá HH-DV trong nước
Route::get('giahhdv-trongnuoc','HsGiaHhTnController@thoidiem');
Route::get('giahhdv-trongnuoc/thoidiem={thoidiem}/nam={nam}&pb={pb}','HsGiaHhTnController@index');
Route::get('giahhdv-trongnuoc/thoidiem={thoidiem}/create','HsGiaHhTnController@create');
Route::post('giahhdv-trongnuoc','HsGiaHhTnController@store');
Route::get('giahhdv-trongnuoc/{id}/show','HsGiaHhTnController@show');
Route::get('giahhdv-trongnuoc/{id}/edit','HsGiaHhTnController@edit');
Route::patch('giahhdv-trongnuoc/{id}','HsGiaHhTnController@update');
Route::post('giahhdv-trongnuoc/delete','HsGiaHhTnController@destroy');

Route::get('/giahhtndefault/getpnhom','GiaHhTnDefaultController@getpnhomhh');
Route::get('/giahhtndefault/gettthh','GiaHhTnDefaultController@gettthh');
Route::get('/giahhtndefault/store','GiaHhTnDefaultController@store');
Route::get('/giahhtndefault/edit','GiaHhTnDefaultController@edit');
Route::get('/giahhtndefault/update','GiaHhTnDefaultController@update');
Route::get('/giahhtndefault/delete','GiaHhTnDefaultController@destroy');

Route::get('/giahhtn/store','GiaHhTnController@store');
Route::get('/giahhtn/edit','GiaHhTnController@edit');
Route::get('/giahhtn/update','GiaHhTnController@update');
Route::get('/giahhtn/delete','GiaHhTnController@destroy');
//End Giá HH-DV trong nước
//Giá HH xuất nhập khẩu
Route::get('giahh-xuatnhapkhau','HsGiaHhXnkController@thoidiem');
Route::get('giahh-xuatnhapkhau/thoidiem={thoidiem}/nam={nam}&pb={pb}','HsGiaHhXnkController@index');
Route::get('giahh-xuatnhapkhau/thoidiem={thoidiem}/create','HsGiaHhXnkController@create');
Route::post('giahh-xuatnhapkhau','HsGiaHhXnkController@store');
Route::get('giahh-xuatnhapkhau/{id}/show','HsGiaHhXnkController@show');
Route::get('giahh-xuatnhapkhau/{id}/edit','HsGiaHhXnkController@edit');
Route::patch('giahh-xuatnhapkhau/{id}','HsGiaHhXnkController@update');
Route::post('giahh-xuatnhapkhau/delete','HsGiaHhXnkController@destroy');


Route::get('/giahhxnkdefault/getpnhom','GiaHhXnkDefaultController@getpnhomhh');
Route::get('/giahhxnkdefault/getloai','GiaHhXnkDefaultController@getloai');
Route::get('/giahhxnkdefault/gethh','GiaHhXnkDefaultController@gethh');
Route::get('/giahhxnkdefault/store','GiaHhXnkDefaultController@store');
Route::get('/giahhxnkdefault/edit','GiaHhXnkDefaultController@edit');
Route::get('/giahhxnkdefault/update','GiaHhXnkDefaultController@update');
Route::get('/giahhxnkdefault/delete','GiaHhXnkDefaultController@destroy');

Route::get('/giahhxnk/store','GiaHhXnkController@store');
Route::get('/giahhxnk/edit','GiaHhXnkController@edit');
Route::get('/giahhxnk/update','GiaHhXnkController@update');
Route::get('/giahhxnk/delete','GiaHhXnkController@destroy');
//End Giá hh xuất nhập khẩu
    //End giá hàng hóa dv
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
//End TTQĐ

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
//End Thẩm định giá

//Công bố giá
Route::get('hoso-congbogia/nam={nam}&pb={pb}','HsCongBoGiaController@index');
Route::get('hoso-congbogia/create','HsCongBoGiaController@create');
Route::post('hoso-congbogia','HsCongBoGiaController@store');
Route::post('hoso-congbogia/delete','HsCongBoGiaController@destroy');
Route::get('hoso-congbogia/{id}/show','HsCongBoGiaController@show');
Route::get('hoso-congbogia/{id}/edit','HsCongBoGiaController@edit');
Route::patch('hoso-congbogia/{id}','HsCongBoGiaController@update');

Route::get('congbogiadefault/store','CongBoGiaDefaultController@store');
Route::get('congbogiadefault/edit','CongBoGiaDefaultController@edit');
Route::get('congbogiadefault/update','CongBoGiaDefaultController@update');
Route::get('congbogiadefault/delete','CongBoGiaDefaultController@destroy');

Route::get('congbogia/store','CongBoGiaController@store');
Route::get('congbogia/edit','CongBoGiaController@edit');
Route::get('congbogia/update','CongBoGiaController@update');
Route::get('congbogia/delete','CongBoGiaController@destroy');
//End Công bố giá

//Reports
    //BCTK khác
Route::get('reports/bctkkhac','BcTkKhacController@index');
Route::post('reports/bctkkhac/BC1','BcTkKhacController@BC1');
Route::post('reports/bctkkhac/BC2','BcTkKhacController@BC2');
Route::post('reports/bctkkhac/BC3','BcTkKhacController@BC3');
Route::post('reports/bctkkhac/BC4','BcTkKhacController@BC4');

//End Reports


// </editor-fold>
?>