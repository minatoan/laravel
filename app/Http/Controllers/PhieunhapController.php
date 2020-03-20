<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\hanghoa;
use App\phieunhap;
use App\nhanvien;
use App\tochuc;
use App\ncc;
use Cart, Auth;
use DB;
class PhieunhapController extends Controller
{
    public function getPhieunhap($id)
    {
        $id_nv = Auth::id();
        $phieunhap = phieunhap::all();
        $tochuc = tochuc::all();
        $ncc = ncc::where('matc', $id)->get();
        $hanghoa = hanghoa::where('matc', $id)->get();

        return view('admin.nhaphang.nhaphang',compact( 'id_nv','phieunhap','tochuc','ncc','hanghoa'));
    }
}
