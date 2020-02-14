<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\menu;
use App\loaimon;

class LoaiMoncontroller extends Controller
{
    //
    public function getLoaimon()
    {
        $loaimon = loaimon::all();    
        return view('admin.loaimon.loaimon',['loaimon' => $loaimon]);
    }
}
