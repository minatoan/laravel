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
    public function ncc()
    {
        return $this->belongsTo('App\ncc','ncc','id');        
    } 
}
