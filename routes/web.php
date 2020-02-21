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

//admin/loaimon/
Route::group(['prefix'=>''],function(){

    Route::get('loaimon', [
        'as'=> 'loaimon-them',
        'uses'=> 'LoaiMoncontroller@getThemLoaiMon'
    ]);
    Route::post('loaimon', [
        'as'=> 'loaimon-them',
        'uses'=> 'LoaiMoncontroller@postThemLoaiMon'
    ]);

    Route::get('loaimon/{id?}', [
        'as'=> 'loaiban-sua',
        'uses'=> 'LoaiMoncontroller@getSuaLoaiMon'
    ]);

    Route::post('loaimon/{id?}', [
        'as'=> 'loaimon-sua',
        'uses'=> 'LoaiMoncontroller@postSuaLoaiMon'
    ]);

    Route::get('xoaloaimon/{id?}', [
        'as'=> 'loaimon-xoa',
        'uses'=> 'LoaiMoncontroller@getXoaLoaiMon'
    ]);
});

    //admin/nhanvien/nhanvien
    Route::group(['prefix'=>''],function(){

        Route::get('nhanvien', [
            'as'=> 'nhanvien-them',
            'uses'=> 'NhanViencontroller@getThemNhanVien'
        ]);
        Route::post('nhanvien', [
            'as'=> 'nhanvien-them',
            'uses'=> 'NhanViencontroller@postThemnhanvien'
        ]);
    
        Route::get('nhanvien/{id?}', [
            'as'=> 'nhanvien-sua',
            'uses'=> 'NhanViencontroller@getSuaNhanVien'
        ]);
    
        Route::post('nhanvien/{id?}', [
            'as'=> 'nhanvien-sua',
            'uses'=> 'NhanViencontroller@postSuaNhanVien'
        ]);
    
        Route::get('xoanhanvien/{id?}', [
            'as'=> 'nhanvien-xoa',
            'uses'=> 'NhanViencontroller@getXoaNhanVien'
        ]);
    });
    //admin/tochuc/tochuc
    Route::group(['prefix'=>''],function()
	{
        // Route::get('tochuc','ToChuccontroller@getToChuc');
        
        Route::get('tochuc', [
            'as'=> 'tochuc-them',
            'uses'=> 'ToChuccontroller@getThemTochuc'
        ]);
        Route::post('tochuc', [
            'as'=> 'tochuc-them',
            'uses'=> 'ToChuccontroller@postThemTochuc'
        ]);

        Route::get('tochuc/{id?}', [
            'as'=> 'tochuc-sua',
            'uses'=> 'ToChuccontroller@getSuaTochuc'
        ]);

        Route::post('tochuc/{id?}', [
            'as'=> 'tochuc-sua',
            'uses'=> 'ToChuccontroller@postSuaTochuc'
        ]);

        Route::get('xoatochuc/{id?}', [
            'as'=> 'tochuc-xoa',
            'uses'=> 'ToChuccontroller@getXoaTochuc'
        ]);

    });
//trang chủ order
    Route::group(['prefix'=>''],function()
	{
        // Route::get('tochuc','ToChuccontroller@getToChuc');
        
        Route::get('order', [
            'as'=> 'order-them',
            'uses'=> 'Ordercontroller@getOrder'
        ]);
        Route::post('order', [
            'as'=> 'order-them',
            'uses'=> 'Ordercontroller@postThemOrder'
        ]);

        

        

    });
    
    
});