<?php

namespace App\Http\Controllers;

use App\ban;
use App\loaimon;
use App\menu;
use App\chitietbill;
use App\bill;
use App\nhanvien;
use Cart;
use Illuminate\Http\Request;

class Ordercontroller extends Controller
{
    //getban
    public function getOrder()
    {
        $loaimon = loaimon::all();
        $tenban  = ban::all();
        return view('admin.order.order', compact('loaimon', 'tenban'));
    }

    //get chitietbill
    public function getbill()
    {
        $nhanvien = nhanvien::all();
        $bill  = bill::all();
        $chitietbill = chitietbill::all();
        return view('admin.order.bill', compact('bill', 'chitietbill','nhanvien'));
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
        $cart = Cart::getContent();

        $tenban  = ban::all();
        $loaimon = loaimon::all();
        $id_ban  = ban::find($id);
        $menu    = menu::all();
        return view('admin.order.orderbill', compact('loaimon', 'tenban', 'id_ban', 'mabill', 'menu', 'cart'));
    }

    public function add($id_ban, $id_sp, Request $req)
    {
        // Cart::clear();
        $product = menu::find($id_sp);

        Cart::add(
            array(
                'id'         => $id_sp,
                'name'       => $product->tenmon,
                'quantity'   => 1,
                'price'      => $product->dongia,
                'attributes' => array(
                    'id_ban' => $id_ban,
                ),
            )
        );
        return redirect()->back();
    }

}
