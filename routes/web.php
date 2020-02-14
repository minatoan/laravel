<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/home','AdminController@index')->name('home');


Route::group(['prefix'=>'admin'],function()
{
    

    

	Route::group(['prefix'=>''],function()
	{
        // Route::get('ban','BanController@getBan');
        // Route::get('ban','BanController@getThemBan');
        // Route::post('ban','BanController@postThemBan');

        Route::get('ban', [
            'as'=> 'ban-them',
            'uses'=> 'BanController@getThemBan'
        ]);
        Route::post('ban', [
            'as'=> 'ban-them',
            'uses'=> 'BanController@postThemBan'
        ]);

        Route::get('ban/{id?}', [
            'as'=> 'ban-sua',
            'uses'=> 'BanController@getSua'
        ]);

        Route::post('ban/{id?}', [
            'as'=> 'ban-sua',
            'uses'=> 'BanController@postSua'
        ]);

        Route::get('xoa/{id?}', [
            'as'=> 'ban-xoa',
            'uses'=> 'BanController@getXoa'
        ]);

	});
	//admin/loaiban/loaiban.php
    Route::group(['prefix'=>'loaiban'],function(){
        Route::get('loaiban','LoaiBancontroller@getLoaiBan');

        Route::get('loaiban','LoaiBancontroller@getThem');
        Route::post('loaiban','LoaiBancontroller@postThem');
        
        Route::get('sua/{maloaiban}','LoaiBancontroller@getSua');
        Route::post('sua/{maloaiban}','LoaiBancontroller@postSua');
        
        Route::get('xoa/{maloaiban}','LoaiBancontroller@getXoa');
    });
    //admin/menu/menu.php
    Route::group(['prefix'=>'menu'],function()
	{
		Route::get('menu','MenuController@getMenu');

    });
    //admin/loaimon/loaimon
    Route::group(['prefix'=>'loaimon'],function()
	{
		Route::get('loaimon','LoaiMonController@getLoaimon');

    });
    //admin/nhanvien/nhanvien
    Route::group(['prefix'=>'nhanvien'],function()
	{
		Route::get('nhanvien','NhanViencontroller@getNhanVien');

	});
    //admin/tochuc/tochuc
    Route::group(['prefix'=>'tochuc'],function()
	{
		Route::get('tochuc','ToChuccontroller@getToChuc');

    });
    
    Route::group(['prefix'=>'test'],function()
	{
        Route::get('test','testcontroller@getTest');
        Route::post('test','testcontroller@postTest');
        

	});
});