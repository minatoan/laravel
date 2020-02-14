<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    //
    protected $table = "nhanvien";
    protected $primariKey = 'manv';

    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','matc');        
    } 


}
