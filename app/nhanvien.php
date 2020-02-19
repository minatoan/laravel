<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    //
    protected $table = "nhanvien";
    // protected $primariKey = 'id';
    public $timestamps = false;   
    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','id');        
    } 

    // public function bill()
    // {
    //     return $this->belongsTo('App\bill','mabill','id');        
    // } 


}
