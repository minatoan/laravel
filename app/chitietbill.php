<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietbill extends Model
{
    //
    protected $table = "chitietbill";
    
    public $timestamps = false;
    public function bill()
    {
        return $this->hasMany('App\bill','mabill','id');        
    } 
    public function menu()
    {
        return $this->hasMany('App\menu','mamon','id');        
    } 
    public function ban()
    {
        return $this->hasManyThrough('App\ban','App\bill','mabill','maban','id');        
    }
}
