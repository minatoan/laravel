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
Route::get('login', [ 
    'as' => 'login',
    'uses' => 'LoginController@getLogin'
    ]);
Route::post('login', [
    'as' => 'login', 
    'uses' => 'LoginController@postLogin'
    ]);
 
// // Đăng xuất
Route::get('logout', [ 'as' => 'logout', 'uses' => 'LoginController@getLogout']);

Route::group(['prefix'=>'admin'],function()
{

	Route::group(['prefix'=>''],function()
	{
        // Route::get('ban','BanController@getBan');
        // Route::get('ban','BanController@getThemBan');
        // Route::post('ban','BanController@postThemBan');

        Route::get('get-ban-theo-tochuc/{idtc}/{idnv}', [
            'as'=> 'get-ban-theo-tochuc',
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

        Route::get('get-loaiban-theo-tochuc/{idtc}/{idnv}', [
            'as'=> 'get-loaiban-theo-tochuc',
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
        
        Route::get('get-menu-theo-tochuc/{idtc}/{idnv}', [
            'as'=> 'get-menu-theo-tochuc',
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

    Route::get('get-loaimon-theo-tochuc/{idtc}/{idnv}', [
        'as'=> 'get-loaimon-theo-tochuc',
        'uses'=> 'LoaiMoncontroller@getThemLoaiMon'
    ]);
    Route::post('loaimon', [
        'as'=> 'loaimon-them',
        'uses'=> 'LoaiMoncontroller@postThemLoaiMon'
    ]);

    Route::get('loaimon/{id?}', [
        'as'=> 'loaimon-sua',
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

        Route::get('get-nhanvien-theo-tochuc/{idtc}/{idnv}', [
            'as'=> 'get-nhanvien-theo-tochuc',
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
        
        Route::get('order/{id_tc}', [
            'as'=> 'order-get',
            'uses'=> 'Ordercontroller@getOrder'
        ]);
        
        
        Route::get('hien-thi/{id_tc}/{id_ban}', [
            'as' => 'hien-thi',
            'uses' => 'Ordercontroller@hienthi'
        ]);
        

            //get bill
        Route::get('get-bill-theo-tochuc/{idtc}/{idnv}', [
            'as' => 'get-bill-theo-tochuc',
            'uses' => 'Ordercontroller@getbill'
        ]);

        Route::get('get-likebill-theo-tochuc/{idtc}/{idnv}', [
            'as' => 'get-likebill-theo-tochuc',
            'uses' => 'Ordercontroller@likebill'
        ]);
        


        //get hien chi tiet bill
        Route::get('bill/{id}', [
            'as' => 'ct-bill',
            'uses' => 'Ordercontroller@getctbill'
        ]);


        Route::get('add/{id_ban}/{id_sp}', [
            'as' => 'add',
            'uses' => 'Ordercontroller@add'
        ]);

        Route::get('delete-cart/{id_ban}/{id_sp}', [
            'as' => 'delete-cart',
            'uses' => 'Ordercontroller@deletecart'
        ]);
        Route::GET('update-cart/{id}/{qty}', [
            'as' => 'update-cart',
            'uses' => 'Ordercontroller@updatecart'
        ]);

        Route::get('clear-cart', [
            'as' => 'clear-cart',
            'uses' => 'Ordercontroller@clearcart'
        ]);
        Route::get('print-cart/{id_tc}/{id_ban}', [
            'as' => 'print-cart',
            'uses' => 'Ordercontroller@print'
        ]);
        Route::post('save-cart/{id_tc}/{id_nv}/{id_ban}', [
            'as' => 'save-cart',
            'uses' => 'Ordercontroller@savecart'
        ]);

        Route::post('chuyen-ban/{id_ban}', [
            'as' => 'chuyen-ban',
            'uses' => 'Ordercontroller@chuyenban'
        ]);

    });

    //admin/hanghoa
    Route::group(['prefix'=>''],function(){
        Route::get('get-nhaphang-theo-tochuc/{idtc}/{idnv}', [
            'as'=> 'get-nhaphang-theo-tochuc',
            'uses'=> 'HangHoacontroller@getPhieunhaphanghoa'
        ]);

        Route::get('get-hanghoa-theo-tochuc/{idtc}/{idnv}', [
            'as'=> 'get-hanghoa-theo-tochuc',
            'uses'=> 'HangHoacontroller@getHangHoa'
        ]);
        Route::post('hanghoa', [
            'as'=> 'hanghoa-them',
            'uses'=> 'HangHoacontroller@postThemHangHoa'
        ]);

        Route::get('hanghoa/{id?}', [
            'as'=> 'hanghoa-sua',
            'uses'=> 'HangHoacontroller@getSuaHangHoa'
        ]);

        Route::post('hanghoa/{id?}', [
            'as'=> 'hanghoa-sua',
            'uses'=> 'HangHoacontroller@postSuaHangHoa'
        ]);

        Route::get('xoahanghoa/{id?}', [
            'as'=> 'hanghoa-xoa',
            'uses'=> 'HangHoacontroller@getXoaHangHoa'
        ]);
        
    });
    
    
        //admin/phieunhap
        Route::group(['prefix'=>''],function(){
            
            //trang nhap hang
            Route::get('get-nhaphang-theo-tochuc/{idtc}/{idnv}', [
                'as'=> 'get-nhaphang-theo-tochuc',
                'uses'=> 'PhieunhapController@getPhieunhap'
            ]);


            Route::post('get-nhaphang-theo-tochuc-to-cart/{idtc}/{idnv}', [
                'as'=> 'get-nhaphang-theo-tochuc-to-cart',
                'uses'=> 'PhieunhapController@getPhieunhapcart'
            ]);
                //nhap hang vao csdl
            Route::post('add-nhaphang-theo-tochuc-to-cart/{idtc}/{idnv}', [
                'as'=> 'add-nhaphang-theo-tochuc-to-cart',
                'uses'=> 'PhieunhapController@addPhieunhapcart'
            ]);

            Route::get('xoa-cart/{index}', [
                'as' => 'xoa-cart',
                'uses' => 'PhieunhapController@xoacart'
            ]);

            //get lich su don nhap hang
            Route::get('get-donnhap-theo-tochuc/{idtc}/{idnv}', [
                'as' => 'get-donnhap-theo-tochuc',
                'uses' => 'PhieunhapController@getdonnhap'
            ]);
            //tim kiem trong ls nhap
            Route::get('get-donnhaphang-theo-tochuc/{idtc}/{idnv}', [
                'as' => 'get-donnhaphang-theo-tochuc',
                'uses' => 'PhieunhapController@likenhap'
            ]);
            //xuathang
            Route::get('get-xuathang-theo-tochuc/{idtc}/{idnv}', [
                'as'=> 'get-xuathang-theo-tochuc',
                'uses'=> 'PhieuxuatController@getPhieuxuathang'
            ]);
            Route::post('get-xuathang-theo-tochuc-to-cart/{idtc}/{idnv}', [
                'as'=> 'get-xuathang-theo-tochuc-to-cart',
                'uses'=> 'PhieuxuatController@getPhieuxuatcart'
            ]);
            Route::post('add-xuathang-theo-tochuc-to-cart/{idtc}/{idnv}', [
                'as'=> 'add-xuathang-theo-tochuc-to-cart',
                'uses'=> 'PhieuxuatController@addPhieuxuatcart'
            ]);
             //get ls don xuat hang
            Route::get('get-donxuat-theo-tochuc/{idtc}/{idnv}', [
                'as' => 'get-donxuat-theo-tochuc',
                'uses' => 'PhieuxuatController@getdonxuat'
            ]);
            //tim kiem trong ls xuat
            Route::get('get-donxuathang-theo-tochuc/{idtc}/{idnv}', [
                'as' => 'get-donxuathang-theo-tochuc',
                'uses' => 'PhieuxuatController@likexuat'
            ]);
            Route::get('xoa-items/{index}', [
                'as' => 'xoa-items',
                'uses' => 'PhieuxuatController@xoaitems'
            ]);

        });

         //admin/nhacungcap
    Route::group(['prefix'=>''],function(){

        Route::get('get-ncc-theo-tochuc/{idtc}/{idnv}', [
            'as'=> 'get-ncc-theo-tochuc',
            'uses'=> 'NCCcontroller@getNCC'
        ]);
        Route::post('ncc', [
            'as'=> 'ncc-them',
            'uses'=> 'NCCcontroller@postThemNCC'
        ]);

        Route::get('ncc/{id?}', [
            'as'=> 'ncc-sua',
            'uses'=> 'NCCcontroller@getSuaNCC'
        ]);

        Route::post('ncc/{id?}', [
            'as'=> 'ncc-sua',
            'uses'=> 'NCCcontroller@postSuaNCC'
        ]);

        Route::get('xoancc/{id?}', [
            'as'=> 'ncc-xoa',
            'uses'=> 'NCCcontroller@getXoaNCC'
        ]);
    });

    //admin/THONGKE
    Route::group(['prefix'=>''],function(){

        Route::get('get-thongke-theo-tochuc/{idtc}/{idnv}', [
            'as'=> 'get-thongke-theo-tochuc',
            'uses'=> 'Thongkecontroller@getthongke'
        ]);
        Route::get('get-timkiem-theo-thongke/{idtc}/{idnv}', [
            'as' => 'get-timkiem-theo-thongke',
            'uses' => 'Thongkecontroller@likethongke'
        ]);
        
    });
    //admin/tinhluong
    Route::group(['prefix'=>''],function(){

        Route::get('get-nhanvien-luong-tochuc/{id}', [
            'as'=> 'get-nhanvien-luong-tochuc',
            'uses'=> 'TinhluongController@getLuongNhanVien'
        ]);
        //thietlap
        Route::post('luong', [
            'as'=> 'luong-them',
            'uses'=> 'TinhluongController@postThemluong'
        ]);
        //capnhat
        Route::get('luong/{id?}', [
            'as'=> 'luong-sua',
            'uses'=> 'TinhluongController@getSualuong'
        ]);

        Route::post('luong/{id?}', [
            'as'=> 'luong-sua',
            'uses'=> 'TinhluongController@postSualuong'
        ]);

        Route::get('luong/{id?}', [
            'as'=> 'luong-xoa',
            'uses'=> 'TinhluongController@getXoaluong'
        ]);

        //get lich su tinh lương
        Route::get('get-lichsuluong-theo-tochuc/{idtc}/{idnv}', [
            'as' => 'get-lichsuluong-theo-tochuc',
            'uses' => 'TinhluongController@getLichsuluong'
        ]);
        Route::get('get-timkiem-theo-luong/{idtc}/{idnv}', [
            'as' => 'get-timkiem-theo-luong',
            'uses' => 'TinhluongController@likeluong'
        ]);
        
    });

    
});