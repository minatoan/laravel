<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\ban;
use App\loaimon;
class Ordercontroller extends Controller
{
    //getban
    public function getOrder()
    {
        $loaimon = loaimon::select('tenloaimon')->get();
        $tenban = ban::select('tenban')->get();
        return view('admin.order.order')->with([
            'name' => $tenban,
            'namelm' => $loaimon
        ]);
    }

    //get loaimon
    // public function getoderloaimon()
    // {
    //     $tenloaimon = loaimon::select('tenloaimon')->get();
    //     return view('admin.order.order')->with('ten',$tenloaimon);
    // }

}
