<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\nhanvien;
use App\tochuc;
use App\tinhluong;
use Hash;



class NhanViencontroller extends Controller
{
    //Kiểm tra đăng nhập
    // public function __construct() {
    //     $this->middleware('auth');
    // }
    
    //Hiện nv
    public function getThemNhanVien($id)
    {
        $nhanvien = nhanvien::where('matc', $id)->orderBy('id', 'DESC')->get();
        $tochuc = tochuc::where('id', $id)->get();
        $tinhluong = tinhluong::all();
        $quyen = Auth::user()['quyen']; 
        $tochucc = tochuc::all();

        return view('admin.nhanvien.nhanvien',['nhanvien' => $nhanvien, 'tochuc' => $tochuc, 'tinhluong' => $tinhluong, 'quyen' => $quyen, 'tochucc' => $tochucc]);
    }

    public function postThemnhanvien(Request $request)
    {
        $this->validate($request,
            [
                
                'tennv' => 'required|min:3|max:100',               
                'ngaysinh' => 'required',
                'gioitinh' => 'required',
                'sdt' => 'required|min:10|max:10',
                'diachi' =>'required',
                'matc' => 'required',
                
            ],
            [
                'tennv.required' => 'Lỗi rồi! Bạn chưa điền tên nhân viên',
                'tennv.min' => 'Tên nhân viên phải có ít nhất 3 ký tự',                
                'sdt.required' =>'Lỗi rồi! Bạn chưa điền số điện thoại',   
                'sdt.min' =>'Số điện thoại phải có ít nhất 10 ký tự',
                'diachi.required' =>'Lỗi rồi! Bạn chưa điền địa chỉ',
                'luongcb.min' =>'Lương phải có ít nhất 1 ký tự',
                
            ]);

            $nhanvien = new nhanvien;            
            $nhanvien->tennv = $request->tennv;
            $nhanvien->ngaysinh = $request->ngaysinh;
            $nhanvien->gioitinh = $request->gioitinh;
            $nhanvien->sdt = $request->sdt;
            $nhanvien->diachi = $request->diachi;
            $nhanvien->matc = $request->matc;
            $nhanvien->calam = $request->calam;
            $nhanvien->username = $request->username;
            $nhanvien->password = Hash::make($request->matkhau);
            $nhanvien->ghichu = $request->ghichu;  
            $nhanvien->quyen = $request->quyen;  
        
            
            // echo "<pre>";
            // print_r($nhanvien->toArray());
            // echo "</pre>";
            $nhanvien->save();            
            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }

    // ------------------------------------Sửa nhân viên
    public function getSuaNhanVien($id)
    {
        $nhanvien = nhanvien::all();  
        $tochuc = tochuc::all();
        return view('admin.nhanvien.nhanvien',['nhanvien' => $nhanvien, 'tochuc' => $tochuc]);
    }

    public function postSuaNhanVien(Request $request, $id)
    {
        $nhanvien = nhanvien::where('id', $id)->first();

        $this->validate($request,
            [
                'tennv' => 'required|min:3|max:100',               
                'ngaysinh' => 'required',
                'gioitinh' => 'required',
                'sdt' => 'required|min:10|max:10',
                'diachi' =>'required',
                'matc' => 'required',
                
            ],
            [
                'tennv.required' => 'Lỗi rồi! Bạn chưa điền tên nhân viên',
                'tennv.min' => 'Tên nhân viên phải có ít nhất 3 ký tự',                
                'sdt.required' =>'Lỗi rồi! Bạn chưa điền số điện thoại',   
                'sdt.min' =>'Số điện thoại phải có ít nhất 10 ký tự',
                'diachi.required' =>'Lỗi rồi! Bạn chưa điền địa chỉ',
                'luongcb.required' =>'Lỗi rồi! Bạn chưa điền số lương',  
                

            ]);
            $nhanvien->id = $id;
            $nhanvien->tennv = $request->tennv;
            $nhanvien->ngaysinh = $request->ngaysinh;
            $nhanvien->gioitinh = $request->gioitinh;
            $nhanvien->sdt = $request->sdt;
            $nhanvien->diachi = $request->diachi;
            $nhanvien->matc = $request->matc;
            $nhanvien->calam = $request->calam;
            $nhanvien->ghichu = $request->ghichu;  
            $nhanvien->username = $request->username; 

        // echo "<pre>";
        // print_r($nhanvien->toArray());
        // echo "</pre>";
        $nhanvien->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }

    //-----------------------------------------Xóa nhân viên

    public function getXoaNhanVien($id)
    {
        $nhanvien = nhanvien::where('id', $id);        
        $nhanvien->delete($nhanvien);        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    }  
    
    
}