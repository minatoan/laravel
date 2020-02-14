<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    //
    protected $table = "menu";
    protected $primariKey = 'mamon';

    public function loaimon()
    {
        return $this->belongsTo('App\loaimon','maloaimon','maloaimon');        
    } 
}
