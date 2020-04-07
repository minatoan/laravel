<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class phieunhap extends Model
{
    protected $table = "phieunhap";
    public $timestamps = false;
    
    public function ctphieunhap()
    {
        return $this->hasMany('App\phieunhap','maphieunhap','id');        
    } 
    public function nhacungcap()
    {
        return $this->belongsTo('App\nhacungcap','ncc','id');        
    } 
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','manv','id');           
    } 
    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','id');           
    } 
    

    public static function tinhTienNhapHang(int $matc){
        $data = [];
        for ($thang=1; $thang<=12; $thang++){
            $tiennhap = DB::table('phieunhap')
                ->where('matc', $matc)
                ->where(DB::raw('month(ngaynhap)'), $thang)
                ->where(DB::raw('year(ngaynhap)'),DB::raw('year(now())'))
                ->select(DB::raw('sum(tongtien) as tongtien'))
                ->first();
            array_push($data, $tiennhap);
        }
        return $data;
    }
}
