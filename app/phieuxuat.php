<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phieuxuat extends Model
{
    protected $table = "phieuxuat";
    public $timestamps = false;
    
    public function ctphieuxuat()
    {
        return $this->hasMany('App\phieuxuat','maphieuxuat','id');        
    } 
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','manv','id');        
    } 
    
}
