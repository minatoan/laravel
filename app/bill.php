<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    //
    protected $table = "bill";
    
    public $timestamps = false;

    public function ctbill()
    {
        return $this->hasMany('App\ctbill','mabill','id');        
    } 
}
