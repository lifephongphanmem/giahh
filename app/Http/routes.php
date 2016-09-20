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

    //Giá hàng hóa thị trường
Route::get('giahhdv-thitruong','HsGiaHhTtController@thoidiem');
Route::get('giahhdv-thitruong/thoidiem={thoidiem}/nam={nam}','HsGiaHhTtController@index');
Route::get('giahhdv-thitruong/thoidiem={thoidiem}/create','HsGiaHhTtController@create');
Route::post('giahhdv-thitruong','HsGiaHhTtController@store');
Route::get('giahhdv-thitruong/{id}/show','HsGiaHhTtController@show');
Route::get('giahhdv-thitruong/{id}/edit','HsGiaHhTtController@edit');
Route::patch('giahhdv-thitruong/{id}','HsGiaHhTtController@update');
Route::post('giahhdv-thitruong/delete','HsGiaHhTtController@destroy');

Route::get('thongtin-giathitruong','HsGiaHhTtController@showthoidiem');
Route::get('thongtin-giathitruong/thoidiem={thoidiem}/nam={nam}&pb={pb}','HsGiaHhTtController@showindex');
Route::get('thongtin-giathitruong/{id}/show','HsGiaHhTtController@view');

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
Route::get('hoso-thamdinhgia/nam={nam}','HsThamDinhGiaController@index');
Route::get('hoso-thamdinhgia/create','HsThamDinhGiaController@create');
Route::post('hoso-thamdinhgia','HsThamDinhGiaController@store');
Route::post('hoso-thamdinhgia/delete','HsThamDinhGiaController@destroy');
Route::get('hoso-thamdinhgia/{id}/show','HsThamDinhGiaController@show');
Route::get('hoso-thamdinhgia/{id}/edit','HsThamDinhGiaController@edit');
Route::patch('hoso-thamdinhgia/{id}','HsThamDinhGiaController@update');
Route::post('hoso-thamdinhgia/hoantat','HsThamDinhGiaController@hoantat');

Route::get('thongtin-thamdinhgia/nam={nam}&pb={pb}','HsThamDinhGiaController@showindex');
Route::get('thongtin-thamdinhgia/{id}/show','HsThamDinhGiaController@view');
Route::post('thongtin-thamdinhgia/huy','HsThamDinhGiaController@huy');

Route::get('thamdinhgiadefault/store','ThamDinhgiaDefaultController@store');
Route::get('thamdinhgiadefault/edit','ThamDinhgiaDefaultController@edit');
Route::get('thamdinhgiadefault/update','ThamDinhgiaDefaultController@update');
Route::get('thamdinhgiadefault/delete','ThamDinhgiaDefaultController@destroy');
Route::get('thamdinhgiadefault/importExcel','ThamDinhgiaDefaultController@importExcel');


Route::get('thamdinhgia/store','ThamDinhGiaController@store');
Route::get('thamdinhgia/edit','ThamDinhGiaController@edit');
Route::get('thamdinhgia/update','ThamDinhGiaController@update');
Route::get('thamdinhgia/delete','ThamDinhGiaController@destroy');
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

Route::get('thongtin-congbogia/nam={nam}&pb={pb}','HsCongBoGiaController@showindex');

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
    //End TT55/2011/BTC


    //BCTK khác
Route::get('reports/bctkkhac','BcTkKhacController@index');
Route::post('reports/bctkkhac/BC1','BcTkKhacController@BC1');
Route::post('reports/bctkkhac/BC2','BcTkKhacController@BC2');
Route::post('reports/bctkkhac/BC3','BcTkKhacController@BC3');
Route::post('reports/bctkkhac/BC4','BcTkKhacController@BC4');
    //End BCTK khác
// </editor-fold>
?>