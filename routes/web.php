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
	//admin/loaiban/
    Route::group(['prefix'=>''],function(){

        Route::get('loaiban', [
            'as'=> 'loaiban-them',
            'uses'=> 'LoaiBancontroller@getThemLoaiBan'
        ]);
        Route::post('loaiban', [
            'as'=> 'loaiban-them',
            'uses'=> 'LoaiBancontroller@postThemLoaiBan'
        ]);

        Route::get('loaiban/{id?}', [
            'as'=> 'loaiban-sua',
            'uses'=> 'LoaiBancontroller@getSuaLoaiBan'
        ]);

        Route::post('loaiban/{id?}', [
            'as'=> 'loaiban-sua',
            'uses'=> 'LoaiBancontroller@postSuaLoaiBan'
        ]);

        Route::get('xoaloaiban/{id?}', [
            'as'=> 'loaiban-xoa',
            'uses'=> 'LoaiBancontroller@getXoaLoaiBan'
        ]);
    });
    //admin/menu/menu.php
    Route::group(['prefix'=>''],function()
	{
        // Route::get('menu','Menucontroller@getMenu');
        
        Route::get('menu', [
            'as'=> 'menu-them',
            'uses'=> 'Menucontroller@getThemMenu'
        ]);
        Route::post('menu', [
            'as'=> 'menu-them',
            'uses'=> 'Menucontroller@postThemMenu'
        ]);

        Route::get('menu/{id?}', [
            'as'=> 'menu-sua',
            'uses'=> 'Menucontroller@getSuaMenu'
        ]);

        Route::post('menu/{id?}', [
            'as'=> 'menu-sua',
            'uses'=> 'Menucontroller@postSuaMenu'
        ]);

        Route::get('xoamenu/{id?}', [
            'as'=> 'menu-xoa',
            'uses'=> 'Menucontroller@getXoaMenu'
        ]);
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
    
    
});