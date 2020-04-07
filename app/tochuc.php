<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class tochuc extends Model
{
    //
    protected $table = "tochuc";    
    public $timestamps = false;
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','matc','id');        
    } 
    public function loaiban()
    {
        return $this->hasMany('App\loaiban','matc','id');        
    }
    public function menu()
    {
        return $this->belongsTo('App\loaiban','matc','id');        
    }
    public function phieunhap()
    {
        return $this->hasMany('App\phieunhap','matc','id');        
    }
    public function nhacungcap()
    {
        return $this->hasMany('App\nhacungcap','matc','id');        
    }

    public static function layToChucTheoIdNhanVien(int $id){
        $data = DB::table('tochuc')
                ->join('nhanvien', 'nhanvien.matc', '=', 'tochuc.id')
                ->where('nhanvien.id', $id)
                ->select('tochuc.*', 'nhanvien.id as manv')
                ->first();
        return $data;
    }
}
