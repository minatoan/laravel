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
}