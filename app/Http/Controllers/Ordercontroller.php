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
use App\menu;
use App\ctbill;
use App\nhanvien;
use App\chitietbill;
use DB;
class Ordercontroller extends Controller
{
    //getban
    public function getOrder()
    {
        $loaimon = loaimon::all();
        $tenban = ban::all();
        return view('admin.order.order',compact('loaimon','tenban'));
    }


    //get ban ra bill
    public function hienthi($id)
    {
        // $tenban = ban::all();
        // $loaimon = loaimon::all();
        // $id_ban = ban::find($id);

        // // ket noi bill va ban lay ra bill cua cai ban do
        // $bill = bill::where('maban', $id_ban->id)->first();
        // //  ket noi ctb de lay tat ca san pham của bill
        // $ctb  = ctbill::where('mabill', $bill->id)->get();        

        // return view('admin.order.orderbill',compact('loaimon','tenban','id_ban', 'ctb', 'bill'));     
        $tenban = ban::all();
        $loaimon = loaimon::all();
        $id_ban = ban::find($id);   
        $menu = menu::all();
        
        $mabill=DB::table('bill')
                ->where('maban', $id)
                ->where('tinhtrang', 0)
                ->first();
        //$mabill = bill::where('maban','tinhtrang', $id,0)->first();
        if ($mabill==NULL){
            $bill = new bill;
            $bill->maban = $id;
            $bill->manv = "1";
            $bill->ngaytao = "2019-10-10";
            $bill->tongtien = "2019";
            $bill->tinhtrang = "0";
            $bill->save();
            $mabill=DB::table('bill')
                ->where('maban', $id)
                ->where('tinhtrang', 0)
                ->first();
            //dd($mabill);

        }
        
        return view('admin.order.orderbill',compact('loaimon','tenban','id_ban','mabill','menu'));           
        
    }

    // 
    // public function hienthimenu($id)
    // {
        
    //     $tenban = ban::all();
    //     $loaimon = loaimon::all();
    //     $id_ban = ban::find($id);   
    //     $menu = menu::all();
         
    
    //     return view('admin.order.orderbill',compact('loaimon','tenban','menu','id_loaimon'));   

    // }

   

    


}
