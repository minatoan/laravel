<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctphieuxuat extends Model
{
    //
    protected $table = "ctphieuxuat";
    public $timestamps = false;
    
    public function hanghoa()
    {
        return $this->belongsTo('App\hanghoa','mahang','id');        
    }
    public function phieuxuat()
    {
        return $this->belongsTo('App\phieuxuat','maphieuxuat','id');        
    }
}
