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
        return $this->hasMany('App\hanghoa','mahang','id');        
    }
    public function phieuxuat()
    {
        return $this->belongsTo('App\phieuxuat','maphieunhap','id');        
    }
}
