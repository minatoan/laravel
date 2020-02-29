<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    //
    protected $table = "bill";
    
    public $timestamps = false;

    public function chitietbill()
    {
        return $this->hasMany('App\chitietbill','mabill','id');        
    } 
}
