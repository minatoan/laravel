<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hanghoa extends Model
{
   //
protected $table = "hanghoa";
    
public $timestamps = false;


public function tochuc()
{
    return $this->belongsTo('App\tochuc','matc','id');        
} 
public function ctphieunhap()
{
    return $this->hasMany('App\ctphieunhap','mahang','id');        
}
public function ctphieuxuat()
{
    return $this->hasMany('App\ctphieuxuat','mahang','id');        
}
}