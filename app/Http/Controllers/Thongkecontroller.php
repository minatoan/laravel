<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use App\hanghoa;
use App\phieunhap;
use App\phieuxuat;
use App\ctphieunhap;
use App\ctphieuxuat;
use App\nhanvien;
use App\tochuc;
use App\nhacungcap;
use App\bill;
use App\chitietbill;
use Cart, Auth;
use DB;
class Thongkecontroller extends Controller
{
    public function getthongke($id)
    {
        $tochuc = tochuc::where('id', $id)->first();
        $nhanvien = nhanvien::where('matc', $id)->get();
        $phieunhap  = phieunhap::where('matc', $id)->orderBy('id', 'DESC')->get();
        $ctphieunhap = ctphieunhap::where('matc', $id)->get();
        $phieuxuat  = phieuxuat::where('matc', $id)->orderBy('id', 'DESC')->get();
        $ctphieuxuat = ctphieuxuat::where('matc', $id)->get();
        $hanghoa = hanghoa::all();
        $bill  = bill::where('matc', $id)->orderBy('id', 'DESC')->get();
        $chitietbill = chitietbill::where('matc', $id)->get();
        $ncc = nhacungcap::where('matc', $id)->get();
        return view('admin.thongke.thongke',compact( 'chitietbill','bill','phieunhap','ctphieunhap','tochuc','ncc','hanghoa','phieuxuat','ctphieuxuat','nhanvien'));
    }}