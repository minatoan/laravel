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



class NhanViencontroller extends Controller
{
    //
    public function getThemNhanVien()
    {
        $nhanvien = nhanvien::all();  
        $tochuc = tochuc::all();
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
                'manv' => 'required|unique:nhanvien,manv',                
                
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
            $nhanvien->matkhau = $request->matkhau;
            $nhanvien->ghichu = $request->ghichu;  
            $nhanvien->manv = $request->manv;  
            
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
            $nhanvien->id = $id;
            $nhanvien->tennv = $request->tennv;
            $nhanvien->ngaysinh = $request->ngaysinh;
            $nhanvien->gioitinh = $request->gioitinh;
            $nhanvien->sdt = $request->sdt;
            $nhanvien->diachi = $request->diachi;
            $nhanvien->luongcb = $request->luongcb;
            $nhanvien->matc = $request->matc;
            $nhanvien->matkhau = $request->matkhau;
            $nhanvien->ghichu = $request->ghichu;  

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