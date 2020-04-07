<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class tinhluong extends Model
{
    //
    protected $table = "tinhluong";
    // protected $primariKey = 'id';
    public $timestamps = false; 
    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','id');        
    } 

    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','manv','id');        
    } 

    public static function tinhTienLuong(int $matc){
        $data = [];
        for ($thang=1; $thang<=12; $thang++){
            $dsluong = DB::table('tinhluong')
                ->where('matc', $matc)
                ->where(DB::raw('month(ngay)'), $thang)
                ->where(DB::raw('year(ngay)'),DB::raw('year(now())'))
                ->get();

            $tongluong=0;
            foreach ($dsluong as $tl){
                if($tl->giokt > $tl->giobd){
                    $tinhgio = abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600;
                }elseif($tl->giokt < $tl->giobd){
                    $tinhgio = 24 - abs(strtotime($tl->giokt) - strtotime($tl->giobd)) / 3600 ;
                }
                
                $tinhluong = (($tl->luongcb * $tinhgio * $tl->songaylam) + $tl->tienthuong) - $tl->tienphat ;
                $tongluong+=$tinhluong;
            }
            array_push($data, $tongluong);
        }
        return $data;
    }
}
