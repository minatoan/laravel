<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\tochuc;
use App\nhanvien;
class ToChuccontroller extends Controller
{
    //
    // public function getToChuc()
    // {
    //     $tochuc = tochuc::all();    
    //     return view('admin.tochuc.tochuc',['tochuc' => $tochuc]);
    // }

    public function getThemTochuc()
    {
        $tochuc = tochuc::all();
        $quyen = Auth::user()['quyen'];    
        return view('admin.tochuc.tochuc',['tochuc'=>$tochuc, 'quyen'=>$quyen]);
    }

    public function postThemTochuc(Request $request)
    {
        $this->validate($request,
            [
                'tentc' => 'required|unique:tochuc,tentc|min:3|max:100',
                'diachi' => 'required',
                'nguoiql' => 'required',
            ],
            [
                'tentc.required' => 'Lỗi rồi! Bạn chưa điền tên tổ chức',
                'tentc.min' => 'Tên tổ chức phải có ít nhất 3 ký tự',
                'tentc.unique' => 'Lỗi rồi! Tên tổ chức đã tồn tại',
                'diachi.required' => 'Lỗi rồi! Bạn chưa điền địa chỉ',
                'nguoiql.required' => 'Lỗi rồi! Bạn chưa điền tên người quản lý',
                                
            ]);

            $tochuc = new tochuc;
            $tochuc->tentc = $request->tentc;
            $tochuc->diachi = $request->diachi;
            $tochuc->nguoiql = $request->nguoiql;            
            $tochuc->save();
            
            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }
    // ------------------------------------Sửa tổ chức
    public function getSuaTochuc($id)
    {
        $tochuc = ban::find($id);        
        return view('admin.tochuc.tochuc',['tochuc'=>$tochuc]);
    }

    public function postSuaTochuc(Request $request, $id)
    {
        $tochuc = tochuc::where('id', $id)->first();

        $this->validate($request,
        [
            'tentc' => 'required|min:3|max:100',
            'diachi' => 'required',
            'nguoiql' => 'required',
        ],
        [
            'tentc.required' => 'Lỗi rồi! Bạn chưa điền tên tổ chức',
            'tentc.min' => 'Tên tổ chức phải có ít nhất 3 ký tự',            
            'diachi.required' => 'Lỗi rồi! Bạn chưa điền địa chỉ',
            'nguoiql.required' => 'Lỗi rồi! Bạn chưa điền tên người quản lý',
                            
        ]);
        $tochuc->id = $id;
        $tochuc->tentc = $request->tentc;
        $tochuc->diachi = $request->diachi;
        $tochuc->nguoiql = $request->nguoiql;            
        $tochuc->save();

        $tochuc->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }

    //_----------------------------------------------Xóa tổ chức
    public function getXoaTochuc($id)
    {
        $tochuc = tochuc::where('id', $id);        
        $tochuc->delete($tochuc);        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    } 
}
