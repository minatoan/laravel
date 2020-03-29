<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
}
