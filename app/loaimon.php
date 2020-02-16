<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaimon extends Model
{
    //
    protected $table = "loaimon";   
    public $timestamps = false;
    public function menu()
    {
        return $this->belongsTo('App\menu','maloaiban','id');        
    }
}
