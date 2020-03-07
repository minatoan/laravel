<?php

namespace App\Http\Controllers;

use App\ban;
use App\loaimon;
use App\menu;
use App\chitietbill;
use App\bill;
use App\nhanvien;
use App\tochuc;
use Cart, Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class Ordercontroller extends Controller
{
    //getban
    public function getOrder()
    {
        $tochuc = tochuc::all();
        $loaimon = loaimon::all();
        $tenban  = ban::all();
        return view('admin.order.order', compact('loaimon', 'tenban','tochuc'));
    }

    //get bill
    public function getbill()
    {
        $tochuc = tochuc::all();
        $nhanvien = nhanvien::all();
        $bill  = bill::all();
        $chitietbill = chitietbill::all();
        return view('admin.order.bill', compact('bill', 'chitietbill','nhanvien','tochuc'));
    }
    //get ctbill
    public function getctbill($id)
    {
        $tenban = ban::all();
        $loaimon = loaimon::all();
        $nhanvien = nhanvien::all();
        $bill  = bill::find($id);
        
        return view('admin.order.chitietbill', compact('bill','nhanvien','loaimon','tenban'));
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
        $id_nv = Auth::id();
        $tochuc = tochuc::all();
        // dd($cart);
        return view('admin.order.orderbill', compact('loaimon', 'tenban', 'id_ban', 'mabill', 'menu', 'cart', 'id_nv','tochuc'));
    }

    //get order ra bill
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


    public function deletecart($id_ban, $id_sp)
    {
        Cart::remove($id_sp);       
        return redirect()->back();

    }

    // public function clearcart($value='')
    // {
    //     Cart::clear();
    //     return redirect()->back();
    // }
    public function updatecart(Request $req)
    {
        $menu = Cart::get($req->id);
        // echo $req->qty;
		if($req->ajax())
		{
			
            $id = $req->id;
            $qty = $req->qty;
            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $qty
                ),
            ));

        }
        
        // return "basdkand";
        // if(Request::ajax()){
        //     $id = Request::get('id');
        //     $qty = Request::get('qty');
        //     Cart::update($id,$qty);
        // }
        
        // Cart::update($request->id_sp,$request->qty);
        
    }


    public function savecart($id_nv, $id_ban, Request $req)
    {
        
        // dd($bill);
        $sum = 0; 
        foreach (Cart::getContent() as $key => $value) {
            if($value['attributes']['id_ban'] == $id_ban)
            {
                // echo $value['name']; echo "<br>";
                $total = ($value['quantity'] * $value['price']);
                $sum+= $total;
            }
        }

        $bill = new bill;
        $bill->manv = $id_nv;
        $bill->maban = $id_ban;
        $bill->tongtien = $sum;
        $bill->tinhtrang = '1';
        $bill->save();

        foreach (Cart::getContent() as $key => $value) {
            if($value['attributes']['id_ban'] == $id_ban)
            {
                $bill_detail = new  chitietbill;
                $bill_detail->mabill = $bill->id;
                $bill_detail->mamon = $value['id'];
                $bill_detail->soluong = $value['quantity'];
                $bill_detail->dongia = $value['price'];
                $bill_detail->save();
                // echo "<pre>";
                // print_r($bill_detail->toArray());
                // echo "</pre>";
            }
        }

        foreach (Cart::getContent() as $key => $value) {
            if($value['attributes']['id_ban'] == $id_ban)
            {
                // echo $value['id']; echo "<br>";

                Cart::remove($value['id']);
                
            }
        }
        return redirect()->back()->with(Toastr::success('Thành công'));

    }

}
