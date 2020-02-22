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
use App\bill;
class Ordercontroller extends Controller
{
    //getban
    public function getOrder()
    {
        
        $loaimon = loaimon::select('tenloaimon')->get();
        $tenban = ban::select('tenban','id')->get();
        return view('admin.order.order')->with([
            'name' => $tenban,
            'namelm' => $loaimon,
        ]);
    }


    //get ban ra bill
    public function hienthi($id, $tenban)
    {
        $tenban = ban::select('tenban','id')->get();
        $loaimon = loaimon::select('tenloaimon')->get();
        $id_ban = ban::find($id);
        
        return view('admin.order.order')->with([
            'name' => $tenban,
            'namelm' => $loaimon,
            'id_ban' => $id_ban,
        ]);
    }

}
