<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\hanghoa;
use App\phieunhap;
use App\phieuxuat;
use App\ctphieunhap;
use App\ctphieuxuat;
use App\nhanvien;
use App\tochuc;
use App\nhacungcap;
use Cart, Auth;
use DB;
class PhieunhapController extends Controller
{
    
    public function getPhieunhap($id,Request $req)
    {
        // $req->session()->forget('data');
        $id_nv = Auth::id();
        $phieunhap = phieunhap::all();
        $tochuc = tochuc::all();
        $ncc = nhacungcap::where('matc', $id)->get();
        $hanghoa = hanghoa::where('matc', $id)->get();
        return view('admin.nhaphang.nhaphang',compact( 'id_nv','phieunhap','tochuc','ncc','hanghoa'));
    }

    //get lichsu nhap
    public function getdonnhap($id)
    {
        $tochuc = tochuc::where('id', $id)->first();
        $nhanvien = nhanvien::where('matc', $id)->get();
        $phieunhap  = phieunhap::where('matc', $id)->orderBy('id', 'DESC')->get();
        $ctphieunhap = ctphieunhap::all();
        $hanghoa = hanghoa::all();
        $ncc = nhacungcap::where('matc', $id)->get();


        return view('admin.nhaphang.lichsunhap', compact('phieunhap', 'ctphieunhap','nhanvien','tochuc','hanghoa','ncc'));
    }

    public function likenhap($id, Request $req)
    {

        $dateform = $req->dateform;
        $dateto = $req->dateto;
        $phieunhap  = phieunhap::where('matc', $id)->orderBy('id', 'DESC')->whereBetween('ngaynhap', [$dateform, date('Y-m-d', strtotime($dateto. '+1 days'))])->get();
        return view('admin.nhaphang.lichsunhap' ,compact('phieunhap'));
    }

    public function getPhieunhapcart($id_tc, $id_nv, Request $req)
    {
        
        $data_list = $req->session()->get('data');
        if ($data_list==null){
            $data_list=array();
        }
        $this->validate($req,
        [
            'tensp' => "required",
            'soluong' => "required",            
            'dongia' => "required",            

            
        ]
        ,
        [
            'tensp.required' => 'Lỗi rồi! Bạn chưa chọn tên sản phẩm ',
            'soluong.required' => 'Lỗi rồi! Bạn chưa chọn số lượng ',          
            'dongia.required' => 'Lỗi rồi! Bạn chưa chọn đơn giá ',
        ]);
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
        $ncc = nhacungcap::where('matc', $id_tc)->get();
        $hanghoa = hanghoa::where('matc', $id_tc)->get();
        // var_dump($data);
        return redirect()->back();
        return view('admin.nhaphang.nhaphang',compact( 'id_nv','phieunhap','tochuc','ncc','hanghoa'));
    }
   

    public function addPhieunhapcart($id_tc, $id_nv, Request $req)
    {
        $this->validate($req,
            [
                'ncc' => "required",
                'tongtien' => "required|min:1",


            ]
            ,
            [
                'ncc.required' => 'Lỗi rồi! Bạn chưa chọn nhà cung cấp',
                'tongtien.required' => 'Lỗi rồi! Bạn chưa có sản phẩm',


            ]);

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
    //xóa hàng trong nhaphang
    public function xoacart($id, Request $req)
    {   
        
        Session::forget('id');
        return redirect()->back();
        

    }

    //xuat hang
    public function getPhieuxuathang($id,Request $req)
    {
        // $req->session()->forget('data');
        $id_nv = Auth::id();
        $phieuxuat = phieuxuat::all();
        $tochuc = tochuc::all();
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
        $dataxuat = array(
            'id' => time(), // inique row ID
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
        array_push($data_listxuat, $dataxuat);
        $req->session()->put('dataxuat', $data_listxuat);



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
        $ctphieuxuat = ctphieuxuat::all();
        $hanghoa = hanghoa::all();
        $ncc = nhacungcap::where('matc', $id)->get();


        return view('admin.nhaphang.lichsuxuat', compact('phieuxuat', 'ctphieuxuat','nhanvien','tochuc','hanghoa'));
    }

    public function likexuat($id, Request $req)
    {

        $dateform = $req->dateform;
        $dateto = $req->dateto;
        $phieuxuat  = phieuxuat::where('matc', $id)->orderBy('id', 'DESC')->whereBetween('ngaynhap', [$dateform, date('Y-m-d', strtotime($dateto. '+1 days'))])->get();
        return view('admin.nhaphang.lichsuxuat' ,compact('phieuxuat'));
    }
    
}
