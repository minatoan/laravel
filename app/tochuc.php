<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tochuc extends Model
{
    //
    protected $table = "tochuc";
    protected $primariKey = 'matc';

    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','matc','matc');        
    } 
    public function loaiban()
    {
        return $this->hasMany('App\loaiban','matc','matc');        
    }
}
