<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class bill extends Model
{
    //
    protected $table = "bill";
    
    public $timestamps = false;

    public function chitietbill()
    {
        return $this->hasMany('App\chitietbill','mabill','id');        
    } 
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','manv','id');        
    } 
    public function ban()
    {
        return $this->belongsTo('App\ban','maban','id');        
    }

    public static function tinhDoanhThuTheoThang(int $matc){
        $data = [];
        for ($thang=1; $thang<=12; $thang++){
            $doanhthu = DB::table('bill')
                ->where('matc', $matc)
                ->where(DB::raw('month(ngaytao)'), $thang)
                ->where(DB::raw('year(ngaytao)'),DB::raw('year(now())'))
                ->select(DB::raw('sum(tongtien) as tongtien'))
                ->first();
            array_push($data, $doanhthu);
        }
        return $data;
    }
}
