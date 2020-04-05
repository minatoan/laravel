<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinhluong extends Model
{
    //
    protected $table = "tinhluong";
    // protected $primariKey = 'id';
    public $timestamps = false; 
    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','id');        
    } 

    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien','manv','id');        
    } 
}
