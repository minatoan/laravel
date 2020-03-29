<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\hanghoa;
use App\phieuxuat;
use App\ctphieuxuat;
use App\nhanvien;
use App\tochuc;
use Cart, Auth;
use DB;

class PhieuxuatController extends Controller
{
    public function getPhieuxuat($id)
    {

        $id_nv = Auth::id();
        $phieuxuat = phieuxuat::all();
        $tochuc = tochuc::all();
        $hanghoa = hanghoa::where('matc', $id)->get();
        return view('admin.xuathang.xuathang',compact( 'id_nv','phieuxuat','tochuc','hanghoa'));
    }

    public function getPhieuxuatcart($id_tc, $id_nv, Request $req)
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
                'id_nhanvien' => $id_nv,
                'id_tc' => $id_tc,
            )
        );
        array_push($data_list, $data);
        $req->session()->put('data', $data_list);



        // var_dump($data_list);
        $id_nv = Auth::id();
        $phieuxuat = phieuxuat::all();
        $tochuc = tochuc::all();
       
        $hanghoa = hanghoa::where('matc', $id_tc)->get();
        // var_dump($data);
        return redirect()->back();
        return view('admin.xuathang.xuathang',compact( 'id_nv','phieuxuat','tochuc','hanghoa'));
    }

    public function addPhieuxuatcart($id_tc, $id_nv, Request $req)
    {
        // $cart = Cart::getContent();
        // dd($cart->toArray());

        $data = $req->session()->get('data');
        $summ=0;
    foreach ($data as $value) {
        $total = ($value['quantity'] * $value['price']);
        $summ+= $total;
    }

        $phieuxuat = new phieuxuat;
        $phieuxuat->manv = $id_nv;
        $phieuxuat->ghichu = $req->ghichu;
        $phieuxuat->matc = $id_tc;
        $phieuxuat->save();
        
        foreach ($data as $value) {
            $ctphieuxuat = new ctphieuxuat;
            $ctphieuxuat->maphieuxuat = $phieuxuat->id;
            $ctphieuxuat->mahang = $value['name'];
            $ctphieuxuat->soluong = $value['quantity'];
            $ctphieuxuat->dvt = $value['attributes']['donvitinh'];
            $ctphieuxuat->save();

            $hanghoa = hanghoa::where('id', $value['name'])->first();
            $hanghoa->soluong = $hanghoa['soluong'] - $value['quantity'];
            $hanghoa->save();
        }


        $req->session()->forget('data');
        return redirect()->back()->with(Toastr::success('Xuất hàng thành công'));

    }
    //xóa hàng trong xuathang
    public function xoacart( Request $req)
    {   Session::forget('id');
        // $req->session()->forget('id');  
        return redirect()->back();

    }
    
}
