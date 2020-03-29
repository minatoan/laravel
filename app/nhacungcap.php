<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhacungcap extends Model
{
       //
protected $table = "nhacungcap";
    
public $timestamps = false;


public function phieunhap()
{
    return $this->hasMany('App\nhaphang','ncc','id');        
} 
public function tochuc()
{
    return $this->belongsTo('App\tochuc','matc','id');        
} 
}
