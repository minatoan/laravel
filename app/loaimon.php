<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaimon extends Model
{
    //
    protected $table = "loaimon";
    protected $primariKey = 'maloaimon';

    public function menu()
    {
        return $this->belongsTo('App\menu','maloaiban','maloaiban');        
    }
}
