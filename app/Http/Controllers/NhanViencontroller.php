<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\nhanvien;
use App\tochuc;


class NhanViencontroller extends Controller
{
    //
    public function getNhanVien()
    {
        $nhanvien = nhanvien::all();  
        return view('admin.nhanvien.nhanvien',['nhanvien' => $nhanvien]);
    }
}
