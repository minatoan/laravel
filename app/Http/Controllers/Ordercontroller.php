<?php

namespace App\Http\Controllers;

use App\ban;
use App\loaiban;
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
    public function getOrder($id)
    {

        // $tochuc = tochuc::where('id', $id)->first();
        $tochuc = tochuc::layToChucTheoIdNhanVien($id);
        $loaimon = loaimon::where('matc', $tochuc->id)->get();
        $tenban  = ban::where('matc', $tochuc->id)->get();
        $loaiban = loaiban::where('matc', $tochuc->id)->get();

        return view('admin.order.order', compact('loaimon', 'tenban','tochuc','loaiban'));
    }

    //get bill
    public function getbill($id)
    {
        $tochuc = tochuc::where('id', $id)->first();
        $nhanvien = nhanvien::where('matc', $id)->get();
        $bill  = bill::where('matc', $id)->orderBy('id', 'DESC')->get();
        $chitietbill = chitietbill::where('matc', $id)->get();
        $ban = ban::find($id);

        // dd($bill);

        return view('admin.order.bill', compact('bill', 'chitietbill','nhanvien','tochuc','ban'));
    }

    public function likebill($id, Request $req)
    {

        $dateform = $req->dateform;
        $dateto = $req->dateto;
        $bill  = bill::where('matc', $id)->orderBy('id', 'DESC')->whereBetween('ngaytao', [$dateform, date('Y-m-d', strtotime($dateto. '+1 days'))])->get();
        return view('admin.order.bill' ,compact('bill'));
    }
    //get ctbill
    // public function getctbill($id)
    // {
    
    //     $bill  = bill::find($id);
    //     $ban = ban::find($id);
    //     return view('admin.order.bill', compact('bill','ban'));
    // }

    //get ban ra bill
    public function hienthi($id_tc, $id_ban)
    {   
        $id_nv = Auth::id();
        $id_tc = Auth::id();
        $tochuc = tochuc::layToChucTheoIdNhanVien($id_tc);
        $loaiban = loaiban::where('matc', $tochuc->id)->get();
        $cart = Cart::getContent();
        $tenban  = ban::where('matc', $tochuc->id)->get();
        $loaimon = loaimon::where('matc', $tochuc->id)->get();
        $id_ban  = ban::find($id_ban);
        $menu    = menu::all();
        // $bann    = ban::where('matc', $tochuc->id)->where('id', '<>', $id_ban->id)->get();
    //    dd($tenban);
        // $tochucc = tochuc::where('id', $id)->first();
        // Cart::clear();
                // dd($tochuc);

        return view('admin.order.orderbill', compact('loaimon', 'tenban', 'id_ban', 'menu', 'cart', 'id_nv','id_tc','tochuc','loaiban'));
    }

    

    //xoa món trong bill
    public function deletecart($id_ban, $id_sp)
    {
        Cart::remove($id_sp);       
        return redirect()->back();

    }

    public function clearcart($value='')
    {
        Cart::clear();
        return redirect()->back();
    }

    //update so luong
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
    }

    //in hoa don
        public function print($id_tc, $id_ban)
            {
                
                $id_nv = Auth::id();
                $id_tc = Auth::id();
                $tochuc = tochuc::layToChucTheoIdNhanVien($id_tc);
                $loaiban = loaiban::where('matc', $tochuc->id)->get();
                $cart = Cart::getContent();
                $tenban  = ban::where('matc', $tochuc->id)->get();
                $loaimon = loaimon::where('matc', $tochuc->id)->get();
                $id_ban  = ban::find($id_ban);
                $menu    = menu::all();
                // dd($cart);
                return view('admin.order.print', compact('loaimon', 'tenban', 'id_ban', 'menu', 'cart', 'id_nv','tochuc','loaiban','id_tc'));
            }


    //get order ra bill
    public function add($id_ban, $id_sp, Request $req)
    {
        
        // Cart::clear();
        $product = menu::find($id_sp);

        Cart::add(
            array(
                'id'         => time(),
                'name'       => $product->tenmon,
                'quantity'   => 1,
                'price'      => $product->dongia,
                'attributes' => array(
                    'id_ban' => $id_ban,
                    'id_sp' => $id_sp, 
                ),
            )
        );
                // dd(Cart::getContent());

        return redirect()->back();
    }

    public function savecart($id_tc, $id_nv, $id_ban, Request $req)
    {
        $id_tc = Auth::id();
        $tochuc = tochuc::layToChucTheoIdNhanVien($id_tc);
        // // dd($bill);
        $sum = 0; 
        foreach (Cart::getContent() as $key => $value) {
            if($value['attributes']['id_ban'] == $id_ban)
            {
                // echo $value['name']; echo "<br>";
                $total = ($value['quantity'] * $value['price']);
                $sum+= $total; 
            
            }
        }
        
        if($value['attributes']['id_ban'] == $id_ban)
            {
                $bill = new bill;
                $bill->manv = $id_nv;
                $bill->maban = $id_ban;
                $bill->tongtien = $sum;
                $bill->tinhtrang = '1';
                $bill->matc = $tochuc->id;
                $bill->save();
        
            foreach (Cart::getContent() as $key => $value) {
            if($value['attributes']['id_ban'] == $id_ban)
            {
                $bill_detail = new  chitietbill;
                $bill_detail->mabill = $bill->id;
                $bill_detail->mamon = $value['attributes']['id_sp'];
                $bill_detail->soluong = $value['quantity'];
                $bill_detail->dongia = $value['price'];
                $bill_detail->matc = $tochuc->id;

                $bill_detail->save();
            }
        }
        }elseif($value['attributes']['id_ban'] != $id_ban){
            return redirect()->back()->with(Toastr::error('Bàn chưa có món'));

        }

        foreach (Cart::getContent() as $key => $value) {
            if($value['attributes']['id_ban'] == $id_ban)
            {
                Cart::remove($value['id']);
            }
        }
        return redirect()->back()->with(Toastr::success('Thành công'));
    }
    //chuyen ban
    public function chuyenban($id_ban,Request $request)
    {
        foreach (Cart::getContent() as $key => $value) {
            if($value['attributes']['id_ban'] == $id_ban)
            {
                Cart::update($value->id, array(
                        'attributes' => array(
                            'id_ban' => $request->id_ban_den,
                            'id_sp' => $value['attributes']['id_sp']
                        )
                    ));
                // dd(Cart::getContent());
            }

        }
        return redirect()->back()->with(Toastr::success('Chuyển bàn thành công'));

    }

}