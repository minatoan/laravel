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
   //xuat hang
    public function getPhieuxuathang($id,Request $req)
    {
        // $req->session()->forget('dataxuat');
        $id_nv = Auth::id();
        $phieuxuat = phieuxuat::all();
        $tochuc = tochuc::where('id', $id)->first();
        $hanghoa = hanghoa::where('matc', $id)->get();
        return view('admin.nhaphang.xuathang',compact( 'id_nv','phieuxuat','tochuc','hanghoa'));
    }

    public function getPhieuxuatcart($id_tc, $id_nv, Request $req)
    {
        
        $data_listxuat = $req->session()->get('dataxuat');
        if ($data_listxuat==null){
            $data_listxuat=array();
        }
        $this->validate($req,
        [
            'tensp' => "required",
            'soluong' => "required", 
        ]
        ,
        [
            'tensp.required' => 'Lỗi rồi! Bạn chưa chọn tên sản phẩm ',
            'soluong.required' => 'Lỗi rồi! Bạn chưa chọn số lượng ',          
        ]);
        $id = time();
        $dataxuat = array(
            'id' =>  $id, // inique row ID
            'name' => $req->tensp,
            'quantity' => $req->soluong,
            'attributes' => array(
                'ngaynhap' => $req->ngaynhap,
                'ghichu' => $req->ghichu,
                'donvitinh' => $req->donvitinh,
                'id_nhanvien' => $id_nv,
                'id_tc' => $id_tc,
            )
        );
        $data_listxuat[$id] = $dataxuat;
        $req->session()->put('dataxuat', $data_listxuat);
        //bat loi xuat hang
        $dataxuat = $req->session()->get('dataxuat');
        foreach ($dataxuat as $value) {
            $hanghoa = hanghoa::where('id', $value['name'])->first();
        }
        if(($value['quantity'] )  >= ($hanghoa['soluong'])){
            $req->session()->forget('dataxuat');
            return redirect()->back()->with(Toastr::error('Số lượng vượt quá kho'));
        }

        // var_dump($data_list);
        $id_nv = Auth::id();
        $phieuxuat = phieuxuat::all();
        $tochuc = tochuc::all();
        $hanghoa = hanghoa::where('matc', $id_tc)->get();
        // var_dump($data);
        return redirect()->back();
        return view('admin.nhaphang.xuathang',compact( 'id_nv','phieuxuat','tochuc','hanghoa'));
    }

    public function addPhieuxuatcart($id_tc, $id_nv, Request $req)
    {
        $dataxuat = $req->session()->get('dataxuat');        
        $phieuxuat = new phieuxuat;
        $phieuxuat->manv = $id_nv;
        $phieuxuat->ghichu = $req->ghichu;
        $phieuxuat->matc = $id_tc;
        $phieuxuat->save();
        
        foreach ($dataxuat as $value) {
            $ctphieuxuat = new ctphieuxuat;
            $ctphieuxuat->maphieuxuat = $phieuxuat->id;
            $ctphieuxuat->mahang = $value['name'];
            $ctphieuxuat->soluong = $value['quantity'];
            $ctphieuxuat->dvt = $value['attributes']['donvitinh'];
            $ctphieuxuat->matc = $id_tc;
            $ctphieuxuat->save();
            $hanghoa = hanghoa::where('id', $value['name'])->first();
            $hanghoa->soluong = $hanghoa['soluong'] - $value['quantity'];
            $hanghoa->save();
        }
    
    $req->session()->forget('dataxuat');
    return redirect()->back()->with(Toastr::success('Xuất hàng thành công'));
    

    }
    //get lichsu xuat
    public function getdonxuat($id)
    {
        $tochuc = tochuc::where('id', $id)->first();
        $nhanvien = nhanvien::where('matc', $id)->get();
        $phieuxuat  = phieuxuat::where('matc', $id)->orderBy('id', 'DESC')->get();
        $ctphieuxuat = ctphieuxuat::where('matc', $id)->get();
        $hanghoa = hanghoa::all();
        // dd($phieuxuat);
        return view('admin.nhaphang.lichsuxuat', compact('phieuxuat', 'ctphieuxuat','nhanvien','tochuc','hanghoa'));
    }

    public function likexuat($id, Request $req)
    {
        $dateform = $req->dateform;
        $dateto = $req->dateto;
        $ctphieuxuat = where('matc', $id)->get();

        $phieuxuat  = phieuxuat::where('matc', $id)->orderBy('id', 'DESC')->whereBetween('ngayxuat', [$dateform, date('Y-m-d', strtotime($dateto. '+1 days'))])->get();
        return view('admin.nhaphang.lichsuxuat' ,compact('phieuxuat','ctphieuxuat'));
    }
    //xóa hàng trong xuathang
    public function xoaitems($index, Request $req)
    {   
        // $req->session()->forget('dataxuat');
        $data_listxuat = session()->get('dataxuat');
        unset($data_listxuat[$index]);
        session()->put('dataxuat', $data_listxuat);
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    }
}
