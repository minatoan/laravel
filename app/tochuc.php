<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
