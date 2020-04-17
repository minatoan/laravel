<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\ban;
use App\loaiban;
use App\tochuc;

class LoaiBancontroller extends Controller
{    


// ------------------------------------------Thêm loại bàn
    public function getThemLoaiBan($id)
    {
        $loaiban = loaiban::where('matc', $id)->get();
        $tochuc = tochuc::where('id', $id)->get();
        return view('admin.loaiban.loaiban',['loaiban' => $loaiban, 'tochuc' => $tochuc]);
    }

    public function postThemLoaiBan(Request $request)
    {
        $this->validate($request,
            [
                'tenloaiban' => 'required|min:2|max:100',
                'matc' => 'required',
            ],
            [
                'tenloaiban.required' => 'Lỗi rồi! Bạn chưa điền tên loại bàn',
                'tenloaiban.min' => 'Tên loại bàn phải có ít nhất 3 ký tự',
                'tenloaiban.unique' => 'Lỗi rồi! Tên loại bàn đã tồn tại',            
            ]);
            $loaiban = new loaiban;
            $loaiban->tenloaiban = $request->tenloaiban;
            $loaiban->matc = $request->matc;
            $loaiban->save();

            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }
    // ------------------------------------Sửa loại bàn
    public function getSuaLoaiBan($id)
    {
        $loaiban = loaiban::find($id);
        $tochuc = tochuc::all();
        return view('admin.loaiban.loaiban',['loaiban'=>$loaiban,'tochuc'=>$tochuc]);
    }

    public function postSuaLoaiBan(Request $request, $id)
    {
        $loaiban = loaiban::where('id', $id)->first();

        $this->validate($request,
        [
            'tenloaiban' => 'required|min:3|max:100',
            'matc' => 'required',
        ],
        [
            'tenloaiban.required' => 'Lỗi rồi! Bạn chưa điền tên loại bàn',
            'tenloaiban.min' => 'Tên loại bàn phải có ít nhất 3 ký tự',
            
        
        ]);
        $loaiban->id = $id;
        $loaiban->tenloaiban = $request->tenloaiban;
        $loaiban->matc = $request->matc;
        // echo "<pre>";
        // print_r($loaiban->toArray());
        // echo "</pre>";
        $loaiban->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }
//_----------------------------------------------Xóa loại bàn
    public function getXoaLoaiBan($id)
    {
        $loaiban = loaiban::where('id', $id);        
        $loaiban->delete($loaiban);        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    } 
}