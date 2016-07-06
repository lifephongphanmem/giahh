<?php
// DEFAULT
Route::get('/', 'HomeController@index');

//system
    //user
Route::get('/login','UsersController@login');
Route::post('/signin','UsersController@signin');
Route::get('/change-password','UsersController@cp');
Route::get('/checkpass','UsersController@checkpass');
Route::get('logout','UsersController@logout');
Route::get('users','UsersController@index');

    //register
Route::get('register',function(){
   return view('system.register.index')
       ->with('pageTitle','Cấu hình hệ thống');
});

//Manage
Route::get('datatable',function(){
    return view('manage.datatable')
        ->with('pageTitle','DataTable');
})

?>