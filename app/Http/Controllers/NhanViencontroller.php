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
        $nhanvien = nhanvien::where('matc', $id)->get();
        $tochuc = tochuc::where('id', $id)->get();
        return view('admin.nhanvien.nhanvien',['nhanvien' => $nhanvien, 'tochuc' => $tochuc]);
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
                'luongcb' => 'required|min:1|max:100',
                'matc' => 'required',
                'username' => 'required|unique:nhanvien,username',                
                
            ],
            [
                'tennv.required' => 'Lỗi rồi! Bạn chưa điền tên nhân viên',
                'tennv.min' => 'Tên nhân viên phải có ít nhất 3 ký tự',                
                'sdt.required' =>'Lỗi rồi! Bạn chưa điền số điện thoại',   
                'sdt.min' =>'Số điện thoại phải có ít nhất 10 ký tự',
                'diachi.required' =>'Lỗi rồi! Bạn chưa điền địa chỉ',
                'luongcb.required' =>'Lỗi rồi! Bạn chưa điền số lương',  
                'luongcb.min' =>'Lương phải có ít nhất 1 ký tự',
                
            ]);

            $nhanvien = new nhanvien;            
            $nhanvien->tennv = $request->tennv;
            $nhanvien->ngaysinh = $request->ngaysinh;
            $nhanvien->gioitinh = $request->gioitinh;
            $nhanvien->sdt = $request->sdt;
            $nhanvien->diachi = $request->diachi;
            $nhanvien->luongcb = $request->luongcb;
            $nhanvien->matc = $request->matc;
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
                'luongcb' => 'required|min:1|max:100',
                'matc' => 'required',
                'username' => 'required|min:3',
                
            ],
            [
                'tennv.required' => 'Lỗi rồi! Bạn chưa điền tên nhân viên',
                'tennv.min' => 'Tên nhân viên phải có ít nhất 3 ký tự',                
                'sdt.required' =>'Lỗi rồi! Bạn chưa điền số điện thoại',   
                'sdt.min' =>'Số điện thoại phải có ít nhất 10 ký tự',
                'diachi.required' =>'Lỗi rồi! Bạn chưa điền địa chỉ',
                'luongcb.required' =>'Lỗi rồi! Bạn chưa điền số lương',  
                'luongcb.min' =>'Lương phải có ít nhất 1 ký tự', 
                'username.required' => 'Lỗi rồi! Bạn chưa điền tên tài khoản',
                'username.min' => 'Tên tài khoản phải có ít nhất 3 ký tự',
                'password.required' => 'Lỗi rồi! Bạn chưa điền mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',

            ]);
            $nhanvien->id = $id;
            $nhanvien->tennv = $request->tennv;
            $nhanvien->ngaysinh = $request->ngaysinh;
            $nhanvien->gioitinh = $request->gioitinh;
            $nhanvien->sdt = $request->sdt;
            $nhanvien->diachi = $request->diachi;
            $nhanvien->luongcb = $request->luongcb;
            $nhanvien->matc = $request->matc;
            
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