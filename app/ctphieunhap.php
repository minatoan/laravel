<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctphieunhap extends Model
{
    //
    protected $table = "ctphieunhap";
    public $timestamps = false;

    public function hanghoa()
    {
        return $this->belongsTocó ('App\hanghoa','mahang','id');        
    }
    public function phieunhap()
    {
        return $this->belongsTo('App\phieunhap','maphieunhap','id');        
    }
}
