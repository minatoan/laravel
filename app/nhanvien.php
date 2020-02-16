<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    //
    protected $table = "nhanvien";
    public $timestamps = false;

    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','matc');        
    } 


}
