<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    //
    protected $table = "menu";
    public $timestamps = false;
    
    public function loaimon()
    {
        return $this->belongsTo('App\loaimon','maloaimon','id');        
    } 

    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','id');        
    } 
}
