<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaiban extends Model
{
    //
    protected $table = "loaiban";
    public $timestamps = false;
    protected $fillable = ['maloaiban','tenloaiban','matc'];
    public function ban()
    {
        return $this->hasMany('App\ban','maloaiban','id');        
    }

    public function tochuc()
    {
        return $this->belongsTo('App\tochuc','matc','id');        
    } 
}
