<?php
// DEFAULT
Route::get('/', 'HomeController@index');
Route::get('setting','HomeController@setting');
Route::post('setting','HomeController@upsetting');
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
Route::post('users/delete','UsersController@destroy');
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
Route::get('dmtd/pl={plbc}','DmThoiDiemController@indextd');
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

//Danh mục loại mặt hàng
Route::resource('dmthitruong','DmThiTruongController');
Route::get('/checkthitruong','DmThiTruongController@checkthitruong');
Route::post('dmthitruong/delete','DmThiTruongController@destroy');
//End dnah mục loại mặt hàng

//Danh mục loại đất
Route::resource('dmloaidat','DmLoaiDatController');
Route::get('/checkloaidat','DmLoaiDatController@checkloaidat');
Route::post('dmloaidat/delete','DmLoaiDatController@destroy');
//End dnah mục loại mặt hàng

//Danh mục loại giá
Route::resource('dmloaivanban','DmLoaiVanBanController');
Route::get('/checkmaloaivanban','DmLoaiVanBanController@checkmaloaivanban');
Route::post('dmloaivanban/delete','DmLoaiVanBanController@destroy');
//End danh mục loại giá

//
Route::resource('dmqdgiadat','dmqd_giadatController');
//
    //Hàng hóa thị trường theo thông tư 55/2011
Route::get('dmhanghoa-thitruong','DmHhTn55Controller@nhom');
Route::get('dmhanghoa-thitruong/nhom={nhom}','DmHhTn55Controller@pnhom');
Route::get('dmhanghoa-thitruong/nhom={nhom}','DmHhTn55Controller@hanghoa');
Route::get('dmhanghoa-thitruong/nhom={nhom}/create','DmHhTn55Controller@create');
Route::get('/checkmahhtt','DmHhTn55Controller@checkmahhtn');
Route::post('dmhanghoa-thitruong','DmHhTn55Controller@store');
Route::get('dmhanghoa-thitruong/{id}/edit','DmHhTn55Controller@edit');
Route::patch('dmhanghoa-thitruong/{id}','DmHhTn55Controller@update');
Route::post('dmhanghoa-thitruong/delete','DmHhTn55Controller@destroy');
    //End hàng hóa trong nước

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

    //Hàng hóa trong nước làm cho Lào Cai theo qd177
Route::get('dmhanghoa-hanghoa','DmHanghoaController@nhom');
Route::get('dmhanghoa-hanghoa/nhom={nhom}','DmHanghoaController@pnhom');
Route::get('dmhanghoa-hanghoa/nhom={nhom}/pnhom={pnhom}','DmHanghoaController@hanghoa');
Route::get('dmhanghoa-hanghoa/nhom={nhom}/pnhom={pnhom}/create','DmHanghoaController@create');
Route::post('dmhanghoa-hanghoa','DmHanghoaController@store');
Route::get('dmhanghoa-hanghoa/{id}/edit','DmHanghoaController@edit');
Route::patch('dmhanghoa-hanghoa/{id}','DmHanghoaController@update');
Route::post('dmhanghoa-hanghoa/delete','DmHanghoaController@destroy');
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
    //Danh mục loại xe thuế trước bạ
Route::get('dmloaixe-thuetruocba','DmXeThueTbController@dmloaixe');
Route::get('dmloaixe-thuetruocba/maloai={maloai}','DmXeThueTbController@index');
Route::get('dmloaixe-thuetruocba/maloai={maloai}/create','DmXeThueTbController@create');
Route::post('dmloaixe-thuetruocba','DmXeThueTbController@store');
Route::get('dmloaixe-thuetruocba/{id}/edit','DmXeThueTbController@edit');
Route::patch('dmloaixe-thuetruocba/{id}','DmXeThueTbController@update');
Route::post('dmloaixe-thuetruocba/delete','DmXeThueTbController@destroy');

    //Danh mục tính thuế tài nguyên
Route::get('dmthuetn','DmThueTnController@nhom');
Route::get('dmthuetn/nhom={nhom}','DmThueTnController@pnhom');
Route::get('dmthuetn/nhom={nhom}/pnhom={pnhom}','DmThueTnController@hanghoa');
Route::get('dmthuetn/nhom={nhom}/pnhom={pnhom}/create','DmThueTnController@create');
Route::post('dmthuetn','DmThueTnController@store');
Route::get('dmthuetn/{id}/edit','DmThueTnController@edit');
Route::patch('dmthuetn/{id}','DmThueTnController@update');
Route::post('dmthuetn/delete','DmThueTnController@destroy');
    //End danh mục tính thuế tài nguyên

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Manage--">
    //Giá hàng hóa dv

    //Giá hàng hóa thị trường
Route::get('giahhdv-thitruong','HsGiaHhTtController@thoidiem');
Route::get('giahhdv-thitruong/thoidiem={thoidiem}/nam={nam}','HsGiaHhTtController@index');
Route::get('giahhdv-thitruong/thoidiem={thoidiem}/create','HsGiaHhTtController@create');
Route::post('giahhdv-thitruong','HsGiaHhTtController@store');
Route::get('giahhdv-thitruong/{id}/show','HsGiaHhTtController@show');
Route::get('giahhdv-thitruong/{id}/edit','HsGiaHhTtController@edit');
Route::patch('giahhdv-thitruong/{id}','HsGiaHhTtController@update');
Route::post('giahhdv-thitruong/delete','HsGiaHhTtController@destroy');
Route::post('giahhdv-thitruong/approve','HsGiaHhTtController@approve');
Route::post('giahhdv-thitruong-dk','HsGiaHhTtController@store_dk');
Route::get('giahhdv-thitruong/thoidiem={thoidiem}/create_dk','HsGiaHhTtController@create_dk');
Route::get('giahhdv-thitruong-dk/{id}/edit','HsGiaHhTtController@edit_dk');
Route::patch('giahhdv-thitruong-dk/{id}','HsGiaHhTtController@update_dk');
Route::get('giahhdv-thitruong-dk/dinhkem','GiaHhTtController@get_attackfile');

Route::get('thongtin-giathitruong','HsGiaHhTtController@showthoidiem');
Route::get('thongtin-giathitruong/thoidiem={thoidiem}/nam={nam}&pb={pb}','HsGiaHhTtController@showindex');
Route::get('thongtin-giathitruong/{id}/show','HsGiaHhTtController@view');
Route::post('thongtin-giathitruong/unapprove','HsGiaHhTtController@unapprove');

Route::get('/giahhttdefault/gettthh','GiaHhTtDefaultController@gettthh');
Route::get('/giahhttdefault/store','GiaHhTtDefaultController@store');
Route::get('/giahhttdefault/edit','GiaHhTtDefaultController@edit');
Route::get('/giahhttdefault/update','GiaHhTtDefaultController@update');
Route::get('/giahhttdefault/delete','GiaHhTtDefaultController@destroy');

Route::get('/giahhtt/store','GiaHhTtController@store');
Route::get('/giahhtt/edit','GiaHhTtController@edit');
Route::get('/giahhtt/update','GiaHhTtController@update');
Route::get('/giahhtt/delete','GiaHhTtController@destroy');

Route::get('timkiem-giahhdv-thitruong','HsGiaHhTtController@search');
Route::post('timkiem-giahhdv-thitruong','HsGiaHhTtController@viewsearch');
    //End giá hàng hóa thị trường

    //Giá hàng hóa dv
//Giá hàng hóa thị trường
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

Route::get('timkiem-giahhdv-trongnuoc','HsGiaHhTnController@search');
Route::post('timkiem-giahhdv-trongnuoc','HsGiaHhTnController@viewsearch');

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

Route::get('timkiem-giahh-xuatnhapkhau','HsGiaHhXnkController@search');
Route::post('timkiem-giahh-xuatnhapkhau','HsGiaHhXnkController@viewsearch');
//End Giá hh xuất nhập khẩu

       //1.Giá hàng hóa do TW quy định
Route::get('giahhdv-tw','HsGiaHangHoaTWController@thoidiem');
Route::get('giahhdv-tw/thoidiem={thoidiem}/nam={nam}','HsGiaHangHoaTWController@index');
Route::post('giahhdv-tw/create','HsGiaHangHoaTWController@create');
Route::post('giahhdv-tw','HsGiaHangHoaTWController@store');
Route::get('giahhdv-tw/{id}/show','HsGiaHangHoaTWController@show');
Route::get('giahhdv-tw/{id}/edit','HsGiaHangHoaTWController@edit');
Route::patch('giahhdv-tw/{id}','HsGiaHangHoaTWController@update');
Route::post('giahhdv-tw/delete','HsGiaHangHoaTWController@destroy');
Route::post('giahhdv-tw/approve','HsGiaHangHoaTWController@approve');

Route::get('giahhdv-tw/thoidiem={thoidiem}/create_dk','HsGiaHangHoaTWController@create_dk');
Route::patch('giahhdv-tw-dk/{id}','HsGiaHangHoaTWController@update_dk');
Route::post('giahhdv-tw-dk','HsGiaHangHoaTWController@store_dk');
Route::get('giahhdv-tw-dk/{id}/edit','HsGiaHangHoaTWController@edit_dk');
Route::get('giahhdv-tw-dk/dinhkem','GiaHangHoaController@get_attackfile');

Route::get('thongtin-tw','HsGiaHangHoaTWController@showthoidiem');
Route::get('thongtin-tw/thoidiem={thoidiem}/nam={nam}&pb={pb}','HsGiaHangHoaTWController@showindex');
Route::get('thongtin-tw/{id}/show','HsGiaHangHoaTWController@view');
Route::post('thongtin-tw/unapprove','HsGiaHangHoaTWController@unapprove');

Route::get('/giahanghoadefault/gettthh','GiaHangHoaDefaultController@gettthh');
Route::get('/giahanghoadefault/store','GiaHangHoaDefaultController@store');
Route::get('/giahanghoadefault/edit','GiaHangHoaDefaultController@edit');
Route::get('/giahanghoadefault/update','GiaHangHoaDefaultController@update');
Route::get('/giahanghoadefault/delete','GiaHangHoaDefaultController@destroy');

Route::get('/giahanghoa/store','GiaHangHoaController@store');
Route::get('/giahanghoa/edit','GiaHangHoaController@edit');
Route::get('/giahanghoa/update','GiaHangHoaController@update');
Route::get('/giahanghoa/delete','GiaHangHoaController@destroy');

Route::get('timkiem-giahhdv-tw','HsGiaHangHoaTWController@search');
Route::post('timkiem-giahhdv-tw','HsGiaHangHoaTWController@viewsearch');
    //End 1.Giá hàng hóa do TW quy định

    //2.Giá hàng hóa do địa phương quy định
Route::get('giahhdv-dp','HsGiaHangHoaDPController@thoidiem');
Route::get('giahhdv-dp/thoidiem={thoidiem}/nam={nam}','HsGiaHangHoaDPController@index');
Route::post('giahhdv-dp/create','HsGiaHangHoaDPController@create');
Route::post('giahhdv-dp','HsGiaHangHoaDPController@store');
Route::get('giahhdv-dp/{id}/show','HsGiaHangHoaDPController@show');
Route::get('giahhdv-dp/{id}/edit','HsGiaHangHoaDPController@edit');
Route::patch('giahhdv-dp/{id}','HsGiaHangHoaDPController@update');
Route::post('giahhdv-dp/delete','HsGiaHangHoaDPController@destroy');
Route::post('giahhdv-dp/approve','HsGiaHangHoaDPController@approve');

Route::get('giahhdv-dp/thoidiem={thoidiem}/create_dk','HsGiaHangHoaDPController@create_dk');
Route::patch('giahhdv-dp-dk/{id}','HsGiaHangHoaDPController@update_dk');
Route::post('giahhdv-dp-dk','HsGiaHangHoaDPController@store_dk');
Route::get('giahhdv-dp-dk/{id}/edit','HsGiaHangHoaDPController@edit_dk');
Route::get('giahhdv-dp-dk/dinhkem','GiaHangHoaController@get_attackfile');

Route::get('thongtin-dp','HsGiaHangHoaDPController@showthoidiem');
Route::get('thongtin-dp/thoidiem={thoidiem}/nam={nam}&pb={pb}','HsGiaHangHoaDPController@showindex');
Route::get('thongtin-dp/{id}/show','HsGiaHangHoaDPController@view');
Route::post('thongtin-dp/unapprove','HsGiaHangHoaDPController@unapprove');

Route::get('timkiem-giahhdv-dp','HsGiaHangHoaDPController@search');
Route::post('timkiem-giahhdv-dp','HsGiaHangHoaDPController@viewsearch');
    //End 2.Giá hàng hóa do địa phương quy định
    //End giá hàng hóa dv

//kê khai giá trung ương danh cho Lào Cai
Route::group(['prefix'=>'giahhdv-trunguong'],function(){
    Route::get('','HsGiaHangHoaTW_LaoCaiController@danhmuc');
    Route::get('/maso={masopnhom}&nam={nam}','HsGiaHangHoaTW_LaoCaiController@index');
    Route::get('/maso={masopnhom}/create','HsGiaHangHoaTW_LaoCaiController@create');
    Route::post('','HsGiaHangHoaTW_LaoCaiController@store');
    Route::get('{id}/edit','HsGiaHangHoaTW_LaoCaiController@edit');
    Route::patch('{id}','HsGiaHangHoaTW_LaoCaiController@update');
    Route::post('delete','HsGiaHangHoaTW_LaoCaiController@destroy');
    Route::post('approve','HsGiaHangHoaTW_LaoCaiController@approve');
    Route::get('/{id}/show','HsGiaHangHoaTW_LaoCaiController@show');
});
Route::group(['prefix'=>'giahhdv-trunguong-dk'],function(){
    Route::get('/maso={masopnhom}/create_dk','HsGiaHangHoaTW_LaoCaiController@create_dk');
    Route::patch('{id}','HsGiaHangHoaTW_LaoCaiController@update_dk');
    Route::post('','HsGiaHangHoaTW_LaoCaiController@store_dk');
    Route::get('{id}/edit','HsGiaHangHoaTW_LaoCaiController@edit_dk');
    Route::get('/dinhkem','GiaHangHoaController@get_attackfile');
});
Route::group(['prefix'=>'thongtin-trunguong'],function(){
    Route::get('','HsGiaHangHoaTW_LaoCaiController@showthoidiem');
    Route::get('maso={masopnhom}/nam={nam}&pb={pb}','HsGiaHangHoaTW_LaoCaiController@showindex');
    Route::get('{id}/show','HsGiaHangHoaTW_LaoCaiController@view');
    Route::post('unapprove','HsGiaHangHoaTW_LaoCaiController@unapprove');
});
Route::get('timkiem-giahhdv-trunguong','HsGiaHangHoaTW_LaoCaiController@search');
Route::post('timkiem-giahhdv-trunguong','HsGiaHangHoaTW_LaoCaiController@viewsearch');
//End - kê khai giá trung ương danh cho Lào Cai

//kê khai giá dia phuong danh cho Lào Cai
Route::group(['prefix'=>'giahhdv-diaphuong'],function(){
    Route::get('','HsGiaHangHoaDP_LaoCaiController@thoidiem');
    Route::get('maso={thoidiem}/nam={nam}','HsGiaHangHoaDP_LaoCaiController@index');
    Route::get('/maso={masopnhom}/create','HsGiaHangHoaDP_LaoCaiController@create');
    Route::post('','HsGiaHangHoaDP_LaoCaiController@store');
    Route::get('{id}/show','HsGiaHangHoaDP_LaoCaiController@show');
    Route::get('{id}/edit','HsGiaHangHoaDP_LaoCaiController@edit');
    Route::patch('{id}','HsGiaHangHoaDP_LaoCaiController@update');
    Route::post('delete','HsGiaHangHoaDP_LaoCaiController@destroy');
    Route::post('approve','HsGiaHangHoaDP_LaoCaiController@approve');
});
Route::group(['prefix'=>'giahhdv-diaphuong-dk'],function(){
    Route::get('maso={masopnhom}/create_dk','HsGiaHangHoaDP_LaoCaiController@create_dk');
    Route::patch('{id}','HsGiaHangHoaDP_LaoCaiController@update_dk');
    Route::post('','HsGiaHangHoaDP_LaoCaiController@store_dk');
    Route::get('{id}/edit','HsGiaHangHoaDP_LaoCaiController@edit_dk');
    Route::get('/dinhkem','GiaHangHoaController@get_attackfile');
});
Route::group(['prefix'=>'thongtin-diaphuong'],function(){
    Route::get('','HsGiaHangHoaDP_LaoCaiController@showthoidiem');
    Route::get('maso={thoidiem}/nam={nam}&pb={pb}','HsGiaHangHoaDP_LaoCaiController@showindex');
    Route::get('{id}/show','HsGiaHangHoaDP_LaoCaiController@view');
    Route::post('unapprove','HsGiaHangHoaDP_LaoCaiController@unapprove');
});
Route::get('timkiem-giahhdv-diaphuong','HsGiaHangHoaDP_LaoCaiController@search');
Route::post('timkiem-giahhdv-diaphuong','HsGiaHangHoaDP_LaoCaiController@viewsearch');
//End - kê khai giá dia phuong danh cho Lào Cai

//kê khai giá đất theo loại đất
Route::group(['prefix'=>'giadat_phanloai'],function(){
    Route::get('','HsGiaDat_LoaiDatController@thoidiem');
    Route::get('loaidat={maloaidat}/nam={nam}','HsGiaDat_LoaiDatController@index');
    Route::get('loaidat={maloaidat}/create','HsGiaDat_LoaiDatController@create');
    Route::post('','HsGiaDat_LoaiDatController@store');
    Route::get('{id}/show','HsGiaDat_LoaiDatController@show');
    Route::get('{id}/edit','HsGiaDat_LoaiDatController@edit');
    Route::patch('{id}','HsGiaDat_LoaiDatController@update');
    Route::post('delete','HsGiaDat_LoaiDatController@destroy');
    Route::post('approve','HsGiaDat_LoaiDatController@approve');
});
Route::group(['prefix'=>'giadat_phanloai_dk'],function(){
    Route::get('loaidat={maloaidat}/create_dk','HsGiaDat_LoaiDatController@create_dk');
    Route::patch('{id}','HsGiaDat_LoaiDatController@update_dk');
    Route::post('','HsGiaDat_LoaiDatController@store_dk');
    Route::get('{id}/edit','HsGiaDat_LoaiDatController@edit_dk');
    Route::get('/dinhkem','GiaDat_PhanLoaiController@get_attackfile');
});
Route::group(['prefix'=>'thongtin_giadat_phanloai'],function(){
    Route::get('','HsGiaDat_LoaiDatController@showthoidiem');
    Route::get('loaidat={maloaidat}/nam={nam}&pb={pb}','HsGiaDat_LoaiDatController@showindex');
    Route::get('{id}/show','HsGiaDat_LoaiDatController@view');
    Route::post('unapprove','HsGiaDat_LoaiDatController@unapprove');
});
Route::get('timkiem_giadat_phanloai','HsGiaDat_LoaiDatController@search');
Route::post('timkiem_giadat_phanloai','HsGiaDat_LoaiDatController@viewsearch');

Route::get('giadatpldefault/store','GiaDat_PhanLoaiDefaultController@store');
Route::get('giadatpldefault/edit','GiaDat_PhanLoaiDefaultController@edit');
Route::get('giadatpldefault/update','GiaDat_PhanLoaiDefaultController@update');
Route::get('giadatpldefault/delete','GiaDat_PhanLoaiDefaultController@destroy');

Route::get('giadatpl/store','GiaDat_PhanLoaiController@store');
Route::get('giadatpl/edit','GiaDat_PhanLoaiController@edit');
Route::get('giadatpl/update','GiaDat_PhanLoaiController@update');
Route::get('giadatpl/delete','GiaDat_PhanLoaiController@destroy');
//End - kê khai giá đất theo loại đất

// <editor-fold defaultstate="collapsed" desc="--Kê khai giá đất theo vị trí địa lý--">
Route::group(['prefix'=>'giadat'],function(){
    Route::group(['prefix'=>'vitri'],function(){
        Route::get('danh_muc/ma_so={macapdo}','dmvitridatController@index_danhmuc');
        Route::post('delete','dmvitridatController@destroy');
        Route::get('add_diaban','dmvitridatController@add_diaban');
        Route::get('add_node','dmvitridatController@add_node');
        Route::get('get_node','dmvitridatController@get_node');
        Route::get('update_node','dmvitridatController@update_node');
    });

    //Route::resource('thuedat','giathuedatController');
    Route::group(['prefix'=>'thuedat'],function(){
        Route::get('danh_sach','giathuedatController@index');
        Route::get('thong_tin','giathuedatController@showindex');
        Route::get('create','giathuedatController@create');
        Route::post('store','giathuedatController@store');
        Route::get('{id}/edit','giathuedatController@edit');
        Route::patch('{id}','giathuedatController@update');
        Route::post('delete','giathuedatController@destroy');
        Route::post('approve','giathuedatController@approve');
        Route::post('unapprove','giathuedatController@unapprove');
        Route::get('{id}/show','giathuedatController@show');
    });
    Route::group(['prefix'=>'daugia'],function(){
        Route::get('danh_sach','giadaugiadatController@index');
        Route::get('thong_tin','giadaugiadatController@showindex');
        Route::get('create','giadaugiadatController@create');
        Route::post('store','giadaugiadatController@store');
        Route::get('{id}/edit','giadaugiadatController@edit');
        Route::patch('{id}','giadaugiadatController@update');
        Route::post('delete','giadaugiadatController@destroy');
        Route::post('approve','giadaugiadatController@approve');
        Route::post('unapprove','giadaugiadatController@unapprove');
        Route::get('{id}/show','giadaugiadatController@show');
    });

    Route::get('getvitri','dmvitridatController@getvitri');

    Route::get('loaidat={maloaidat}/nam={nam}','HsGiaDat_LoaiDatController@index');
    Route::get('loaidat={maloaidat}/create','HsGiaDat_LoaiDatController@create');
    Route::post('','HsGiaDat_LoaiDatController@store');
    Route::get('{id}/show','HsGiaDat_LoaiDatController@show');
    Route::get('{id}/edit','HsGiaDat_LoaiDatController@edit');
    Route::patch('{id}','HsGiaDat_LoaiDatController@update');
    Route::post('delete','HsGiaDat_LoaiDatController@destroy');
    Route::post('approve','HsGiaDat_LoaiDatController@approve');
});
//End - kê khai giá đất theo vị trí địa lý
// </editor-fold>

    //TTQĐ
//TW
//Route::resource('thongtu-quyetdinh-tw','TtQdController');

Route::get('thongtu-quyetdinh-tw/nam={nam}&pl={pl}','TtQdController@tw');
Route::get('thongtu-quyetdinh-tw/create','TtQdController@twcreate');
Route::post('thongtu-quyetdinh-tw','TtQdController@twstore');
Route::get('thongtu-quyetdinh-tw/{id}/edit','TtQdController@twedit');
Route::patch('thongtu-quyetdinh-tw/{id}','TtQdController@twupdate');

Route::get('checkkhvb','TtQdController@checkkhvb');
Route::post('thongtu-quyetdinh-tw/delete','TtQdController@twdelete');
Route::get('thongtu-quyetdinh-tw/dinhkem','TtQdController@get_attackfile');
    //Tỉnh
Route::get('thongtu-quyetdinh-tinh/nam={nam}&pl={pl}','TtQdController@tinh');
Route::get('thongtu-quyetdinh-tinh/create','TtQdController@tinhcreate');
Route::post('thongtu-quyetdinh-tinh','TtQdController@tinhstore');
Route::get('thongtu-quyetdinh-tinh/{id}/edit','TtQdController@tinhedit');
Route::patch('thongtu-quyetdinh-tinh/{id}','TtQdController@tinhupdate');
Route::post('thongtu-quyetdinh-tinh/delete','TtQdController@tinhdelete');
    //Thanh kiểm tra
Route::get('thanhkiemtra-vegia/nam={nam}','TtQdController@thanhkiemtra');
Route::get('thanhkiemtra-vegia/create','TtQdController@thanhkiemtracreate');
Route::get('checkkhvb-tkt','TtQdController@checkkhvbtkt');
Route::post('thanhkiemtra-vegia','TtQdController@thanhkiemtrastore');
Route::get('thanhkiemtra-vegia/{id}/edit','TtQdController@thanhkiemtraedit');
Route::patch('thanhkiemtra-vegia/{id}','TtQdController@thanhkiemtraupdate');
Route::post('thanhkiemtra-vegia/delete','TtQdController@thanhkiemtradelete');
Route::get('thanhkiemtra-vegia/dinhkem','TtQdController@get_attackfile_thanhtra');
//End TTQĐ

//Thẩm định giá
Route::get('hoso-thamdinhgia/nam={nam}','HsThamDinhGiaController@index');
Route::get('hoso-thamdinhgia/create','HsThamDinhGiaController@create');
Route::post('hoso-thamdinhgia','HsThamDinhGiaController@store');
Route::post('hoso-thamdinhgia/delete','HsThamDinhGiaController@destroy');
Route::get('hoso-thamdinhgia/{id}/show','HsThamDinhGiaController@show');
Route::get('hoso-thamdinhgia/{id}/edit','HsThamDinhGiaController@edit');
Route::patch('hoso-thamdinhgia/{id}','HsThamDinhGiaController@update');
Route::post('hoso-thamdinhgia/hoantat','HsThamDinhGiaController@hoantat');

Route::get('hoso-thamdinhgia-dk/create','HsThamDinhGiaController@create_dk');
Route::get('hoso-thamdinhgia-dk/{id}/edit','HsThamDinhGiaController@edit_dk');
Route::patch('hoso-thamdinhgia-dk/{id}','HsThamDinhGiaController@update_dk');
Route::post('hoso-thamdinhgia-dk','HsThamDinhGiaController@store_dk');
Route::get('hoso-thamdinhgia-dk/dinhkem','ThamDinhGiaController@get_attackfile');

Route::get('hoso-thamdinhgia/{mahs}/history','HsThamDinhGiaController@history');

Route::get('thongtin-thamdinhgia/nam={nam}&pb={pb}','HsThamDinhGiaController@showindex');
Route::get('thongtin-thamdinhgia/{id}/show','HsThamDinhGiaController@view');
Route::post('thongtin-thamdinhgia/huy','HsThamDinhGiaController@huy');

Route::get('thamdinhgiadefault/store','ThamDinhgiaDefaultController@store');
Route::get('thamdinhgiadefault/edit','ThamDinhgiaDefaultController@edit');
Route::get('thamdinhgiadefault/update','ThamDinhgiaDefaultController@update');
Route::get('thamdinhgiadefault/delete','ThamDinhgiaDefaultController@destroy');
Route::get('thamdinhgiadefault/importExcel','ThamDinhgiaDefaultController@importExcel');
Route::get('thamdinhgiadefault/thuevat','ThamDinhgiaDefaultController@thuevat');

Route::get('thamdinhgia/store','ThamDinhGiaController@store');
Route::get('thamdinhgia/edit','ThamDinhGiaController@edit');
Route::get('thamdinhgia/update','ThamDinhGiaController@update');
Route::get('thamdinhgia/delete','ThamDinhGiaController@destroy');
Route::get('thamdinhgia/thuevat','ThamDinhGiaController@thuevat');
        //Search Thảm định giá
Route::get('timkiem-thamdinhgia','ThamDinhGiaController@search');
Route::post('timkiem-thamdinhgia','ThamDinhGiaController@viewsearch');
        //import THẩm định giá
Route::get('hoso-thamdinhgia/import','ThamDinhGiaController@import');
Route::resource('hoso-thamdinhgia/import-view','ThamDinhGiaController@showimport');
//Route::post('import-thamdinhgia','ThamDinhGiaController@create_import');
Route::post('store-thamdinhgia','ThamDinhGiaController@storeimport');
Route::get('mauexceltdg','ThamDinhGiaController@getDownload');
//End Thẩm định giá

//Công bố giá
Route::get('hoso-congbogia/nam={nam}','HsCongBoGiaController@index');
Route::get('hoso-congbogia/create','HsCongBoGiaController@create');
Route::post('hoso-congbogia','HsCongBoGiaController@store');
Route::post('hoso-congbogia/delete','HsCongBoGiaController@destroy');
Route::get('hoso-congbogia/{id}/show','HsCongBoGiaController@show');
Route::get('hoso-congbogia/{id}/edit','HsCongBoGiaController@edit');
Route::patch('hoso-congbogia/{id}','HsCongBoGiaController@update');
Route::post('hoso-congbogia/hoantat','HsCongBoGiaController@hoantat');

Route::get('hoso-congbogia-dk/create','HsCongBoGiaController@create_dk');
Route::get('hoso-congbogia-dk/{id}/edit','HsCongBoGiaController@edit_dk');
Route::patch('hoso-congbogia-dk/{id}','HsCongBoGiaController@update_dk');
Route::post('hoso-congbogia-dk','HsCongBoGiaController@store_dk');
Route::get('hoso-congbogia-dk/dinhkem','CongBoGiaController@get_attackfile');


Route::get('thongtin-congbogia/nam={nam}&pb={pb}','HsCongBoGiaController@showindex');
Route::get('thongtin-congbogia/{id}/show','HsCongBoGiaController@view');
Route::post('thongtin-congbogia/huy','HsCongBoGiaController@huy');

Route::get('congbogiadefault/store','CongBoGiaDefaultController@store');
Route::get('congbogiadefault/edit','CongBoGiaDefaultController@edit');
Route::get('congbogiadefault/update','CongBoGiaDefaultController@update');
Route::get('congbogiadefault/delete','CongBoGiaDefaultController@destroy');

Route::get('congbogia/store','CongBoGiaController@store');
Route::get('congbogia/edit','CongBoGiaController@edit');
Route::get('congbogia/update','CongBoGiaController@update');
Route::get('congbogia/delete','CongBoGiaController@destroy');

    //Search Công bố giá
Route::get('timkiem-congbogia','CongBoGiaController@search');
Route::post('timkiem-congbogia','CongBoGiaController@viewsearch');

    //import Công bố giá
Route::get('hoso-congbogia/import','CongBoGiaController@import');
Route::resource('hoso-congbogia/import-view','CongBoGiaController@showimport');
//Route::post('import-congbogia','CongBoGiaController@create_import');
Route::post('store-congbogia','CongBoGiaController@storeimport');
Route::get('mauexcelcbg','CongBoGiaController@getDownload');
//End Công bố giá

//Công bố giá bổ sung
Route::get('hoso-congbobosung/nam={nam}','HsCongBoGiaBoSungController@index');
Route::get('hoso-congbobosung/create','HsCongBoGiaBoSungController@create');
Route::post('hoso-congbobosung','HsCongBoGiaBoSungController@store');
Route::post('hoso-congbobosung/delete','HsCongBoGiaBoSungController@destroy');
Route::get('hoso-congbobosung/{id}/show','HsCongBoGiaBoSungController@show');
Route::get('hoso-congbobosung/{id}/edit','HsCongBoGiaBoSungController@edit');
Route::patch('hoso-congbobosung/{id}','HsCongBoGiaBoSungController@update');
Route::post('hoso-congbobosung/hoantat','HsCongBoGiaBoSungController@hoantat');

Route::get('hoso-congbobosung-dk/create','HsCongBoGiaBoSungController@create_dk');
Route::get('hoso-congbobosung-dk/{id}/edit','HsCongBoGiaBoSungController@edit_dk');
Route::patch('hoso-congbobosung-dk/{id}','HsCongBoGiaBoSungController@update_dk');
Route::post('hoso-congbobosung-dk','HsCongBoGiaBoSungController@store_dk');
Route::get('hoso-congbobosung-dk/dinhkem','CongBoGiaBoSungController@get_attackfile');

Route::get('hoso-congbobosung/import','CongBoGiaBoSungController@import');
Route::resource('hoso-congbobosung/import-view','CongBoGiaBoSungController@showimport');
Route::post('store-congbobosung','CongBoGiaBoSungController@storeimport');

Route::get('congbobosungdefault/store','CongBoGiaBoSungDefaultController@store');
Route::get('congbobosungdefault/edit','CongBoGiaBoSungDefaultController@edit');
Route::get('congbobosungdefault/update','CongBoGiaBoSungDefaultController@update');
Route::get('congbobosungdefault/delete','CongBoGiaBoSungDefaultController@destroy');

Route::get('congbobosung/store','CongBoGiaBoSungController@store');
Route::get('congbobosung/edit','CongBoGiaBoSungController@edit');
Route::get('congbobosung/update','CongBoGiaBoSungController@update');
Route::get('congbobosung/delete','CongBoGiaBoSungController@destroy');

Route::get('thongtin-congbobosung/nam={nam}&pb={pb}','HsCongBoGiaBoSungController@showindex');
Route::get('thongtin-congbobosung/{id}/show','HsCongBoGiaBoSungController@view');
Route::post('thongtin-congbobosung/huy','HsCongBoGiaBoSungController@huy');

Route::get('timkiem-congbobosung','CongBoGiaBoSungController@search');
Route::post('timkiem-congbobosung','CongBoGiaBoSungController@viewsearch');
//End Công bố giá bổ sung

//Tài sản nhà nước
    //Tài sản nhà đất
Route::get('taisan-nhadat/nam={nam}&pb={pl}','TsNhaDatController@index');
Route::get('taisan-nhadat/create','TsNhaDatController@create');
Route::post('taisan-nhadat','TsNhaDatController@store');
Route::get('taisan-nhadat/{id}/show','TsNhaDatController@show');
Route::get('taisan-nhadat/{id}/edit','TsNhaDatController@edit');
Route::patch('taisan-nhadat/{id}','TsNhaDatController@update');
Route::post('taisan-nhadat/delete','TsNhaDatController@destroy');


Route::get('tttsnhadatdefault/store','TtTsNhaDatDefaultController@store');
Route::get('tttsnhadatdefault/edit','TtTsNhaDatDefaultController@edit');
Route::get('tttsnhadatdefault/update','TtTsNhaDatDefaultController@update');
Route::get('tttsnhadatdefault/delete','TtTsNhaDatDefaultController@destroy');

Route::get('tttsnhadat/store','TtTsNhaDatController@store');
Route::get('tttsnhadat/edit','TtTsNhaDatController@edit');
Route::get('tttsnhadat/update','TtTsNhaDatController@update');
Route::get('tttsnhadat/delete','TtTsNhaDatController@destroy');
    //End Tài sản nhà đất
    //Tài sản ôtô khác
Route::get('taisan-otokhac/nam={nam}&pb={pl}','TsOtoKhacController@index');
Route::get('taisan-otokhac/create','TsOtoKhacController@create');
Route::post('taisan-otokhac','TsOtoKhacController@store');
Route::get('taisan-otokhac/{id}/show','TsOtoKhacController@show');
Route::get('taisan-otokhac/{id}/edit','TsOtoKhacController@edit');
Route::patch('taisan-otokhac/{id}','TsOtoKhacController@update');
Route::post('taisan-otokhac/delete','TsOtoKhacController@destroy');


Route::get('tttsotokhacdefault/store','TtTsOtoKhacDefaultController@store');
Route::get('tttsotokhacdefault/edit','TtTsOtoKhacDefaultController@edit');
Route::get('tttsotokhacdefault/update','TtTsOtoKhacDefaultController@update');
Route::get('tttsotokhacdefault/delete','TtTsOtoKhacDefaultController@destroy');

Route::get('tttsotokhac/store','TtTsOtoKhacController@store');
Route::get('tttsotokhac/edit','TtTsOtoKhacController@edit');
Route::get('tttsotokhac/update','TtTsOtoKhacController@update');
Route::get('tttsotokhac/delete','TtTsOtoKhacController@destroy');

    //End Tài sản ôtô khác
//End Tài sản nhà nước

//Thuế trước bạ
Route::get('gia-thuetruocba/nam={nam}','GiaThueTbController@index');
Route::get('gia-thuetruocba/create','GiaThueTbController@create');
Route::get('gia-thuetruocba-ct/create','GiaThueTbController@createds');
Route::get('gia-thuetruocba-ct/edit','GiaThueTbController@editctds');
Route::get('gia-thuetruocba-ct/update','GiaThueTbController@updatectds');
Route::post('gia-thuetruocba','GiaThueTbController@store');
Route::get('gia-thuetruocba/{id}/edit','GiaThueTbController@edit');
Route::get('gia-thuetruocba-ct/taomoi','GiaThueTbController@taomoids');
Route::get('gia-thuetruocba-ct/chinhsua','GiaThueTbController@chinhsuads');
Route::get('gia-thuetruocba-ct/capnhat','GiaThueTbController@capnhatds');
Route::patch('gia-thuetruocba/{id}','GiaThueTbController@update');

Route::get('gia-thuetruocba/{id}/show','GiaThueTbController@show');
Route::post('gia-thuetruocba/delete','GiaThueTbController@destroy');
Route::post('gia-thuetruocba/hoantat','GiaThueTbController@hoantat');

Route::get('thongtin-gia-thuetruocba/nam={nam}&pb={pb}','GiaThueTbController@indexthongtin');
Route::get('thongtin-gia-thuetruocba/{id}/show','GiaThueTbController@showthongtin');

Route::get('timkiem-thongtin-gia-thuetruocba','GiaThueTbController@search');
Route::post('timkiem-thongtin-gia-thuetruocba','GiaThueTbController@viewsearch');

Route::get('gia-thuetruocba-dk/create','GiaThueTbController@create_dk');
Route::get('gia-thuetruocba-dk/{id}/edit','GiaThueTbController@edit_dk');
Route::patch('gia-thuetruocba-dk/{id}','GiaThueTbController@update_dk');
Route::post('gia-thuetruocba-dk/store','GiaThueTbController@store_dk');
Route::get('gia-thuetruocba-dk/dinhkem','GiaThueTbController@get_attackfile');
//End Thuế trước bạ

//1.Giá thuế tài nguyên
Route::get('giathuetn','HsThueTnController@thoidiem');
Route::get('giathuetn/nam={nam}','HsThueTnController@index');
Route::post('giathuetn/create','HsThueTnController@create');
Route::post('giathuetn','HsThueTnController@store');
Route::get('giathuetn/{id}/show','HsThueTnController@show');
Route::get('giathuetn/{id}/edit','HsThueTnController@edit');
Route::patch('giathuetn/{id}','HsThueTnController@update');
Route::post('giathuetn/delete','HsThueTnController@destroy');
Route::post('giathuetn/approve','HsThueTnController@approve');


//Route::get('giathuetn','HsThueTnController@showthoidiem');
Route::get('giathuetn/nam={nam}&pb={pb}','HsThueTnController@showindex');
Route::get('giathuetn/{id}/show','HsThueTnController@view');

Route::get('/giathuetndefault/gettthh','ThueTnDefaultController@gettthh');
Route::get('/giathuetndefault/store','ThueTnDefaultController@store');
Route::get('/giathuetndefault/edit','ThueTnDefaultController@edit');
Route::get('/giathuetndefault/update','ThueTnDefaultController@update');
Route::get('/giathuetndefault/delete','ThueTnDefaultController@destroy');

Route::get('/giathuetn/store','ThueTnController@store');
Route::get('/giathuetn/edit','ThueTnController@edit');
Route::get('/giathuetn/update','ThueTnController@update');
Route::get('/giathuetn/delete','ThueTnController@destroy');

Route::get('thongtin-giathuetn','HsThueTnController@showthoidiem');
Route::get('thongtin-giathuetn/nam={nam}&pb={pb}','HsThueTnController@showindex');
Route::get('thongtin-giathuetn/{id}/show','HsThueTnController@view');
Route::post('thongtin-giathuetn/unapprove','HsThueTnController@unapprove');

Route::get('timkiem-giathuetn','HsThueTnController@search');
Route::post('timkiem-giathuetn','HsThueTnController@viewsearch');

Route::get('giathuetn-dk/create','HsThueTnController@create_dk');
Route::get('giathuetn-dk/{id}/edit','HsThueTnController@edit_dk');
Route::patch('giathuetn-dk/{id}','HsThueTnController@update_dk');
Route::post('giathuetn-dk/store','HsThueTnController@store_dk');
Route::get('giathuetn-dk/dinhkem','ThueTnController@get_attackfile');
//End 1.Giá thuế tài nguyên

// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="--Reports--">
    //TT142/2015/BTC
Route::get('reports/tt142-2015-BTC','TT1422015BtcController@index');
Route::post('reports/tt142-2015-BTC/PL2','TT1422015BtcController@PL2');
Route::post('reports/tt142-2015-BTC/PL3','TT1422015BtcController@PL3');
Route::post('reports/tt142-2015-BTC/PL4','TT1422015BtcController@PL4');
Route::post('reports/tt142-2015-BTC/PL5','TT1422015BtcController@PL5');
Route::post('reports/tt142-2015-BTC/PL6','TT1422015BtcController@PL6');
Route::post('reports/tt142-2015-BTC/PL7','TT1422015BtcController@PL7');
    //End TT142/2015/BTC

    //TT55/2011/BTC
Route::get('reports/tt55-2011-BTC','TT552011BtcController@index');
Route::post('reports/tt55-2011-BTC/PL1','TT552011BtcController@PL1');
Route::post('reports/tt55-2011-BTC/PL2','TT552011BtcController@PL2');
Route::post('reports/tt55-2011-BTC/PL1Excel','TT552011BtcController@PL1Excel');
Route::post('reports/tt55-2011-BTC/PL2Excel','TT552011BtcController@PL2Excel');
    //End TT55/2011/BTC


    //BCTK khác
Route::get('reports/bctkkhac','BcTkKhacController@index');
Route::post('reports/bctkkhac/BC1','BcTkKhacController@BC1');
Route::post('reports/bctkkhac/BC2','BcTkKhacController@BC2');
Route::post('reports/bctkkhac/BC3','BcTkKhacController@BC3');
Route::post('reports/bctkkhac/BC4','BcTkKhacController@BC4');
Route::post('reports/bctkkhac/BC1Excel','BcTkKhacController@BC1Excel');
Route::post('reports/bctkkhac/BC2Excel','BcTkKhacController@BC2Excel');
Route::post('reports/bctkkhac/BC3Excel','BcTkKhacController@BC3Excel');
Route::post('reports/bctkkhac/BC4Excel','BcTkKhacController@BC4Excel');
    //End BCTK khác

    //Thuế trước bạ
Route::get('banggiatinh-thuetruocba/{mahs}','BcGiaTTbController@BaGThueTB');
    //End thuế trước bạ

    //Thuế tài nguyên
Route::get('reports/thuetn/index','BcGiaThueTnController@index');
Route::post('reports/thuetn/bcgiathuetn','BcGiaThueTnController@bcgiathuetn');
Route::post('reports/thuetn/bcgiathuetnexcel','BcGiaThueTnController@bcgiathuetnexcel');
    //End tài nguyên
// </editor-fold>
?>