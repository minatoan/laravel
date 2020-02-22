<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctbill extends Model
{
    //
    protected $table = "ctbill";
    
    public $timestamps = false;

    public function bill()
    {
        return $this->belongsTo('App\bill','mabill','id');        
    } 
}
