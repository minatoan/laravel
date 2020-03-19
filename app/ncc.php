<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ncc extends Model
{
       //
protected $table = "ncc";
    
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
