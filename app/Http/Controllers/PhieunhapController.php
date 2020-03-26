<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\hanghoa;
use App\phieunhap;
use App\ctphieunhap;
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

    public function getPhieunhapcart($id_tc, $id_nv, Request $req)
    {
        
        $data_list = $req->session()->get('data');
        if ($data_list==null){
            $data_list=array();
        }
        $data = array(
            'id' => time(), // inique row ID
            'name' => $req->tensp,
            'price' => $req->dongia,
            'quantity' => $req->soluong,
            'attributes' => array(
                'ngaynhap' => $req->ngaynhap,
                'ghichu' => $req->ghichu,
                'donvitinh' => $req->donvitinh,
                'ncc' => $req->ncc,
                'id_nhanvien' => $id_nv,
                'id_tc' => $id_tc,
            )
        );
        array_push($data_list, $data);
        $req->session()->put('data', $data_list);



        // var_dump($data_list);
        $id_nv = Auth::id();
        $phieunhap = phieunhap::all();
        $tochuc = tochuc::all();
        $ncc = ncc::where('matc', $id_tc)->get();
        $hanghoa = hanghoa::where('matc', $id_tc)->get();
        // var_dump($data);
        return redirect()->back();
        return view('admin.nhaphang.nhaphang',compact( 'id_nv','phieunhap','tochuc','ncc','hanghoa'));
    }

    public function addPhieunhapcart($id_tc, $id_nv, Request $req)
    {
        // $cart = Cart::getContent();
        // dd($cart->toArray());

        $data = $req->session()->get('data');
        $summ=0;
    foreach ($data as $value) {
        $total = ($value['quantity'] * $value['price']);
        $summ+= $total;
    }
        $phieunhap = new phieunhap;
        $phieunhap->manv = $id_nv;
        $phieunhap->ncc = $req->ncc;
        $phieunhap->tongtien = $summ;
        $phieunhap->ghichu = $req->ghichu;
        $phieunhap->matc = $id_tc;
        $phieunhap->save();
        
        foreach ($data as $value) {
            $ctphieunhap = new ctphieunhap;
            $ctphieunhap->maphieunhap = $phieunhap->id;
            $ctphieunhap->mahang = $value['name'];
            $ctphieunhap->soluong = $value['quantity'];
            $ctphieunhap->dvt = $value['attributes']['donvitinh'];
            $ctphieunhap->dongia = $value['price'];
            $ctphieunhap->save();


            $hanghoa = hanghoa::where('id', $value['name'])->first();
            $hanghoa->soluong = $hanghoa['soluong'] + $value['quantity'];
            $hanghoa->save();
        }


        $req->session()->forget('data');
        return redirect()->back()->with(Toastr::success('Nhập hàng thành công'));

    }
    
}
