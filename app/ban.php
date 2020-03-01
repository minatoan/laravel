<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ban extends Model
{
    //
    protected $table = "ban";
    
    public $timestamps = false;

    public function loaiban()
    {
        return $this->belongsTo('App\loaiban','maloaiban','id');        
    } 
    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','id');        
    } 
}
