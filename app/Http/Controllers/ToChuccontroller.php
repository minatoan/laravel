<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tochuc;
use App\nhanvien;
class ToChuccontroller extends Controller
{
    //
    public function getToChuc()
    {
        $tochuc = tochuc::all();    
        return view('admin.tochuc.tochuc',['tochuc' => $tochuc]);
    }
}
