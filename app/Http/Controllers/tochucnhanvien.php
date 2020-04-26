<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhanvien;
use App\tochuc;
use Auth;

class tochucnhanvien extends Controller
{
    //
    public function gettochucnhanvien($id)
    {
    
        $nhanvien = nhanvien::where('matc', $id)->orderBy('id', 'DESC')->get();
        $tochuc = tochuc::where('id', $id)->get();
        $quyen = Auth::user()['quyen'];    

        return view('admin.tochucnhanvien.tochucnhanvien',['nhanvien'=>$nhanvien,'tochuc'=>$tochuc, 'quyen'=>$quyen]);
    }
}
